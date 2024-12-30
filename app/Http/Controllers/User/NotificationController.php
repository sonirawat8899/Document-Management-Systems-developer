<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Auth;
use Common;

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

                $user_id =  auth()->user()->id;
                $user_type = Auth::user()->type;
                if(Auth::user()->type=="user"){
                    $inserData['user_id']= auth()->user()->id;
                    $inserData['created_by']= Auth::user()->id;
                  }
                  if(Auth::user()->type=="user"){
                    $inserData['company_id']= Auth::user()->company_id;
                  }



                DB::table('notifications')->insert($inserData);
                return redirect('user/show_notification')->with('success', 'Notification has been added successfully.');
            }
            else{
                return view('user.notification.Notification');
            }


        }
        public function showNotification(){
        
          $userId= auth()->user()->id;
             $notifications = DB::table('notifications')->where('user_id',$userId)->orderBy('id','DESC')->get();
             return view('user.notification.show_notification',['notifications'=>$notifications]);
            }


             //Delete function to delete in user body
         public function deleteNotification($id) {
            $authID= auth()->user()->id;
            DB::table('notifications')->where('user_id',$authID)->delete($id);
            return redirect('user/show_notification')->with('success', 'Notification has been deleted successfully.');
             }

            //edit code in user body
            public function editNotification(Request $request,$id)
            {
              $authId= auth()->user()->id;


               $notifications = DB::table('notifications')->where(['id'=> $id])->where('user_id',$authId)->first();
               return view('user.notification.edit_notification')->with(['notifications'=>$notifications]);
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
                    return redirect('user/show_notification')->with('success', 'Notification has been updated successfully.');

            }
            public function statusNotification($id=null, $status=null)   {
                $notifications = DB::table('notifications')->where('id',$id)->update(['status'=>$status]);
                return back()->withInput()->with('success','Status has been changed.');
            }
}
