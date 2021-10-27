<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Settings;
use Illuminate\Http\Request;

class user
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!empty(Auth::user()->id)) {  
            $id = Auth::user()->id; 
            // $role = \DB::table('roles')->select('roles.name','roles.permission')->whereIn('roles.role',function ($query) use ($id) {
            //     $query->select('users.role')->from('users')->where('users.id',$id);
            // })->first();
            // $permissions = json_decode($role->permission);
            // $request->attributes->add(['permission' => $permissions]);
        }
        if (!Auth::check()) {
            return redirect('login');
        }
        return $next($request);
    }
}
