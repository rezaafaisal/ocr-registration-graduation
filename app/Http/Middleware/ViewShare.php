<?php

namespace App\Http\Middleware;

use App\Models\Administrator;
use App\Models\Operator;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ViewShare
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
        $user = Auth::user();
        View::share('user', $user);

        $layout = "layouts.empty";

        switch ($user::class) {
            case Administrator::class:
                $layout = 'layouts.admin.panel';
                break;
            case Operator::class:
                if ($user->is_academic) {
                    $layout = 'layouts.operator.academic.panel';
                } else {
                    $layout = 'layouts.operator.faculty.panel';
                }
                break;
            default:
                break;
        }

        View::share('layout', $layout);

        return $next($request);
    }
}
