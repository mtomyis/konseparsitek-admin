<?php

namespace App\Controllers;

use App\Models\M_bidang;
use App\Models\M_carousel;
use App\Models\M_ringkasan;

class C_dashboard extends BaseController
{
    public function __construct()
    {
        helper(array('form', 'uri'));
        $this->M_carousel = new M_carousel();
        $this->M_bidang = new M_bidang();
        $this->M_ringkasan = new M_ringkasan();

    }

    public function index()
    {
        $data['navlink'] = "dashboard";
        return view('admin/v_dashboard', $data);
    }

    // milik karosel
    public function carousel()
    {
        $data['data'] = $this->M_carousel->getCarousel(false, 'beranda');
        // dd($data);
        return view('admin/beranda/carousel/v_index', $data);
    }
    public function carousel_create()
    {
        $data['halaman'] = "beranda";
        $data['validation'] = \Config\Services::validation();

        return view('admin/beranda/carousel/v_create', $data);
    }
    public function carousel_edit($id)
    {
        $data['data'] = $this->M_carousel->getCarousel($id, 'beranda');
        $data['validation'] = \Config\Services::validation();
        // dd($data);
        return view('admin/beranda/carousel/v_edit', $data);
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
            return redirect()->to(base_url('/beranda_carousel/create'))->withInput();
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
            'halaman' => $this->request->getVar('halaman')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil di simpan');
        return redirect()->to(base_url('/beranda_carousel'));
    }
    public function carousel_saveedit($id)
    {
        if (empty($_FILES['gambar']['name'])) {
            $this->M_carousel->save([
                'id' => $id,
                'judul' => $this->request->getVar('judul'),
                'keterangan' => $this->request->getVar('keterangan'),
                'video' => $this->request->getVar('video'),
                'halaman' => $this->request->getVar('halaman')
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
                return redirect()->to(base_url('/beranda_carousel/edit/' . $this->request->getVar('id')))->withInput();
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
                'halaman' => $this->request->getVar('halaman')
            ]);
        }
        session()->setFlashdata('pesan', 'Data berhasil di ubah');
        return redirect()->to(base_url('/beranda_carousel'));
    }
    public function carousel_delete($id)
    {
        $this->M_carousel->delete($id);
        return redirect()->to(base_url('/beranda_carousel'));
    }
    // milik karosel

    // milik bidang
    public function bidang()
    {
        $data['data'] = $this->M_bidang->getBidang();
        // dd($data);
        return view('admin/beranda/bidang/v_index', $data);
    }
    public function bidang_create()
    {
        $data['halaman'] = "beranda";
        $data['validation'] = \Config\Services::validation();

        return view('admin/beranda/bidang/v_create', $data);
    }
    public function bidang_edit($id)
    {
        $data['data'] = $this->M_bidang->getBidang($id);
        // dd($data);
        return view('admin/beranda/bidang/v_edit', $data);
    }
    public function bidang_save()
    {
        $this->M_bidang->save([
            'judul' => $this->request->getVar('judul'),
            'keterangan' => $this->request->getVar('keterangan')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil di simpan');
        return redirect()->to(base_url('/beranda_bidang'));
    }
    public function bidang_saveedit($id)
    {
        $this->M_bidang->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'keterangan' => $this->request->getVar('keterangan')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil di ubah');
        return redirect()->to(base_url('/beranda_bidang'));
    }
    public function bidang_delete($id)
    {
        $this->M_bidang->delete($id);
        return redirect()->to(base_url('/beranda_bidang'));
    }
    // milik bidang

    // milik ringkasan
    public function ringkasan()
    {
        $data['data'] = $this->M_ringkasan->getRingkasan();
        // dd($data);
        return view('admin/beranda/ringkasan/v_index', $data);
    }
    public function ringkasan_create()
    {
        $data['halaman'] = "beranda";
        $data['validation'] = \Config\Services::validation();

        return view('admin/beranda/ringkasan/v_create', $data);
    }
    public function ringkasan_edit($id)
    {
        $data['data'] = $this->M_ringkasan->getRingkasan($id);
        $data['validation'] = \Config\Services::validation();
        // dd($data);
        return view('admin/beranda/ringkasan/v_edit', $data);
    }
    public function ringkasan_save()
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
            return redirect()->to(base_url('/beranda_ringkasan/create'))->withInput();
        }
        // ambil request gambar
        $fileGambar = $this->request->getFile('gambar');
        //generate nama
        $namaGambar = $fileGambar->getRandomName();
        // pindahkan ke folder images  di public
        $fileGambar->move('images', $namaGambar);
        // ambil nama sampul
        // $namaGambar = $fileGambar->getName();
        $this->M_ringkasan->save([
            'judul' => $this->request->getVar('judul'),
            'keterangan' => $this->request->getVar('keterangan'),
            'gambar' => $namaGambar
        ]);

        session()->setFlashdata('pesan', 'Data berhasil di simpan');
        return redirect()->to(base_url('/beranda_ringkasan'));
    }
    public function ringkasan_saveedit($id)
    {
        if (empty($_FILES['gambar']['name'])) {
            $this->M_ringkasan->save([
                'id' => $id,
                'judul' => $this->request->getVar('judul'),
                'keterangan' => $this->request->getVar('keterangan')
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
                return redirect()->to(base_url('/beranda_ringkasan/edit/' . $this->request->getVar('id')))->withInput();
            }
            // ambil request gambar
            $fileGambar = $this->request->getFile('gambar');
            //generate nama
            $namaGambar = $fileGambar->getRandomName();
            // pindahkan ke folder images  di public
            $fileGambar->move('images', $namaGambar);
            // ambil nama sampul
            // $namaGambar = $fileGambar->getName();
            $this->M_ringkasan->save([
                'id' => $id,
                'judul' => $this->request->getVar('judul'),
                'keterangan' => $this->request->getVar('keterangan'),
                'gambar' => $namaGambar
            ]);
        }
        session()->setFlashdata('pesan', 'Data berhasil di ubah');
        return redirect()->to(base_url('/beranda_ringkasan'));
    }
    public function ringkasan_delete($id)
    {
        $this->M_ringkasan->delete($id);
        return redirect()->to(base_url('/beranda_ringkasan'));
    }
    // milik ringkasan

}
