<?php

namespace App\Imports;

use App\Models\Buku;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

HeadingRowFormatter::default('none');


class ImportDataBukuClass implements ToCollection, WithCalculatedFormulas
{
    /**
     * @param Collection $rows
     * @return MsHdCashflow
     */

    public  $insert;
    public  $edit;
    public  $gagal;
    public  $listgagal;

    // public function __construct(){
    //     $this->Tanggal = new Tanggal();
    //     $this->Konversi = new Konversi();
    // }

    public function collection(Collection $rows)
    {
        $trDt = [];
        $this->insert = 0;
        $this->edit = 0; 
        $this->gagal = 0; 
        $this->listgagal = "";

        foreach ($rows as $idx => $row) {
            if ($idx > 0) {
                //DECLARE REQUEST
                $no=isset($row[0])?($row[0]):'';
                // $judul = isset($row[1][4]) ? $row[1][4] : '';
                // $penulis = isset($row[2][4]) ? $row[2][4] : '';
                // $penerbit = isset($row[3][4]) ? $row[3][4] : '';
                // $tahun_terbit = isset($row[4][4]) ? $row[4][4] : '';
                $judul=isset($row[1])?($row[1]):'';
                $penulis=isset($row[2])?($row[2]):'';
                $penerbit=isset($row[3])?($row[3]):'';
                $tahun_terbit=isset($row[4])?($row[4]):'';
      
                //READY REQUEST
                $trDt[$idx]['judul'] = $judul;
                $trDt[$idx]['penulis'] = $penulis;
                $trDt[$idx]['penerbit'] = $penerbit;
                $trDt[$idx]['tahun_terbit'] = $tahun_terbit;

                $data = Buku::where('judul', '=',''.$trDt[$idx]['judul'].'')->first();
                if ($data) {//UPDATE DATA
                    $data->judul         = $trDt[$idx]['judul'];
                    $data->penulis         = $trDt[$idx]['penulis'];
                    $data->penerbit         = $trDt[$idx]['penerbit'];
                    $data->tahun_terbit         = $trDt[$idx]['tahun_terbit'];
                    // SAVE THE DATA
                    if ($data->save()) {
                        // SUCCESS
                        ++$this->edit;
                    }
                } else {//INSERT DATA
                    if($trDt[$idx]['judul']){
                        $data =  new Buku();
                        $data->judul         = $trDt[$idx]['judul'];
                        $data->penulis         = $trDt[$idx]['penulis'];
                        $data->penerbit         = $trDt[$idx]['penerbit'];
                        $data->tahun_terbit         = $trDt[$idx]['tahun_terbit'];
                        // SAVE THE DATA
                        if ($data->save()) {
                            // SUCCESS
                            ++$this->insert;
                        }
                    }else{
                        // FAILED
                        ++$this->gagal;
                        $this->listgagal.="(".$trDt[$idx]['judul']." - ".$trDt[$idx]['judul']."),<br>";
                    }
                }
            }
        }
    }


}