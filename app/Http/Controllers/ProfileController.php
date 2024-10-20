<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class ProfileController extends Controller
{
    public function index(){
        return view('dashboard.home.profile.index');
    }
    public function name_update(Request $request){
        $old_name=auth()->user()->name;
        $request->validate(['name' => 'required']);

       User::find(auth()->id())->update([
        'name' => $request->name,
        'updated_at'=> now(),
       ]);

       return back()->with('name_update',"Name update successful $old_name to $request->name");



    }
    public function password_update(Request $request){
        $request ->validate([
            'c_pass' => 'required',
            'password' => 'required|confirmed'
        ]

        );
        if (Hash::check($request->c_pass,auth()->user()->password)){
            User::find(auth()->user()->id)->update([
                'password' => $request->password,
                'updated_at' => now(),
            ]);
            return back()->with('password_update','password update successfull');
        }else{
            return back()->withErrors(['password'=>'current password not match with our record'])->withInput();
        }

    }



   public function image_update(Request $request)
{
    $manager = new ImageManager(new Driver());

    if($request->hasFile('image')){

        $newname = auth()->user()->id . '-' . now()->format("M d , Y") . '-' . rand(0,9999) . '.' . $request->file('image')->getClientOriginalExtension();

        $user = User::find(auth()->user()->id);
        $oldImage = $user->image;

        $image = $manager->read($request->file('image'));
        $image->toPng()->save(base_path('public/upload/profile/'.$newname));

        if ($oldImage && file_exists(base_path('public/upload/profile/'.$oldImage))) {
            unlink(base_path('public/upload/profile/'.$oldImage));
        }

        $user->update([
            'image' => $newname,
            'updated_at' => now(),
        ]);

        return back()->with('image_update','Image Updated Successfully');
    } else {
        return back()->withErrors(['email' => "Please Insert Image First"])->withInput();
    }
}


}






?>
