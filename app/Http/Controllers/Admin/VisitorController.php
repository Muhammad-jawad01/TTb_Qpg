<?php

namespace App\Http\Controllers\Admin;

use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Models\User;
use App\Models\Gate;
use App\Models\Department;
use App\Models\VehcileManufacturer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Hash;
use Auth;


class VisitorController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:visitor-list|visitor-create|visitor-edit|visitor-delete|epass-list', ['only' => ['index', 'store']]);
        $this->middleware('permission:visitor-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:visitor-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:visitor-delete', ['only' => ['destroy']]);
    }

    public function print($id)
    {
        $visitor = Visitor::with(['user', 'department', 'gate'])->has('user')->has('department')->has('gate')->findorfail($id);

        return view('app.visitor.print', compact('visitor'));
    }



    public function info($id)
    {
        $visitor = Visitor::where(['id'=>$id,'status'=>3])->first();
        if ($visitor) {
            $reponse = ['success' => true, 'data' => $visitor];
        } else {
            $reponse = ['success' => false, 'data' => null];
        }
        return response()->json($reponse);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $total = Visitor::query()->where('user_id',Auth::User()->id)->whereIn('status',[1,2])->count();

        // $visitor=Visitor::get();
        // dd($total);
        if ($request->ajax()) {
            $modelData = Visitor::query()->with(['user', 'department'])->has('user')->has('department');



            //query For Department Role Status 
            $modelData->when($request->has('status'), function ($q) use ($request) {
                return $q->whereIn('status', explode(",", $request->status));
            });

            //query For Gate Status 
            $modelData->when(Auth::user()->hasRole('Computer operator'), function ($q) {
                return $q->where('creator_id', Auth::User()->id);
            });


                 //query For visitor Status 
            $modelData->when(Auth::user()->hasRole('visitor'), function ($q) {
                    return $q->where('user_id', Auth::User()->id);
                });

            $modelData->orderBy('created_at',  'desc');
            return Datatables::of($modelData)->addColumn('action', function ($row) {
                return customButton($row,  'visitor', 'visitors', true);
            })->rawColumns(['action'])->toJson();
        }

        return view('app.visitor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gate = Gate::get();
        $department = Department::get();
        $vehcilemanufacturer = VehcileManufacturer::get();

        return view('app.visitor.create', compact('gate', 'department', 'vehcilemanufacturer'));
    }
    public function epass()
    {
        $gate = Gate::get();

        return view('app.visitor.epass',compact('gate'));
    }
    private function getBase64Content($data)
    {
        list($type, $data) = explode(';', $data);
        list(, $data) = explode(',', $data);
        $data = base64_decode($data);

        return $data;
    }

    public function saveFileFromBase64($filename, $data)
    {
        $data = $this->getBase64Content($data);
        file_put_contents($filename, $data);
        $file = new \File($filename);

        return $file;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVisitorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'department_id' => 'required',
            'gate_id' => 'required',
            'cnic' => 'required',


        ]);
        if ($validator->fails()) {

            Alert::toast('The enter required input  ', 'error')->timerProgressBar();
            return redirect()->back();
        }
        $user = User::where('cnic', $request->cnic)->first();
        if (!$user) {
            // user doesn't exist
            $pass = 1235678;
            $input = $request->all();
            $input['password'] = Hash::make($pass);
            $input['email'] = $request->cnic;

            $user = User::create($input);
            $user->assignRole('visitor');
            if ($request->has('profile')) {
                if (!empty($request->profile)) {
                    $user->addMediaFromBase64($request->profile)->usingFileName('user_proifle_' . time() . '.png')->toMediaCollection('user_profile');
                }
            }
            if ($request->has('cnic_front')) {
                if (!empty($request->cnic_front)) {
                    $user->addMediaFromBase64($request->cnic_front)->usingFileName('cnic_front_' . time() . '.png')->toMediaCollection('cnic_front');
                }
            }
            if ($request->has('cnic_back')) {
                if (!empty($request->cnic_back)) {
                    $user->addMediaFromBase64($request->cnic_back)->usingFileName('cnic_back_' . time() . '.png')->toMediaCollection('cnic_back');
                }
            }
        }
        $model = new Visitor();
        $data = $request->all();
        $data['user_id'] = $user->id;
        $data['visiting_date'] = Carbon::today();
        $data['visiting_time'] = Carbon::now();
        $data['creator_id'] = auth()->user()->id;
        $model->fill($data);
        $model->save();

        return redirect()->route('visitors.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visitor = Visitor::findOrFail($id);
        return view('app.visitor.show', compact('visitor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visitor = Visitor::with(['user', 'department', 'gate'])->has('user')->has('department')->findorfail($id);
        return view('app.visitor.edit', compact('visitor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVisitorRequest  $request
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visitor $visitor)
    {
        $visitor->update([
            'rejected_reason' => $request->rejected_reason,
            'visiting_date' => $request->visiting_date,
            'visiting_time' => $request->visiting_time,
            'status' => $request->status,
        ]);
        $qr = QrCode::size(100)->generate(base64_encode($visitor->qrcode ?? $visitor->id));
        return sendResponse($visitor);
    }
    public function epass_update(Request $request,)
    {
        $visitor = Visitor::findOrFail($request->visitor_id);
        $data=$request->all();
        $data['status']=1;
        $visitor->fill($data);
        $visitor->save();
        return redirect()->route('visitors.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitor $visitor)
    {
        //
    }
}