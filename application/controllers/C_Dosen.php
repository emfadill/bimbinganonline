<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Dosen extends CI_Controller
{

	function __construct(){
		parent::__construct();

		if ($this->session->userdata('level')!="Dosen") {
			if ($this->session->userdata('level')=="Prodi") {
				redirect('prodi');
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
			'active_list_peng' => 'active',
			'title' => 'Tugas Akhir' 
		);

		$where = array(
			'nid' => $this->session->userdata('nid') 
		);
		$data1['datata'] = $this->m_model->ambil_where($where,'t_pengajuanproposal')->result();
		$this->load->view('dosen/v_dheader',$data);
		$this->load->view('dosen/v_cek',$data1);
		$this->load->view('dosen/v_dfooter');

		/*$data1['datata'] = $this->m_model->ambil_data('t_datata')->result();
		$this->load->view('dosen/v_dheader');
		$this->load->view('dosen/v_cek',$data1);
		$this->load->view('dosen/v_dfooter');*/
	}

	function setting(){
		$data = array(
			'active_setting' => 'active',
			'title' => 'Setting ' 
			);
		$this->load->view('dosen/v_dheader.php',$data);
		$this->load->view('dosen/v_setting');
		$this->load->view('dosen/v_dfooter');
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
			);
			//$data2 = array('status' => 'Diterima' );
			$this->m_model->update($where,$data1,'t_pengajuanproposal');

			redirect('dosen');
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
				'nid' => $nid,
				'dosen' => $dosen,
			);
			$data2 = array('status' => 'Diterima' );
			$this->m_model->update($where,$data2,'t_pengajuanproposal');

			redirect('dosen');
		}
	}

	function viewta($id){

		$data = array(
			'title' => 'Lihat Tugas Akhir'
		);
		$where['id'] = $id;
		$data1['datata'] = $this->m_model->ambil_where($where,'t_pengajuanproposal')->result();


		$this->load->view('dosen/v_dheader',$data);
		$this->load->view('dosen/v_review',$data1);
		$this->load->view('dosen/v_dfooter');
	}

	function viewpta($id){
		$data = array(
			'title' => 'Lihat Data Pengajuan Proposal TA ID '.$id.' - Dosen ' 
			);

		$where['id'] = $id;

		$data1['datata'] = $this->m_model->ambil_where($where,'t_pengajuanproposal')->result();


		$this->load->view('dosen/v_dheader.php',$data);
		$this->load->view('dosen/v_vpta',$data1);
		$this->load->view('dosen/v_dfooter');
	}

	function reviewta($id){
		$data = array(
			'active_list_peng' => 'active',
			'title' => 'Form Review Proposal TA - Dosen' 
			);

		$where['id'] = $id;
		$data1['datata'] = $this->m_model->ambil_where($where,'t_pengajuanproposal')->result();
		$this->load->view('dosen/v_dheader.php',$data);
		$this->load->view('dosen/v_review',$data1);
		$this->load->view('dosen/v_dfooter');
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

					redirect('dosen/setting');

				}else{
					$data1['notif'] = "Ganti password gagal";
					$data = array(
						'active_setting' => 'active',
						'title' => 'Setting - Prodi' 
						);
					$this->load->view('dosen/v_dheader.php',$data);
					$this->load->view('dosen/v_setting',$data1);
					$this->load->view('dosen/v_dfooter');
				}
			}else{
				$data1['notif'] = "Ganti password gagal";
				$data = array(
					'active_setting' => 'active',
					'title' => 'Setting - Prodi' 
					);
				$this->load->view('dosen/v_dheader.php',$data);
				$this->load->view('dosen/v_setting',$data1);
				$this->load->view('dosen/v_dfooter');
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

			redirect('dosen/setting');
		}
		
	}
}