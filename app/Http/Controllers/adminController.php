<?php

namespace App\Http\Controllers;  

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Category;
use App\Models\About;
use App\Models\Aboutus;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function adminLogin(){
        try {
            return view('admin/adminLogin');
        } catch (\Exception $e) {
            return ($e->getMessage());
        }
    }

    public function loginSubmit(request $request){
        try {                        
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect('dashboard')->with('success-message', 'Logged In Successfully...');
            }else{
                return view('admin/adminLogin')->with('error-message', 'Invalid Credential...');
            }
        
        } 
        catch (\Exception $e) {
            return ($e->getMessage());
        }
    }

    public function dashboard(){
        try {
            return view('admin/pages/dashboard');
        } catch (\Exception $e) {
            return ($e->getMessage());
        }
    }

    public function adminLogout(){
        try {
            Auth::logout();
            return redirect('admin-login')->with('success-message', 'Logged Out Successfully...');
        } catch (\Exception $e) {
            return ($e->getMessage());
        }
    }

    public function adminRegister(){

        try {
            return view('admin/adminRegister');
        } catch (\Exception $e) {
            return ($e->getMessage());
        }
    }

    public function adminSignup(request $request){
            $validated = $request->validate([
                'email' => 'required|unique:admins|max:255',
                'username' => 'required',
                'contact' => 'required',
                'password' => 'required|min:5',
            ]);
        try {
            $data = [
                'name' => $request->username,
                'email' => $request->email,
                'contact_number' => $request->contact,
                'password' => bcrypt($request->password)
            ];
            $createAdmin = Admin::create($data);
            if ($createAdmin) {
                return redirect('admin-login')->with('success-message', 'You are Registered Successfully, Please Login to Continue...');
            }else{
                return redirect('admin-register')->with('error-message', 'Something went wrong, Please try again...');
            }
        } catch (\Exception $e) {
            return ($e->getMessage());
        }
        
    }
    
    public function category(){
        try {
            $categories = Category::get();
            return view('admin/pages/categories', compact('categories'));
        } catch (\Exception $e) {
            return ($e->getMessage());
        }
    }

    public function addCategory(request $request){
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',            
        ]);
        try {
            $data = [
                'name' => $request->name
            ];
            $createData = Category::create($data);
            if($createData){
                return view('admin/pages/categories')->with('success-message', 'Category Added Successfully...');
            }else{
                return view('admin/pages/categories')->with('error-message', 'Something went wrong, Please try again...');

            }
            
        } catch (\Exception $e) {
            return ($e->getMessage());
        }
    }



    // Soulaca Functions

    public function addAboutus(){
        try {
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $aboutus_data = Aboutus::where('id', $id)->first();
                return view('admin/pages/addAboutus', compact('aboutus_data'));
            }
            return view('admin/pages/addAboutus');

             
            
        } catch (\Exception $e) {
            return ($e->getMessage());
        }
    }

    
    public function viewAboutus(){
        try {
            $aboutus_data = Aboutus::get();
            return view('admin/pages/viewAboutus', compact('aboutus_data'));
        } catch (\Exception $e) {
            return ($e->getMessage());
        }
    }

    public function saveAboutus(request $request){
        // return $request->all();
        try {
            
            $fileName1 = '';
            $fileName2 = '';
            if(isset($request->left_image)){
                $fileName1 = time().'.l_image'.$request->left_image->extension();
                $request->left_image->move(public_path('admin/img/content_images'), $fileName1);   
            }
            if(isset($request->right_image)){
                $fileName2 = time().'.r_image'.$request->right_image->extension();
                $request->right_image->move(public_path('admin/img/content_images'), $fileName2);
            }
            $data = [
                'main_content_type' => $request->main_content_type,
                'left_content_type' => $request->left_content_type,
                'left_title' => $request->left_content_title,
                'left_image' => $fileName1,
                'left_content' => $request->editor2,
                'right_content_type' => $request->right_content_type,
                'right_title' => $request->right_content_title,
                'right_image' => $fileName2,
                'right_content' => $request->editor1
            ];
            $update_aboutus = Aboutus::updateOrCreate($data);
            if ($update_aboutus) {
                return redirect('view-aboutus-content')->with('success-message','About us updated successfully...');
            }else{
                return redirect('add-aboutus-content')->with('error-message','Something went wrong, Please try again...');
            }
            
        } catch (\Exception $e) {
            return ($e->getMessage());
        }
    }

    public function deleteAboutus(){
        try {
            if(isset($_GET['id'])){
                $id = $_GET['id'];
            }
            $model=Aboutus::where('id',$id)->delete();
            if($model){
                return redirect('view-aboutus-content')->with('success-message','deleted successfully...');

            }else{
                return redirect('view-aboutus-content')->with('error-message','Could not Delete, Please try again...');

            }
        } catch (\Exception $e) {
            return ($e->getMessage());
        }
    }
    


    
    
    
    
}
