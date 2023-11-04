<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentLoginRequest;
use App\Models\Quota;
use App\Models\Student;
use Illuminate\Http\Response;

class StudentController extends Controller
{
    public function login_show()
    {
        $quota = Quota::first_open();
        /** @var Response */
        $view = view(
            'student.login',
            [
                'quota_name' => $quota->name ?? "",
                'quota' => Quota::stats(),

            ]
        );
        if (!$quota) {
            return $view->withErrors(['status' => 'bukan waktu pendaftaran wisudawan']);
        } else {
            return $view;
        }
    }

    public function login_perform(StudentLoginRequest $request)
    {
        if (!Quota::first_open()) {
            return back()->withInput()->withErrors(['status' => 'bukan waktu pendaftaran wisudawan']);
        }
        $data = $request->validated();
        $user = Student::where('nim', $data['nim'])->where('password', $data['password'])->first();
        if ($user) {
            auth()->login($user, isset($data['remember']));
            // session()->regenerate();

            return to_route('student.dashboard.show');
        } else {
            return back()->withErrors(['nim' => ['nim mismatch'], 'password' => ['password mismatch']]);
        }
    }

    public function logout_perform()
    {
        auth('student')->logout();
        session()->invalidate();
        session()->regenerateToken();

        return to_route('student.login.show');
    }
}
