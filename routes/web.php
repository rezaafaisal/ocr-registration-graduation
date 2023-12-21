<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

if (env('APP_ENV') != 'local') {
    Route::redirect('/', '/student');
} else {
    Route::get('/', function () {
        return redirect()->route('student.show');
        return view('welcome');
    })->name('welcome');

    // Route::get('/mailable', function () {
    //     // return new App\Mail\StudentCreated(App\Models\Student::find(1));
    //     // return new App\Mail\RegistrarRevision(App\Models\Registrar::find(1));
    //     // return new App\Mail\RegistrarValidated(App\Models\Registrar::find(2));
    //     // return new App\Mail\AppNotifierUpdateClient('1.0.0', 'Graduation Registration');
    // });

}

Route::redirect('/student', '/student/login')->name('student.show');
Route::redirect('/admin', '/admin/login')->name('admin.show');

Route::get('language/{locale}', 'LanguageController@set')->name('language.set');
Route::get('notification/{guard}/{id}', 'NotificationController@read')->name('notification.read');
Route::patch('notification/{guard}/mark_all', 'NotificationController@mark_all')->name('notification.mark_all');
Route::delete('notification/{guard}/{id}', 'NotificationController@delete')->name('notification.delete');
Route::delete('notification/{guard}', 'NotificationController@delete_all')->name('notification.delete_all');

Route::middleware(['authc.guard:student', 'authc.guest:student.dashboard.show'])->group(function () {
    Route::get('student/login', 'Auth\StudentController@login_show')->name('student.login.show');
    Route::post('student/login', 'Auth\StudentController@login_perform')->name('student.login.perform');
});
Route::middleware(['authc.basic:welcome,student'])->group(function () {
    Route::middleware(['use.locale:id', 'view.share'])->group(function () {
        Route::get('student/dashboard', 'User\StudentController@dashboard_show')->name('student.dashboard.show');
        Route::get('student/profile', 'User\StudentController@profile_show')->name('student.profile.show');
        Route::get('student/notification', 'User\StudentController@notification_show')->name('student.notification.show');
        Route::get('student/about', 'User\StudentController@about_show')->name('student.about.show');

        Route::get('student/biodata', 'User\StudentController@data_show')->name('student.data.show');
        Route::get('student/file', 'User\StudentController@file_show')->name('student.file.show');
        Route::get('student/print', 'User\StudentController@print')->name('student.print.show');
        Route::get('student/logout', 'Auth\StudentController@logout_perform')->name('student.logout.perform');
    });
    Route::post('student/biodata', 'User\StudentController@data_store')->name('student.data.store');
    Route::post('student/file', 'User\StudentController@file_store')->name('student.file.store');
    Route::get('student/submit', 'User\StudentController@submit')->name('student.submit.perform');
});

Route::middleware(['authc.guard:operator'])->group(function () {
    Route::get('operator/login', 'Auth\OperatorController@login_show')->middleware('use.locale')->name('operator.login.show');
    Route::post('operator/login', 'Auth\OperatorController@login_perfom')->name('operator.login.perform');
    Route::get('operator/logout', 'Auth\OperatorController@logout_perfom')->name('operator.logout.perform');
});
Route::middleware(['authc.basic:welcome,operator'])->group(function () {
    Route::middleware(['use.locale:id', 'view.share'])->group(function () {
        Route::get('operator/academic/dashboard', 'User\Operator\AcademicController@dashboard')->name('operator.academic.dashboard');
        Route::get('operator/academic/empty', 'User\Operator\AcademicController@empty')->name('operator.academic.empty');

        Route::get('operator/faculty/dashboard', 'User\Operator\FacultyController@dashboard')->name('operator.faculty.dashboard');
        Route::get('operator/faculty/empty', 'User\Operator\FacultyController@empty')->name('operator.faculty.empty');

        Route::get('operator/faculty/registrar', 'User\Operator\FacultyController@empty')->name('operator.faculty.registrar');
        Route::get('operator/faculty/registrar/validate', 'User\Operator\FacultyController@registrar_validate')->name('operator.faculty.registrar.validate');
        Route::get('operator/faculty/registrar/revision', 'User\Operator\FacultyController@registrar_revision')->name('operator.faculty.registrar.revision');
        Route::get('operator/faculty/registrar/revalidate', 'User\Operator\FacultyController@registrar_revalidate')->name('operator.faculty.registrar.revalidate');
        Route::get('operator/faculty/registrar/validated', 'User\Operator\FacultyController@registrar_validated')->name('operator.faculty.registrar.validated');

        Route::get('operator/faculty/registrar/validate/{registrar}/validate', 'User\Operator\FacultyController@registrar_validate_validate')->name('operator.faculty.registrar.validate_validate');
        Route::get('operator/faculty/registrar/revision/{registrar}/validate', 'User\Operator\FacultyController@registrar_revision_validate')->name('operator.faculty.registrar.revision_validate');
        Route::get('operator/faculty/registrar/revalidate/{registrar}/validate', 'User\Operator\FacultyController@registrar_revalidate_validate')->name('operator.faculty.registrar.revalidate_validate');
        Route::get('operator/faculty/registrar/validated/{registrar}/validate', 'User\Operator\FacultyController@registrar_validated_validate')->name('operator.faculty.registrar.validated_validate');

        Route::get('operator/academic/registrar', 'User\Operator\AcademicController@empty')->name('operator.academic.registrar');
        Route::get('operator/academic/registrar/validate', 'User\Operator\AcademicController@registrar_validate')->name('operator.academic.registrar.validate');
        Route::get('operator/academic/registrar/revision', 'User\Operator\AcademicController@registrar_revision')->name('operator.academic.registrar.revision');
        Route::get('operator/academic/registrar/revalidate', 'User\Operator\AcademicController@registrar_revalidate')->name('operator.academic.registrar.revalidate');
        Route::get('operator/academic/registrar/validated', 'User\Operator\AcademicController@registrar_validated')->name('operator.academic.registrar.validated');

        Route::get('operator/academic/registrar/validate/{registrar}/validate', 'User\Operator\AcademicController@registrar_validate_validate')->name('operator.academic.registrar.validate_validate');
        Route::get('operator/academic/registrar/revision/{registrar}/validate', 'User\Operator\AcademicController@registrar_revision_validate')->name('operator.academic.registrar.revision_validate');
        Route::get('operator/academic/registrar/revalidate/{registrar}/validate', 'User\Operator\AcademicController@registrar_revalidate_validate')->name('operator.academic.registrar.revalidate_validate');
        Route::get('operator/academic/registrar/validated/{registrar}/validate', 'User\Operator\AcademicController@registrar_validated_validate')->name('operator.academic.registrar.validated_validate');

        Route::get('operator/academic/student', 'User\Operator\AcademicController@student_index')->name('operator.academic.student.index');
        Route::get('operator/academic/student/create', 'User\Operator\AcademicController@student_create')->name('operator.academic.student.create');
        Route::get('operator/academic/student/{student}/edit', 'User\Operator\AcademicController@student_edit')->name('operator.academic.student.edit');

        Route::get('operator/faculty/student', 'User\Operator\FacultyController@student_index')->name('operator.faculty.student.index');
        Route::get('operator/faculty/student/create', 'User\Operator\FacultyController@student_create')->name('operator.faculty.student.create');
        Route::get('operator/faculty/student/{student}/edit', 'User\Operator\FacultyController@student_edit')->name('operator.faculty.student.edit');
    });
});

Route::middleware(['authc.guard:administrator', 'authc.guest:admin.dashboard.show'])->group(function () {
    Route::get('admin/login', 'Auth\AdministratorController@login_show')->middleware('use.locale')->name('admin.login.show');
    Route::post('admin/login', 'Auth\AdministratorController@login_perfom')->name('admin.login.perform');
});
Route::middleware(['authc.basic:welcome,administrator'])->group(function () {
    Route::middleware(['use.locale', 'view.share'])->group(function () {
        Route::get('admin/dashboard', 'User\AdministratorController@dashboard_show')->name('admin.dashboard.show');
        Route::get('admin/profile', 'User\AdministratorController@profile_show')->name('admin.profile.show');
        Route::get('admin/notification', 'User\AdministratorController@notification_show')->name('admin.notification.show');
        Route::get('admin/setting', 'User\AdministratorController@setting_show')->name('admin.setting.show');
        Route::get('admin/empty', 'User\AdministratorController@empty_show')->name('admin.empty.show');
        Route::get('admin/logout', 'Auth\AdministratorController@logout_perfom')->name('admin.logout.perform');

        Route::get('admin/archive', 'User\AdministratorController@dashboard_show')->name('admin.archive.show');
        Route::get('admin/about', 'User\AdministratorController@dashboard_show')->name('admin.about.show');

        Route::get('admin/quota', 'User\AdministratorController@quota_index')->name('admin.quota.index');
        Route::get('admin/quota/create', 'User\AdministratorController@quota_create')->name('admin.quota.create');
        Route::get('admin/quota/{quota}/edit', 'User\AdministratorController@quota_edit')->name('admin.quota.edit');

        Route::get('admin/registrar', 'User\AdministratorController@registrar_index')->name('admin.registrar.index');
        Route::get('admin/registrar/create', 'User\AdministratorController@registrar_create')->name('admin.registrar.create');
        Route::get('admin/registrar/{registrar}/edit', 'User\AdministratorController@registrar_edit')->name('admin.registrar.edit');
        Route::get('admin/registrar/{registrar}/validate', 'User\AdministratorController@registrar_validate')->name('admin.registrar.validate');

        Route::get('admin/student', 'User\AdministratorController@student_index')->name('admin.student.index');
        Route::get('admin/student/create', 'User\AdministratorController@student_create')->name('admin.student.create');
        Route::get('admin/student/{student}/edit', 'User\AdministratorController@student_edit')->name('admin.student.edit');

        Route::get('admin/faculty', 'FacultyController@index')->name('admin.faculty.index');
        Route::get('admin/faculty/create', 'FacultyController@create')->name('admin.faculty.create');
        Route::get('admin/faculty/{faculty}/edit', 'FacultyController@edit')->name('admin.faculty.edit');

        Route::get('admin/user', 'AdministratorController@index')->name('admin.user.index');

        Route::get('admin/user/administrator', 'AdministratorController@index')->name('admin.user.administrator.index');
        Route::get('admin/user/administrator/create', 'AdministratorController@create')->name('admin.user.administrator.create');
        Route::get('admin/user/administrator/{administrator}/edit', 'AdministratorController@edit')->name('admin.user.administrator.edit');

        Route::get('admin/user/operator', 'OperatorController@index')->name('admin.user.operator.index');
        Route::get('admin/user/operator/create', 'OperatorController@create')->name('admin.user.operator.create');
        Route::get('admin/user/operator/{operator}/edit', 'OperatorController@edit')->name('admin.user.operator.edit');

        Route::get('admin/archive', 'User\AdministratorController@empty_show')->name('admin.archive.index');

        Route::get('admin/archive/quota', 'User\AdministratorController@archive_quota')->name('admin.archive.quota.index');
        Route::get('admin/archive/quota/{quota}/registrar', 'User\AdministratorController@archive_registrar')->name('admin.archive.quota.registrar.index');
        Route::get('admin/archive/quota/{quota}/registrar', 'User\AdministratorController@archive_registrar')->name('admin.archive.quota.registrar.index');
        Route::get('admin/archive/quota/{quota}/registrar/export', 'User\AdministratorController@archive_registrar_export')->name('admin.archive.quota.registrar.export');
        Route::get('admin/archive/quota/registrar/{registrar}', 'User\AdministratorController@archive_registrar_view')->name('admin.archive.quota.registrar.view');
    });

    Route::post('admin/setting/command', 'User\AdministratorController@command_perform')->name('admin.setting.command.perform');
    Route::post('admin/setting/clear', 'User\AdministratorController@clear_perform')->name('admin.setting.clear.perform');
    Route::post('admin/setting/seeder', 'User\AdministratorController@seeder_perform')->name('admin.setting.seeder.perform');
    Route::post('admin/setting/pull', 'User\AdministratorController@pull_perform')->name('admin.setting.pull.perform');
    Route::post('admin/setting/build', 'User\AdministratorController@build_perform')->name('admin.setting.build.perform');
    Route::post('admin/setting/up', 'User\AdministratorController@up_perform')->name('admin.setting.up.perform');
    Route::post('admin/setting/down', 'User\AdministratorController@down_perform')->name('admin.setting.down.perform');
    Route::post('admin/setting/cwd', 'User\AdministratorController@cwd_perform')->name('admin.setting.cwd.perform');

    Route::post('admin/faculty', 'FacultyController@store')->name('admin.faculty.store');
    Route::patch('admin/faculty/{faculty}', 'FacultyController@update')->name('admin.faculty.update');
    Route::delete('admin/faculty/{faculty}', 'FacultyController@destroy')->name('admin.faculty.destroy');

    Route::post('admin/user/administrator', 'AdministratorController@store')->name('admin.user.administrator.store');
    Route::patch('admin/user/administrator/{administrator}', 'AdministratorController@update')->name('admin.user.administrator.update');
    Route::delete('admin/user/administrator/{administrator}', 'AdministratorController@destroy')->name('admin.user.administrator.destroy');

    Route::post('admin/user/operator', 'OperatorController@store')->name('admin.user.operator.store');
    Route::patch('admin/user/operator/{operator}', 'OperatorController@update')->name('admin.user.operator.update');
    Route::delete('admin/user/operator/{operator}', 'OperatorController@destroy')->name('admin.user.operator.destroy');
});

Route::middleware(['authc.basic:welcome,administrator,operator'])->group(function () {
    Route::middleware(['use.locale', 'view.share'])->group(function () {
        Route::get('resources/quota', 'QuotaController@index')->name('resources.quota.index');
        Route::get('resources/quota/create', 'QuotaController@create')->name('resources.quota.create');
        Route::get('resources/quota/{quota}/edit', 'QuotaController@edit')->name('resources.quota.edit');

        Route::get('resources/registrar', 'RegistrarController@index')->name('resources.registrar.index');
        Route::get('resources/registrar/create', 'RegistrarController@create')->name('resources.registrar.create');
        Route::get('resources/registrar/{registrar}/edit', 'RegistrarController@edit')->name('resources.registrar.edit');
        Route::get('resources/registrar/{registrar}/validate', 'RegistrarController@show_validate')->name('resources.registrar.show_validate');

        Route::get('resources/student', 'StudentController@index')->name('resources.student.index');
        Route::get('resources/student/create', 'StudentController@create')->name('resources.student.create');
        Route::get('resources/student/{student}/edit', 'StudentController@edit')->name('resources.student.edit');
    });

    Route::post('resources/quota', 'QuotaController@store')->name('resources.quota.store');
    Route::patch('resources/quota/{quota}', 'QuotaController@update')->name('resources.quota.update');
    Route::delete('resources/quota', 'QuotaController@delete_any')->name('resources.quota.delete_any');
    Route::delete('resources/quota/{quota}', 'QuotaController@delete')->name('resources.quota.delete');
    Route::put('resources/quota/{quota}/archive', 'QuotaController@archive')->name('resources.quota.archive');

    Route::post('resources/registrar/import', 'RegistrarController@import')->middleware('use.locale')->name('resources.registrar.import');
    Route::get('resources/registrar/export', 'RegistrarController@export')->middleware('use.locale')->name('resources.registrar.export');
    Route::post('resources/registrar', 'RegistrarController@store')->name('resources.registrar.store');
    Route::patch('resources/registrar/{registrar}', 'RegistrarController@update')->name('resources.registrar.update');
    Route::post('resources/registrar/{registrar}/validate', 'RegistrarController@perform_validate')->name('resources.registrar.perform_validate');
    Route::delete('resources/registrar', 'RegistrarController@destroy')->name('resources.registrar.destroy');
    Route::delete('resources/registrar/{registrar}', 'RegistrarController@delete')->name('resources.registrar.delete');

    Route::post('resources/student', 'StudentController@store')->name('resources.student.store');
    Route::patch('resources/student/{student}', 'StudentController@update')->name('resources.student.update');
    Route::delete('resources/student', 'StudentController@delete_any')->name('resources.student.delete_any');
    Route::delete('resources/student/{student}', 'StudentController@delete')->name('resources.student.delete');

    Route::delete('resources/archive_quota', 'ArchiveQuotaController@destroy')->name('resources.archive.quota.delete_any');
    Route::delete('resources/archive_quota/{quota}', 'ArchiveQuotaController@delete')->name('resources.archive.quota.delete');
});