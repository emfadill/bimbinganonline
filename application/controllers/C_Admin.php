<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Admin extends CI_Controller
{

	function __construct(){
		parent::__construct();
		if ($this->session->userdata('level')!="Admin") {
			if ($this->session->userdata('level')=="Dosen") {
				redirect('dosen');
			}
			elseif ($this->session->userdata('level')=="Prodi") {
				redirect('prodi');
			}
			else{
				redirect('login');
			}
		}

	}

	function index(){
		$data = array(
			'active_home' => 'active',
			'title' => 'Home - Admin' 
			);

		$where = array(
			'status' => 'Tunggu',
			'pass' => 'Tunggu' 
		);

		$data1['datakp'] = $this->m_model->ambil_data_stat('t_pengajuankp',$where)->result();
		$data1['datata'] = $this->m_model->ambil_data_stat('t_pengajuanta',$where)->result();
		$this->load->view('admin/v_header.php',$data);
		$this->load->view('admin/v_index',$data1);
		$this->load->view('admin/v_footer');
	}

	function tambahakun(){
		$data = array(
			'title' => 'Tambah Akun - Admin' 
			);
		$this->load->view('admin/v_header.php',$data);
		$this->load->view('admin/v_addakun');
		$this->load->view('admin/v_footer');
	}

	function tambahdosen(){
		$data = array(
			'title' => 'Tambah Dosen - Admin' 
			);
		$this->load->view('admin/v_header.php',$data);
		$this->load->view('admin/v_adddosen');
		$this->load->view('admin/v_footer');
	}

	function aformkp($id){
		$data = array(
			'title' => 'Lihat Form KP - Admin' 
			);

		$where['id'] = $id;

		$data1['datakp'] = $this->m_model->ambil_where($where,'t_pengajuankp')->result();

		$this->load->view('admin/v_header.php',$data);
		$this->load->view('admin/v_afkp',$data1);
		$this->load->view('admin/v_footer');
	}

	function aformta($id){
		$data = array(
			'title' => 'Lihat Form TA - Admin' 
			);

		$where['id'] = $id;
		$data1['datata'] = $this->m_model->ambil_where($where,'t_pengajuanta')->result();
		$this->load->view('admin/v_header.php',$data);
		$this->load->view('admin/v_afta',$data1);
		$this->load->view('admin/v_footer');
	}

	function manajemenakun(){
		$data = array(
			'active_akun' => 'active',
			'title' => 'Manajemen Akun - Admin' 
			);
		$this->load->view('admin/v_header.php',$data);
		$this->load->view('admin/v_akun');
		$this->load->view('admin/v_footer');
	}

	function datadosen(){
		$data = array(
			'active_ddosen' => 'active',
			'title' => 'Data Dosen - Admin' 
			);
		$this->load->view('admin/v_header.php',$data);
		$this->load->view('admin/v_ddosen');
		$this->load->view('admin/v_footer');
	}

	function editakun(){
		$data = array(
			'title' => 'Edit Akun - Admin' 
			);
		$this->load->view('admin/v_header.php',$data);
		$this->load->view('admin/v_editakun');
		$this->load->view('admin/v_footer');
	}

	function listpengajuankp(){
		$data = array(
			'active_list_peng' => 'active',
			'active_kp' => 'active',
			'title' => 'List Pengajuan Kerja Praktek - Admin' 
			);

		$data1['datakp'] = $this->m_model->ambil_data('t_pengajuankp')->result();

		$this->load->view('admin/v_header.php',$data);
		$this->load->view('admin/v_list_pengkp',$data1);
		$this->load->view('admin/v_footer');
	}

	function listpengajuanta(){
		$data = array(
			'active_list_peng' => 'active',
			'active_ta' => 'active',
			'title' => 'List Pengajuan Tugas Akhir - Admin' 
			);

		$data1['datata'] = $this->m_model->ambil_data('t_pengajuanta')->result();

		$this->load->view('admin/v_header.php',$data);
		$this->load->view('admin/v_list_pengta',$data1);
		$this->load->view('admin/v_footer');
	}

	function listkp(){
		$data = array(
			'active_list_takp' => 'active',
			'active_kp' => 'active',
			'title' => 'List Kerja Praktek - Admin' 
			);

		$data1['datakp'] = $this->m_model->ambil_data('t_datakp')->result();

		$this->load->view('admin/v_header.php',$data);
		$this->load->view('admin/v_list_kp',$data1);
		$this->load->view('admin/v_footer');
	}

	function listta(){
		$data = array(
			'active_list_takp' => 'active',
			'active_ta' => 'active',
			'title' => 'List Tugas Akhir - Admin' 
			);

		$data1['datata'] = $this->m_model->ambil_data('t_datata')->result();

		$this->load->view('admin/v_header.php',$data);
		$this->load->view('admin/v_list_ta',$data1);
		$this->load->view('admin/v_footer');
	}

	function setting(){
		$data = array(
			'active_setting' => 'active',
			'title' => 'Setting - Admin' 
			);
		$this->load->view('admin/v_header.php',$data);
		$this->load->view('admin/v_setting');
		$this->load->view('admin/v_footer');
	}

	function approvekp(){

		$id = $this->input->post('id');
		$pass = $this->input->post('pass');

		$where['id'] = $id;

		if ($pass == "Ya") {
			$data = array(
				'pass' => $pass, 
			);

			$this->m_model->update($where,$data,'t_pengajuankp');

			redirect('admin/listpengajuankp');			
		}
		else{

			$lampiran1 = $this->input->post('lampiran1');
			$lampiran2 = $this->input->post('lampiran2');
			$lampiran3 = $this->input->post('lampiran3');
			unlink('files/pengajuankp/'.$lampiran1);
			unlink('files/pengajuankp/'.$lampiran2);
			unlink('files/pengajuankp/'.$lampiran3);
			$this->m_model->hapus($where,'t_pengajuankp');
			$data2 = array('status' => 'Ditolak' );
			$this->m_model->update($where,$data2,'t_frontkp');	
			redirect('admin/listpengajuankp');


		}


	}

	function approveta(){

		$id = $this->input->post('id');
		$pass = $this->input->post('pass');

		$where['id'] = $id;

		if ($pass == "Ya") {
			$data = array(
				'pass' => $pass, 
			);

			$this->m_model->update($where,$data,'t_pengajuanta');

			redirect('admin/listpengajuanta');			
		}
		else{

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
			$this->m_model->hapus($where,'t_pengajuanta');
			$data2 = array('status' => 'Ditolak' );
			$this->m_model->update($where,$data2,'t_frontta');
			redirect('admin/listpengajuanta');	
		}


	}

	function hapuskp($id, $lampiran1, $lampiran2, $lampiran3){

		unlink('files/pengajuankp/'.$lampiran1);
		unlink('files/pengajuankp/'.$lampiran2);
		unlink('files/pengajuankp/'.$lampiran3);

		$where['id'] = $id;
		
		$this->m_model->hapus($where,'t_pengajuankp');

		redirect('admin/listpengajuankp');
		
		
	}

	function viewkp($id){
		$data = array(
			'title' => 'Lihat Data KP ID '.$id.' - Admin' 
			);

		$where['id_kp'] = $id;
		$data1['datakp'] = $this->m_model->ambil_where($where,'t_datakp')->result();


		$this->load->view('admin/v_header.php',$data);
		$this->load->view('admin/v_vkp',$data1);
		$this->load->view('admin/v_footer');
	}

	function editkp($id){
		$data = array(
			'title' => 'Edit Data KP ID '.$id.' - Admin' 
			);

		$where['id_kp'] = $id;
		$data['listdosen'] = $this->m_model->getdosen('Kerja Praktek')->result();
		$data1['datakp'] = $this->m_model->ambil_where($where,'t_datakp')->result();
		

		$this->load->view('admin/v_header.php',$data);
		$this->load->view('admin/v_ekp',$data1);
		$this->load->view('admin/v_footer');

	}

	function hapusdkp($id){

		$where['id_kp'] = $id;
		
		$this->m_model->hapus($where,'t_datakp');

		redirect('admin/listkp');
		
		
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
		$tahun_akademik_peng = $this->input->post('tahun_akademik_peng');
		$tahun_akademik_lulus = $this->input->post('tahun_akademik_lulus');
		$semesterh_lulus = $this->input->post('semesterh_lulus');
		$lampiran_foto_lm = $this->input->post('lampiran_foto_lm');
		$lampiran_foto =$_FILES['lampiran_foto']['name'];

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

		if ($nilai >= 90) {
			$nilai_h = "A";
		}
		elseif ($nilai >= 80 && $nilai < 90) {
			$nilai_h = "B";
		}
		elseif ($nilai >= 70 && $nilai < 80) {
			$nilai_h = "C";
		}
		elseif ($nilai >= 60 && $nilai <= 70) {
			$nilai_h = "D";
		}
		elseif ($nilai < 70 && $nilai > 0) {
			$nilai_h = "E";
		}
		elseif ($nilai == null) {
			
		}

		if ($semester_akhir%2) {
			$semesterh_lulus = "Ganjil";
		}
		elseif ($semester_akhir==null) {
			
		}
		else{
			$semesterh_lulus = "Genap";
		}

		if ($lampiran_foto!='') {
			unlink('./files/kp/'.$lampiran_foto_lm);

			$config['upload_path'] = './files/kp';
			$config['allowed_types'] = 'jpg|png';

			$this->load->library('upload',$config);
			$this->upload->do_upload('lampiran_foto');
			$file = $this->upload->data();
			$lampiran_foto = $file['file_name'];
		}else{
			$lampiran_foto = $lampiran_foto_lm;
			
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
				'perusahaan_sebelum' => $perusahaan_sebelum,
				'tahun_akademik_peng' => $tahun_akademik_peng,
				'tahun_akademik_lulus' => $tahun_akademik_lulus,
				'semesterh_lulus' => $semesterh_lulus,
				'nilaih' => $nilai_h,
				'lampiran_foto' => $lampiran_foto
			);

		$this->m_model->update($where,$data,'t_datakp');

		redirect('c_admin/viewkp/'.$id);
	}

	function viewpkp($id){
		$data = array(
			'title' => 'Lihat Data Pengajuan KP ID '.$id.' - Admin' 
			);

		$where['id'] = $id;

		$data1['datakp'] = $this->m_model->ambil_where($where,'t_pengajuankp')->result();


		$this->load->view('admin/v_header.php',$data);
		$this->load->view('admin/v_vpkp',$data1);
		$this->load->view('admin/v_footer');
	}

	function tambahkp(){
		$data = array(
			'title' => 'Tambah Data Kerja Praktek - Admin' 
			);
		$data1['listdosen'] = $this->m_model->getdosen('Kerja Praktek')->result();
		$this->load->view('admin/v_header.php',$data);
		$this->load->view('admin/v_addkp',$data1);
		$this->load->view('admin/v_footer');

	}

	function addkp(){

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
		$tahun_akademik_peng = $this->input->post('tahun_akademik_peng');
		$tahun_akademik_lulus = $this->input->post('tahun_akademik_lulus');
		$semesterh_lulus = $this->input->post('semesterh_lulus');

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
		elseif ($nilai < 70 && $nilai > 0) {
			$nilai_h = "E";
		}
		else{
			$nilai_h = null;
		}

		if ($semester_akhir%2) {
			$semesterh_lulus = "Ganjil";
		}
		else{
			$semesterh_lulus = "Genap";
		}

		$config['upload_path'] = './files/kp';
		$config['allowed_types'] = 'jpg|png';

		$this->load->library('upload',$config);
		$this->upload->do_upload('lampiran_foto');
		$file = $this->upload->data();
		$lampiran_foto = $file['file_name'];

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
				'perusahaan_sebelum' => $perusahaan_sebelum,
				'tahun_akademik_peng' => $tahun_akademik_peng,
				'tahun_akademik_lulus' => $tahun_akademik_lulus,
				'semesterh_lulus' => $semesterh_lulus,
				'nilaih' => $nilai_h,
				'lampiran_foto' => $lampiran_foto
			);

		$this->m_model->input_data($data,'t_datakp');

		redirect('admin/listkp');

	}

	function hapusta($id, $lampiran1, $lampiran2, $lampiran3, $lampiran4, $lampiran5, $lampiran6){

		unlink('files/pengajuanta/'.$lampiran1);
		unlink('files/pengajuanta/'.$lampiran2);
		unlink('files/pengajuanta/'.$lampiran3);
		unlink('files/pengajuanta/'.$lampiran4);
		unlink('files/pengajuanta/'.$lampiran5);
		unlink('files/pengajuanta/'.$lampiran6);

		$where['id'] = $id;
		
		$this->m_model->hapus($where,'t_pengajuanta');

		redirect('admin/listpengajuanta');
		
		
	}

	function viewpta($id){
		$data = array(
			'title' => 'Lihat Data Pengajuan TA ID '.$id.' - Admin' 
			);

		$where['id'] = $id;

		$data1['datata'] = $this->m_model->ambil_where($where,'t_pengajuanta')->result();


		$this->load->view('admin/v_header.php',$data);
		$this->load->view('admin/v_vpta',$data1);
		$this->load->view('admin/v_footer');
	}

	function viewta($id){
		$data = array(
			'title' => 'Lihat Data TA ID '.$id.' - Admin' 
			);

		
		$where['id_ta'] = $id;
		$data1['datata'] = $this->m_model->ambil_where($where,'t_datata')->result();


		$this->load->view('admin/v_header.php',$data);
		$this->load->view('admin/v_vta',$data1);
		$this->load->view('admin/v_footer');
	}

	function editta($id){
		$data = array(
			'title' => 'Edit Data TA ID '.$id.' - Admin' 
			);

		$where['id_ta'] = $id;
		$data['listdosen'] = $this->m_model->getdosen('Tugas Akhir')->result();
		$data1['datata'] = $this->m_model->ambil_where($where,'t_datata')->result();
		

		$this->load->view('admin/v_header.php',$data);
		$this->load->view('admin/v_eta',$data1);
		$this->load->view('admin/v_footer');

	}

	function editdta(){

		$id = $this->input->post('id_ta');
		$status = $this->input->post('status');
		$nama_mahasiswa = $this->input->post('nama_mahasiswa');
		$npm = $this->input->post('npm');
		$semester = $this->input->post('semester');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');
		$email = $this->input->post('email');
		$topik_ta = $this->input->post('topik_ta');
		$pembimbing_ta = $this->input->post('pembimbing');
		$tanggal_peng = $this->input->post('tanggal_peng');
		$tanggal_awal = $this->input->post('tanggal_awal');
		$tanggal_akhir = $this->input->post('tanggal_akhir');
		$topik_ta_sebelum = $this->input->post('topik_ta_sebelum');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_panjang = $this->input->post('tanggal_panjang');
		$batas_waktu = $this->input->post('batas_waktu');
		$ipk = $this->input->post('ipk');
		$penguji1 = $this->input->post('penguji1');
		$penguji2 = $this->input->post('penguji2');
		$tanggal_sidang = $this->input->post('tanggal_sidang');
		$tempat_sidang = $this->input->post('tempat_sidang');
		$waktu_sidang = $this->input->post('waktu_sidang');
		$keterangan = $this->input->post('keterangan');
		$tanggal_yudisium = $this->input->post('tanggal_yudisium');
		$konsentrasi = $this->input->post('konsentrasi');
		$tanggal_pra_sid = $this->input->post('tanggal_pra_sid');
		$status_pra_sid = $this->input->post('status_pra_sid');
		$waktu_pra_sid = $this->input->post('waktu_pra_sid');
		$penguji_pra_sid = $this->input->post('penguji_pra_sid');
		$tahun_akademik_peng = $this->input->post('tahun_akademik_peng');
		$tahun_akademik_lulus = $this->input->post('tahun_akademik_lulus');
		$semesterh_lulus = $this->input->post('semesterh_lulus');
		$lampiran_foto_lm = $this->input->post('lampiran_foto_lm');
		$lampiran_foto =$_FILES['lampiran_foto']['name'];

		$pemb = explode("|", $pembimbing_ta);

		$nid = $pemb[0];
		$pembimbing = $pemb[1];

		$where['id_ta'] = $id;

		if ($tanggal_panjang == null) {
			$tanggal_panjang = null;
		}

		if ($tanggal_sidang == null) {
			$tanggal_sidang = null;
		}

		if ($tanggal_yudisium == null) {
			$tanggal_yudisium = null;
		}

		if ($tanggal_pra_sid == null) {
			$tanggal_pra_sid = null;
		}

		if ($batas_waktu == null) {
			$batas_waktu = null;
		}

		if ($ipk == null) {
			$ipk = null;
		}

		if ($lampiran_foto!='') {
			unlink('./files/ta/'.$lampiran_foto_lm);

			$config['upload_path'] = './files/ta';
			$config['allowed_types'] = 'jpg|png';

			$this->load->library('upload',$config);
			$this->upload->do_upload('lampiran_foto');
			$file = $this->upload->data();
			$lampiran_foto = $file['file_name'];
		}else{
			$lampiran_foto = $lampiran_foto_lm;
			
		}
		

		$data = array(
				'nama_mahasiswa' => $nama_mahasiswa, 
				'npm' => $npm,
				'semester' => $semester,
				'alamat' => $alamat,
				'telepon' => $telepon,
				'email' => $email,
				'topik_ta' => $topik_ta,
				'nid' => $nid,
				'pembimbing_ta' => $pembimbing,
				'tanggal_peng' => $tanggal_peng,
				'tanggal_awal' => $tanggal_awal,
				'tanggal_akhir' => $tanggal_akhir,
				'status' => $status,
				'topik_ta_sebelum' => $topik_ta_sebelum,
				'tanggal_lahir' => $tanggal_lahir,
				'tempat_lahir' => $tempat_lahir,
				'tanggal_panjang' => $tanggal_panjang,
				'batas_waktu' => $batas_waktu,
				'ipk' => $ipk,
				'penguji1' => $penguji1,
				'penguji2' => $penguji2,
				'tanggal_sidang' => $tanggal_sidang,
				'waktu_sidang' => $waktu_sidang,
				'tempat_sidang' => $tempat_sidang,
				'keterangan' => $keterangan,
				'tanggal_yudisium' => $tanggal_yudisium,
				'konsentrasi' => $konsentrasi,
				'tanggal_pra_sid' => $tanggal_pra_sid,
				'status_pra_sid' => $status_pra_sid,
				'waktu_pra_sid' => $waktu_pra_sid,
				'penguji_pra_sid' => $penguji_pra_sid,
				'tahun_akademik_peng' => $tahun_akademik_peng,
				'tahun_akademik_lulus' => $tahun_akademik_lulus,
				'semesterh_lulus' => $semesterh_lulus,
				'lampiran_foto' => $lampiran_foto

			);

		$this->m_model->update($where,$data,'t_datata');

		redirect('c_admin/viewta/'.$id);
	}

	function tambahta(){
		$data = array(
			'title' => 'Tambah Data Tugas Akhir - Admin' 
			);
		$data1['listdosen'] = $this->m_model->getdosen('Tugas Akhir')->result();
		$this->load->view('admin/v_header.php',$data);
		$this->load->view('admin/v_addta',$data1);
		$this->load->view('admin/v_footer');

	}

	function addta(){

		$status = $this->input->post('status');
		$nama_mahasiswa = $this->input->post('nama_mahasiswa');
		$npm = $this->input->post('npm');
		$semester = $this->input->post('semester');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');
		$email = $this->input->post('email');
		$topik_ta = $this->input->post('topik_ta');
		$pembimbing_ta = $this->input->post('pembimbing');
		$tanggal_peng = $this->input->post('tanggal_peng');
		$tanggal_awal = $this->input->post('tanggal_awal');
		$tanggal_akhir = $this->input->post('tanggal_akhir');
		$topik_ta_sebelum = $this->input->post('topik_ta_sebelum');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_panjang = $this->input->post('tanggal_panjang');
		$batas_waktu = $this->input->post('batas_waktu');
		$ipk = $this->input->post('ipk');
		$penguji1 = $this->input->post('penguji1');
		$penguji2 = $this->input->post('penguji2');
		$tanggal_sidang = $this->input->post('tanggal_sidang');
		$tempat_sidang = $this->input->post('tempat_sidang');
		$waktu_sidang = $this->input->post('waktu_sidang');
		$keterangan = $this->input->post('keterangan');
		$tanggal_yudisium = $this->input->post('tanggal_yudisium');
		$konsentrasi = $this->input->post('konsentrasi');
		$tanggal_pra_sid = $this->input->post('tanggal_pra_sid');
		$status_pra_sid = $this->input->post('status_pra_sid');
		$waktu_pra_sid = $this->input->post('waktu_pra_sid');
		$penguji_pra_sid = $this->input->post('penguji_pra_sid');
		$tahun_akademik_peng = $this->input->post('tahun_akademik_peng');
		$tahun_akademik_lulus = $this->input->post('tahun_akademik_lulus');
		$semesterh_lulus = $this->input->post('semesterh_lulus');


		$pemb = explode("|", $pembimbing_ta);

		$nid = $pemb[0];
		$pembimbing = $pemb[1];

		$where['id_ta'] = $id;

		if ($tanggal_panjang == null) {
			$tanggal_panjang = null;
		}

		if ($tanggal_sidang == null) {
			$tanggal_sidang = null;
		}

		if ($tanggal_yudisium == null) {
			$tanggal_yudisium = null;
		}

		if ($tanggal_pra_sid == null) {
			$tanggal_pra_sid = null;
		}

		if ($batas_waktu == null) {
			$batas_waktu = null;
		}

		if ($ipk == null) {
			$ipk = null;
		}

		$config['upload_path'] = './files/ta';
		$config['allowed_types'] = 'jpg|png';

		$this->load->library('upload',$config);
		$this->upload->do_upload('lampiran_foto');
		$file = $this->upload->data();
		$lampiran_foto = $file['file_name'];

		$data = array(
				'nama_mahasiswa' => $nama_mahasiswa, 
				'npm' => $npm,
				'semester' => $semester,
				'alamat' => $alamat,
				'telepon' => $telepon,
				'email' => $email,
				'topik_ta' => $topik_ta,
				'nid' => $nid,
				'pembimbing_ta' => $pembimbing,
				'tanggal_peng' => $tanggal_peng,
				'tanggal_awal' => $tanggal_awal,
				'tanggal_akhir' => $tanggal_akhir,
				'status' => $status,
				'topik_ta_sebelum' => $topik_ta_sebelum,
				'tanggal_lahir' => $tanggal_lahir,
				'tempat_lahir' => $tempat_lahir,
				'tanggal_panjang' => $tanggal_panjang,
				'batas_waktu' => $batas_waktu,
				'ipk' => $ipk,
				'penguji1' => $penguji1,
				'penguji2' => $penguji2,
				'tanggal_sidang' => $tanggal_sidang,
				'waktu_sidang' => $waktu_sidang,
				'tempat_sidang' => $tempat_sidang,
				'keterangan' => $keterangan,
				'tanggal_yudisium' => $tanggal_yudisium,
				'konsentrasi' => $konsentrasi,
				'tanggal_pra_sid' => $tanggal_pra_sid,
				'status_pra_sid' => $status_pra_sid,
				'waktu_pra_sid' => $waktu_pra_sid,
				'penguji_pra_sid' => $penguji_pra_sid,
				'tahun_akademik_peng' => $tahun_akademik_peng,
				'tahun_akademik_lulus' => $tahun_akademik_lulus,
				'semesterh_lulus' => $semesterh_lulus,
				'lampiran_foto' => $lampiran_foto
			);

		$this->m_model->input_data($data,'t_datata');

		redirect('admin/listta');

	}

}