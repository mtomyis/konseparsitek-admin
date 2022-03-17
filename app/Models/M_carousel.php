<?php

namespace App\Models;

use CodeIgniter\Model;

class M_carousel extends Model
{
    protected $table = 'carousel';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'keterangan', 'gambar', 'video', 'halaman'];

    //memanggil data 2 jalur versi dengan 1 method
    public function getCarousel($id = false, $halaman)
    {
        if ($id == false) {
            return $this->where(['halaman' => $halaman])->find();
        }

        return $this->where(['id' => $id, 'halaman' => $halaman])->first();
    }

}
