<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Mhs extends CI_Controller
{

	function __construct(){
		parent::__construct();
		if ($this->session->userdata('level')!="Mhs") {
			if ($this->session->userdata('level')=="Dosen") {
				redirect('dosen');
			}
			elseif ($this->session->userdata('level')=="Kalab") {
				redirect('kalab');
			}
			else{
				redirect('login');
			}
		}

	}

	function index(){
		$data = array(
			'active_home' => 'active',
			'title' => 'Home - Mhs' 
			);

		$where = array(
			'npm' => $this->session->userdata('npm')
		);
		$data1['datata'] = $this->m_model->ambil_where($where,'t_pengajuanproposal')->result();
		$this->load->view('mhs/v_header.php',$data);
		$this->load->view('mhs/v_index',$data1);
		$this->load->view('mhs/v_footer');
	}

	function formproposal(){
		$data = array(
			'title' => 'Formulir Pengajuan Proposal Tugas Akhir',
			'active_list_peng' => 'active',
			'title' => 'Pengajuan Proposal'  
			);
		$this->load->view('mhs/v_header.php',$data);
		$this->load->view('mhs/v_fproposal');
		$this->load->view('mhs/v_footer');
	}

	function proses_inputproposal(){
		$nama_mahasiswa = $this->input->post('nama_mahasiswa');
		$npm = $this->input->post('npm');
		$semester = $this->input->post('semester');
		$konsentrasi = $this->input->post('konsentrasi');
		$topik_ta = $this->input->post('topik_ta');
		$latar_belakang = $this->input->post('latar_belakang');
		$rumusan_masalah = $this->input->post('rumusan_masalah');
		$tujuan = $this->input->post('tujuan');
		$batasan_masalah = $this->input->post('batasan_masalah');
		$metodologi_penelitian = $this->input->post('metodologi_penelitian');

			
			$config['upload_path'] = './files/pengajuanta';
			$config['allowed_types'] = 'jpg|png|pdf|doc|docx';

			$this->load->library('upload',$config);
			$this->upload->do_upload('landasan_teori_alur_kerja');
			$file1 = $this->upload->data();
			$landasan_teori_alur_kerja = $file1['file_name'];


			$data = array(
				'nama_mahasiswa' => $nama_mahasiswa, 
				'npm' => $npm,
				'konsentrasi' => $konsentrasi,
				'topik_ta' => $topik_ta,
				'latar_belakang' => $latar_belakang,
				'rumusan_masalah' => $rumusan_masalah,
				'tujuan' => $tujuan,
				'batasan_masalah' => $batasan_masalah,
				'metodologi_penelitian' => $metodologi_penelitian,
				'landasan_teori_alur_kerja' => $landasan_teori_alur_kerja
			);

			/*$data3 = array(
				'nama_mahasiswa' => $nama_mahasiswa, 
				'npm' => $npm,
				'topik_ta' => $topik_ta,
				'konsentrasi' => $konsentrasi,
				'status' => 'Tunggu'
			);*/

			$this->m_model->input_data($data,'t_pengajuanproposal');
			//$this->m_model->input_data($data3,'t_frontta');
			redirect('mhs');
		

		
	}

	function listpengajuanproposal(){
		$data = array(
			'active_list_peng' => 'active',
			'title' => 'List Pengajuan Proposal Tugas Akhir - Mhs' 
			);

		$data1['datata'] = $this->m_model->ambil_data('t_pengajuanproposal')->result();

		$this->load->view('mhs/v_header.php',$data);
		$this->load->view('mhs/v_list_pengproposal',$data1);
		$this->load->view('mhs/v_footer');
	}

	function setting(){
		$data = array(
			'active_setting' => 'active',
			'title' => 'Setting - Mhs' 
			);
		$this->load->view('mhs/v_header.php',$data);
		$this->load->view('mhs/v_setting');
		$this->load->view('mhs/v_footer');
	}

	function listta(){
		$data = array(
			'active_ta' => 'active',
			'title' => 'List Tugas Akhir' 
			);

		$data1['datata'] = $this->m_model->ambil_data('t_datata')->result();

		$this->load->view('mhs/v_header.php',$data);
		$this->load->view('mhs/v_list_ta',$data1);
		$this->load->view('mhs/v_footer');
	}

	function viewppro($id){
		$data = array(
			'active_list_peng' => 'active',
			'title' => 'Pengajuan Proposal Tugas Akhir - Mhs' 
			);

		$where['id'] = $id;
		$data1['datata'] = $this->m_model->ambil_where($where,'t_pengajuanproposal')->result();

		$this->load->view('mhs/v_header.php',$data);
		$this->load->view('mhs/v_pengajuan',$data1);
		$this->load->view('mhs/v_footer');
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

					redirect('mhs/setting');

				}else{
					$data1['notif'] = "Ganti password gagal";
					$data = array(
						'active_setting' => 'active',
						'title' => 'Setting - Mhs' 
						);
					$this->load->view('mhs/v_dheader.php',$data);
					$this->load->view('mhs/v_setting',$data1);
					$this->load->view('mhs/v_dfooter');
				}
			}else{
				$data1['notif'] = "Ganti password gagal";
				$data = array(
					'active_setting' => 'active',
					'title' => 'Setting - Mhs' 
					);
				$this->load->view('mhs/v_dheader.php',$data);
				$this->load->view('mhs/v_setting',$data1);
				$this->load->view('mhs/v_dfooter');
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

			redirect('mhs/setting');
		}
		
	}
}