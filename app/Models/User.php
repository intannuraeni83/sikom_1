<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'nama_lengkap',
        'alamat',
        'role',
        'verifikasi',

    ];
    /*------RELASI ANTAR TABLE------*/
    //RELASI DARI MODEL USER KE PEMINJAMAN 
    public function peminjaman() 
    {
        return $this->hasMany (Peminjaman::class);
    }

    //RELASI DARI MODEL USER KE KOLEKSI PRIBADI
    public function koleksipribadi() 
    {
        return $this->hasMany (KoleksiPribadi::class);
    }

    //RELASI DARI MODEL USER KE ULASAN PRIBADI

    public function ulasanbuku() //RELASI ULASAN BUKU
    {
        return $this->hasMany (UlasanBuku::class);
    }
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
}
