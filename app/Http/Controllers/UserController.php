<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function update(Request $request, $id)
    {
        $user=User::find($id);
        $user->update([
            'status'=>$request->get('status'),
            'name'=>$request->get('name'),
            'prenom'=>$request->get('prenom'),
            'fonction'=>$request->get('fonction'),
            'telephone'=>$request->get('telephone'),
            'mobile'=>$request->get('mobile'),
            'langue1'=>$request->get('langue1'),
            'langue2'=>$request->get('langue2'),
            'langue3'=>$request->get('langue3'),
            'langue4'=>$request->get('langue4'),

        ]);
        return redirect('/home');


    }

    public function editEmail()
    {
        return view('/users/modifier_email');

    }
    public function updateEmail(Request $request, $id)
    {
        $user=User::find($id);
        $user->update([
            'email'=>$request->get('email'),
        ]);
        return redirect('/home');

    }
    public function editpwd()
    {
        return view('/users/modifier_pwd');

    }
    public function updatepwd(Request $request, $id)
    {
        $user=User::find($id);
        if(!(Hash::check($request->get('current_password'),Auth::user()->password))){
            return back()->with('error','Your current password doesnt match what you provided');
        }
        if(strcmp($request->get('current_password'),$request->get('new_password'))==0){
            return back()->with('error','Your current password  cannot be same with the new password');
        }
        $user->update([
            'password'=>bcrypt($request->get('new_password')),
        ]);
        return redirect('/home');

    }
    public function destroy($id)
    {
        $user=User::find($id);
        $nom=$user->name;
        if($user->delete()){
            return redirect('/');
        }
    }



    public function updateVisible(Request $request, $id)
    {
        $user=User::find($id);
        $imageupload=request()->file('Photo');
       $imagename= time() . '.'.$imageupload->getClientOriginalExtension();
        $imagepath=public_path('/images/');
       $imageupload->move($imagepath,$imagename);

        $user->update([
            'Linkedin'=>$request->get('Linkedin'),
            'Skype'=>$request->get('Skype'),
            'Twitter'=>$request->get('Twitter'),
            'Facebook'=>$request->get('Facebook'),
            'Instagram'=>$request->get('Instagram'),
            'Photo'=> '/images/' . $imagename,
        ]);
        return redirect('/home');

    }


























}
