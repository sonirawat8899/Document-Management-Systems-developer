<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class CMSController extends Controller
{
    public function addCms(Request $request) {

        if(!empty($request->all())){
            $request->validate([
                'title' => 'required|string',
                'image' =>  'mimes:jpeg,png,jpg,gif,svg',
                'status' => 'nullable|boolean',
            ]);
            $status = $request->status == 'on' ? 1 : 0;
    
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $image = $request->file('image');
                $destinationPath = public_path('/cms');
                $image_name =  rand().'.'.$image->getClientOriginalExtension();
                $image->move($destinationPath, $image_name);
            } else {
                $image_name= public_path('images/9187739.jpg');
            }

            $insertData['title']= str_replace(' ', '_', $request->title);
       
            if(Auth::user()->type=="company"){
				$insertData['company_id']= Auth::user()->id;
				$insertData['created_by']= Auth::user()->id;
			}
			if(Auth::user()->type=="user"){
				$insertData['company_id']= Auth::user()->company_id;
			}
			

            $insertData['description'] = strip_tags($request->description);
            $insertData['image'] = $image_name;
            $insertData['status'] =  $status;
           

         
            DB::table('cms')->insert($insertData);
    
            return redirect('company/view_content')->with('success', 'Content has been added successfully.');
        }else{
            return view('company.content_management.addcontent');
        }
        
    }
    public function viewContent(){
        $companyId= auth()->user()->id;
        $cms = DB::table('cms')->where('company_id',$companyId)->orderBy('id','DESC')->get();
        return view('company.content_management.view_content',['cms'=>$cms]);
    }

    public function deleteContent($id) {
       
        $authId = auth()->user()->id;     
        DB::table('cms')->where('company_id',$authId)->delete($id);
        return redirect('company/view_content')->with('success', 'Content has been deleted successfully.');
    }

    public function updateContent(Request $request,$id){
        $companyId= auth()->user()->id;
        $cms = DB::table('cms')->where(['id'=> $id])->where('company_id',$companyId)->first();
        return view('company.content_management.update_content')->with(['cms'=>$cms]);
    }

    public function editContent(Request $request){
     ///   print_r($request->all());die;
        $request->validate([
            'title' => 'required|string',
            'image' =>  'mimes:jpeg,png,jpg,gif,svg',
           // 'status' => 'nullable|boolean',
        ]);

        if(!empty($request->file('image'))){
            $image = $request->file('image');
            $destinationPath = public_path('/cms');
            $image_name = rand().'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $image_name);
            $status = $request->status == 'on' ? 1 : 0;
            DB::table('cms')
            ->where('id', $request['id'])
            ->update([

                'title'=> str_replace(' ', '_', $request->title),
                'description' => strip_tags($request->description),
                'image' => $image_name,
                'status' => $status,
            ]);
        }
        else {
            $status = $request->status == 'on' ? 1 : 0;
            DB::table('cms')
            ->where('id', $request['id'])
            ->update([
           'title'=> str_replace(' ', '_', $request->title),
           'description' => strip_tags($request->description),
           'status' => $status,
            ]);

        }
            return redirect('company/view_content')->with('success', 'Content has been updated successfully.');
}

public function CMSChangeStatus($id=null, $status=null){
    $cms = DB::table('cms')->where('id',$id)->update(['status'=>$status]);
    return back()->withInput()->with('success','Status has been changed.');
} 
}
