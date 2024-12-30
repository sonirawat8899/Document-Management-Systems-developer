<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    

    public function categoryAdd(Request $request) {
        if(!empty($request->all())){
            $request->validate([
                'parent_id' =>  'required',
                'name' => 'required|string',
            ]);
    
            $inserData['parent_id'] = $request->parent_id;
            $inserData['name']= $request->name;
            $inserData['category_slag']= str_replace(' ', '_', $request->name);
            $inserData['description'] = $request->description;

            $user_id =  auth()->user()->id;
            $user_type = Session::get('user_type');

            if($user_type = "user"){
                $inserData['user_id'] = $user_id;
              }

            DB::table('categories')->insert($inserData);
            return redirect('user/view_category')->with('success', 'Category has been added successfully.');
        }else{
            $parent_catogeris=DB::table('categories')->select('id','name')->get();
            return view ('user.category.category')->with(['parent_categories'=> $parent_catogeris]);
        }
        }

    public function categoryView(){
       $userId=Auth::user()->id;
        $categories = DB::table('categories')->orderBy('id','DESC')->where('user_id',$userId)->get();      
        return view('user.category.view_category',['categories'=>$categories]);
    }
    public function categoryChangeStatus($id=null, $status=null)   {
        $categories = DB::table('categories')->where('id',$id)->update(['status'=>$status]);
        return back()->withInput()->with('success','Status has been changed.');
    } 

    public function categoryDelete($id) {
        DB::delete('delete from categories where id = ?',[$id]);
        return redirect('user/view_category')->with('success', 'Category has been deleted successfully.');
    }

    public function categoryUpdate(Request $request,$id) {
        $users = DB::table('categories')->where(['id'=> $id])->first();
        $parent_catogeris=DB::table('categories')->select('id','name')->get();
        return view('user.category.update_category')->with(['users'=>$users,'parent_categories'=> $parent_catogeris]);
    }

    public function categoryEdit(Request $request){
        $request->validate([
            'parent_id' =>  'required',
            'name' => 'required',
        ]);
            DB::table('categories')
            ->where('id', $request['id'])
            ->update([
                'parent_id' => $request['parent_id'],
                'name' => $request['name'],
                'description' => $request['description'],
            ]);
        return redirect('user/view_category')->with('success', 'Category has been updated successfully.');
    }
     // check if name already exist
     public function checkName(Request $request){
        $name = $request['name'];
        $id = $request['id'];
      
        if($id){ 
             $name = DB::table('categories')->select('name')->where('id','!=',$id)->where('name',$name)->first();
            
              if($name){
                $name = 1;
              }else{
                $name=0;
              }
        }
        else{
            $name = DB::table('categories')->select('name')->where('name',$name)->first();
            if($name){
              $name = 1;
            }else{
              $name=0;
            }
        }
       return $name;
       
      }

}