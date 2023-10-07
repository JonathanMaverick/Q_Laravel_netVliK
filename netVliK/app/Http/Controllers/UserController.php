<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register_page(){
        return view('LandingPage.register');
    }

    public function register(Request $request){
        $rules = [
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'name' => 'required|min:5|max:20',
            'email' => 'required|email',
            'phone_number' => 'required|max:15|min:7',
            'password' => 'required|min:5|max:20',
        ];

        $validation = Validator::make($request->all(), $rules);

        if($validation->fails()){
            return back()->withErrors($validation)->withInput();;
        }

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $image_name = time().'.'.$img->getClientOriginalExtension();
            Storage::putFileAs("public/images", $img, $image_name);
            $image_url = 'images/'.$image_name;
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => bcrypt($request->password),
            'img_url' => $image_url,
            'role' => 'member',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ];

        DB::table('users')->insert($data);

        return redirect()->route('login_page');
    }

    public function login_page(){
        return view('LandingPage.login');
    }

    public function login(Request $request){
        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credential)){
            $user = DB::table('users')
            ->select('*')
            ->where('email', '=', $request->email)
            ->first();
            session(['curruser_id' => $user->id]);

            return redirect()->route('home_page');
        }else{
            return back()->withErrors('Invalid Credential');
        }
    }

    public function update_profile(Request $request) {
        $user_id = session('curruser_id');
        $user = User::find($user_id);

        $rules = [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'new_name' => 'required|min:5|max:20',
            'old_password' => 'required',
            'new_password' => 'required|min:5|max:20',
        ];

        $validation = Validator::make($request->all(), $rules);
        if($validation->fails()){
            return back()->withErrors($validation)->withInput();
        }

    if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors('Invalid Credential');
        }

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $image_name = time().'.'.$img->getClientOriginalExtension();
            Storage::putFileAs("public/images", $img, $image_name);
            $image_url = 'images/'.$image_name;
        }

        $user->img_url = $image_url;
        $user->name = $request->new_name;
        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->route('profile_page', ['id'=>$user_id]);
    }

    public function profile_page($user_id){
        $user = User::find($user_id);

        return view('profile', compact('user'));
    }

    public function admin_page(){
        return view('admin');
    }

    public function logout(){
        session(['curruser_id' => null]);
        Auth::logout();
        return redirect()->route('login_page');
    }

    public function favorites()
    {
        $user = auth()->user();
        return view('favorites', compact('user'));
    }

    public function update_profile_page($id){
        $user = User::find($id);
        return view('updateprofile', compact('user'));
    }

}
