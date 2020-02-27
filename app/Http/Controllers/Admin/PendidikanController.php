<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PendidikanRequest;
use App\Pendidikan;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metaTitle = 'Halaman Pendidikan';
        $pendidikan = Pendidikan::all();
        // dd($pendidikan);

        return view('pages.admin.pendidikan.index', 
        [
            'metaTitle' => $metaTitle,
            'pendidikan' =>$pendidikan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $metaTitle = 'Halaman Tambah Data Pendidikan';

        return view('pages.admin.pendidikan.create', 
        [
            'metaTitle' => $metaTitle,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PendidikanRequest $request)
    {
        $data = $request->all();

        Pendidikan::create($data);
        return redirect()->route('pendidikan.index');
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
        $metaTitle = 'Halaman Edit Data Pendidikan';
        $pendidikan = Pendidikan::findOrFail($id);

        return view('pages.admin.pendidikan.edit', 
        [
            'metaTitle' => $metaTitle,
            'pendidikan' => $pendidikan,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PendidikanRequest $request, $id)
    {
        $data = $request->all();
        
        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->update($data);

        return redirect()->route('pendidikan.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pendidikan = Pendidikan::findOrfail($id);
        $pendidikan->delete();

        return redirect()->route('pendidikan.index');
    }
}
