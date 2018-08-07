<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Prodi extends CI_Controller
{

	function __construct(){
		parent::__construct();

		if ($this->session->userdata('level')!="Prodi") {
			if ($this->session->userdata('level')=="Dosen") {
				redirect('dosen');
			}
			elseif ($this->session->userdata('level')=="Admin") {
				redirect('admin');
			}
			else{
				redirect('login');
			}
		}
	}

	function index(){
		$data = array(
			'active_home' => 'active',
			'title' => 'Home - Prodi' 
			);

		$where = array(
			'status' => 'Tunggu',
			'pass' => 'Ya' 
		);

		$data1['datakp'] = $this->m_model->ambil_data_stat('t_pengajuankp',$where)->result();
		$data1['datata'] = $this->m_model->ambil_data_stat('t_pengajuanta',$where)->result();
		$this->load->view('prodi/v_header.php',$data);
		$this->load->view('prodi/v_index',$data1);
		$this->load->view('prodi/v_footer');
	}


	function aformkp($id){
		$data = array(
			'title' => 'Lihat Form KP - Prodi' 
			);

		$where['id'] = $id;

		$data1['datakp'] = $this->m_model->ambil_where($where,'t_pengajuankp')->result();
		$data1['listdosen'] = $this->m_model->getdosen('Kerja Praktek')->result();

		$this->load->view('prodi/v_header.php',$data);
		$this->load->view('prodi/v_afkp',$data1);
		$this->load->view('prodi/v_footer');
	}

	function aformta($id){
		$data = array(
			'title' => 'Lihat Form TA - Prodi' 
			);

		$where['id'] = $id;
		$data1['datata'] = $this->m_model->ambil_where($where,'t_pengajuanta')->result();
		$data1['listdosen'] = $this->m_model->getdosen('Tugas Akhir')->result();
		$this->load->view('prodi/v_header.php',$data);
		$this->load->view('prodi/v_afta',$data1);
		$this->load->view('prodi/v_footer');
	}


	function datadosen(){
		$data = array(
			'active_ddosen' => 'active',
			'title' => 'Data Dosen - Prodi' 
			);
		$this->load->view('prodi/v_header.php',$data);
		$this->load->view('prodi/v_ddosen');
		$this->load->view('prodi/v_footer');
	}

	function listpengajuankp(){
		$data = array(
			'active_list_peng' => 'active',
			'active_kp' => 'active',
			'title' => 'List Pengajuan Kerja Praktek - Admin' 
			);

		$where = array(
			'pass' => 'Ya',
			'status' => 'Tunggu'
		);

		$data1['datakp'] = $this->m_model->ambil_where($where,'t_pengajuankp')->result();

		$this->load->view('prodi/v_header.php',$data);
		$this->load->view('prodi/v_list_pengkp',$data1);
		$this->load->view('prodi/v_footer');
	}

	function listpengajuanta(){
		$data = array(
			'active_list_peng' => 'active',
			'active_ta' => 'active',
			'title' => 'List Pengajuan Tugas Akhir - Prodi' 
			);

		$where = array(
			'pass' => 'Ya' 
		);

		$data1['datata'] = $this->m_model->ambil_where($where,'t_pengajuanta')->result();

		$this->load->view('prodi/v_header.php',$data);
		$this->load->view('prodi/v_list_pengta',$data1);
		$this->load->view('prodi/v_footer');
	}

	function listkp(){
		$data = array(
			'active_list_takp' => 'active',
			'active_kp' => 'active',
			'title' => 'List Kerja Praktek - Prodi' 
			);

		$data1['datakp'] = $this->m_model->ambil_data('t_datakp')->result();

		$this->load->view('prodi/v_header.php',$data);
		$this->load->view('prodi/v_list_kp',$data1);
		$this->load->view('prodi/v_footer');
	}

	function listta(){
		$data = array(
			'active_list_takp' => 'active',
			'active_ta' => 'active',
			'title' => 'List Tugas Akhir - Prodi' 
			);

		$data1['datata'] = $this->m_model->ambil_data('t_datata')->result();

		$this->load->view('prodi/v_header.php',$data);
		$this->load->view('prodi/v_list_ta',$data1);
		$this->load->view('prodi/v_footer');
	}

	function setting(){
		$data = array(
			'active_setting' => 'active',
			'title' => 'Setting - Prodi' 
			);
		$this->load->view('prodi/v_header.php',$data);
		$this->load->view('prodi/v_setting');
		$this->load->view('prodi/v_footer');
	}

	function approvekp(){

		$id = $this->input->post('id');
		$status = $this->input->post('status');

		

		if ($status == "Diterima") {
			

			$data = array(
						'status' => $status, 
					);

			$where['id'] = $id;

			$this->m_model->update($where,$data,'t_pengajuankp');

			$nama_mahasiswa = $this->input->post('nama_mahasiswa');
			$npm = $this->input->post('npm');
			$semester = $this->input->post('semester');
			$alamat = $this->input->post('alamat');
			$telepon = $this->input->post('telepon');
			$email = $this->input->post('email');
			$topik_kp = $this->input->post('topik_kp');
			$pembimbing_kp = $this->input->post('pembimbing');
			$tanggal_peng = $this->input->post('tanggal_peng');
			$nama_perusahaan = $this->input->post('nama_perusahaan');
			$alamat_perusahaan = $this->input->post('alamat_perusahaan');
			$pembimbinglap = $this->input->post('pembimbinglap');
			$tahun_akademik_peng = $this->input->post('tahun_akademik_peng');
			$lampiran3 = $this->input->post('lampiran3');

			if ($pembimbing_kp == "Dosen Lain") {
				$pembimbing_kp = $this->input->post('pembimbing_alt');
			}

			$pemb = explode("|", $pembimbing_kp);

			$nid = $pemb[0];
			$pembimbing = $pemb[1];

			copy('./files/pengajuankp/'.$lampiran3, './files/kp/'.$lampiran3);
			 

			if (date('m')<= 7 || date('m')>=1) {
				$tanggal_awal = date('Y')."-02-10";
				$tanggal_akhir = date('Y')."-08-10";
			}
			else{
				$tanggal_awal = date('Y')."-08-10";
				$tanggal_akhir = (date('Y')+1)."-02-10";
			}

			$data1 = array(
				'nama_mahasiswa' => $nama_mahasiswa, 
				'npm' => $npm,
				'semester' => $semester,
				'alamat' => $alamat,
				'telepon' => $telepon,
				'email' => $email,
				'topik_kp' => $topik_kp,
				'nid' => $nid,
				'pembimbing_kp' => $pembimbing,
				'nama_perusahaan' => $nama_perusahaan,
				'alamat_perusahaan' => $alamat_perusahaan,
				'pembimbinglap' => $pembimbinglap,
				'tanggal_peng' => $tanggal_peng,
				'tanggal_awal' => $tanggal_awal,
				'tanggal_akhir' => $tanggal_akhir,
				'status' => "Dalam Bimbingan",
				'tahun_akademik_peng' => $tahun_akademik_peng,
				'lampiran_foto' => $lampiran3
			);

			$this->m_model->input_data($data1,'t_datakp');
			$data2 = array('status' => 'Diterima' );
			$this->m_model->update($where,$data2,'t_frontkp');
			redirect('prodi/listkp');
		}else{

			$lampiran1 = $this->input->post('lampiran1');
			$lampiran2 = $this->input->post('lampiran2');
			$lampiran3 = $this->input->post('lampiran3');
			unlink('files/pengajuankp/'.$lampiran1);
			unlink('files/pengajuankp/'.$lampiran2);
			unlink('files/pengajuankp/'.$lampiran3);

			$where['id'] = $id;
			
			$this->m_model->hapus($where,'t_pengajuankp');
			$data2 = array('status' => 'Ditolak' );
			$this->m_model->update($where,$data2,'t_frontkp');

			redirect('prodi/listpengajuankp');
		}
	}

	function approveta(){

		$id = $this->input->post('id');
		$status = $this->input->post('status');

		$data = array(
			'status' => $status, 
		);

		$where['id'] = $id;

		$this->m_model->update($where,$data,'t_pengajuanta');

		if ($status == "Diterima") {
			

			$nama_mahasiswa = $this->input->post('nama_mahasiswa');
			$npm = $this->input->post('npm');
			$semester = $this->input->post('semester');
			$alamat = $this->input->post('alamat');
			$telepon = $this->input->post('telepon');
			$email = $this->input->post('email');
			$topik_ta = $this->input->post('topik_ta');
			$pembimbing_ta = $this->input->post('pembimbing');
			$tanggal_peng = $this->input->post('tanggal_peng');
			$tempat_lahir = $this->input->post('tempat_lahir');
			$tanggal_lahir = $this->input->post('tanggal_lahir');
			$konsentrasi = $this->input->post('konsentrasi');
			$tahun_akademik_peng = $this->input->post('tahun_akademik_peng');
			$lampiran6 = $this->input->post('lampiran6');

			if ($pembimbing_ta == "Dosen Lain") {
				$pembimbing_ta = $this->input->post('pembimbing_alt');
			}

			$pemb = explode("|", $pembimbing_ta);

			$nid = $pemb[0];
			$pembimbing = $pemb[1];

			copy('./files/pengajuanta/'.$lampiran6, './files/ta/'.$lampiran6);
			 

			if (date('m')<= 7 || date('m')>=1) {
				$tanggal_awal = date('Y')."-02-10";
				$tanggal_akhir = date('Y')."-08-10";
			}
			else{
				$tanggal_awal = date('Y')."-08-10";
				$tanggal_akhir = (date('Y')+1)."-02-10";
			}

			$data1 = array(
				'nama_mahasiswa' => $nama_mahasiswa, 
				'npm' => $npm,
				'semester' => $semester,
				'alamat' => $alamat,
				'telepon' => $telepon,
				'email' => $email,
				'topik_ta' => $topik_ta,
				'nid' => $nid,
				'pembimbing_ta' => $pembimbing,
				'tanggal_lahir' => $tanggal_lahir,
				'tempat_lahir' => $tempat_lahir,
				'konsentrasi' => $konsentrasi,
				'tanggal_peng' => $tanggal_peng,
				'tanggal_awal' => $tanggal_awal,
				'tanggal_akhir' => $tanggal_akhir,
				'status' => "Dalam Bimbingan",
				'tahun_akademik_peng' => $tahun_akademik_peng,
				'lampiran_foto' => $lampiran6
			);
			$data2 = array('status' => 'Diterima' );
			$this->m_model->update($where,$data2,'t_frontta');
			$this->m_model->input_data($data1,'t_datata');

			redirect('prodi/listta');
		}else{
			$lampiran1 = $this->input->post('lampiran1');
			$lampiran2 = $this->input->post('lampiran2');
			$lampiran3 = $this->input->post('lampiran3');
			$lampiran4 = $this->input->post('lampiran4');
			$lampiran5 = $this->input->post('lampiran5');
			$lampiran6 = $this->input->post('lampiran6');
			unlink('files/pengajuankp/'.$lampiran1);
			unlink('files/pengajuankp/'.$lampiran2);
			unlink('files/pengajuankp/'.$lampiran3);
			unlink('files/pengajuankp/'.$lampiran4);
			unlink('files/pengajuankp/'.$lampiran5);
			unlink('files/pengajuankp/'.$lampiran6);

			$where['id'] = $id;
			$this->m_model->hapus($where,'t_pengajuanta');

			$data2 = array('status' => 'Ditolak' );
			$this->m_model->update($where,$data2,'t_frontta');
			redirect('prodi/listpengajuanta');
		}
	}

	function hapuskp($id, $lampiran1, $lampiran2){

		unlink('files/pengajuankp/'.$lampiran1);
		unlink('files/pengajuankp/'.$lampiran2);

		$where['id'] = $id;
		
		$this->m_model->hapus($where,'t_pengajuankp');

		redirect('prodi/listpengajuankp');
	}

	function viewkp($id){
		$data = array(
			'title' => 'Lihat Data KP ID '.$id.' - Prodi' 
			);

		$where['id_kp'] = $id;
		$data1['datakp'] = $this->m_model->ambil_where($where,'t_datakp')->result();


		$this->load->view('prodi/v_header.php',$data);
		$this->load->view('prodi/v_vkp',$data1);
		$this->load->view('prodi/v_footer');
	}

	function hapusdkp($id){

		$where['id_kp'] = $id;
		
		$this->m_model->hapus($where,'t_datakp');

		redirect('prodi/listkp');
	}

	function editdkp(){

		$id = $this->input->post('id_kp');
		$status = $this->input->post('status');
		$nama_mahasiswa = $this->input->post('nama_mahasiswa');
		$npm = $this->input->post('npm');
		$semester = $this->input->post('semester');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');
		$email = $this->input->post('email');
		$topik_kp = $this->input->post('topik_kp');
		$pembimbing_kp = $this->input->post('pembimbing');
		$tanggal_peng = $this->input->post('tanggal_peng');
		$nama_perusahaan = $this->input->post('nama_perusahaan');
		$alamat_perusahaan = $this->input->post('alamat_perusahaan');
		$pembimbinglap = $this->input->post('pembimbinglap');
		$tanggal_awal = $this->input->post('tanggal_awal');
		$tanggal_akhir = $this->input->post('tanggal_akhir');
		$tanggal_laporan = $this->input->post('tanggal_laporan');
		$semester_akhir = $this->input->post('semester_akhir');
		$status_selesai = $this->input->post('status_selesai');
		$topik_kp_sebelum = $this->input->post('topik_kp_sebelum');
		$perusahaan_sebelum = $this->input->post('perusahaan_sebelum');
		$nilai = $this->input->post('nilai');

		$pemb = explode("|", $pembimbing_kp);

		$nid = $pemb[0];
		$pembimbing = $pemb[1];

		$where['id_kp'] = $id;

		if ($tanggal_laporan == null) {
			$tanggal_laporan = null;
		}

		if ($semester_akhir == null) {
			$semester_akhir = null;
		}

		if ($nilai == null) {
			$nilai = null;
		}

		$data = array(
				'nama_mahasiswa' => $nama_mahasiswa, 
				'npm' => $npm,
				'semester' => $semester,
				'alamat' => $alamat,
				'telepon' => $telepon,
				'email' => $email,
				'topik_kp' => $topik_kp,
				'nid' => $nid,
				'pembimbing_kp' => $pembimbing,
				'nama_perusahaan' => $nama_perusahaan,
				'alamat_perusahaan' => $alamat_perusahaan,
				'pembimbinglap' => $pembimbinglap,
				'tanggal_peng' => $tanggal_peng,
				'tanggal_awal' => $tanggal_awal,
				'tanggal_akhir' => $tanggal_akhir,
				'status' => $status,
				'status_selesai' => $status_selesai,
				'tanggal_laporan' => $tanggal_laporan,
				'semester_akhir' => $semester_akhir,
				'nilai' => $nilai,
				'topik_kp_sebelum' => $topik_kp_sebelum,
				'perusahaan_sebelum' => $perusahaan_sebelum
			);

		$this->m_model->update($where,$data,'t_datakp');

		redirect('c_prodi/viewkp/'.$id);
	}

	function viewpkp($id){
		$data = array(
			'title' => 'Lihat Data Pengajuan KP ID '.$id.' - Prodi' 
			);

		$where['id'] = $id;

		$data1['datakp'] = $this->m_model->ambil_where($where,'t_pengajuankp')->result();


		$this->load->view('prodi/v_header.php',$data);
		$this->load->view('prodi/v_vpkp',$data1);
		$this->load->view('prodi/v_footer');
	}

	function tambahkp(){
		$data = array(
			'title' => 'Tambah Data Kerja Praktek - Prodi' 
			);
		$data1['listdosen'] = $this->m_model->getdosen('Kerja Praktek')->result();
		$this->load->view('prodi/v_header.php',$data);
		$this->load->view('prodi/v_addkp',$data1);
		$this->load->view('prodi/v_footer');
	}

	function hapusta($id, $lampiran1, $lampiran2, $lampiran3, $lampiran4, $lampiran5){

		unlink('files/pengajuanta/'.$lampiran1);
		unlink('files/pengajuanta/'.$lampiran2);
		unlink('files/pengajuanta/'.$lampiran3);
		unlink('files/pengajuanta/'.$lampiran4);
		unlink('files/pengajuanta/'.$lampiran5);

		$where['id'] = $id;
		
		$this->m_model->hapus($where,'t_pengajuanta');

		redirect('prodi/listpengajuanta');
	}

	function viewpta($id){
		$data = array(
			'title' => 'Lihat Data Pengajuan TA ID '.$id.' - Prodi' 
			);

		$where['id'] = $id;

		$data1['datata'] = $this->m_model->ambil_where($where,'t_pengajuanta')->result();


		$this->load->view('prodi/v_header.php',$data);
		$this->load->view('prodi/v_vpta',$data1);
		$this->load->view('prodi/v_footer');
	}

	function viewta($id){
		$data = array(
			'title' => 'Lihat Data TA ID '.$id.' - Prodi' 
			);

		
		$where['id_ta'] = $id;
		$data1['datata'] = $this->m_model->ambil_where($where,'t_datata')->result();


		$this->load->view('prodi/v_header.php',$data);
		$this->load->view('prodi/v_vta',$data1);
		$this->load->view('prodi/v_footer');
	}


}