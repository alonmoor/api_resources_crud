<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
      return view('auth.admin-login');
    }

    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);

      // Attempt to log the user in
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route('admin.dashboard'));
      }

      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}










// namespace App\Http\Controllers\Auth;

// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use Auth;


// class AdminLoginController extends Controller
// {
//     public function __construct()
//     {

//       //$this->middleware('guest:admin');


//       $this->middleware('guest')->except('logout');
//       $this->middleware('guest:admin')->except('logout');
//       $this->middleware('guest:student')->except('logout');


//     }

//     public function showLoginForm()
//     {

//       return view('auth.admin-login');

//     }

//     public function login(Request $request)
//     {


//       // Validate the form data
//       $this->validate($request, [
//         'email'   => 'required|email',
//         'password' => 'required|min:6'
//       ]);

//       // Attempt to log the user in
//       if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
//         // if successful, then redirect to their intended location
//         return redirect()->intended(route('admin.dashboard'));
//       }

//       // if unsuccessful, then redirect back to the login with the form data
//       return redirect()->back()->withInput($request->only('email', 'remember'));

//     }



    // public function adminLogin(Request $request)
    //     {
    //         $this->validate($request, [
    //             'email'   => 'required|email',
    //             'password' => 'required|min:6'
    //         ]);

    //         if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

    //             return redirect()->intended('/admin');
    //         }
    //         return back()->withInput($request->only('email', 'remember'));
    //      }











// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;

// use Auth;


// class AdminLoginConroller extends Controller
// {
//     use AuthenticatesUsers;

//     /**
//      * Where to redirect users after login.
//      *
//      * @var string
//      */
//     protected $redirectTo = '/home';

//     /**
//      * Create a new controller instance.
//      *
//      * @return void
//      */

//     public function __construct()
//     {
//             // $this->middleware('guest')->except('logout');
//             // $this->middleware('guest:admin')->except('logout');
//             // $this->middleware('guest:student')->except('logout');

//             $this->middleware('guest:admin');

//     }


// //===================================================================
// //===================================================================

//     public function showLoginForm()
//     {
//       return view('auth.admin-login');
//     }



// //===================================================================
// //===================================================================


//      public function showAdminLoginForm()
//     {
//         return view('auth.login', ['url' => 'admin']);
//     }
// //===================================================================
//     public function adminLogin(Request $request)
//     {
//         $this->validate($request, [
//             'email'   => 'required|email',
//             'password' => 'required|min:6'
//         ]);

//         if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

//             return redirect()->intended('/admin');
//         }
//         return back()->withInput($request->only('email', 'remember'));
//     }
// //===================================================================
//      public function showStudentLoginForm()
//     {
//         return view('auth.login', ['url' => 'student']);
//     }
// //===================================================================
//     public function studentLogin(Request $request)
//     {
//         $this->validate($request, [
//             'email'   => 'required|email',
//             'password' => 'required|min:6'
//         ]);

//         if (Auth::guard('student')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

//             return redirect()->intended('/student');
//         }
//         return back()->withInput($request->only('email', 'remember'));
//     }
// //===================================================================
//     public function login(Request $request)
//     {
//             // Validate the form data
//             $this->validate($request, [
//                 'email'   => 'required|email',
//                 'password' => 'required|min:6'
//             ]);

//             // Attempt to log the user in
//             if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
//                 // if successful, then redirect to their intended location
//                 return redirect()->intended(route('admin.dashboard'));
//             }

//             // if unsuccessful, then redirect back to the login with the form data
//             return redirect()->back()->withInput($request->only('email', 'remember'));
//     }





// }

