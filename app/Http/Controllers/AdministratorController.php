<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdministratorRequest;
use App\Http\Requests\UpdateAdministratorRequest;
use App\Models\Administrator;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Administrator::class);
        $columns = $request->query('columns', ['name']);
        $perpage = $request->query('perpage', 5);
        $query = Administrator::query();
        if ($request->query('sort')) {
            foreach ($columns as $column) {
                if ($request->query('s_' . $column)) {
                    $query->orderBy($column, $request->query('s_' . $column));
                }
            }
        }
        if ($request->query('filter')) {
            $query->whereFullText('name', $request->query('f_name'))
                ->orWhere('role', $request->query('f_role'))
                ->orWhereFullText('email', $request->query('f_email'));
        }
        $paginator = $query->paginate($perpage);
        return view('admin.administrator.index', [
            'data' => $paginator,
            'columns' => $columns,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.administrator.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdministratorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdministratorRequest $request)
    {
        $this->authorize('create', Administrator::class);
        $data = $request->validated();
        $administrator = new Administrator($data);
        $administrator->save();

        return to_route('admin.user.administrator.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function show(Administrator $administrator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function edit(Administrator $administrator)
    {
        return view('admin.administrator.edit', ['data' => $administrator]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdministratorRequest  $request
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdministratorRequest $request, Administrator $administrator)
    {
        $this->authorize('update', $administrator);
        $data = $request->validated();
        // dd($data);
        $administrator->update($data);

        return to_route('admin.user.administrator.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administrator $administrator)
    {
        $this->authorize('delete', $administrator);
        $administrator->delete();

        return to_route('admin.user.administrator.index');
    }
}
