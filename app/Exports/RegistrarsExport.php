<?php

namespace App\Exports;

use App\Models\Administrator;
use App\Models\Operator;
use App\Models\Registrar;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class RegistrarsExport extends \PhpOffice\PhpSpreadsheet\Cell\StringValueBinder implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithCustomValueBinder
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $user = auth()->user();
        if ($user::class == Administrator::class) {
            return Registrar::all_validated();
        } else if ($user::class == Operator::class) {
            if ($user->is_faculty) {
                return Registrar::all_faculty_validated($user->faculty);
            }
            return Registrar::all_validated();
        } else {
            return [];
        }
    }
    public function headings(): array
    {
        return [
            __('id'),
            __('name'),
            __('nim'),
            __('nik'),
            __('place of birth'),
            __('date of birth'),
            __('date of entry'),
            __('date of pass'),
            __('study period'),
            __('faculty'),
            __('study program'),
            __('ipk'),
            __('gender'),
            __('status'),
        ];
    }
    public function columnFormats(): array
    {
        return [
            __('id') => NumberFormat::FORMAT_NUMBER,
            __('name') => DataType::TYPE_STRING,
            __('nim') => NumberFormat::FORMAT_TEXT,
            __('nik') => NumberFormat::FORMAT_TEXT,
            __('place of birth') => DataType::TYPE_STRING,
            __('date of birth') => NumberFormat::FORMAT_DATE_DDMMYYYY,
            __('date of entry') => NumberFormat::FORMAT_DATE_DDMMYYYY,
            __('date of pass') => NumberFormat::FORMAT_DATE_DDMMYYYY,
            __('study period') => DataType::TYPE_STRING,
            __('faculty') => DataType::TYPE_STRING,
            __('study program') => DataType::TYPE_STRING,
            __('ipk') => NumberFormat::FORMAT_NUMBER,
            __('gender') => DataType::TYPE_STRING,
            __('status') => DataType::TYPE_STRING,
        ];
    }
    public function map($registrar): array
    {
        return [
            $registrar->id,
            $registrar->name,
            "$registrar->nim",
            "$registrar->nik",
            $registrar->pob,
            Carbon::parse($registrar->dob)->locale(app()->getLocale())->isoFormat('DD MMMM YYYY'),
            Carbon::parse($registrar->doe)->locale(app()->getLocale())->isoFormat('DD MMMM YYYY'),
            Carbon::parse($registrar->dop)->locale(app()->getLocale())->isoFormat('DD MMMM YYYY'),
            $registrar->study_period_id,
            $registrar->faculty,
            $registrar->study_program,
            $registrar->ipk,
            __($registrar->gender),
            $registrar->status,
        ];
    }
}
