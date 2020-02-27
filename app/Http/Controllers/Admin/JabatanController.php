<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JabatanRequest;
use App\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meteTitle = 'Halaman Jabatan';
        $jabatan = Jabatan::all();

        return view('pages.admin.jabatan.index', 
            [
               'metaTitle' => $meteTitle,
               'jabatan' => $jabatan, 
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $meteTitle = 'Halaman Tambah Data Jabatan';
        return view('pages.admin.jabatan.create',
        [
            'metaTitle' => $meteTitle,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JabatanRequest $request)
    {
        $data = $request->all();

        Jabatan::create($data);
        return redirect()->route('jabatan.index');
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
        $meteTitle = "Halaman Edit Data Jabatan";

        $jabatan = Jabatan::findOrFail($id);
        return view('pages.admin.jabatan.edit',
        [
            'metaTitle' => $meteTitle,
            'jabatan' => $jabatan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JabatanRequest $request, $id)
    {
        $data = $request->all();

        $jabatan = Jabatan::findOrFail($id);
        $jabatan->update($data);

        return redirect()->route('jabatan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();

        return redirect()->route('jabatan.index');
    }
}
