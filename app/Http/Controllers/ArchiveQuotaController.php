<?php

namespace App\Http\Controllers;

use App\Exceptions\CreateArchiveQuotaException;
use App\Exports\ArchiveQuotasExport;
use App\Http\Requests\StoreArchiveQuotaRequest;
use App\Http\Requests\UpdateArchiveQuotaRequest;
use App\Mail\ArchiveQuotaRevision;
use App\Mail\ArchiveQuotaValidated;
use App\Models\ArchiveQuota;
use App\Models\Faculty;
use App\Models\Quota;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class ArchiveQuotaController extends Controller
{
    public function index(Request $request)
    {
    }
    public function create()
    {
    }
    public function store(Request $request)
    {
    }
    public function show(ArchiveQuota $quota)
    {
        //
    }
    public function edit(ArchiveQuota $quota)
    {
    }
    public function update(Request $request, ArchiveQuota $quota)
    {
    }
    public function destroy(Request $request)
    {
        $this->authorize('deleteAny', ArchiveQuota::class);
        if ($request->input('all')) {
            ArchiveQuota::truncate();
        } else {
            ArchiveQuota::destroy($request->input('id', []));
        }

        return back();
    }
    public function delete(ArchiveQuota $quota)
    {
        $this->authorize('delete', $quota);
        $quota->delete();

        return back();
    }
}
