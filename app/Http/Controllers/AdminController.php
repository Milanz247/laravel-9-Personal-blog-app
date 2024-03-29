<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Builder\Function_;

class AdminController extends Controller
{
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function profile(){

        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view( 'admin.admin_profile_view', compact('adminData'));

    }//end methode
    public function EditProfile(){

        $id = Auth::user()->id;
        $editData = User::find($id);
        return view( 'admin.admin_profile_edit', compact('editData'));

    }//end methode

    public function StoreProfile(Request $request){

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name=$request->name;
        $data->email=$request->email;

        if($request->file('profile_image')){
            $file = $request->file('profile_image');

            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['profile_image'] = $filename;



        }
        $data->save();

        return redirect()->route('admin.profile');  
        
    }//end methide



}

