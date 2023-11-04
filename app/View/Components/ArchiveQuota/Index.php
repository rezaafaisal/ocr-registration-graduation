<?php

namespace App\View\Components\ArchiveQuota;

use App\Models\ArchiveQuota;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class Index extends Component
{
    public array $fields = [
        'name' => 'name',
        'quota' => 'quota',
        'status' => 'status',
        'start_date' => 'start date',
        'end_date' => 'end date',
        'registrars' => 'registrars',
    ];
    public array $columns = ['name', 'quota', 'start_date', 'end_date', 'status', 'registrars'];
    public LengthAwarePaginator $paginator;

    public function __construct()
    {
        /** @var Builder|EloquentBuilder */
        $query = ArchiveQuota::query();
        $request = request();
        $this->columns = $request->query('columns', $this->columns);
        $this->paginator = $query->paginate(10);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.archive-quota.index', [
            'paginator' => $this->paginator,
            'fields' => $this->fields,
            'columns' => $this->columns,
        ]);
    }
}
