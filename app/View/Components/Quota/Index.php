<?php

namespace App\View\Components\Quota;

use App\Models\Quota;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class Index extends Component
{
    public array $fields = [
        'name' => 'name',
        'quota' => 'quota',
        'status' => 'status',
        'date' => 'date',
    ];
    public array $columns = ['name', 'quota', 'date', 'status'];
    public LengthAwarePaginator $paginator;

    public function __construct(Request $request)
    {
        /** @var Builder|EloquentBuilder */
        $query = Quota::query();
        $perpage = $request->query('perpage', 5);
        $this->columns = $request->query('columns', $this->columns);
        if ($request->query('sort')) {
            foreach ($this->columns as $column) {
                if ($request->query('s_' . $column)) {
                    $query->orderBy($column, $request->query('s_' . $column));
                }
            }
        }
        if ($request->query('filter')) {
            foreach ($this->columns as $column) {
                switch ($column) {
                    case 'name':
                        if ($request->query('f_name')) {
                            $query->orWhereFullText('name', $request->query('f_name'));
                        }
                        break;

                    default:
                        if ($request->query('f_' . $column)) {
                            $query->orWhere($column, $request->query('f_' . $column));
                        }
                        break;
                }
            }
        }
        /** @var LengthAwarePaginator */
        $this->paginator = $query->paginate($perpage);
        $this->paginator->withQueryString();
    }
    public function render()
    {
        return view('components.quota.index', [
            'paginator' => $this->paginator,
            'fields' => $this->fields,
            'columns' => $this->columns,
        ]);
    }
}
