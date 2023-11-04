<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable
{
    use HasFactory;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // 'photo',
        // 'name',
        'nim',
        // 'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // 'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // 'email_verified_at' => 'datetime',
    ];

    /** @return Collection<Student> */
    public static function all_without_registrar()
    {
        return Student::whereDoesntHave('registrar')->get();
    }

    // public function setPhotoAttribute($value)
    // {
    //     if (is_string($value)) {
    //         $this->attributes['photo'] = $value;
    //     } else {
    //         if (isset($this->attributes['photo'])) {
    //             Storage::delete($this->attributes['photo']);
    //         }
    //         $path = $this->id ? "student/$this->id" : '';
    //         $this->attributes['photo'] = Storage::put("public/$path", $value, 'public');
    //     }
    // }

    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password'] = bcrypt($value);
    // }

    // public function getPhotoUrlAttribute()
    // {
    //     return Storage::url($this->photo);
    // }

    public function registrar()
    {
        return $this->hasOne(Registrar::class);
    }
}
