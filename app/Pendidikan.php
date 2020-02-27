<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $table = 'pendidikan';
    protected $fillable = ['pendidikan'];

    public function data_karyawan()
    {
        return $this->hasMany(DataKaryawan::class, 'jabatan_id', 'id');
    }
}
