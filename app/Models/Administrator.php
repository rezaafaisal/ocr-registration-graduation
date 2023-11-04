<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

enum AdministratorRole: string
{
    case SuperAdministrator = 'super_administrator';
    case Administrator = 'administrator';

    public static function from_string(string $value): static
    {
        return match ($value) {
            'super_administrator' => static::SuperAdministrator,
            'administrator' => static::Administrator,
        };
    }
    public static function to_array(): array
    {
        return [
            'super_administrator' => 'Super Administrator',
            'administrator' => 'Administrator',
        ];
    }
    public static function to_readable(string $value): string
    {
        return match ($value) {
            'super_administrator' => 'Super Administrator',
            'administrator' => 'Administrator',
        };
    }
}

class Administrator extends Authenticatable
{
    use HasFactory;

    use HasFactory;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // 'photo',
        'name',
        // 'role',
        // 'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getReadableRoleAttribute()
    {
        return AdministratorRole::to_readable($this->role);
    }

    public function getIsSuperAdministratorAttribute()
    {
        return $this->role == AdministratorRole::SuperAdministrator->value;
    }

    public function getIsAdministratorAttribute()
    {
        return $this->role == AdministratorRole::Administrator->value;
    }

    public function setPhotoAttribute($value)
    {
        if (is_string($value)) {
            $this->attributes['photo'] = $value;
        } else {
            if (isset($this->attributes['photo'])) {
                Storage::delete($this->attributes['photo']);
            }
            $path = $this->id ? "$this->id" : 'temp';
            $this->attributes['photo'] = Storage::put("administrator/$path", $value);
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
}
