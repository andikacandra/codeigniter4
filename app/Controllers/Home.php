<?php

namespace App\Controllers;

class Home extends BaseController
{
	protected $home;
	public function __construct()
	{
		$this->home = new \App\Models\HomeModel();
	}

	public function index()
	{
		$data = [
			'js' => 'index',
			'validation' => \Config\Services::validation(),
		];
		return view('home/index', $data);
	}

	public function getPegawai()
	{
		$pegawai = $this->home->pegawaiFindAll()->getResultArray();

		$data = '';

		$i = 1;
		foreach ($pegawai as $row) {
			$data .= "
				<tr>
					<td>{$i}</td>
					<td>{$row['Nama']}</td>
					<td>{$row['Alamat']}</td>
					<td>{$row['Email']}</td>
					<td>
						<a href='" . base_url('Home/detail/' . $row['Token']) . "'><button>Detail</button></a>
						<a href='" . base_url('Home/update/' . $row['Token']) . "'><button>Update</button></a>
						<a href='" . base_url('Home/delete/' . $row['Token']) . "'><button>Delete</button></a>
					</td>
				</tr>
			";
			$i++;
		}

		echo json_encode($data);
	}

	public function simpan()
	{
		$p = $this->request->getVar();

		if (!$this->validate([
			'Nama' => 'required',
			'Alamat' => 'required',
			'Email' => 'is_unique[pegawai.Email]|permit_empty', // harus unique atau boleh dikosongkan
		])) {
			$validation = \Config\Services::validation();
			return redirect()->to('/Home/')->withInput()->with('validation', $validation);
		}

		$token = bin2hex(openssl_random_pseudo_bytes(16));
		$this->home->pegawaiSimpan([
			'Token' => $token,
			'Nama' => $p['Nama'],
			'Alamat' => $p['Alamat'],
			'Email' => $p['Email'],
		]);

		session()->setFlashdata('pesan', '! Data berhasil ditambahkan');

		return redirect()->to('/Home/');
	}

	public function detail($token = null)
	{
		if ($token == null) {
			return redirect()->to('/Home/');
		}

		$token = str_replace(["%20", "%23"], "", $token);

		$data = [
			'pegawai' => $this->home->pegawaiFindAll($token)->getRowArray(),
		];

		return view('home/detail', $data);
	}

	public function update($token = null)
	{
		if ($token == null) {
			return redirect()->to('/Home/');
		}

		$token = str_replace(["%20", "%23"], "", $token);

		$data = [
			'pegawai' => $this->home->pegawaiFindAll($token)->getRowArray(),
			'validation' => \Config\Services::validation(),
		];

		return view('home/update', $data);
	}

	public function simpanUpdate($token = null)
	{
		if ($token == null) {
			return redirect()->to('/Home/');
		}

		$p = $this->request->getVar();
		$pegawai = $this->home->pegawaiFindAll($token)->getRowArray();

		if ($pegawai['Email'] == $p['Email']) {
			$valid_email = 'permit_empty';
		} else {
			$valid_email = 'is_unique[pegawai.Email]|permit_empty';
		}

		if (!$this->validate([
			'Nama' => 'required',
			'Alamat' => 'required',
			'Email' => $valid_email, // harus unique atau boleh dikosongkan
		])) {
			$validation = \Config\Services::validation();
			return redirect()->to('/Home/update/' . $token)->withInput()->with('validation', $validation);
		}

		$this->home->pegawaiUpdate($token, [
			'Nama' => $p['Nama'],
			'Alamat' => $p['Alamat'],
			'Email' => $p['Email'],
		]);

		session()->setFlashdata('pesan', '! Data berhasil di-update');

		return redirect()->to('/Home/');
	}

	public function delete($token = null)
	{
		if ($token == null) {
			return redirect()->to('/Home/');
		}

		$this->home->pegawaiDelete($token);

		session()->setFlashdata('pesan', '! Data berhasil di-delete');

		return redirect()->to('/Home/');
	}
}
