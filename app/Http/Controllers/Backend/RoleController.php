<?php

namespace App\Http\Controllers\Backend;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('role_or_permission:Role access|Role create|Role edit|Role delete', ['only' => ['index','show']]);
        // $this->middleware('role_or_permission:Role create', ['only' => ['create','store']]);
        // $this->middleware('role_or_permission:Role edit', ['only' => ['edit','update']]);
        // $this->middleware('role_or_permission:Role delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role= Role::latest()->get();

        return view('user_and_roles.roles.table',['roles'=>$role]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = DB::select('SELECT DISTINCT group_id, group_name FROM `permissions`;');
        
        $permissions = Permission::get();
        foreach ($permissions as $key => $value) {

            $permission_name = explode(" ", $value->name );

            $permission[$key] = $permission_name[0];
        }

        foreach($permission as $key => $value ){
            $sub_module[] =$value;
        }
        $sub_module = array_chunk($permission,4,true);
        return view('user_and_roles.roles.add',['modules' => $modules, 'sub_modules' => $sub_module, 'permissions' => $permission ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required']);

        $role = Role::create(['name'=>$request->name]);

        $role->syncPermissions($request->permissions);
        
        return redirect()->back()->withSuccess('Role created !!!');
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
    public function edit(Role $role)
    {
        $permission = Permission::get();
        $role->permissions;
       return view('setting.role.edit',['role'=>$role,'permissions' => $permission]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->update(['name'=>$request->name]);
        $role->syncPermissions($request->permissions);
        return redirect()->back()->withSuccess('Role updated !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back()->withSuccess('Role deleted !!!');
    }
}
