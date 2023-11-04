<?php

namespace App\Models;

use App\Exceptions\RegistrarStatusException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

enum RegistrarStatus: string
{
    case Create = 'create';
    case Validate = 'validate';
    case Revision = 'revision';
    case Revalidate = 'revalidate';
    case Validated = 'validated';
}

class Registrar extends Model
{
    use HasFactory;

    public static function list_status()
    {
        if (auth()->user() instanceof Operator) {
            return  [
                'revision' => __('revision'),
                'validated' => __('validated'),
            ];
        }
        return [
            'create' => __('create'),
            'validate' => __('validate'),
            'revision' => __('revision'),
            'revalidate' => __('revalidate'),
            'validated' => __('validated'),
        ];
    }
    public static function operator_list_status()
    {
        return [
            'validate' => __('validate'),
            'revision' => __('revision'),
            'revalidate' => __('revalidate'),
            'validated' => __('validated'),
        ];
    }

    public static function stats_status(string $faculty = null)
    {
        $quota = Quota::first_open();
        if (!$quota) {
            return null;
        }
        $result = ['validate' => 0, 'revision' => 0, 'revalidate' => 0, 'validated' => 0];
        $result['validate'] = $quota->registrars()->get()->where('status', RegistrarStatus::Validate->value)->count();
        $result['revision'] = $quota->registrars()->get()->where('status', RegistrarStatus::Revision->value)->count();
        $result['revalidate'] = $quota->registrars()->get()->where('status', RegistrarStatus::Revalidate->value)->count();
        $result['validated'] = $quota->registrars()->get()->where('status', RegistrarStatus::Validated->value)->count();
        if ($faculty) {
            $result['study_programs'] = $quota->registrars()->get()->where('status', RegistrarStatus::Validated->value)->where('faculty', $faculty)->groupBy('study_program');
        }

        return $result;
    }

    /** @return Registrar|null */
    public static function get_by_user(Student $user)
    {
        return Registrar::where('student_id', $user->id)->first();
    }

    /** @return Collection<int, Registrar> */
    public static function all_validated()
    {
        return self::where('status', RegistrarStatus::Validated->value)->get();
    }
    /** @return Collection<int, Registrar> */
    public static function all_faculty_validated($faculty)
    {
        return self::where('status', RegistrarStatus::Validated->value)->where('faculty', $faculty)->get();
    }
    /** @return Collection<int, Registrar> */
    public static function all_quota_validated(Quota $quota)
    {
        return self::where('quota_id', $quota->id)->where('status', RegistrarStatus::Validated->value)->get();
    }

    protected $fillable = [
        'status',
        'comment',

        'quota_id',
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
        // 'kk',
        'spukt',
    ];

    protected $observables = ['validate'];

    public $biodata_field = [
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
    ];

    public $file_field = [
        'munaqasyah',
        'school_certificate',
        'ktp',
        // 'kk',
        'spukt',
    ];

    public function validate(string $status, string|null $comment = null)
    {
        $this->status = $status;
        $this->comment = $comment;
        $this->fireModelEvent('validate');
    }

    public function getIsCreateAttribute()
    {
        return $this->status == RegistrarStatus::Create->value;
    }

    public function getIsValidateAttribute()
    {
        return $this->status == RegistrarStatus::Validate->value;
    }

    public function getIsRevisionAttribute()
    {
        return $this->status == RegistrarStatus::Revision->value;
    }

    public function getIsRevalidateAttribute()
    {
        return $this->status == RegistrarStatus::Revalidate->value;
    }

    public function getIsValidatedAttribute()
    {
        return $this->status == RegistrarStatus::Validated->value;
    }

    public function getYoeAttribute()
    {
        if ($this->doe) {
            return Carbon::parse($this->doe)->year;
        }
        return null;
    }

    public function setPhotoAttribute($value)
    {
        if (is_string($value)) {
            $this->attributes['photo'] = $value;
        } else {
            if (isset($this->attributes['photo'])) {
                Storage::delete($this->attributes['photo']);
            }
            $this->attributes['photo'] = Storage::put("registrar/$this->nim", $value);
        }
    }

    public function getPhotoUrlAttribute()
    {
        if (Str::of($this->photo)->startsWith('http')) {
            return $this->photo;
        } else {
            return Storage::url($this->photo);
        }
    }

    public function setMunaqasyahAttribute($value)
    {
        if (is_string($value)) {
            $this->attributes['munaqasyah'] = $value;
        } else {
            if (isset($this->attributes['munaqasyah'])) {
                Storage::delete($this->attributes['munaqasyah']);
            }
            $this->attributes['munaqasyah'] = Storage::put("registrar/$this->nim", $value);
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

    public function setSchoolCertificateAttribute($value)
    {
        if (is_string($value)) {
            $this->attributes['school_certificate'] = $value;
        } else {
            if (isset($this->attributes['school_certificate'])) {
                Storage::delete($this->attributes['school_certificate']);
            }
            $this->attributes['school_certificate'] = Storage::put("registrar/$this->nim", $value);
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

    // public function setKkAttribute($value)
    // {
    //     if (is_string($value)) {
    //         $this->attributes['kk'] = $value;
    //     } else {
    //         if (isset($this->attributes['kk'])) {
    //             Storage::delete($this->attributes['kk']);
    //         }
    //         $this->attributes['kk'] = Storage::put("registrar/$this->nim", $value);
    //     }
    // }

    // public function getKkUrlAttribute()
    // {
    //     if (Str::of($this->kk)->startsWith('http')) {
    //         return $this->kk;
    //     } else {
    //         return Storage::url($this->kk);
    //     }
    // }

    public function setKtpAttribute($value)
    {
        if (is_string($value)) {
            $this->attributes['ktp'] = $value;
        } else {
            if (isset($this->attributes['ktp'])) {
                Storage::delete($this->attributes['ktp']);
            }
            $this->attributes['ktp'] = Storage::put("registrar/$this->nim", $value);
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

    public function setSpuktAttribute($value)
    {
        if (is_string($value)) {
            $this->attributes['spukt'] = $value;
        } else {
            if (isset($this->attributes['spukt'])) {
                Storage::delete($this->attributes['spukt']);
            }
            $this->attributes['spukt'] = Storage::put("registrar/$this->nim", $value);
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
        return $this->belongsTo(Quota::class, 'quota_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function stats_filled()
    {
        $result = ['biodata' => 0, 'file' => 0, 'data' => $this->toArray()];
        $result['biodata'] = $this->check_biodata();
        $result['file'] = $this->check_file();

        return $result;
    }

    public function check()
    {
        $result = ['biodata' => 0, 'file' => 0];
        $result['biodata'] = $this->check_biodata();
        $result['file'] = $this->check_file();
        if ($result['biodata'] == 100.0 && $result['file'] == 100.0) {
            if ($this->is_revision && auth()->user() instanceof Student) {
                $this->status = RegistrarStatus::Revalidate->value;
                $this->saveQuietly();
            } elseif ($this->is_create) {
                $this->status = RegistrarStatus::Validate->value;
                $this->saveQuietly();
            }
        } else {
            $this->status = RegistrarStatus::Create->value;
            $this->saveQuietly();
        }
        if ($this->is_create | $this->is_validate | $this->is_revision | $this->is_revalidate | $this->is_validated) {
        } else {
            throw new RegistrarStatusException("invalid status: {$this->status}", 400);
        }

        return $result;
    }

    public function check_biodata()
    {
        $count = 0;
        $length = count($this->biodata_field);
        foreach ($this->biodata_field as $field) {
            if (!$this->getAttribute($field)) {
                continue;
            }
            $count++;
        }

        return $count / $length * 100;
    }

    public function check_file()
    {
        $count = 0;
        $length = count($this->file_field);
        foreach ($this->file_field as $field) {
            if (!$this->getAttribute($field)) {
                continue;
            }
            $count++;
        }

        return $count / $length * 100;
    }
}
