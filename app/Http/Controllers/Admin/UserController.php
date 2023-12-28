<?php


namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use DateTime;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }





    // Account Settings
    public function account_settings()
    {
        $user = User::where('id', \Auth::User()->id)->first();
        // dd($user);
        return view('app.user.account-settings',compact('user'));
    }

   

    public function update_setting(Request $request)
    {
        $id = \Auth::User()->id;
        // dd("test");
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required|max:55|min:5',
            'email' => 'required|email|unique:users,email,' . $id,
            // 'password' => 'same:confirm-password',
        ]);


        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } 
        else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        // $user->addAllMediaFromTokens();
        $user->update($input);

        Alert::toast('User updated successfully', 'success');
        return redirect()->route("dashboard");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $modelData = User::query();
            return Datatables::of($modelData)->addColumn('action', function ($row) {
                if($row->type=='admin'){
                    return '';
                }

                return customButton($row, 'user', 'users');
            })->rawColumns(['action'])->toJson();
        }
        return view('app.user.index');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles = Role::pluck('name', 'name')->all();
        return view('app.user.create', compact('roles' ));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:55|min:5',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
        if ($validator->fails()) {

            $errors = $validator->errors();
            $errorDisplay = "";
            foreach ($errors->messages() as $key => $error) {
                $errorDisplay = $errorDisplay . '<br>' . $error[0];
            }
            Alert::toast($errorDisplay, 'error')->timerProgressBar();
            // Alert::toast('Please Complete the From ','error')->timerProgressBar();
            return redirect()->back()->withErrors($validator)->withInput();
        }  


        $input = $request->all();
        $input['email_verified_at'] = Carbon::now();
        $input['password'] = Hash::make($input['password']);


        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        Alert::toast('User created successfully', 'success');
        return redirect()->route('users.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        // return view('content.apps.user.show', compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();


        return view('app.user.edit', compact('user', 'roles', 'userRole'));
    }

    public function editpassword($id)
    {
        $user = User::find($id);


        return view('app.user.account-settings',compact('user'));
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

                // dd($request);



            $validator = Validator::make($request->all(), [
                'name' => 'required|max:55|min:5',
                'email' => 'required|',
          
                'roles' => 'required'
            ]);
        

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errorDisplay = "";
            foreach ($errors->messages() as $key => $error) {
                $errorDisplay = $errorDisplay . '<br>' . $error[0];
            }
            Alert::toast($errorDisplay, 'error')->timerProgressBar();
            return redirect()->back();
        }
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }
        $user = User::find($id);
        if($user->type=='admin'){

            Alert::toast('User role cannot Be changed ', 'error');
            return redirect()->route('users.index');
    
        }
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));
        Alert::toast('User updated successfully', 'success');
        return redirect()->route('users.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
            DB::table("users")->where('id', $id)->delete();
            Alert::toast('Uesr deleted successfully', 'success');
            return redirect()->route('users.index');
        
    }
}