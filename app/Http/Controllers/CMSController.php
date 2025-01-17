<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    
            $image = $request->file('image');
            $destinationPath = public_path('/cms');
            $image_name = rand().'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $image_name);
            $insertData['title']= str_replace(' ', '_', $request->title);
    
            $insertData['description'] = strip_tags($request->description);
            $insertData['image'] = $image_name;
            $insertData['status'] =  $status;
            DB::table('cms')->insert($insertData);
    
            return redirect('admin/view_content')->with('success', 'Content has been added successfully.');
        }else{
            return view('admin.content_management.addcontent');
        }
        
    }
    public function viewContent(){
        $cms = DB::table('cms')->orderBy('id','DESC')->get();
        return view('admin.content_management.view_content',['cms'=>$cms]);
    }

    public function deleteContent($id) {
        DB::delete('delete from cms where id = ?',[$id]);
        return redirect('admin/view_content')->with('success', 'Content has been deleted successfully.');
    }

    public function updateContent(Request $request,$id){
        $cms = DB::table('cms')->where(['id'=> $id])->first();
        return view('admin.content_management.update_content')->with(['cms'=>$cms]);
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
            return redirect('admin/view_content')->with('success', 'Content has been updated successfully.');
}

public function CMSChangeStatus($id=null, $status=null){
    $cms = DB::table('cms')->where('id',$id)->update(['status'=>$status]);
    return back()->withInput()->with('success','Status has been changed.');
} 

}
