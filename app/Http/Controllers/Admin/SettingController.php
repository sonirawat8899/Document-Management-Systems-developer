<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
	  public function __construct()
    {
        $this->middleware('auth');
    }


	 public function setting(){
		           $logos = DB::table('logos')->first();

			return view('admin.setting.setting')->with(['logos'=>$logos]);
	}

public function Updateimage(Request $request) {

		$data = array();
        if($request->file('logo')){
            $image = $request->file('logo');
                $destinationPath = public_path('/images/logo');
                $logo_name = rand().'.'.$image->getClientOriginalExtension();
                $image->move($destinationPath, $logo_name);

                $inserData['logo'] = $logo_name;
				$update = DB::table('logos')->where('id',$request->id)->update($inserData);
                return redirect('/admin/logos')->with('success', 'Profile & logo has been updated successfully.');

        }

        if($request->file('profile')){
				$image = $request->file('profile');
                $destinationPath = public_path('/images/profile/');
                $profile_name = rand().'.'.$image->getClientOriginalExtension();
				$image->move($destinationPath, $profile_name);
				$inserData['profile'] = $profile_name;
				$update = DB::table('logos')->where('id',$request->id)->update($inserData);
                return redirect('/admin/logos')->with('success', 'Profile & logo has been updated successfully.');

        }
        else {
            return redirect()->back()->with('error', 'Image could not updated .');
        }



    }



    public function add_image(Request $request) {
        // $request->validate([
        //     // 'image' =>  'mimes:jpeg,png,jpg,gif,svg',

        // ]);

        $image = $request->file('image');
        $destinationPath = public_path('/images');
        $image_name = rand().'.'.$image->getClientOriginalExtension();

        if (!Storage::exists('images/' . $image_name)) {
        $image->move($destinationPath, $image_name);

        $inserData['image'] = $image_name;
        $inserData['image_type'] = $request->image_type;
        $inserData['company_name'] = $request->company_name;

        }else {
            return redirect()->back()->with('error', 'Image already exists.');
        }


        DB::table('side_setting')->insert($inserData);
        return redirect('/admin/view_image')->with('success', 'Profile Image has been updated successfully.');
    }

    public function view_image(){
       $users = DB::table('side_setting')->orderBy('id','DESC')->get();
       return view('admin.setting.view_setting',['users'=>$users]);
    }

    public function edit_image(Request $request,$id){

        $company_name = DB::table('users')->select('company_name')->get();
        $setting = DB::table('side_setting')->where(['id'=> $id])->first();
      // print_r($setting);die;
        return view('admin.setting.edit_image')->with(['company_name'=>$company_name,'setting'=>$setting]);
    }

    public function update_image(Request $request){
        $request->validate([
            'image' =>  'mimes:jpeg,png,jpg,gif,svg',
            'company_name' =>  'required',
            'image_type' => 'required',
        ]);

        if(!empty($request->file('image'))){
            $image = $request->file('image');
            $destinationPath = public_path('/images');
            $image_name = rand().'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $image_name);

            DB::table('side_setting')
            ->where('id', $request['id'])
            ->update([
                'image' => $image_name,
                'company_name' => $request['company_name'],
                'image_type' => $request['image_type'],
            ]);
        }
        else {
            DB::table('side_setting')
            ->where('id', $request['id'])
            ->update([

                'company_name' => $request['company_name'],
                'image_type' => $request['image_type'],
            ]);

        }
            return redirect('admin/view_image')->with('success', 'profile has been updated successfully.');
}



    public function delete_image($id) {
        DB::delete('delete from side_setting where id = ?',[$id]);
        return redirect()->back();
    }

}

