<?php

namespace App\Controllers;

use App\Models\M_carousel;
use App\Models\M_keluarga;

class C_tentang extends BaseController
{
    public function __construct()
    {
        helper(array('form', 'uri'));
        $this->M_carousel = new M_carousel();
        $this->M_keluarga = new M_keluarga();
    }

    // milik karosel
    public function carousel()
    {
        $data['data'] = $this->M_carousel->getCarousel(false, 'tentang');

        // dd($data);
        return view('admin/tentang/carousel/v_index', $data);
    }
    public function carousel_create()
    {
        $data['halaman'] = "tentang";
        $data['validation'] = \Config\Services::validation();

        return view('admin/tentang/carousel/v_create', $data);
    }
    public function carousel_edit($id)
    {
        $data['data'] = $this->M_carousel->getCarousel($id, 'tentang');
        $data['validation'] = \Config\Services::validation();
        // dd($data);
        return view('admin/tentang/carousel/v_edit', $data);
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
            return redirect()->to(base_url('/tentang_carousel/create'))->withInput();
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
            'halaman' => 'tentang'
        ]);
        session()->setFlashdata('pesan', 'Data berhasil di simpan');
        return redirect()->to(base_url('/tentang_carousel'));
    }
    public function carousel_saveedit($id)
    {
        if (empty($_FILES['gambar']['name'])) {
            $this->M_carousel->save([
                'id' => $id,
                'judul' => $this->request->getVar('judul'),
                'keterangan' => $this->request->getVar('keterangan'),
                'video' => $this->request->getVar('video'),
                'halaman' => 'tentang'
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
                return redirect()->to(base_url('/tentang_carousel/edit/' . $this->request->getVar('id')))->withInput();
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
                'halaman' => 'tentang'
            ]);
        }
        session()->setFlashdata('pesan', 'Data berhasil di ubah');
        return redirect()->to(base_url('/tentang_carousel'));
    }
    public function carousel_delete($id)
    {
        $this->M_carousel->delete($id);
        return redirect()->to(base_url('/tentang_carousel'));
    }
    // milik karosel

    // milik keluarga
    public function keluarga()
    {
        $data['data'] = $this->M_keluarga->getKeluarga();
        // dd($data);
        return view('admin/tentang/keluarga/v_index', $data);
    }
    public function keluarga_create()
    {
        $data['validation'] = \Config\Services::validation();
        $data['urutan'] = $this->M_keluarga->getUrutan($id);

        return view('admin/tentang/keluarga/v_create', $data);
    }
    public function keluarga_edit($id)
    {
        $data['data'] = $this->M_keluarga->getKeluarga($id);
        $data['validation'] = \Config\Services::validation();
        // dd($data);
        return view('admin/tentang/keluarga/v_edit', $data);
    }
    public function keluarga_save()
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
            return redirect()->to(base_url('/tentang_keluarga/create'))->withInput();
        }
        // ambil request gambar
        $fileGambar = $this->request->getFile('gambar');
        //generate nama
        $namaGambar = $fileGambar->getRandomName();
        // pindahkan ke folder images  di public
        $fileGambar->move('images', $namaGambar);
        // ambil nama sampul
        // $namaGambar = $fileGambar->getName();
        $this->M_keluarga->save([
            'nama' => $this->request->getVar('nama'),
            'sosmed' => $this->request->getVar('sosmed'),
            'urutan' => $this->request->getVar('urutan'),
            'gambar' => $namaGambar,
        ]);
        session()->setFlashdata('pesan', 'Data berhasil di simpan');
        return redirect()->to(base_url('/tentang_keluarga'));
    }
    public function keluarga_saveedit($id)
    {
        if (empty($_FILES['gambar']['name'])) {
            $this->M_keluarga->save([
                'id' => $id,
                'urutan' => $this->request->getVar('urutan'),
                'nama' => $this->request->getVar('nama'),
                'sosmed' => $this->request->getVar('sosmed')
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
                return redirect()->to(base_url('/tentang_keluarga/edit/' . $this->request->getVar('id')))->withInput();
            }
            // ambil request gambar
            $fileGambar = $this->request->getFile('gambar');
            //generate nama
            $namaGambar = $fileGambar->getRandomName();
            // pindahkan ke folder images  di public
            $fileGambar->move('images', $namaGambar);
            // ambil nama sampul
            // $namaGambar = $fileGambar->getName();
            $this->M_keluarga->save([
                'id' => $id,
                'urutan' => $this->request->getVar('urutan'),
                'nama' => $this->request->getVar('nama'),
                'sosmed' => $this->request->getVar('sosmed'),
                'gambar' => $namaGambar
            ]);
        }
        session()->setFlashdata('pesan', 'Data berhasil di ubah');
        return redirect()->to(base_url('/tentang_keluarga'));
    }
    public function keluarga_delete($id)
    {
        $this->M_keluarga->delete($id);
        return redirect()->to(base_url('/tentang_keluarga'));
    }
    // milik keluarga

}
