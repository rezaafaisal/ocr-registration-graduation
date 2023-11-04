<?php

namespace App\View\Components\ArchiveRegistrar;

use App\Models\ArchiveQuota;
use App\Models\ArchiveRegistrar;
use App\Models\Registrar;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class Index extends Component
{
    public array $fields = [
        'name' => 'name',
        'nim' => 'NIM',
        'faculty' => 'faculty',
        'study_program' => 'study program',
        'ipk' => 'IPK',
    ];
    public array $columns = ['name', 'nim', 'faculty', 'study_program', 'ipk'];
    public LengthAwarePaginator $paginator;

    public function __construct(public ArchiveQuota $quota)
    {
        /** @var Builder|EloquentBuilder */
        $query = ArchiveRegistrar::query()->where('archive_quota_id', $quota->id);
        $request = request();
        $this->columns = $request->query('columns', $this->columns);
        $this->paginator = $query->paginate(request()->query('perpage', 10));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.archive-registrar.index', [
            'paginator' => $this->paginator,
            'fields' => $this->fields,
            'columns' => $this->columns,
            'quota' => $this->quota,
        ]);
    }
}
