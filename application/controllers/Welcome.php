<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	//cek data login 
	public function ceklogin(){
		if(isset($_POST['submit'])){
			$user = $this->input->post('email',true);
			$pass = $this->input->post('password',true);
			$cek = $this->app_model->proseslogin($user,$pass);
			$hasil = count($cek);//hitung nilai jika lebih dari 0 berhasil 
			if($hasil>0){
				//digunakan untuk mengalihakan ke halaman beranda yang ada di controller
				redirect('welcome/beranda');
				/*
				$log = $this->db->get_where('users',array('username' =>$user,'password'=>$pass))->row();
					if(){

					}
				//echo $log->email ;
				*/
			}else{
				redirect('welcome/index');
			}

		}
	}
	public function daftar(){
		if(isset($_POST['daftar'])){
			$this->load->view('daftar');
		}
	}
	public function beranda(){
		$this->load->view('beranda');
	}
}
