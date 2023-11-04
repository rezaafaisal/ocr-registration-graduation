<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignInAdministratorRequest;
use App\Models\Operator;
use Illuminate\Support\Arr;

class OperatorController extends Controller
{
    public function login_show()
    {
        return view('operator.login');
    }

    public function login_perfom(SignInAdministratorRequest $request)
    {
        $data = $request->validated();
        if (auth()->attempt(Arr::only($data, ['name', 'password']), isset($data['remember']))) {
            session()->regenerate();

            /** @var Operator */
            $user = auth()->user();
            if ($user->is_academic) {
                return to_route('operator.academic.dashboard');
            } else if ($user->is_faculty) {
                return to_route('operator.faculty.dashboard');
            } else {
                return to_route('operator.dashboard.show');
            }
        } else {
            return back()->withErrors(['name' => ['username mismatch'], 'password' => ['password mismatch']]);
        }
    }

    public function logout_perfom()
    {
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();

        return to_route('operator.login.show');
    }
}
