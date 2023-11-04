<?php

namespace App\Http\Controllers\User;

use App\Models\Quota;
use App\Models\Faculty;
use App\Models\Registrar;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\UpdateRegistrarRequest;
use App\Notifications\CreatedOrUpdatedRegistrar;

class StudentController extends Controller
{

    private $reader_endpoint = "http://127.0.0.1:5000/read";
    
    public function dashboard_show()
    {
        return view('student.dashboard', [
            'has_quota' => Quota::first_open(),
            'quota' => Quota::stats(),
            'registrar' => $this->get_registrar()?->stats_filled(),
        ]);
    }

    public function data_show(Request $request)
    {
        $data = $this->get_registrar() ?? new Registrar();

        return view('student.data', ['data' => $data, 'faculties' => Faculty::all()]);
    }

    public function file_show(Request $request)
    {
        $data = $this->get_registrar() ?? new Registrar();

        return view('student.file', ['data' => $data]);
    }

    public function profile_show()
    {
        return view('student.profile', []);
    }

    public function notification_show()
    {
        return view('student.notification', []);
    }

    public function about_show()
    {
        return view('student.about', []);
    }

    public function data_store(UpdateRegistrarRequest $request)
    {
        $data = $request->validated();
        // $user = auth()->user();
        $biodata = $this->get_or_create_registrar();
        $data['yoe'] && ($data['doe'] = Carbon::now()->setDate($data['yoe'], 9, 1));

        if(isset($data['dob'])) $data['dob'] = \Carbon\Carbon::parse($data['dob'])->format('Y-m-d');
        if(isset($data['doe'])) $data['doe'] = \Carbon\Carbon::parse($data['doe'])->format('Y-m-d');
        if(isset($data['dop'])) $data['dop'] = \Carbon\Carbon::parse($data['doe'])->format('Y-m-d');

        $biodata->fill($data);
        $biodata->saveQuietly();
        return to_route('student.dashboard.show');
    }
    public function file_store(UpdateRegistrarRequest $request)
    {
        $data = $request->validated();
        // $user = auth()->user();
        $biodata = $this->get_or_create_registrar();
        $biodata->fill($data);
        $biodata->saveQuietly();

        // check if has ktp or yudis
        if($request->has('ktp') or $request->has('munaqasyah')){
            $extracted = [];

            if($request->has('ktp')){
                $response = Http::get($this->reader_endpoint, [
                    'path' => $biodata->ktp,
                    'type' => 'ktp'
                ]);

                $ktp_data = json_decode($response->body());
                foreach ($ktp_data as $key => $row) {
                    $extracted[$key] = $row;
                }

                $biodata->name = $extracted['name'];
                $biodata->nik = $extracted['nik'];
                $biodata->dob = $extracted['birth_date'];
                $biodata->pob = $extracted['born_place'];
                $biodata->gender = $extracted['gender'];
            }

            if($request->has('munaqasyah') && ($biodata->name != null || $extracted['name'])){
                $response = Http::get($this->reader_endpoint, [
                    'path' => $biodata->munaqasyah,
                    'type' => 'yudis',
                    'name' => $biodata->name ?? $extracted['name']
                ]);

                $yudis_data = json_decode($response->body());
                foreach ($yudis_data as $key => $row) {
                    $extracted[$key] = $row;
                }

                $biodata->nim = $extracted['nim'];
                $biodata->faculty = $extracted['faculty'];
                $biodata->dop = $extracted['graduate_date'];
                $biodata->ipk = $extracted['ipk'];
                $biodata->study_program = $extracted['major'];
            }
        }

        $biodata->saveQuietly();
         
        return to_route('student.dashboard.show');
    }
    public function submit()
    {
        $registrar = $this->get_registrar();
        $registrar->check();

        return to_route('student.dashboard.show');
    }
    public function print()
    {
        $registrar = $this->get_registrar();
        $quota = $registrar->quota()->first();

        return view('student.print', ['registrar' => $registrar, 'quota' => $quota]);
    }

    protected function get_registrar()
    {
        return Registrar::get_by_user(auth('student')->user());
    }

    protected function get_or_create_registrar()
    {
        $user = auth()->user();
        $quota = Quota::first_open();
        $registrar = $this->get_registrar();
        if (!$registrar) {
            /** @var Registrar */
            $registrar = new Registrar();
            $registrar->quota_id = $quota->id;
            $registrar->student_id = $user->id;
        }

        return $registrar;
    }
}
