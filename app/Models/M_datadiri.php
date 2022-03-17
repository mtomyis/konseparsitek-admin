<?php

namespace App\Models;

use CodeIgniter\Model;

class M_datadiri extends Model
{
    protected $table = 'datadiri';
    protected $useTimestamps = true;
    protected $allowedFields = ['alamat', 'nomor', 'email', 'about_us'];

    //memanggil data 2 jalur versi dengan 1 method
    public function getDatadiri($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
