<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    protected $fillable = ['nama_status'];

    public function data_karyawan()
    {
        return $this->hasMany(DataKaryawan::class, 'status_id', 'id');
    }
}
