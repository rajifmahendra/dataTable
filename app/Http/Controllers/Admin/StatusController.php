<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StatusRequest;
use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metaTitle = 'Halaman Status';
        $status = Status::all();

        return view('pages.admin.status.index',
        [
            'status' => $status,
            'metaTitle' => $metaTitle,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $metaTitle = 'Halaman Tambah Data Status';
        return view('pages.admin.status.create', 
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
    public function store(StatusRequest $request)
    {
        $data = $request->all();

        Status::create($data);
        return redirect()->route('status.index');
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
        $metaTitle = 'Halaman Edit Data Status';

        $status = Status::findOrFail($id);
        return view('pages.admin.status.edit', 
        [
            'metaTitle' => $metaTitle,
            'status' => $status,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StatusRequest $request, $id)
    {
        $data = $request->all();

        $status = Status::findOrfail($id);
        $status->update($data);

        return redirect()->route('status.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = Status::findOrfail($id);
        $status->delete();

        return redirect()->route('status.index');
    }
}
