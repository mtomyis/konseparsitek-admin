<?php

namespace App\Controllers;

use App\Models\M_login;

class C_login extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->M_login = new M_login();
	}

	public function index()
	{
		return view('v_login');
	}

	public function cek_login()
	{
		$username = $this->request->getVar('username');
		$password = $this->request->getVar('password');

		$query = $this->M_login->cek_login($username, $password);

		if (($query['username'] == $username) && ($query['password'] == $password)) {
			session()->set('id_user', $query['id_user']);
			session()->set('username', $query['username']);
			session()->set('name', $query['name']);
			session()->set('password', $query['password']);
			session()->set('level', $query['level']);
			session()->set('keterangan', $query['keterangan']);

			// dd(session()->get('id_user'));
			return redirect()->to(base_url('/beranda_carousel'));
		} else {
			// jika salah
			session()->setFlashdata('gagal', 'Username atau password salah');
			return redirect()->to(base_url('/'));
		}
	}

	public function logout()
	{
		session()->destroy();
        return redirect()->to('/');
	}

}
