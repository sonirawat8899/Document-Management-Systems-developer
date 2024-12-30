<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    public function module_permissioN(){
        $modules = DB::table('users')->select('id','name')->get();
        $users = DB::table('modules')->orderBy('id','ASC')->get();
        return view('admin.permission.module_permission')->with(['users'=>$users,'modules'=>    $modules]);
    }

    public function permission(Request $request){
        foreach($request->permission as $key=>$modules){
            $inserData['module_id']= $key;
            $inserData['add_permission'] = @$modules['add_permission']   == 'on' ? 1 : 0;
            $inserData['edit_permission'] = @$modules['edit_permission'] == 'on' ? 1 : 0;
            $inserData['delete_permission'] = @$modules['delete_permission'] == 'on' ? 1 : 0;
            $inserData['view_permission'] = @$modules['view_permission'] == 'on' ? 1 : 0;
            $inserData['status_permission'] = @$modules['status_permission'] == 'on' ? 1 : 0;
            DB::table('modules_permissions')->insert($inserData);
        }
        return  redirect('admin/module_permission')->with('success', 'Permission give successfully.');
    }
}
