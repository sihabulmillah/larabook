<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;



class CekLevel
{
    //headle request user jika benar
    //in_array akan mengembalikan nilai true kalau request yang di tangkap itu benar

    //cek level user
    public function handle(Request $request, Closure $next, ...$levels)
    {
        if (in_array($request->user()->level, $levels)) {
            return $next($request);
        }
        //diarahkan ke halaman login
        return redirect('/masuk');
    }
}
