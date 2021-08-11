<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Student;

class StudentLoginController extends Controller
{
    public function __construct() {
        $this->middleware('guest:student', ['except' => ['logout']]);
    }

    public function showLoginForm() {
        return view('auth.student-login');
    }

    public function login(Request $request) {
        
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $login = Student::where('std_username', '=', $request->username)
                ->where('std_password', '=', md5($request->password))
                ->first();

        if($login) {
            Auth::guard('student')->login($login);
            return redirect('/condition');
        } else {
            return redirect()->back()->withInput()->with('msg', 'These credentials do not match our records.');
        }

    }

    public function logout() {
        Auth::guard('student')->logout();
        session()->forget('condition');
        return redirect('logincustom');
    }
}
