<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBuku extends Model
{
    use HasFactory;
    protected $guarded = ['id']; //MENGATUR HANYA COLOMN ID YANG TIDAK BOLEH DI ISI

        // ----*RELASI ANTAR TABLE----*/
    //RELASI DARI MODEL BUKU KE KATEGORI BUKU RELASI 
    public function kateoribuku_relasi() 
    {
        return $this->hasMany (Kategori_Buku_Relasi::class);
    }
}
