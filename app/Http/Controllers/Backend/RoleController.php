<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function AllPermission()
    {
        $permissions = Permission::all();
        return view('Backend.pages.permission.all_permission',compact('permissions'));
    }
    public function AddPermission()
    {
        return view('Backend.pages.permission.add_permission');
    }

    public function StorePermission(Request $request)
    {
        $role = Permission::create([
            'name'=>$request->name,
            'group_name'=>$request->group_name,
        ]);
        $notification= array(
            'message'=>'Permission Inserted Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->route('all.permission')->with($notification);
    }

    public function EditPermission($id)
    {
        $permission = Permission::findOrFail($id);
        return view('Backend.pages.permission.edit_permission',compact('permission'));
    }
    public function UpdatePermission(Request $request,$id)
    {
        $data =Permission::findOrFail($id)->update([
            // dd($data),
            'name'=>$request->name,
            'group_name'=>$request->group_name,
        ]);
        $notification= array(
            'message'=>'Permission Update Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->route('all.permission')->with($notification);
    }
    public function DeletePermission($id)
    {
        Permission::findOrFail($id)->delete();
        $notification= array(
            'message'=>'Permission Deleted Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }


    // ....................AllRole .................//

    public function AllRole()
    {
        $roles = Role::all();
        return view('Backend.pages.role.all_role',compact('roles'));
    }

    public function AddRole()
    {
        return view('Backend.pages.role.add_role');
    }

    public function StoreRole(Request $request)
    {
        $role = Role::create([
            'name'=>$request->name,
        ]);
        $notification= array(
            'message'=>'Role Inserted Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->route('all.role')->with($notification);
    }

    public function EditRole($id)
    {
        $roles = Role::findOrFail($id);
        return view('Backend.pages.role.edit_role',compact('roles'));
    }

    public function UpdateRole(Request $request,$id)
    {
        $data =Role::findOrFail($id)->update([
            // dd($data),
            'name'=>$request->name,
        ]);
        $notification= array(
            'message'=>'Role Update Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->route('all.role')->with($notification);
    }

    public function DeleteRole($id)
    {
        Role::findOrFail($id)->delete();
        $notification= array(
            'message'=>'Role Deleted Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    //.....................Add Role Permission.....................//

    public function AddRolePermission()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroup();
        return view('Backend.pages.role.add_role_permission',compact('roles','permissions','permission_groups'));
    }

    public function RolePermissionStore(Request $request)
    {
        $data = array();
        $permissions = $request->permission;

        foreach($permissions as $key => $item){
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        }

         $notification = array(
            'message' => 'Role Permission Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.role.permission')->with($notification);
    }

    public function AllRolePermission()
    {
        $roles = Role::all();
        return view('Backend.pages.role.all_role_permission',compact('roles'));
    }


    public function AdminEditRole($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroup();

        return view('Backend.pages.role.role_permission_edit',compact('role','permissions','permission_groups'));
    }

    public function AdminRoleUpdate(Request $request,$id){
        $role = Role::findOrFail($id);

        $permissions = $request->permission;
        // dd($permissions);
        if (!empty($permissions)) {
           $role->syncPermissions($permissions);
        }
        // dd($role);
         $notification = array(
            'message' => 'Role Permission Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.role.permission')->with($notification);

    }// End Method

    public function AdminRolesDelete($id){

        $role = Role::findOrFail($id);
        if (!is_null($role)) {
            $role->delete();
        }

         $notification = array(
            'message' => 'Role Permission Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method
}
