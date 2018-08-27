<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Kalab extends CI_Controller
{

	function __construct(){
		parent::__construct();

		if ($this->session->userdata('level')!="Kalab") {
			if ($this->session->userdata('level')=="Dosen") {
				redirect('dosen');
			}
			elseif ($this->session->userdata('level')=="Mhs") {
				redirect('mhs');
			}
			else{
				redirect('login');
			}
		}
	}

	function index(){
		$data = array(
			'active_home' => 'active',
			'title' => 'Home - Kalab' 
			);

		$where = array(
			'status' => 'Tunggu',
		);

		$where_r = array(
			'status' => 'Revisi',
		);

		$where_dt = array(
			'status' => 'Diterima',
		);

		$data1['hitungpta1'] = $this->m_model->hitung($where,'t_pengajuanproposal');
		$data1['hitungptan2'] = $this->m_model->hitung_all('t_datata') - $data1['hitungpta1'];
		$data1['hitungpta2'] = $this->m_model->hitung($where_r,'t_pengajuanproposal');
		$data1['hitungpta3'] = $this->m_model->hitung($where_dt,'t_pengajuanproposal');
		$data1['datata'] = $this->m_model->ambil_data_stat('t_pengajuanproposal',$where)->result();
		$this->load->view('kalab/v_header.php',$data);
		$this->load->view('kalab/v_index',$data1);
		$this->load->view('kalab/v_footer');
	}


	function aformta($id){
		$data = array(
			'title' => 'Lihat Form Proposal TA - Kalab' 
			);

		$where['id'] = $id;
		$data1['datata'] = $this->m_model->ambil_where($where,'t_pengajuanproposal')->result();
		$data1['listdosen'] = $this->m_model->getdosen('Tugas Akhir')->result();
		$this->load->view('kalab/v_header.php',$data);
		$this->load->view('kalab/v_afta',$data1);
		$this->load->view('kalab/v_footer');
	}

	function reviewta($id){
		$data = array(
			'title' => 'Form Review Proposal TA - Kalab' 
			);

		$where['id'] = $id;
		$data1['datata'] = $this->m_model->ambil_where($where,'t_pengajuanproposal')->result();
		$this->load->view('kalab/v_header.php',$data);
		$this->load->view('kalab/v_review',$data1);
		$this->load->view('kalab/v_footer');
	}


	function datadosen(){
		$data = array(
			'active_ddosen' => 'active',
			'title' => 'Data Dosen - Kalab' 
			);

		$data1['datadosen'] = $this->m_model->ambil_data('t_dosen')->result();

		$this->load->view('kalab/v_header.php',$data);
		$this->load->view('kalab/v_ddosen',$data1);
		$this->load->view('kalab/v_footer');
	}

	function listpengajuanproposal(){
		$data = array(
			'active_list_peng' => 'active',
			'title' => 'List Pengajuan Proposal Tugas Akhir - Kalab' 
			);
		$where_t = array(
			'status' => 'Tunggu',
			
		);
		$where_r = array(
			'status' => 'Revisi',
			
		);
		$where_dt = array(
			'status' => 'Diterima',
			
		);


		$data1['datata'] = $this->m_model->ambil_where($where_t,'t_pengajuanproposal')->result();
		$data1['datata_r'] = $this->m_model->ambil_where($where_r,'t_pengajuanproposal')->result();
		$data1['datata_dt'] = $this->m_model->ambil_where($where_dt,'t_pengajuanproposal')->result();
		$data1['tahun'] = $this->m_model->ambil_thn_akademik()->result();
		$this->load->view('kalab/v_header.php',$data);
		$this->load->view('kalab/v_list_pengproposal',$data1);
		$this->load->view('kalab/v_footer');
	}


	function listta(){
		$data = array(
			'active_ta' => 'active',
			'title' => 'List Tugas Akhir - Kalab' 
			);

		$data1['datata'] = $this->m_model->ambil_data('t_datata')->result();

		$this->load->view('kalab/v_header.php',$data);
		$this->load->view('kalab/v_list_ta',$data1);
		$this->load->view('kalab/v_footer');
	}

	function setting(){
		$data = array(
			'active_setting' => 'active',
			'title' => 'Setting - Kalab' 
			);
		$this->load->view('kalab/v_header.php',$data);
		$this->load->view('kalab/v_setting');
		$this->load->view('kalab/v_footer');
	}

	function editakun($id){
		$data = array(
			'title' => 'Edit Akun - Kalab' 
			);
		$where['id'] = $id;
		$data1['datauser'] = $this->m_model->ambil_where($where,'t_user')->result();
		$data1['listdosen'] = $this->m_model->ambil_data('t_dosen')->result();
		$this->load->view('kalab/v_header.php',$data);
		$this->load->view('kalab/v_editakun',$data1);
		$this->load->view('kalab/v_footer');
	}

	function approveta(){

		$id = $this->input->post('id');
		$status = $this->input->post('status');

		$data = array(
			'status' => $status, 
		);

		$where['id'] = $id;

		$this->m_model->update($where,$data,'t_pengajuanproposal');

		if ($status == "Revisi") {
			

		$nama_mahasiswa = $this->input->post('nama_mahasiswa');
		$npm = $this->input->post('npm');
		$semester = $this->input->post('semester');
		$konsentrasi = $this->input->post('konsentrasi');
		$topik_ta = $this->input->post('topik_ta');
		$latar_belakang = $this->input->post('latar_belakang');
		$r_latar = $this->input->post('r_latar');
		$rumusan_masalah = $this->input->post('rumusan_masalah');
		$r_rumusan = $this->input->post('r_rumusan');
		$tujuan = $this->input->post('tujuan');
		$r_tujuan = $this->input->post('r_tujuan');
		$batasan_masalah = $this->input->post('batasan_masalah');
		$r_batasan = $this->input->post('r_batasan');
		$metodologi_penelitian = $this->input->post('metodologi_penelitian');
		$r_metodologi = $this->input->post('r_metodologi');
		$r_landasan = $this->input->post('r_landasan');

		

		$dsn = explode("|", $dosen);

			$nid = $dsn[0];
			$dosen = $dsn[1];


			$data1 = array(
				'nama_mahasiswa' => $nama_mahasiswa, 
				'npm' => $npm,
				'konsentrasi' => $konsentrasi,
				'topik_ta' => $topik_ta,
				'latar_belakang' => $latar_belakang,
				'r_latar' => $r_latar,
				'rumusan_masalah' => $rumusan_masalah,
				'r_rumusan' => $r_rumusan,
				'tujuan' => $tujuan,
				'r_tujuan' => $r_tujuan,
				'batasan_masalah' => $batasan_masalah,
				'r_batasan' => $r_batasan,
				'metodologi_penelitian' => $metodologi_penelitian,
				'r_metodologi' => $r_metodologi,
				'r_landasan' => $r_landasan,
				'status' => 'Revisi',
				'nid' => $nid,
				'dosen' => $dosen,
			);
			//$data2 = array('status' => 'Diterima' );
			$this->m_model->update($where,$data1,'t_pengajuanproposal');

			redirect('kalab/listpengajuanproposal');
		}
		else if ($status == "Diterima") {
			$nama_mahasiswa = $this->input->post('nama_mahasiswa');
		$npm = $this->input->post('npm');
		$semester = $this->input->post('semester');
		$konsentrasi = $this->input->post('konsentrasi');
		$topik_ta = $this->input->post('topik_ta');
		$latar_belakang = $this->input->post('latar_belakang');
		$r_latar = $this->input->post('r_latar');
		$rumusan_masalah = $this->input->post('rumusan_masalah');
		$r_rumusan = $this->input->post('r_rumusan');
		$tujuan = $this->input->post('tujuan');
		$r_tujuan = $this->input->post('r_tujuan');
		$batasan_masalah = $this->input->post('batasan_masalah');
		$r_batasan = $this->input->post('r_batasan');
		$metodologi_penelitian = $this->input->post('metodologi_penelitian');
		$r_metodologi = $this->input->post('r_metodologi');
		$tahun_akademik_diterima = $this->input->post('tahun_akademik_diterima');
		$semester_diterima = $this->input->post('semester_diterima');
		

		$dsn = explode("|", $dosen);

			$nid = $dsn[0];
			$dosen = $dsn[1];


			$data1 = array(
				'nama_mahasiswa' => $nama_mahasiswa, 
				'npm' => $npm,
				'konsentrasi' => $konsentrasi,
				'topik_ta' => $topik_ta,
				'latar_belakang' => $latar_belakang,
				'r_latar' => $r_latar,
				'rumusan_masalah' => $rumusan_masalah,
				'r_rumusan' => $r_rumusan,
				'tujuan' => $tujuan,
				'r_tujuan' => $r_tujuan,
				'batasan_masalah' => $batasan_masalah,
				'r_batasan' => $r_batasan,
				'metodologi_penelitian' => $metodologi_penelitian,
				'r_metodologi' => $r_metodologi,
				'tahun_akademik_diterima' => $tahun_akademik_diterima,
				'semester_diterima' => $semester_diterima,
				'nid' => $nid,
				'dosen' => $dosen,
			);
			$data2 = array('status' => 'Diterima',
			'tahun_akademik_diterima' => $tahun_akademik_diterima,
				'semester_diterima' => $semester_diterima );
			$this->m_model->update($where,$data2,'t_pengajuanproposal');

			redirect('kalab/listpengajuanproposal');
		} else{

			$where['id'] = $id;

			$dosen = $this->input->post('dosen');

			$dsn = explode("|", $dosen);
				$nid = $dsn[0];
				$dosen = $dsn[1];

			$data2 = array(
				'status' => 'Tunggu',
				'nid' => $nid,
				'dosen' => $dosen );
			$this->m_model->update($where,$data2,'t_pengajuanproposal');
			redirect('kalab/listpengajuanproposal');
		}
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
			'title' => 'Lihat Data Pengajuan Proposal TA ID '.$id.' - KaLab' 
			);

		$where['id'] = $id;

		$data1['datata'] = $this->m_model->ambil_where($where,'t_pengajuanproposal')->result();


		$this->load->view('kalab/v_header.php',$data);
		$this->load->view('kalab/v_vpta',$data1);
		$this->load->view('kalab/v_footer');
	}


	function editdosen($id){
		$data = array(
			'title' => 'Edit Dosen - Kalab' 
			);
		$where['id_dosen'] = $id;
		$data1['datadosen'] = $this->m_model->ambil_where($where,'t_dosen')->result();
		$this->load->view('kalab/v_header.php',$data);
		$this->load->view('kalab/v_editdosen',$data1);
		$this->load->view('kalab/v_footer');
	}

	function edit_user(){
		$id = $this->input->post('id');
		$nama_user = $this->input->post('nama_user');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');
		$konsentrasi = $this->input->post('konsentrasi');
		$dosen = $this->input->post('dosen');
		$foto_lm = $this->input->post('foto_lm');
		$foto = $_FILES['foto']['name'];

		if ($foto!='') {
			unlink('./files/user/'.$foto_lm);

			$config['upload_path'] = './files/user';
			$config['allowed_types'] = 'jpg|png';

			$this->load->library('upload',$config);
			$this->upload->do_upload('foto');
			$file = $this->upload->data();
			$foto = $file['file_name'];
		}else{
			$foto = $foto_lm;
			
		}

		$where['id'] = $id;

		if ($level=="Dosen") {
			$dsn = explode("|", $dosen);
			$nid = $dsn[0];
			$nama_user = $dsn[1];
			$jenis_bimbingan = $dsn[2];

			$data = array(
				'nama_user' => $nama_user,
				'username' => $username,
				'password' => md5($password),
				'level' => $level,
				'jenis_bimbingan' => $jenis_bimbingan,
				'nid' => $nid,
				'konsentrasi' => $konsentrasi,
				'foto' => $foto 
			);
			$this->m_model->update($where,$data,'t_user');
		}else{
			$data = array(
				'nama_user' => $nama_user,
				'username' => $username,
				'password' => md5($password),
				'level' => $level,
				'foto' => $foto 
			);
			$this->m_model->update($where,$data,'t_user');
		}

		redirect('kalab/manajemenakun');

	}

	function setting_akun(){
		$passwordlama = $this->input->post('passwordlama');
		$passwordbaru = $this->input->post('passwordbaru');
		$confirmpasswordbaru = $this->input->post('confirmpasswordbaru');
		$password_lm = $this->input->post('password_lm');
		$foto = $_FILES['foto']['name'];
		$foto_lm = $this->input->post('foto_lm');
		$id = $this->input->post('id');

		if ($passwordbaru!=''||$passwordlama!=''||$confirmpasswordbaru!='') {
			if ($password_lm==md5($passwordlama)) {
				if ($passwordbaru==$confirmpasswordbaru) {
					$data2['password'] = md5($passwordbaru);
					if ($foto!='') {
						unlink('./files/user/'.$foto_lm);

						$config['upload_path'] = './files/user';
						$config['allowed_types'] = 'jpg|png';

						$this->load->library('upload',$config);
						$this->upload->do_upload('foto');
						$file = $this->upload->data();
						$foto = $file['file_name'];
					}else{
						$foto = $foto_lm;
						
					}


					$data2['foto'] = $foto;
					$where['id'] = $id;
					$this->m_model->update($where,$data2,'t_user');

					redirect('kalab/setting');

				}else{
					$data1['notif'] = "Ganti password gagal";
					$data = array(
						'active_setting' => 'active',
						'title' => 'Setting - Kalab' 
						);
					$this->load->view('kalab/v_header.php',$data);
					$this->load->view('kalab/v_setting',$data1);
					$this->load->view('kalab/v_footer');
				}
			}else{
				$data1['notif'] = "Ganti password gagal";
				$data = array(
					'active_setting' => 'active',
					'title' => 'Setting - Kalab' 
					);
				$this->load->view('kalab/v_header.php',$data);
				$this->load->view('kalab/v_setting',$data1);
				$this->load->view('kalab/v_footer');
			}
		}

		else{
			if ($foto!='') {
				unlink('./files/user/'.$foto_lm);

				$config['upload_path'] = './files/user';
				$config['allowed_types'] = 'jpg|png';

				$this->load->library('upload',$config);
				$this->upload->do_upload('foto');
				$file = $this->upload->data();
				$foto = $file['file_name'];
			}else{
				$foto = $foto_lm;
				
			}


			$data2['foto'] = $foto;
			$where['id'] = $id;
			$this->m_model->update($where,$data2,'t_user');

			redirect('kalab/setting');
		}
		
	}


	function viewta($id){
		$data = array(
			'title' => 'Lihat Data Tugas Akhir ID '.$id.' - Kalab' 
			);

		
		$where['id_ta'] = $id;
		$data1['datata'] = $this->m_model->ambil_where($where,'t_datata')->result();


		$this->load->view('kalab/v_header.php',$data);
		$this->load->view('kalab/v_vta',$data1);
		$this->load->view('kalab/v_footer');
	}

	function tambahdosen(){
		$data = array(
			'title' => 'Tambah Dosen - Kalab' 
			);
		$this->load->view('kalab/v_header.php',$data);
		$this->load->view('kalab/v_tdosen');
		$this->load->view('kalab/v_footer');
	}

	function tambah_dosen(){
		$nama_dosen = $this->input->post('nama_dosen');
		$jenis_bimbingan = $this->input->post('jenis_bimbingan');
		$nid = $this->input->post('nid');
		$nidn = $this->input->post('nidn');
		$status = $this->input->post('status');

		$data = array(
			'nama_dosen' => $nama_dosen,
			'jenis_bimbingan' => $jenis_bimbingan,
			'nid' => $nid,
			'nidn' => $nidn,
			'status' => $status 
		);

		$this->m_model->input_data($data,'t_dosen');

		redirect('kalab/datadosen');

	}

	function edit_dosen(){
		$id_dosen = $this->input->post('id_dosen');
		$nama_dosen = $this->input->post('nama_dosen');
		$jenis_bimbingan = $this->input->post('jenis_bimbingan');
		$nid = $this->input->post('nid');
		$nidn = $this->input->post('nidn');
		$status = $this->input->post('status');

		$where['id_dosen'] = $id_dosen;

		$data = array(
			'nama_dosen' => $nama_dosen,
			'jenis_bimbingan' => $jenis_bimbingan,
			'nid' => $nid,
			'nidn' => $nidn,
			'status' => $status 
		);

		$this->m_model->update($where,$data,'t_dosen');

		redirect('kalab/datadosen');
	}

	function hapusdosen($id){
		$where['id_dosen'] = $id;
		$this->m_model->hapus($where,'t_dosen');
		redirect('kalab/datadosen');
	}

	function exportxlspta(){
		

		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('Prodi IF UTama')
							   ->setLastModifiedBy('Prodi IF UTama')
							   ->setTitle("Data Pengajuan Proposal Tugas Akhir")
							   ->setSubject("Kalab")
							   ->setDescription("Daftar Pengajuan Proposal Tugas Akhir Prodi IF Utama")
							   ->setKeywords("Data Proposal Tugas Akhir");

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);


		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "No"); 
		$excel->setActiveSheetIndex(0)->setCellValue('B1', "Nama Mahasiswa"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C1', "NPM/NIM"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D1', "Konsentrasi");
		$excel->setActiveSheetIndex(0)->setCellValue('E1', "Topik Tugas Akhir"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F1', "Latar Belakang");
		$excel->setActiveSheetIndex(0)->setCellValue('G1', "Revisi Latar Belakang");
		$excel->setActiveSheetIndex(0)->setCellValue('H1', "Rumusan Masalah");
		$excel->setActiveSheetIndex(0)->setCellValue('I1', "Revisi Rumusan Masalah");
		$excel->setActiveSheetIndex(0)->setCellValue('J1', "Tujuan");
		$excel->setActiveSheetIndex(0)->setCellValue('K1', "Revisi Tujuan");
		$excel->setActiveSheetIndex(0)->setCellValue('L1', "Batasan Masalah");
		$excel->setActiveSheetIndex(0)->setCellValue('M1', "Revisi Batasan Masalah");
		$excel->setActiveSheetIndex(0)->setCellValue('N1', "Metodologi Penelitian");
		$excel->setActiveSheetIndex(0)->setCellValue('O1', "Revisi Metodologi Penelitian");
		$excel->setActiveSheetIndex(0)->setCellValue('P1', "Landasan Teori dan Alur Kerja");
		$excel->setActiveSheetIndex(0)->setCellValue('Q1', "Revisi Landasan");
		$excel->setActiveSheetIndex(0)->setCellValue('R1', "Status"); 
		$excel->setActiveSheetIndex(0)->setCellValue('S1', "NID Dosen Reviewer"); 
		$excel->setActiveSheetIndex(0)->setCellValue('T1', "Dosen Reviewer");
		
		$excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('N1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('O1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('P1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('Q1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('R1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('S1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('T1')->applyFromArray($style_col);
		
		$data = $this->m_model->ambil_data('t_pengajuanproposal');

		$no = 1;
		$numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 2
		foreach($data->result() as $ta){ // Lakukan looping pada variabel siswa

			/*if ($ta->tanggal_panjang != null) {
				$tanggal_panjang =  date_indo($ta->tanggal_panjang);
			}else{
				$tanggal_panjang = '';
			}

			if ($ta->tanggal_sidang != null) {
				$tanggal_sidang =  date_indo($ta->tanggal_sidang);
			}else{
				$tanggal_sidang = '';
			}

			if ($ta->tanggal_yudisium != null) {
				$tanggal_yudisium =  date_indo($ta->tanggal_yudisium);
			}else{
				$tanggal_yudisium = '';
			}

			if ($ta->tanggal_pra_sid != null) {
				$tanggal_pra_sid =  date_indo($ta->tanggal_pra_sid);
			}else{
				$tanggal_pra_sid = '';
			}

			if ($ta->tanggal_lahir != null) {
				$tanggal_lahir =  date_indo($ta->tanggal_lahir);
			}else{
				$tanggal_lahir = '';
			}

			if ($ta->tanggal_peng != null) {
				$tanggal_peng =  date_indo($ta->tanggal_peng);
			}else{
				$tanggal_peng = '';
			}

			if ($ta->tanggal_awal != null) {
				$tanggal_awal =  date_indo($ta->tanggal_awal);
			}else{
				$tanggal_awal = '';
			}

			if ($ta->tanggal_akhir != null) {
				$tanggal_akhir =  date_indo($ta->tanggal_akhir);
			}else{
				$tanggal_akhir = '';
			}*/

			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $ta->nama_mahasiswa);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $ta->npm);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $ta->konsentrasi);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $ta->topik_ta);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $ta->latar_belakang);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $ta->r_latar);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $ta->rumusan_masalah);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $ta->r_rumusan);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $ta->tujuan);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $ta->r_tujuan);
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $ta->batasan_masalah);
			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $ta->r_batasan);
			$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $ta->metodologi_penelitian);
			$excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $ta->r_metodologi);
			$excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $ta->Landasan);
			$excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $ta->r_landasan);
			$excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $ta->status);
			$excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $ta->nid);
			$excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $ta->dosen);
			

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
			
			$no++;
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('P')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('R')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('S')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('T')->setAutoSize(true); 
		
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("List Tugas Akhir");
		$excel->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="List Pengajuan Proposal Tugas Akhir Terbaru.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');

	}


	function exportxlsptasort(){
		

		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('Kalab IF UTama')
							   ->setLastModifiedBy('Kalab IF UTama')
							   ->setTitle("Data Proposal Tugas Akhir")
							   ->setSubject("Kalab")
							   ->setDescription("Daftar Proposal Tugas Akhir Prodi IF Utama")
							   ->setKeywords("Data Proposal Tugas Akhir");

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);


		$excel->setActiveSheetIndex(0)->setCellValue('A1', "No"); 
		$excel->setActiveSheetIndex(0)->setCellValue('B1', "Nama Mahasiswa"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C1', "NPM/NIM"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D1', "Konsentrasi");
		$excel->setActiveSheetIndex(0)->setCellValue('E1', "Topik Tugas Akhir"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F1', "Latar Belakang");
		$excel->setActiveSheetIndex(0)->setCellValue('G1', "Revisi Latar Belakang");
		$excel->setActiveSheetIndex(0)->setCellValue('H1', "Rumusan Masalah");
		$excel->setActiveSheetIndex(0)->setCellValue('I1', "Revisi Rumusan Masalah");
		$excel->setActiveSheetIndex(0)->setCellValue('J1', "Tujuan");
		$excel->setActiveSheetIndex(0)->setCellValue('K1', "Revisi Tujuan");
		$excel->setActiveSheetIndex(0)->setCellValue('L1', "Batasan Masalah");
		$excel->setActiveSheetIndex(0)->setCellValue('M1', "Revisi Batasan Masalah");
		$excel->setActiveSheetIndex(0)->setCellValue('N1', "Metodologi Penelitian");
		$excel->setActiveSheetIndex(0)->setCellValue('O1', "Revisi Metodologi Penelitian");
		$excel->setActiveSheetIndex(0)->setCellValue('P1', "Landasan Teori dan Alur Kerja");
		$excel->setActiveSheetIndex(0)->setCellValue('Q1', "Revisi Landasan");
		$excel->setActiveSheetIndex(0)->setCellValue('R1', "Tahun Akademik Diterima");
		$excel->setActiveSheetIndex(0)->setCellValue('S1', "Semester");
		$excel->setActiveSheetIndex(0)->setCellValue('T1', "Status"); 
		$excel->setActiveSheetIndex(0)->setCellValue('U1', "NID Dosen Reviewer"); 
		$excel->setActiveSheetIndex(0)->setCellValue('V1', "Dosen Reviewer");
		$excel->setActiveSheetIndex(0)->setCellValue('W1', "No ID");

		$excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('N1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('O1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('P1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('Q1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('R1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('S1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('T1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('U1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('V1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('W1')->applyFromArray($style_col);

		$semester_diterima = $this->input->post('semester_diterima');
		$tahun_akademik_diterima = $this->input->post('tahun_akademik_diterima');

		$where = array(
			'semester_diterima' => $semester_diterima,
			'tahun_akademik_diterima' => $tahun_akademik_diterima
		);

		$data = $this->m_model->ambil_where($where,'t_pengajuanproposal');

		

		$no = 1;
		$numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 2
		foreach($data->result() as $ta){ // Lakukan looping pada variabel siswa


			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $ta->nama_mahasiswa);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $ta->npm);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $ta->konsentrasi);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $ta->topik_ta);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $ta->latar_belakang);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $ta->r_latar);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $ta->rumusan_masalah);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $ta->r_rumusan);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $ta->tujuan);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $ta->r_tujuan);
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $ta->batasan_masalah);
			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $ta->r_batasan);
			$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $ta->metodologi_penelitian);
			$excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $ta->r_metodologi);
			$excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $ta->landasan_teori_alur_kerja);
			$excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $ta->r_landasan);
			$excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $ta->tahun_akademik_diterima);
			$excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $ta->semester_diterima);
			$excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $ta->status);
			$excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $ta->nid);
			$excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $ta->dosen);
			$excel->setActiveSheetIndex(0)->setCellValue('W'.$numrow, $ta->id);

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('V'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('W'.$numrow)->applyFromArray($style_row);
			

			$no++;
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('P')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('R')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('S')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('T')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('U')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('V')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('W')->setAutoSize(true); 
		
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("List Proposal Tugas Akhir");
		$excel->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="List Proposal Tugas Akhir Terbaru '.$semester_diterima.'-'.$tahun_akademik_diterima.' sort.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');

		redirect('kalab/listpengajuanproposal');

	}

	function ContohExcel(){
		

		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('Pembuat')
							   ->setLastModifiedBy('Pembuat')
							   ->setTitle("Title")
							   ->setSubject("Subject")
							   ->setDescription("Deskripsi")
							   ->setKeywords("Data Tugas Akhir");

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);


		// Buat header tabel nya pada kolom 4

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "No"); 
		$excel->setActiveSheetIndex(0)->setCellValue('B1', "Nama Mahasiswa"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C1', "NPM/NIM"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D1', "Konsentrasi");
		$excel->setActiveSheetIndex(0)->setCellValue('E1', "Topik Tugas Akhir"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F1', "Latar Belakang");
		$excel->setActiveSheetIndex(0)->setCellValue('G1', "Revisi Latar Belakang");
		$excel->setActiveSheetIndex(0)->setCellValue('H1', "Rumusan Masalah");
		$excel->setActiveSheetIndex(0)->setCellValue('I1', "Revisi Rumusan Masalah");
		$excel->setActiveSheetIndex(0)->setCellValue('J1', "Tujuan");
		$excel->setActiveSheetIndex(0)->setCellValue('K1', "Revisi Tujuan");
		$excel->setActiveSheetIndex(0)->setCellValue('L1', "Batasan Masalah");
		$excel->setActiveSheetIndex(0)->setCellValue('M1', "Revisi Batasan Masalah");
		$excel->setActiveSheetIndex(0)->setCellValue('N1', "Metodologi Penelitian");
		$excel->setActiveSheetIndex(0)->setCellValue('O1', "Revisi Metodologi Penelitian");
		$excel->setActiveSheetIndex(0)->setCellValue('P1', "Landasan Teori dan Alur Kerja");
		$excel->setActiveSheetIndex(0)->setCellValue('Q1', "Revisi Landasan");
		$excel->setActiveSheetIndex(0)->setCellValue('R1', "Tahun Akademik Diterima");
		$excel->setActiveSheetIndex(0)->setCellValue('S1', "Semester");
		$excel->setActiveSheetIndex(0)->setCellValue('T1', "Status"); 
		$excel->setActiveSheetIndex(0)->setCellValue('U1', "NID Dosen Reviewer"); 
		$excel->setActiveSheetIndex(0)->setCellValue('V1', "Dosen Reviewer");
		$excel->setActiveSheetIndex(0)->setCellValue('W1', "No ID");
		

		

		$data = $this->m_model->ambil_data('t_pengajuanproposal');

		$no = 1;
		$numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 2
		foreach($data->result() as $ta){

			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $ta->nama_mahasiswa);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $ta->npm);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $ta->konsentrasi);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $ta->topik_ta);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $ta->latar_belakang);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $ta->r_latar);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $ta->rumusan_masalah);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $ta->r_rumusan);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $ta->tujuan);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $ta->r_tujuan);
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $ta->batasan_masalah);
			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $ta->r_batasan);
			$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $ta->metodologi_penelitian);
			$excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $ta->r_metodologi);
			$excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $ta->landasan_teori_alur_kerja);
			$excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $ta->r_landasan);
			
			

		}
		
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Test");
		$excel->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Sample Excel.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');

	}

}