<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIsActiveAccount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!auth()->check())
            return $next($request);
        else{
            $isActive = auth()->user()->is_active;
            $createdAt = auth()->user()->created_at;
            $dateNow = date("d-m-Y");
            $addingDate = date('d-m-Y', strtotime($createdAt. ' + 7 days'));

            if($isActive OR strtotime($dateNow)  < strtotime($addingDate))
                return $next($request);
            else{
                auth()->logout();
                return redirect('expires');
            }
        }
    }
}
