<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFacultyRequest;
use App\Http\Requests\UpdateFacultyRequest;
use App\Models\Faculty;

class FacultyController extends Controller
{
    public function index()
    {
        // $this->authorize('viewAny', Faculty::class);
        return view('admin.faculty.index', ['data' => Faculty::all()]);
    }

    public function create()
    {
        return view('admin.faculty.create');
    }

    public function store(StoreFacultyRequest $request)
    {
        // $this->authorize('create', Faculty::class);
        $data = $request->validated();
        /** @var Faculty */
        $faculty = Faculty::create($data);
        // foreach ($data["department"] as $_ => $value) {

        // }
        return to_route('admin.faculty.index');
    }

    public function show(Faculty $faculty)
    {
        //
    }

    public function edit(Faculty $faculty)
    {
        return view('admin.faculty.edit', ['data' => $faculty]);
    }

    public function update(UpdateFacultyRequest $request, Faculty $faculty)
    {
        // $this->authorize('update', $faculty);
        $data = $request->validated();
        $faculty->update($data);

        return to_route('admin.faculty.index');
    }

    public function destroy(Faculty $faculty)
    {
        // $this->authorize('delete', $faculty);
        $faculty->delete();

        return to_route('admin.faculty.index');
    }

    public function restore()
    {
        return to_route('admin.faculty.index');
    }
}
