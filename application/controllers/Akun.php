<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

	public function masuk()
	{
	    $data['title'] = 'Masuk';
		$this->load->view('masuk', $data);
	}
	
	public function masukproses()
	{
	    $data['title'] = 'Proses Masuk';
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        	$this->form_validation->set_rules('username','Username','required');
        	$this->form_validation->set_rules('password','Password','required');
        	if($this->form_validation->run() != false){
        
        $where = array(
            'username' => $username,
            'password' => $password
            );
        $cek = $this->db->query("SELECT * FROM admin WHERE username='$username' AND password='$password'");
        if($cek->num_rows() > 0){
                foreach($cek->result() as $key){
                $level = $key->level;
                $username = $key->username;
            }
            if($level=='Admin' || $level=='Operator'){
                $data_session = array(
                'username' => $username,
                'level'=> $level,
                'status' => "masuksudah"
                );
            $this->session->set_userdata($data_session);
            redirect(site_url().'/produk/');
            }else{
                $this->session->set_flashdata("notif","<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Ada masalah pada akun Anda.</div>");
                redirect('akun/masuk');
            }

        }else{
            $this->session->set_flashdata("notif","<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Username atau password salah.</div>");
            redirect('akun/masuk');
        }
        
    
        	}else{
	            $data['title'] = 'Masuk';
		        $this->load->view('masuk', $data);
        	}
	}
	
	public function keluar()
	{
	    $data['title'] = 'Keluar';
	    $this->session->sess_destroy();
	    redirect(site_url().'/akun/masuk/');
	}
}