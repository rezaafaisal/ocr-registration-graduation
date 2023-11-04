<?php

namespace App\Models;

use App\Exceptions\RegistrarStatusException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArchiveRegistrar extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'comment',

        'quota_id',
        'archive_quota_id',
        'student_id',
        'photo',
        'name',
        'nim',
        'nik',
        'pob',
        'dob',
        'doe',
        'dop',
        'faculty',
        'study_program',
        'ipk',
        'gender',

        'munaqasyah',
        'school_certificate',
        'ktp',
        'kk',
        'spukt',
    ];

    public function setQuotaIdAttribute($value)
    {
        $this->archive_quota_id = $value;
    }
    public function getPhotoUrlAttribute()
    {
        if (Str::of($this->photo)->startsWith('http')) {
            return $this->photo;
        } else {
            return Storage::url($this->photo);
        }
    }
    public function getMunaqasyahUrlAttribute()
    {
        if (Str::of($this->munaqasyah)->startsWith('http')) {
            return $this->munaqasyah;
        } else {
            return Storage::url($this->munaqasyah);
        }
    }
    public function getSchoolCertificateUrlAttribute()
    {
        if (Str::of($this->school_certificate)->startsWith('http')) {
            return $this->school_certificate;
        } else {
            return Storage::url($this->school_certificate);
        }
    }
    public function getKkUrlAttribute()
    {
        if (Str::of($this->kk)->startsWith('http')) {
            return $this->kk;
        } else {
            return Storage::url($this->kk);
        }
    }
    public function getKtpUrlAttribute()
    {
        if (Str::of($this->ktp)->startsWith('http')) {
            return $this->ktp;
        } else {
            return Storage::url($this->ktp);
        }
    }
    public function getSpuktUrlAttribute()
    {
        if (Str::of($this->spukt)->startsWith('http')) {
            return $this->spukt;
        } else {
            return Storage::url($this->spukt);
        }
    }

    public function getStudyPeriodAttribute()
    {
        $interval = Carbon::parse($this->attributes['dop'])->diffAsCarbonInterval(Carbon::parse($this->attributes['doe']));
        return "$interval->years years $interval->months months";
    }

    public function getDobIdAttribute()
    {
        return Carbon::parse($this->attributes['dob'])->locale('id')->isoFormat('DD MMMM YYYY');
    }
    public function getDoeIdAttribute()
    {
        return Carbon::parse($this->attributes['doe'])->locale('id')->isoFormat('DD MMMM YYYY');
    }
    public function getDopIdAttribute()
    {
        return Carbon::parse($this->attributes['dop'])->locale('id')->isoFormat('DD MMMM YYYY');
    }
    public function getStudyPeriodIdAttribute()
    {
        $interval = Carbon::parse($this->attributes['dop'])->diffAsCarbonInterval(Carbon::parse($this->attributes['doe']));
        return __('study_period', ['years' => $interval->years, 'months' => $interval->months]);
    }

    public function quota()
    {
        return $this->belongsTo(ArchiveQuota::class, 'archive_quota_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
