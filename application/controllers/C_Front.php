<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Front extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	function index(){
		$data = array(
			'title' => 'Bimbingan Proposal Online Teknik Informatika' 
			);
		$this->load->view('v_mheader.php',$data);
		$this->load->view('v_login');
		$this->load->view('v_mfooter');
	}

	function login(){
		if ($this->session->userdata('level')=="Dosen") {
			redirect('dosen');
		}
		elseif ($this->session->userdata('level')=="Prodi") {
			redirect('prodi');	
		}
		elseif ($this->session->userdata('level')=="Admin") {
				redirect('admin');
		}
		elseif ($this->session->userdata('level')=="Mhs") {
			redirect('mhs');
		}
		elseif ($this->session->userdata('level')=="Kalab") {
			redirect('kalab');
	}
		$this->load->view('v_login');
	}

	function error(){
		$data = array(
			'title' => 'Error 404' 
			);
		$this->load->view('v_mheader.php',$data);
		$this->load->view('v_error');
		$this->load->view('v_mfooter');	
	}

	function register(){
		$data = array(
			'title' => 'Daftar Bimbingan Online' 
			);
		$this->load->view('v_mheader.php',$data);
		$this->load->view('register');
		$this->load->view('v_mfooter');	
	}

	public function proses_login(){
		$user = $this->input->post('username');
		$pass = $this->input->post('password');

		$ceklogin = $this->m_model->login($user,$pass);

		if ($ceklogin) {
			foreach ($ceklogin as $row);
			$this->session->set_userdata('username' , $row->username);
			$this->session->set_userdata('level' , $row->level);
			$this->session->set_userdata('nama_user' , $row->nama_user);
			$this->session->set_userdata('id' , $row->id);
			$this->session->set_userdata('npm' , $row->npm);
			$this->session->set_userdata('konsentrasi' , $row->konsentrasi);
			$this->session->set_userdata('jenis_bimbingan' , $row->jenis_bimbingan);
			$this->session->set_userdata('nid' , $row->nid);
			$this->session->set_userdata('foto' , $row->foto);
			$this->session->set_userdata('password' , $row->password);

			if ($this->session->userdata('level')=="Dosen") {
				redirect('dosen');
			}
			elseif ($this->session->userdata('level')=="Prodi") {
				redirect('prodi');	
			}
			elseif ($this->session->userdata('level')=="Admin") {
				redirect('admin');	
			}
			elseif ($this->session->userdata('level')=="Mhs") {
				redirect('mhs');	
			}
			elseif ($this->session->userdata('level')=="Kalab") {
				redirect('kalab');	
			}
			
		}else{
			$data['pesan'] = "Username dan Password tidak sesuai.";
			$this->load->view('v_login',$data);
		}

	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

	public function RegisterUser()
	{
		

		$this->form_validation->set_rules('username', 'User Name', 'required');
		$this->form_validation->set_rules('nama_user', 'Nama User', 'required');
		$this->form_validation->set_rules('npm', 'NPM', 'required');
		$this->form_validation->set_rules('konsentrasi', 'Konsentrasi', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirmpswd', 'Password Confirmation', 'required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('level', 'Level', 'required');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$data_gagal['pesan'] = "Pendaftaran Gagal";
			$this->load->view('register',$data_gagal);
		}
		else
		{
			$username 		= $this->security->xss_clean($this->input->post('username'));
			$nama_user 		= $this->security->xss_clean($this->input->post('nama_user'));
			$npm 			= $this->security->xss_clean($this->input->post('npm'));
			$konsentrasi 	= $this->security->xss_clean($this->input->post('konsentrasi'));
			$password 		= $this->security->xss_clean($this->input->post('password'));
			$email 			= $this->security->xss_clean($this->input->post('email'));
			$level 			= $this->security->xss_clean($this->input->post('level'));
			
			
			$hashPassword = hash('md5', $password);
 
			
			$insertData = array('username'=>$username,
								'password'=>$hashPassword,
								'nama_user'=>$nama_user,
								'npm'=>$npm,
								'konsentrasi'=>$konsentrasi,
								'email'=>$email,
								'level'=>$level);
								
			
			$checkDuplicate = $this->m_model->checkDuplicate($npm);
			
			if($checkDuplicate == 0)
			{
				$insertUser = $this->m_model->insertUser($insertData);
			
				if($insertUser)
				{
					redirect('C_Front');
				}
				else
				{
					$data['errorMsg'] = 'Unable to save user. Please try again';
					$this->load->view('register',$data);
				}
			}
			else
			{
				$data['errorMsg'] = 'NPM already exists';
				$this->load->view('register',$data);
			}
		}
	}

	function formkp(){
		$data = array(
			'title' => 'Formulir Pengajuan Kerja Praktek' 
			);

		$data1['listdosen'] = $this->m_model->getdosen('Kerja Praktek')->result();
		$this->load->view('v_mheader.php',$data);
		$this->load->view('v_fkp',$data1);
		$this->load->view('v_mfooter');
	}

	function formta(){
		$data = array(
			'title' => 'Formulir Pengajuan Tugas Akhir' 
			);

		$data1['listdosen'] = $this->m_model->getdosen('Tugas Akhir')->result();
		$this->load->view('v_mheader.php',$data);
		$this->load->view('v_fta',$data1);
		$this->load->view('v_mfooter');
	}

	function cekform(){
		$data = array(
			'title' => 'Cek Formulir Pengajuan' 
			);
		
		$data1['datakp'] = $this->m_model->ambil_data('t_frontkp')->result();
		$data1['datata'] = $this->m_model->ambil_data('t_frontta')->result();

		$this->load->view('v_mheader.php',$data);
		$this->load->view('v_cek',$data1);
		$this->load->view('v_mfooter');
	}

	public function proses_inputkp(){
		$nama_mahasiswa = $this->input->post('nama_mahasiswa');
		$npm = $this->input->post('npm');
		$semester = $this->input->post('semester');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');
		$email = $this->input->post('email');
		$topik_kp = $this->input->post('topik_kp');
		$pemb1 = $this->input->post('pembimbing1');
		$pemb2 = $this->input->post('pembimbing2');
		$nama_perusahaan = $this->input->post('nama_perusahaan');
		$alamat_perusahaan = $this->input->post('alamat_perusahaan');
		$pembimbinglap = $this->input->post('pembimbinglap');
		$jumlah_sks = $this->input->post('jumlah_sks');

		if ($jumlah_sks < 120) {
			$data1['lempar'] = "(Jumlah SKS yang dimasukan kurang dari 120 SKS, anda belum bisa mengajukan kerja praktek)";
			$data = array(
			'title' => 'Formulir Pengajuan Kerja Praktek' 
			);

			$data1['listdosen'] = $this->m_model->getdosen('Kerja Praktek')->result();
			$this->load->view('v_mheader.php',$data);
			$this->load->view('v_fkp',$data1);
			$this->load->view('v_mfooter');

		}else{
			$pembimbing1 = explode("|", $pemb1);
			$pembimbing2 = explode("|", $pemb2); 

			$config['upload_path'] = './files/pengajuankp';
			$config['allowed_types'] = 'jpg|png|pdf';

			$this->load->library('upload',$config);
			$this->upload->do_upload('lampiran1');
			$file1 = $this->upload->data();
			$lampiran1 = $file1['file_name'];


			$this->load->library('upload',$config);
			$this->upload->do_upload('lampiran2');
			$file2 = $this->upload->data();
			$lampiran2 = $file2['file_name'];


			$this->load->library('upload',$config);
			$this->upload->do_upload('lampiran3');
			$file3 = $this->upload->data();
			$lampiran3 = $file3['file_name'];

			if (date('m')<= 7 || date('m')>=1) {
				$tahun1 = date('Y')-1;
				$tahun2 = date('Y');
			}
			else{
				$tahun1 = date('Y');
				$tahun2 = date('Y')+1;	
			}

			$data = array(
				'nama_mahasiswa' => $nama_mahasiswa, 
				'npm' => $npm,
				'semester' => $semester,
				'alamat' => $alamat,
				'telepon' => $telepon,
				'email' => $email,
				'topik_kp' => $topik_kp,
				'nid1' => $pembimbing1[0], 
				'nid2' => $pembimbing2[0],
				'pembimbing1' => $pembimbing1[1],
				'pembimbing2' => $pembimbing2[1],
				'nama_perusahaan' => $nama_perusahaan,
				'alamat_perusahaan' => $alamat_perusahaan,
				'pembimbinglap' => $pembimbinglap,
				'lampiran1' => $lampiran1,
				'lampiran2' => $lampiran2,
				'status' => 'Tunggu',
				'tanggal_peng' => date('Y-m-d'),
				'jumlah_sks' => $jumlah_sks,
				'pass' => 'Tunggu',
				'lampiran3' => $lampiran3,
				'tahun_akademik_peng' => $tahun1.'/'.$tahun2
			);

			$data3 = array(
				'nama_mahasiswa' => $nama_mahasiswa, 
				'npm' => $npm,
				'topik_kp' => $topik_kp,
				'status' => 'Tunggu'
			);

			$this->m_model->input_data($data,'t_pengajuankp');
			$this->m_model->input_data($data3,'t_frontkp');
			redirect('cekform');
		}


	}

	function proses_inputta(){
		$nama_mahasiswa = $this->input->post('nama_mahasiswa');
		$npm = $this->input->post('npm');
		$semester = $this->input->post('semester');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');
		$email = $this->input->post('email');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$konsentrasi = $this->input->post('konsentrasi');
		$topik_ta = $this->input->post('topik_ta');
		$pemb1 = $this->input->post('pembimbing1');
		$pemb2 = $this->input->post('pembimbing2');
		$jumlah_sks = $this->input->post('jumlah_sks');

		if ($jumlah_sks < 139) {
			$data1['lempar'] = "(Jumlah SKS yang dimasukan kurang dari 139 SKS, anda belum bisa mengajukan tugas akhir)";
			$data = array(
			'title' => 'Formulir Pengajuan Tugas Akhir' 
			);

			$data1['listdosen'] = $this->m_model->getdosen('Tugas Akhir')->result();
			$this->load->view('v_mheader.php',$data);
			$this->load->view('v_fta',$data1);
			$this->load->view('v_mfooter');
			
		}else{
			$pembimbing1 = explode("|", $pemb1);
			$pembimbing2 = explode("|", $pemb2); 

			$config['upload_path'] = './files/pengajuanta';
			$config['allowed_types'] = 'jpg|png|pdf|doc|docx';

			$this->load->library('upload',$config);
			$this->upload->do_upload('lampiran1');
			$file1 = $this->upload->data();
			$lampiran1 = $file1['file_name'];

			$this->load->library('upload',$config);
			$this->upload->do_upload('lampiran2');
			$file2 = $this->upload->data();
			$lampiran2 = $file2['file_name'];

			$this->load->library('upload',$config);
			$this->upload->do_upload('lampiran3');
			$file3 = $this->upload->data();
			$lampiran3 = $file3['file_name'];

			$this->load->library('upload',$config);
			$this->upload->do_upload('lampiran4');
			$file4 = $this->upload->data();
			$lampiran4 = $file4['file_name'];

			$this->load->library('upload',$config);
			$this->upload->do_upload('lampiran5');
			$file5 = $this->upload->data();
			$lampiran5 = $file5['file_name'];

			$this->load->library('upload',$config);
			$this->upload->do_upload('lampiran6');
			$file6 = $this->upload->data();
			$lampiran6 = $file6['file_name'];

			if (date('m')<= 7 || date('m')>=1) {
				$tahun1 = date('Y')-1;
				$tahun2 = date('Y');
			}
			else{
				$tahun1 = date('Y');
				$tahun2 = date('Y')+1;	
			}

			$data = array(
				'nama_mahasiswa' => $nama_mahasiswa, 
				'npm' => $npm,
				'tanggal_lahir' => $tanggal_lahir,
				'tempat_lahir' => $tempat_lahir,
				'konsentrasi' => $konsentrasi,
				'semester' => $semester,
				'alamat' => $alamat,
				'telepon' => $telepon,
				'email' => $email,
				'topik_ta' => $topik_ta,
				'nid1' => $pembimbing1[0], 
				'nid2' => $pembimbing2[0],
				'pembimbing1' => $pembimbing1[1],
				'pembimbing2' => $pembimbing2[1],
				'lampiran1' => $lampiran1,
				'lampiran2' => $lampiran2,
				'lampiran3' => $lampiran3,
				'lampiran4' => $lampiran4,
				'lampiran5' => $lampiran5,
				'status' => 'Tunggu',
				'tanggal_peng' => date('Y-m-d'),
				'jumlah_sks' => $jumlah_sks,
				'pass' => 'Tunggu',
				'lampiran6' => $lampiran6,
				'tahun_akademik_peng' => $tahun1.'/'.$tahun2
			);

			$data3 = array(
				'nama_mahasiswa' => $nama_mahasiswa, 
				'npm' => $npm,
				'topik_ta' => $topik_ta,
				'konsentrasi' => $konsentrasi,
				'status' => 'Tunggu'
			);

			$this->m_model->input_data($data,'t_pengajuanta');
			$this->m_model->input_data($data3,'t_frontta');
			redirect('cekform');
		}

		

	}

	function test(){
		$date = date('m');
		if ($date <= 6) {
			$dt = "semester 1 ";
		}else{
			$dt = "semester 2 ";
		}

		echo $dt;

		$coba = "Diterima";

		if ($coba == "Diterima") {
			echo " Berhasil";
		}else{
			echo "Gagal";
		}

		echo date_indo(date('Y-m-d'));
		echo "<br>";

		if (date('m')<= 6) {
			$tanggal_awal = date('Y')."-02-10";
			$tanggal_akhir = date('Y')."-08-10";
		}
		else{
			$tanggal_awal = date('Y')."-08-10";
			$tanggal_akhir = (date('Y')+1)."-02-10";	
		}

		echo $tanggal_awal."    ".$tanggal_akhir;
		echo "<br>";

		$str = "08920031123|Arjun Yanuar";
		$str1 = explode("|", $str);
		echo $str.'<br><br>';
		echo $str1[1].'<br>';
		echo $str1[0];

		echo "<br>";
		echo md5('prodi');
		echo "<br>";
		echo md5('dosen');

		echo "<br>";

		//$data1['datakp'] = $this->m_model->ambil_dkp($id)->result();
		$data2['listdosen'] = $this->m_model->getdosen('Kerja Praktek')->result();

		//print_r($data1);

		echo "<br>";

		//print_r($data2);

		echo "<br>";

		$data = array(
			'pembimbinglap' => 'l2', 
		);

		if ($this->m_model->caridata($data,'t_datakp')) {
			echo "data ada kok";
		}
		else{
			echo "data tydack ada";
		}

		echo "<br>";

		$thn = 1999;

		$cthn = date('Y');

		while ($thn <= $cthn) {
			echo ($thn-1).'/'.$thn.'<br>';

			$thn=$thn+1;
		}

		for ($i=0; $i < 2 ; $i++) { 
			echo ($thn-1).'/'.$thn.'<br>';

			$thn=$thn+1;
		}

		echo "<br>";

		$str4 = 'Lol';
		$str5 = ' Loal';
		$strfull = $str4.$str5;

		echo $strfull;

		echo "<br>";

		//copy('./files/pengajuanta/latest.jpg', './files/latest.jpg');
		//rename('./files/latest.jpg', './files/ichking.jpg');

		$nilai = 85;

		if ($nilai >= 90) {
			$nilai_h = "A";
		}
		elseif ($nilai >= 80 && $nilai < 90) {
			$nilai_h = "B";
		}
		elseif ($nilai >= 70 && $nilai < 80) {
			$nilai_h = "C";
		}
		elseif ($nilai >= 60 && $nilai < 70) {
			$nilai_h = "D";
		}
		else{
			$nilai_h = "E";
		}

		echo $nilai_h;
		echo "<br>";

		$semester_akhir = 1230;

		if ($semester_akhir%2) {
			echo "Ganjil";
		}
		else{
			echo "Genap";
		}

		echo "<br>";

		$cobaf = true;

		if (isset($cobaf)) {
			if ($cobaf == true) {
				echo "Assassin";
			}
			else {
				echo "Templar";
			}
		}
		else{
			echo "Sage";
		}

	}
	
}