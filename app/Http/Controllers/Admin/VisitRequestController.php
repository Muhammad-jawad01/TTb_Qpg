<?php

namespace App\Http\Controllers\Admin;

use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Models\User;
use App\Models\Department;
use App\Models\VehcileManufacturer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Hash;
use Auth;


class VisitRequestController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:request-list|request-create|request-edit|request-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:request-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:request-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:request-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    { 
        // dd("test");
        $visitor = Visitor::with(['user', 'department'])->has('user')->has('department')->findorfail($id);
//    dd($visitor);
        return view('app.visitor_request.print', compact('visitor'));
    }
    public function index(Request $request)
    { 
        if ($request->ajax()) {
            $modelData = Visitor::query()->where('user_id',Auth::User()->id)->with(['user', 'department']);
              
            //query For Department Role Status 
            $modelData->when($request->has('status'), function ($q) use ($request) {
                return $q->whereIn('status', explode(",", $request->status));
            });

            $modelData->orderBy('created_at',  'desc');
            return Datatables::of($modelData)->addColumn('action', function ($row) {
                return customButton($row,  'request', 'visit', true);
            })->rawColumns(['action'])->toJson();
        }
        return view('app.visitor_request.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = Department::get();
        $vehcilemanufacturer = VehcileManufacturer::get();

        return view('app.visitor_request.create',compact( 'department','vehcilemanufacturer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'department_id' => 'required',
        ]);
        if ($validator->fails()) {
            Alert::toast('The enter required input  ', 'error')->timerProgressBar();

            return redirect()->back();
        }
        $user_id =auth()->user()->id;
        $status=2;
        $model = new Visitor();
        $data = $request->all();
        $data['user_id'] = $user_id;
        $data['source'] = 'self';
        $data['status'] = $status;
        $data['creator_id'] = $user_id;
        $model->fill($data);
        $model->save();
        // dd($model);
        return redirect()->route('visit.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}