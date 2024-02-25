<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //menampilkan tampilan
    {
        $data = Peminjaman::with('user','buku')->get();
       return view('peminjaman.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //menampilkan halaman create
    {
        $buku = Buku::all();
        // $user = User::all();

        return view('peminjaman.form_create', compact('buku'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //menyimpan request database
    {
    //    dd($request);
        $request->validate([
            'buku_id' => 'required',
            'tanggal_peminjaman' => 'required',
            'tanggal_pengembalian' => 'required',
            'status_peminjaman' => 'required',
        ],[
            'buku_id.required'=> 'Buku Wajib di isi',
            'tanggal_peminjaman.required'=> 'Tanggal Peminjaman wajib di isi',
            'tanggal_pengembalian.required'=> 'Tanggal Pengembalian wajib di isi',
            'status_peminjaman.required'=> 'Status peminjaman wajib di isi',
        ]);

        $user = Auth::user()->id;
        $data = [
            'buku_id' => $request->buku_id,
            'user_id' =>$user,
            'tanggal_peminjaman' => $request-> tanggal_peminjaman,
            'tanggal_pengembalian' => $request-> tanggal_pengembalian,
            'status_peminjaman' => $request-> status_peminjaman,

        ];

       Peminjaman::create($data);
       return redirect()->route('peminjaman.index')->with('success', 'Data berhasil disimpan');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
