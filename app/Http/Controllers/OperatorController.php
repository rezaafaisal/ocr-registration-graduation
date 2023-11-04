<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOperatorRequest;
use App\Http\Requests\UpdateOperatorRequest;
use App\Models\Operator;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Operator::class);
        $columns = $request->query('columns', ['name', 'department']);
        $perpage = $request->query('perpage', 5);
        $query = Operator::query();
        if ($request->query('sort')) {
            foreach ($columns as $column) {
                if ($request->query('s_' . $column)) {
                    $query->orderBy($column, $request->query('s_' . $column));
                }
            }
        }
        if ($request->query('filter')) {
            $query->whereFullText('name', $request->query('f_name'))
                ->orWhere('department', $request->query('f_department'));
                // ->orWhereFullText('email', $request->query('f_email'));
        }
        $paginator = $query->paginate($perpage);
        return view('admin.operator.index', [
            'paginator' => $paginator,
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
        return view('admin.operator.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOperatorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOperatorRequest $request)
    {
        $this->authorize('create', Operator::class);
        $data = $request->validated();
        $operator = Operator::create($data);

        return to_route('admin.user.operator.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function show(Operator $operator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function edit(Operator $operator)
    {
        return view('admin.operator.edit', ['data' => $operator]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOperatorRequest  $request
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOperatorRequest $request, Operator $operator)
    {
        $this->authorize('update', $operator);
        $data = $request->validated();
        $operator->update($data);

        return to_route('admin.user.operator.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operator $operator)
    {
        $this->authorize('delete', $operator);
        $operator->delete();

        return to_route('admin.user.operator.index');
    }
}
