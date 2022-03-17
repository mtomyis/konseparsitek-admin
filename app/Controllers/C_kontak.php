<?php

namespace App\Controllers;

use App\Models\M_carousel;
use App\Models\M_datadiri;

class C_kontak extends BaseController
{
    public function __construct()
    {
        helper(array('form', 'uri'));
        $this->M_carousel = new M_carousel();
        $this->M_datadiri = new M_datadiri();
    }

    // milik karosel
    public function carousel()
    {
        $data['data'] = $this->M_carousel->getCarousel(false, 'kontak');

        // dd($data);
        return view('admin/kontak/carousel/v_index', $data);
    }
    public function carousel_create()
    {
        $data['halaman'] = "kontak";
        $data['validation'] = \Config\Services::validation();

        return view('admin/kontak/carousel/v_create', $data);
    }
    public function carousel_edit($id)
    {
        $data['data'] = $this->M_carousel->getCarousel($id, 'kontak');
        $data['validation'] = \Config\Services::validation();
        // dd($data);
        return view('admin/kontak/carousel/v_edit', $data);
    }
    public function carousel_save()
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
            return redirect()->to(base_url('/kontak_carousel/create'))->withInput();
        }
        // ambil request gambar
        $fileGambar = $this->request->getFile('gambar');
        //generate nama
        $namaGambar = $fileGambar->getRandomName();
        // pindahkan ke folder images  di public
        $fileGambar->move('images', $namaGambar);
        // ambil nama sampul
        // $namaGambar = $fileGambar->getName();
        $this->M_carousel->save([
            'judul' => $this->request->getVar('judul'),
            'keterangan' => $this->request->getVar('keterangan'),
            'gambar' => $namaGambar,
            'video' => $this->request->getVar('video'),
            'halaman' => 'kontak'
        ]);
        session()->setFlashdata('pesan', 'Data berhasil di simpan');
        return redirect()->to(base_url('/kontak_carousel'));
    }
    public function carousel_saveedit($id)
    {
        if (empty($_FILES['gambar']['name'])) {
            $this->M_carousel->save([
                'id' => $id,
                'judul' => $this->request->getVar('judul'),
                'keterangan' => $this->request->getVar('keterangan'),
                'video' => $this->request->getVar('video'),
                'halaman' => 'kontak'
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
                return redirect()->to(base_url('/kontak_carousel/edit/' . $this->request->getVar('id')))->withInput();
            }
            // ambil request gambar
            $fileGambar = $this->request->getFile('gambar');
            //generate nama
            $namaGambar = $fileGambar->getRandomName();
            // pindahkan ke folder images  di public
            $fileGambar->move('images', $namaGambar);
            // ambil nama sampul
            // $namaGambar = $fileGambar->getName();
            $this->M_carousel->save([
                'id' => $id,
                'judul' => $this->request->getVar('judul'),
                'keterangan' => $this->request->getVar('keterangan'),
                'gambar' => $namaGambar,
                'video' => $this->request->getVar('video'),
                'halaman' => 'kontak'
            ]);
        }
        session()->setFlashdata('pesan', 'Data berhasil di ubah');
        return redirect()->to(base_url('/kontak_carousel'));
    }
    public function carousel_delete($id)
    {
        $this->M_carousel->delete($id);
        return redirect()->to(base_url('/kontak_carousel'));
    }
    // milik karosel

    // milik datadiri
    public function datadiri()
    {
        $data['data'] = $this->M_datadiri->getDatadiri();
        // dd($data);
        return view('admin/kontak/datadiri/v_index', $data);
    }
    public function datadiri_create()
    {
        $data['validation'] = \Config\Services::validation();
        return view('admin/kontak/datadiri/v_create', $data);
    }
    public function datadiri_edit($id)
    {
        $data['data'] = $this->M_datadiri->getDatadiri($id);
        $data['validation'] = \Config\Services::validation();
        // dd($data);
        return view('admin/kontak/datadiri/v_edit', $data);
    }
    public function datadiri_save()
    {
        // dd($this->request->getVar());

        $this->M_datadiri->save([
            'alamat' => $this->request->getVar('alamat'),
            'nomor' => $this->request->getVar('nomor'),
            'email' => $this->request->getVar('email'),
            'about_us' => $this->request->getVar('about_us'),

        ]);
        session()->setFlashdata('pesan', 'Data berhasil di simpan');
        return redirect()->to(base_url('/kontak_datadiri'));
    }
    public function datadiri_saveedit($id)
    {

        $this->M_datadiri->save([
            'id' => $id,
            'alamat' => $this->request->getVar('alamat'),
            'nomor' => $this->request->getVar('nomor'),
            'email' => $this->request->getVar('email'),
            'about_us' => $this->request->getVar('about_us'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil di ubah');
        return redirect()->to(base_url('/kontak_datadiri'));
    }
    public function datadiri_delete($id)
    {
        $this->M_datadiri->delete($id);
        return redirect()->to(base_url('/kontak_datadiri'));
    }
    // milik datadiri

}
