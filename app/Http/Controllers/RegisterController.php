<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use App\Models\Register;
use Session;

class RegisterController extends Controller
{
    public function saveUser(Request $request) {
        $this->validate($request, ['first_name' => 'required',
                                    'last_name' => 'required',
                                    'gender' => 'required',
                                    'hobby' => 'required',
                                    'country' => 'required',
                                    'about' => 'required',
                                    'email' => 'email|required|unique:registers',
                                    'confirm_email' => 'email|required|same:email',
                                    'password' => 'required|min:5',
                                    'confirm_password' => 'required|same:password',
                                    'image' => 'image|nullable|max:4072']);

        if($request->hasFile('image')) {
            // 1: get the file name with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            // 2: get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // 3: get just file extension
            $fileExt = $request->file('image')->getClientOriginalExtension();
            // 4: file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;

            //Upload Image
            $imagePath = $request->file('image')->storeAs('public/image', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $register = new Register();
        
        $register->first_name = $request->first_name;
        $register->last_name = $request->last_name;
        $register->gender = $request->gender;
        $register->hobby = json_encode($request->hobby);
        $register->country = $request->country;
        $register->about = $request->about;
        $register->email = $request->email;
        $register->password = bcrypt($request->password);
        $register->image = $fileNameToStore;

        $register->save();

        // return back()->with('status', 'The User has been successfully Registered..!!');

        return response()->json(['res'=>'The User has been successfully Registered..!!']);
    }

    public function login() {
        return view('login');
    }

    public function access_account(Request $request) {
        $this->validate($request, ['email' => 'email|required',
                                    'password' => 'required' ]);
        $userAccount = Register::where('email', $request->email)->first();
        
        if($userAccount) {
            if(Hash::check($request->password, $userAccount->password)) {
                Session::put('userAccount', $userAccount);
                return redirect('/dashboard');
            } else {
                return back()->with('status', 'Wrong email or password');
            }
        } else {
            return back()->with('status', 'You do not have an account with this email');
        } 
    }

    public function clients(Request $request) {
        $registers = Register::All();

        return view('dashboard')->with('registers', $registers);

        // return view('dashboard', compact('clients'));
    }

    public function delete($id) {
        $register = Register::find($id);

        if($register->image != 'noimage.jpg') {
            Storage::delete('public/image/'.$register->image);
        }

        $register->delete();

        return back()->with('status', 'The product has been successfully deleted..!!');
    }

    public function editUser($id) {
        $register = Register::find($id);
        return view('update', compact('register'));
    }

    public function updateUser(Request $request) {
        $this->validate($request, ['first_name' => 'required',
                                    'last_name' => 'required',
                                    'gender' => 'required',
                                    'hobby' => 'required',
                                    'country' => 'required',
                                    'about' => 'required',
                                    'image' => 'image|nullable|max:4072']);

        $register = Register::find($request->id);
        
        $register->first_name = $request->first_name;
        $register->last_name = $request->last_name;
        $register->gender = $request->gender;
        $register->hobby = json_encode($request->hobby);
        $register->country = $request->country;
        $register->about = $request->about;

        

        if($request->hasFile('image')) {
            // 1: get the file name with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            // 2: get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // 3: get just file extension
            $fileExt = $request->file('image')->getClientOriginalExtension();
            // 4: file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;

            //Upload Image
            $imagePath = $request->file('image')->storeAs('public/image', $fileNameToStore);

            if($register->image != 'noimage.jpg') {
                Storage::delete('image/'.$register->image);
            }

            $register->image = $fileNameToStore;
        }

        $register->save();

        return redirect('/dashboard')->with('status', 'The user has been successfully Updated..!!');
    }
}
