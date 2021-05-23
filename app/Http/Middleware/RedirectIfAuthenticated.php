<?php


namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if ($guard == "admin" && Auth::guard($guard)->check()) {
        //     return redirect('/admin');
        // }
        // if ($guard == "blogger" && Auth::guard($guard)->check()) {
        //     return redirect('/blogger');
        // }
        // if (Auth::guard($guard)->check()) {
        //     return redirect('/home');
        // }

        // return $next($request);



        switch ($guard) {
            case 'admin':
              if (Auth::guard($guard)->check()) {
                return redirect()->route('admin.dashboard');
              }
              break;



              case 'student':
                if (Auth::guard($guard)->check()) {
                  return redirect()->route('/student');
                }
                break;




            default:
              if (Auth::guard($guard)->check()) {
                  return redirect('/home');
              }
              break;
          }

          return $next($request);


    }
}

