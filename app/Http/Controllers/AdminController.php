<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Models\LoanDetail;


class AdminController extends Controller
{
     public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User Logout Successfully', 
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    } 

    // Admin logout 

public function adminLogout()
{
    Auth::guard('admin')->logout(); 

    $notification = [
        'message' => 'Admin Logout Successfully',
        'alert-type' => 'success',
    ];
    
    return redirect()->route('admin.create')->with($notification);
}

    public function EditProfile(){

        $id = Auth::user()->id;
        $editData = User::find($id);

        return view('admin.admin_profile_edit',compact('editData'));
    }

   
    // Admin login module 

    public function index(Request $request){
        $loans = LoanDetail::all();
        return view('admin.index', compact('loans'));

    } 


    public function create(Request $request) {

   
    if (Auth::guard('admin')->check()) {
        return redirect()->route('admin.index');
    }   
    return view('admin/authentication/login');

    }

    public function login(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');
    
      
        if(Auth::guard('admin')->attempt(['username' => $username, 'password' => $password])) {
           
            $notification = array(
                'message' => 'Admin login Successfully', 
                'alert-type' => 'success'
            );
    
            return redirect()->route('loan.admin.index')->with($notification); 

        } else {
           
            session()->flash('message', 'Incorrect username or password');

            return redirect()->back()->withInput($request->except('password'));
        }
    }

    // Admin Profile 

    public function adminProfile(){
        $id = Auth::guard('admin')->user()->id;
        $adminData = Admin::find($id);
        return view('admin.admin_profile_view',compact('adminData'));
    }

    public function adminEditProfile(){

        $id = Auth::guard('admin')->user()->id;
        $editadminData = Admin::find($id);
        return view('admin.admin_profile_edit',compact('editadminData'));
    }

  

    public function adminUpdateProfile(Request $request){
        
        $id = Auth::guard('admin')->user()->id;
        $data = Admin::find($id);
        $data->username = $request->username;

        if ($request->file('profile_image')) {

            // Old admin Profile Unlink
            if ($data->profile_image) {
                
                $oldImagePath = public_path('upload/admin_images/' .$data->profile_image);

                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

           $file = $request->file('profile_image');

           $filename = date('YmdHi').$file->getClientOriginalName();
           $file->move(public_path('upload/admin_images'),$filename);
           $data['profile_image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully', 
            'alert-type' => 'info'
        );
        return redirect()->route('admin.profile')->with($notification);

    }

   

    public function clearCache()
    {
        
    \Artisan::call('cache:clear');

  
    \Artisan::call('optimize:clear');

    
    \Artisan::call('view:clear');

        echo 'Application cache cleared successfully.';

    }

   
}
 