<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Mail\StudentCreated;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Input\Input;

class StudentController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Student::class);

        return view('admin.student.index', ['data' => Student::all()]);
    }
    public function create()
    {
        return view('admin.student.create');
    }
    public function store(StoreStudentRequest $request)
    {
        $this->authorize('create', Student::class);
        $data = $request->validated();
        $student = Student::create($data);

        if ($request->input('send_mail')) {
            $host = env('MAIL_STUDENT_HOST');
            if ($host) {
                Mail::to("{$student->nim}{$host}")->send(new StudentCreated($student));
            } else {
                logger('student created mail failed host');
            }
        }

        return redirect()->intended($request->string('_index'));
    }
    public function show(Student $student)
    {
        //
    }
    public function edit(Student $student)
    {
        return view('admin.student.edit', ['data' => $student]);
    }
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $this->authorize('update', $student);
        $data = $request->validated();
        $student->update($data);

        return redirect()->intended($request->string('_index'));
    }
    public function delete(Student $student)
    {
        $this->authorize('delete', $student);
        $student->delete();

        return back();
    }
    public function delete_any(Request $request)
    {
        $this->authorize('deleteAny', Student::class);
        Student::destroy($request->input('id', []));

        return back();
    }
}
