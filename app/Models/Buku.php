<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $guarded = ['id']; //MENGATUR HANYA COLOMN ID YANG TIDAK BOLEH DI ISI

    //RELASI DI MODEL BUKU

    public function ulasanbuku() //RELASI ULASAN BUKU
    {
        return $this->hasMany (UlasanBuku::class);
    }

    //RELASI DARI MODEL BUKU KE KOLEKSI PRIBADI
    public function koleksipribadi() 
    {
        return $this->hasMany (KoleksiPribadi::class);
    }

    //RELASI DARI MODEL BUKU KE KATEGORI BUKU RELASI 
    public function kateoribuku_relasi() 
    {
        return $this->hasMany (Kategori_Buku_Relasi::class);
    }

    //RELASI DARI MODEL BUKU KE PEMINJAMAN 
    public function peminjaman() 
    {
        return $this->hasMany (Peminjaman::class);
    }
}
