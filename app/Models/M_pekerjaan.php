<?php

namespace App\Models;

use CodeIgniter\Model;

class M_pekerjaan extends Model
{
    protected $table = 'pekerjaan';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'keterangan', 'gambar', 'gambar2', 'gambar3', 'tanggal_awal', 'tanggal_akhir', 'klien', 'kategori', 'lokasi'];

    //memanggil data 2 jalur versi dengan 1 method
    public function getPekerjaan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function getPekerjaanHomeGambar()
    {
        return $this->orderBy('id', 'desc')->limit(1)->first();
    }

    public function getPekerjaanHome()
    {
        return $this->orderBy('id', 'desc')->limit(4)->find();
        // order by SupplierID desc LIMIT 4
    }

    public function getPekerjaanLain()
    {
        return $this->orderBy('id', 'asc')->limit(6)->find();
        // order by SupplierID desc LIMIT 4
    }
    
    public function insertRecord($record)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pekerjaan');
        if (count($record) > 0) {

            $input = trim($record[4]);
            $date = strtotime($input);
            $tanggal_awal = date('Y-m-d', $date);

            $input2 = trim($record[5]);
            $date2 = strtotime($input2);
            $tanggal_akhir = date('Y-m-d', $date2);

            // Insert record
            $newuser = array(
                "judul" => trim($record[0]),
                "lokasi" => trim($record[1]),
                "keterangan" => trim($record[2]),
                "kategori" => trim($record[3]),
                "tanggal_awal" => $tanggal_awal,
                "tanggal_akhir" => $tanggal_akhir,
                "klien" => trim($record[6]),
            );
            $builder->insert($newuser);
        }
    }
    
}
