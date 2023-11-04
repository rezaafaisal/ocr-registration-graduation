<?php

namespace App\Models;

use App\Exceptions\QuotaReachedException;
use App\Exceptions\StatusQuotaException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Quota extends Model
{
    use HasFactory;

    public static function list_status()
    {
        return [
            'open' => __('open'),
            'close' => __('close'),
        ];
    }
    public static function stats()
    {
        $quota = self::first_open();
        if (!$quota) {
            return null;
        }
        $result = ['total' => 0, 'remaining' => 0, 'filled' => 0];
        $result['name'] = $quota->name;
        $result['total'] = $quota->quota;
        $result['filled'] = $quota->registrars()->get()->where('status', RegistrarStatus::Validated->value)->count();
        $result['remaining'] = $result['total'] - $result['filled'];
        $result['percent'] = $result['filled'] / $result['total'] * 100;
        $result['remaining_days'] = $quota->remaining_days;

        return $result;
    }

    /** @return Quota|null */
    public static function first_open()
    {
        return Quota::where('status', 'open')->first();
    }
    /** @return Collection<Quota> */
    public static function all_open()
    {
        return Quota::where('status', 'open')->get();
    }

    protected $fillable = [
        'name',
        'quota',
        'start_date',
        'end_date',
        'status',
    ];
    protected $observables = ['increment'];

    public function quota_increment(Registrar $registrar)
    {
        if (
            $this->quota <= $this->registrars_validated()->count()
        ) {
            throw new QuotaReachedException();
        }
        $this->fireModelEvent('increment');
    }

    public function getRemainingDaysAttribute()
    {
        $remaining_days = Carbon::now()->diffInDays(Carbon::parse($this->end_date));

        return $remaining_days;
    }

    public function registrars()
    {
        return $this->hasMany(Registrar::class);
    }
    public function registrars_unvalidated()
    {
        return $this->registrars()->get()->where('status', '!=', 'validated');
    }
    public function registrars_validated()
    {
        return $this->registrars()->get()->where('status', 'validated');
    }
}
