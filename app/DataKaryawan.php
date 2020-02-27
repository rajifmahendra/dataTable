<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataKaryawan extends Model
{
    protected $table = 'data_karyawan';
    protected $fillable = 
    [
        'nama', 'alamat', 'umur', 'jender', 'no_tlp', 
        'tgl_lahir', 'jabatan_id', 'status_id', 'pendidikan_id', 'tgl_masuk'
    ];

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id', 'id');
    }

    public function pendidikan()
    {
        return $this->belongsTo(Pendidikan::class, 'pendidikan_id', 'id');
    }
    
}
