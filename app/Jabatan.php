<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';
    protected $fillable = ['nama_jabatan'];

    public function data_karyawan()
    {
        return $this->hasMany(DataKaryawan::class, 'jabatan_id', 'id');
    }
}
