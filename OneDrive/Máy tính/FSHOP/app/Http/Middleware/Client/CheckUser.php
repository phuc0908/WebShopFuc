<?php

namespace App\Http\Middleware\Client;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $this->check();
        return $next($request);
    }


    public function check()
    {
        $user = new User();
        $list = $user->showAll();

        $count = 0;
        foreach ($list as $v) {
            if (session('nameUser') === $v->username && session('passUser') === $v->password  && session('idUser') === $v->id) {
                $count++;
                break;
            }
        }
        // Check
        if ($count == 0) {
            session([
                'checkUser' => 0
            ]);
        } else {
            session([
                'checkUser' => 1
            ]);
        }
    }
}
