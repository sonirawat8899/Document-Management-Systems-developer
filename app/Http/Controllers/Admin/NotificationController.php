<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Common;
use Auth;
class NotificationController extends Controller
{
    
    public function addNotification(Request $request){
       
            if(!empty($request->all())){
                $request->validate(
                [
                  'title'=>'required',
                ]
                );
                $inserData['title'] = $request->title;
                $inserData['description']= $request->description;
    
                DB::table('notifications')->insert($inserData);
                return redirect('admin/show_notification')->with('success', 'Notification has been added successfully.');
            }
            else{
                return view('admin.notification.Notification');
            }
        
    }
    public function showNotification(){

         $notifications = DB::table('notifications')->orderBy('id','DESC')->get();
         return view('admin.notification.show_notification',['notifications'=>$notifications]);
        }


         //Delete function to delete in user body
     public function deleteNotification($id) {
        DB::delete('delete from notifications where id ='.$id);
        return redirect('admin/show_notification')->with('success', 'Notification has been deleted successfully.');
         }

        //edit code in user body
        public function editNotification(Request $request,$id)
        {
           $users = DB::table('notifications')->where(['id'=> $id])->first();
           return view('admin.notification.edit_notification')->with(['users'=>$users]);
         }

         public function updateNotification(Request $request){
            $request->validate(
                [
                  'title'=>'required',
                  ]
              );

            DB::table('notifications')
                ->where('id', $request['id'])
                ->update([
                    'title' => $request['title'],
                    'description' => $request['description'],
                ]);
                return redirect('admin/show_notification')->with('success', 'Notification has been updated successfully.');

        }
        public function statusNotification($id=null, $status=null)   {
            $notifications = DB::table('notifications')->where('id',$id)->update(['status'=>$status]);
            return back()->withInput()->with('success','Status has been changed.');
        }
}
