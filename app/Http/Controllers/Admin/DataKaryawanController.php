<?php

namespace App\Http\Controllers\Admin;

use App\DataKaryawan;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DataKaryawanRequest;
use App\Jabatan;
use App\Pendidikan;
use App\Status;
use Illuminate\Http\Request;

class DataKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metaTitle = 'Halaman Data Karyawan';
        $karyawan = DataKaryawan::with([
            'status', 'jabatan', 'pendidikan'
        ])->get();
        // dd($karyawan);
        // dd($json);

        return view('pages.admin.karyawan.index', 
        [
            'metaTitle' => $metaTitle,
            'karyawan' => $karyawan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $metaTitle = "Halaman Tambah Data Karyawan";
        $jabatan = Jabatan::all();
        $status = Status::all();
        $pendidikan = Pendidikan::all();
        // dd($pendidikan);

        return view('pages.admin.karyawan.create',
        [
            'metaTitle' => $metaTitle,
            'jabatan' => $jabatan,
            'status' => $status,
            'pendidikan' => $pendidikan,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DataKaryawanRequest $request)
    {
        $data = $request->all();
        DataKaryawan::create($data);

        return redirect()->route('karyawan.index');
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
        $metaTitle = "Halaman Edit Data Karyawan";

        $jabatan = Jabatan::all();
        $status = Status::all();
        $pendidikan = Pendidikan::all();
        $karyawan = DataKaryawan::findOrfail($id);

        return view('pages.admin.karyawan.edit', 
        [
            'metaTitle' => $metaTitle,
            'jabatan' => $jabatan,
            'status' => $status,
            'pendidikan' => $pendidikan,
            'karyawan' => $karyawan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DataKaryawanRequest $request, $id)
    {
        $data = $request->all();

        $karyawan = DataKaryawan::findOrfail($id);
        $karyawan->update($data);

        return redirect()->route('karyawan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karyawan = DataKaryawan::findOrfail($id);
        $karyawan->delete();

        return redirect()->route('karyawan.index');
    }
}
