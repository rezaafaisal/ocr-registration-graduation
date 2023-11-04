<?php

namespace App\View\Components\Registrar;

use App\Models\Registrar;
use App\Models\RegistrarStatus;
use Closure;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Table extends Component
{
    public array $fields = [
        'name' => 'name',
        'nim' => 'NIM',
        'faculty' => 'faculty',
        'study_program' => 'study program',
        'ipk' => 'IPK',
        'status' => 'status',
    ];
    public array $columns = [];
    public LengthAwarePaginator $paginator;
    public function __construct(
        Request $request,
        string|null $state = null,
        array $columns = ['name', 'nim', 'faculty', 'study_program', 'ipk', 'status'],
        public string|null $index = null,
        public string|null $create = null,
        public Closure|null $edit = null,
        public Closure|null $validate = null
    ) {
        if (auth()->user()->is_faculty) {
            $request->query->set(
                "f_faculty",
                auth()->user()->faculty
            );
        }
        /** @var Builder|EloquentBuilder */
        $query = Registrar::query();
        $perpage = $request->query('perpage', 5);
        $this->columns = $request->query('columns', $columns);
        if ($request->query('sort')) {
            foreach ($this->columns as $column) {
                if ($request->query('s_' . $column)) {
                    $query->orderBy($column, $request->query('s_' . $column));
                }
            }
        }
        if ($state) {
            $request->query->set("filter", "on");
            $request->query->set("f_status", $state);
            $request->query->set("f_logical", 'and');
        }
        if ($request->query('filter')) {
            $columns = array_keys($this->fields);
            // $columns = $this->columns;
            // dd($columns, request()->query->all());
            foreach ($columns as $column) {
                switch ($column) {
                    case 'name':
                        if ($request->query('f_name')) {
                            $query->whereFullText('name', $request->query('f_name'), boolean: $request->query('f_logical', 'or'));
                        }
                        break;

                    default:
                        if ($request->query('f_' . $column)) {
                            $query->where($column, $request->query('f_' . $column), boolean: $request->query('f_logical', 'or'));
                        }
                        break;
                }
            }
        }
        /** @var LengthAwarePaginator */
        $this->paginator = $query->paginate($perpage);
        $this->paginator->withQueryString();
        $this->index ??= route('resources.registrar.index');
        $this->create ??= route('resources.registrar.create');
        $this->edit ??= function ($item) {
            return route('resources.registrar.edit', ['registrar' => $item]);
        };
        $this->validate ??= function ($item) {
            return route('resources.registrar.show_validate', ['registrar' => $item]);
        };
    }
    public function render()
    {
        return view('components.registrar.table', [
            'paginator' => $this->paginator,
            'fields' => $this->fields,
            'columns' => $this->columns,
        ]);
    }
}
