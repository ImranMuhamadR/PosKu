<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param mixed $level  [1. admin | 2. kasir]
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$level)
    {
        // ! jika yang masuk = level1 maka langsung bisa akses semua fitur
        if (auth()->user() && in_array(auth()->user()->level, $level)) {
            return $next($request);
        }
        // * jika bukan maka akan mengembalikan ke halaman dashboard
        return redirect()->route('dashboard');
    }
}
