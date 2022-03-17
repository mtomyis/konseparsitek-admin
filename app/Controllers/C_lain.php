<?php

namespace App\Controllers;

use App\Models\M_testimoni;

class C_lain extends BaseController
{
    public function __construct()
    {
        helper(array('form', 'uri'));
        $this->M_testimoni = new M_testimoni();
    }

    // milik testimoni
    public function testimoni()
    {
        $data['data'] = $this->M_testimoni->getTestimoni(false);

        // dd($data);
        return view('admin/lain/testimoni/v_index', $data);
    }
    public function testimoni_create()
    {
        $data['validation'] = \Config\Services::validation();

        return view('admin/lain/testimoni/v_create', $data);
    }
    public function testimoni_edit($id)
    {
        $data['data'] = $this->M_testimoni->getTestimoni($id);
        $data['validation'] = \Config\Services::validation();
        // dd($data);
        return view('admin/lain/testimoni/v_edit', $data);
    }
    public function testimoni_save()
    {
        // dd($this->request->getVar());
        if (!$this->validate([
            'gambar' => [
                'rules' => 'uploaded[gambar]|max_size[gambar, 10000]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Silahkan pilih gambar terlebih dahulu',
                    'max_size' => 'Ukuran gambar melebihi batas yaitu 2 MB',
                    'is_image' => 'File yang dipilih bukan gambar',
                    'mime_in' => 'File yang dipilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to(base_url('/lain_testimoni/create'))->withInput();
        }
        // ambil request gambar
        $fileGambar = $this->request->getFile('gambar');
        //generate nama
        $namaGambar = $fileGambar->getRandomName();
        // pindahkan ke folder images  di public
        $fileGambar->move('images', $namaGambar);
        // ambil nama sampul
        // $namaGambar = $fileGambar->getName();
        $this->M_testimoni->save([
            'nama' => $this->request->getVar('nama'),
            'keterangan' => $this->request->getVar('keterangan'),
            'gambar' => $namaGambar,
            'asal' => $this->request->getVar('asal')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil di simpan');
        return redirect()->to(base_url('/lain_testimoni'));
    }
    public function testimoni_saveedit($id)
    {
        if (empty($_FILES['gambar']['name'])) {
            $this->M_testimoni->save([
                'id' => $id,
                'nama' => $this->request->getVar('nama'),
                'keterangan' => $this->request->getVar('keterangan'),
                'asal' => $this->request->getVar('asal')
            ]);
        } else {
            // dd($this->request->getVar());
            if (!$this->validate([
                'gambar' => [
                    'rules' => 'uploaded[gambar]|max_size[gambar, 10000]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'Silahkan pilih gambar terlebih dahulu',
                        'max_size' => 'Ukuran gambar melebihi batas yaitu 2 MB',
                        'is_image' => 'File yang dipilih bukan gambar',
                        'mime_in' => 'File yang dipilih bukan gambar'
                    ]
                ]
            ])) {
                return redirect()->to(base_url('/lain_testimoni/edit/' . $this->request->getVar('id')))->withInput();
            }
            // ambil request gambar
            $fileGambar = $this->request->getFile('gambar');
            //generate nama
            $namaGambar = $fileGambar->getRandomName();
            // pindahkan ke folder images  di public
            $fileGambar->move('images', $namaGambar);
            // ambil nama sampul
            // $namaGambar = $fileGambar->getName();
            $this->M_testimoni->save([
                'id' => $id,
                'nama' => $this->request->getVar('nama'),
                'keterangan' => $this->request->getVar('keterangan'),
                'gambar' => $namaGambar,
                'asal' => $this->request->getVar('asal')
            ]);
        }
        session()->setFlashdata('pesan', 'Data berhasil di ubah');
        return redirect()->to(base_url('/lain_testimoni'));
    }
    public function testimoni_delete($id)
    {
        $this->M_testimoni->delete($id);
        return redirect()->to(base_url('/lain_testimoni'));
    }
    // milik testimoni

}
