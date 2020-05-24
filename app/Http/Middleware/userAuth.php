<?php

namespace App\Http\Middleware;

use Closure;

class userAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $page)
    {
        if(\App\Http\Controllers\UserController::checkLoginStatus()){

            $userData = \App\Http\Controllers\UserController::getUserData(session('username'));
            if($page == "files"){

                if($userData[0]->Law_Files == 1){
                    return $next($request);
                }else{
                    return redirect('/');
                }

            }else if($page == "post"){

                if($userData[0]->Law_Post == 1 || $userData[0]->Law_Post == 2){
                    return $next($request);
                }else{
                    return redirect('/');
                }

            }else if($page == "category"){

                if($userData[0]->Law_Category == 1){
                    return $next($request);
                }else{
                    return redirect('/');
                }

            }else if($page == "news"){

                if($userData[0]->Law_News == 1){
                    return $next($request);
                }else{
                    return redirect('/');
                }

            }else if($page == "account"){

                if($userData[0]->Law_Users == 1){
                    return $next($request);
                }else{
                    return redirect('/');
                }

            }else if($page == "page"){

                if($userData[0]->Law_Page == 1){
                    return $next($request);
                }else{
                    return redirect('/');
                }

            }else if($page == "nav"){

                if($userData[0]->Law_Nav == 1){
                    return $next($request);
                }else{
                    return redirect('/');
                }

            }else if($page=="webInfo"){

                if($userData[0]->Law_WebInfo == 1){
                    return $next($request);
                }else{
                    return redirect('/');
                }

            }else{
                return redirect('/');
            }

        }else{

            return redirect('/login');

        }

        return $next($request);
    }
}
