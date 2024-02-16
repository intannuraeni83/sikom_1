<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBuku_Relasi extends Model
{
    use HasFactory;
    protected $guarded = ['id']; //MENGATUR HANYA COLOMN ID YANG TIDAK BOLEH DI ISI

    //RELASI DARI MODEL BUKU KE KATEGORI BUKU RELASI
    public function buku() 
    {
        return $this->belongsTo (Buku::class);
    }

     //RELASI DARI MODEL KATEGORI KE KATEGORI BUKU RELASI
     public function kategori() 
     {
         return $this->belongsTo (KategoriBuku::class);
     }
}
