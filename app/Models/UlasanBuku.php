<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UlasanBuku extends Model
{
    use HasFactory;
    protected $guarded = ['id']; //MENGATUR HANYA COLOMN ID YANG TIDAK BOLEH DI ISI
    //RELASI DARI MODEL USER KE ULASAN BUKU
    public function user() 
    {
        return $this->belongsTo (User::class);
    }

    //RELASI DARI MODEL BUKU KE  ULASAN BUKU
    public function buku() 
    {
        return $this->belongsTo (Buku::class);
    }
}
