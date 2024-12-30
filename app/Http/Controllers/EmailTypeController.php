<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class EmailTypeController extends Controller
{
    public function email(){

        return view('admin.email_management.email');
    }

    public function add_email(Request $request){

        $request->validate(
            [
              'email_type'=>'required',

              ]
          );

            $inserData['email_type'] = $request->email_type;


            DB::table('email_types')->insert($inserData);

            return redirect('/admin/show_email')->with('success', 'Email type has been added successfully.');

    }

    public function show_email(){

         $users = DB::table('email_types')->orderBy('id','DESC')->get();
         return view('admin.email_management.show_email',['users'=>$users]);
        }


         //Delete function to delete in user body
     public function emaildelete($id) {
        DB::delete('delete from email_types where id ='.$id);
        return redirect('/admin/show_email')->with('success', 'email has been deleted successfully.');
     }

        //edit code in user body
        public function edit_email(Request $request,$id)
        {
           $users = DB::table('email_types')->where(['id'=> $id])->first();
           return view('admin.email_management.edit_email')->with(['users'=>$users]);
        }

        public function emailupdate(Request $request)
        {

            $request->validate(
                [
                  'email_type'=>'required',

                  ]
              );

            DB::table('email_types')
                ->where('id', $request['id'])
                ->update([
                    'email_type' => $request['email_type'],

                ]);
                return redirect('/admin/show_email')->with('success', 'Email type has been updated successfully.');
        }
}

