<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Yajra\Datatables\Datatables;
use App\Models\Menu;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $modelData = Role::query();
            return Datatables::of($modelData)->addColumn('action', function ($row) {
                if ($row->is_editable == false) {
                    return '';
                }
                return customButton($row, 'role', 'roles');
            })->rawColumns(['action'])->toJson();
        }
        return view('app.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::get();
        return view('app.role.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data77

        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name'     => 'required|regex:/^[\pL\s\-]+$/u',
        ]);
        if ($validator->fails()) {

            $errors = $validator->errors();
            $errorDisplay = "";
            foreach ($errors->messages() as $key => $error) {
                $errorDisplay = $errorDisplay . '<br>' . $error[0];
            }
            Alert::toast($errorDisplay, 'error')->timerProgressBar();
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $role = Role::create(['name' => $request->input('name'), 'guard_name' => $request->input('guard_name')]);
        $role->syncPermissions($request->input('permission'));
        Alert::toast('Role created successfully', 'success');
        return redirect()->route('roles.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $permissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();

        return view('content.apps.role.show', compact('role', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('app.role.edit', compact('role', 'permission', 'rolePermissions', 'menus'));
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


        $validator = Validator::make($request->all(), [
            'name'     => 'required|regex:/^[\pL\s\-]+$/u',
        ]);
        if ($validator->fails()) {

            $errors = $validator->errors();
            $errorDisplay = "";
            foreach ($errors->messages() as $key => $error) {
                $errorDisplay = $errorDisplay . '<br>' . $error[0];
            }
            Alert::toast($errorDisplay, 'error')->timerProgressBar();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));
        Alert::toast('Role updated successfully', 'success');
        return redirect()->route('roles.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {



        DB::table("roles")->where('id', $id)->delete();
        Alert::toast('Role deleted successfully', 'success');
        return redirect()->route('roles.index');
    }
}
