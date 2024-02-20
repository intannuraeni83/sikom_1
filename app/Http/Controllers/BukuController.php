<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\pdf;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::all();
        return view('data_buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data_buku.form_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
    //    dd($request);
    $request->validate(
        [
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|max:4',
        ], 
        [
            'judul.required' => 'judul wajib diisi',
            'penulis.required' => 'penulis wajib diisi',
            'penerbit.required' => 'penerbit wajib diisi',
            'tahun_terbit.required' => 'tahun terbit wajib diisi',
        ]
    );

    $data = [
        'judul' => $request->judul,
        'penulis' => $request->penulis,
        'penerbit' => $request->penerbit,
        'tahun_terbit' => $request->tahun_terbit,
    ];

    Buku::create($data);
    return redirect()->route('buku.index')->with('success', 'Data Berhasil di simpan');


}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dt = Buku::find($id);
        return view('data_buku.form_edit',compact('dt'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'judul' => 'required',
                'penulis' => 'required',
                'penerbit' => 'required',
                'tahun_terbit' => 'required|max:4',
            ], 
            [
                'judul.required' => 'judul wajib diisi',
                'penulis.required' => 'penulis wajib diisi',
                'penerbit.required' => 'penerbit wajib diisi',
                'tahun_terbit.required' => 'tahun terbit wajib diisi',
            ]
        );
    
        $data = [
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
        ];
    
         Buku::where('id', $id)->update($data);
        return redirect()->route('buku.index')->with('success', 'Data Berhasil di edit');
    
    
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Buku::find($id)->delete();
        return back()->with('succes','Data berhasil di hapus');
    }

    public function export_pdf()
    {
        $data = Buku::orderBy('judul','asc');
        $data = $data->get();

        // pass parameters to the export view
        $pdf = PDF::loadview('data_buku.exportPdf', ['data'=>$data]);
        $pdf->setpaper('a4', 'portait');
        $pdf->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        // SET FILE NAME
        $filename = date('ymdhis') . 'data_buku';
        // download the pdf file
        return $pdf->download($filename.'.pdf');
    }
}