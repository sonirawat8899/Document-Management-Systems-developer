<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ProjectManagementController extends Controller
{


        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware(['auth']);
        }


        public function addProject(Request $request) {
            if(!empty($request->all())){
                $request->validate([
                    'project_name' => 'required|string',
                    'manager_d' =>  'required',
                    'status' => 'nullable|boolean',
                ]);
               $status = $request->status == 'on' ? 1 : 0;

               $user_id =  Session::get('user_id');
               $user_type = Session::get('user_type');

             if($user_type = "company"){
              $inserData['admin_id'] = $user_id;
              $inserData['manager_d'] = $request->manager_d;
             }

                $inserData['description']= $request->description;
                $inserData['project_name']= $request->project_name;
                // $inserData['slug'] =str_replace(' ', '-',$request->project_name);
                $inserData['slug'] =str_replace(' ', '-',trim($request->project_name));
                $inserData['status'] =  $status;
                if(Auth::user()->type=="company"){
                    $inserData['company_id']= Auth::user()->id;
                    $inserData['created_by']= Auth::user()->id;
                }
                if(Auth::user()->type=="user"){
                    $inserData['company_id']= Auth::user()->company_id;
                }


                DB::table('projects')->insert($inserData);
                return redirect('/company/view_project')->with('success', 'Project has been added successfully.');
            }else{
                $companyId= auth()->user()->id;
                $project_manager = DB::table('users')->where(['user_type'=> 0])->where('manager_id', $companyId)->get();
                return view('company.project_management.project',['project_manager'=>$project_manager]);
            }



        }


        public function viewProject(){
            $companyId= auth()->user()->id;
            $projects = DB::table('projects')->select(
                "projects.*",
                "users.name" )
            ->leftJoin("users",  "users.id" ,"=", "projects.manager_d")
            ->orderBy('id','DESC')
           ->where('projects.company_id',$companyId)->get();
           return view('company.project_management.view_project',['projects'=>$projects]);
        }


        public function deleteProject($id) {
            $authId= auth()->user()->id;
            DB::table('projects')->where('company_id',$authId)->delete($id);
            return redirect('/company/view_project')->with('success', 'Project has been deleted successfully.');
        }


        public function updateProject(Request $request,$id) {
            $authId= auth()->user()->id;
            $projects = DB::table('projects')->where(['id'=> $id])->where('company_id',$authId)->first();
            $managers=DB::table('users')->select('id','name')->get();
            return view('company.project_management.update_project')->with(['projects'=>$projects,'managers'=>    $managers]);
        }

        public function editProject(Request $request){
            //print_r($request->all());die;
            $request->validate([
                'project_name' => 'required|string',
                'manager_d' =>  'required',
            ]);
            $status = $request->status == 'on' ? 1 : 0;
            DB::table('projects')
            ->where('id', $request['id'])
            ->update([
                'project_name' => $request['project_name'],
                'slug' => str_replace(' ', '-',$request['project_name']),
                'description' => $request['description'],
                'manager_d' => $request['manager_d'],
                'status' => $status,
            ]);
              return redirect('/company/view_project')->with('success', 'Project has been updated successfully.');

        }

        // check if project name already exist
        public function checkProject(Request $request){
            $project_name = $request['project_name'];
            $project_slug = str_replace(' ', '-',$request['project_name']);
            $id = $request['id'];
            if($id){
                 $project_name = DB::table('projects')->select('project_name')->where('id','!=',$id)->where('slug',$project_slug)->first();

                  if($project_name){
                    $project_name = 1;
                  }else{
                    $project_name = 0;
                  }
            }
            else{
                $project_name = DB::table('projects')->select('project_name')->where('project_name',$project_name)->first();
                if($project_name){
                  $project_name = 1;
                }else{
                  $project_name = 0;
                }
            }
            return $project_name;
          }


        //ProjectChangeStatus function is use for change for the status
        public function ProjectChangeStatus($id=null, $status=null)   {
            $projects = DB::table('projects')->where('id',$id)->update(['status'=>$status]);
            return back()->withInput()->with('success','Status has been changed.');
        }
}
