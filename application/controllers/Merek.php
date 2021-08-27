<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merek extends CI_Controller {

	public function index()
	{
	    $data['title'] = 'Data Merek';
		$data['data'] = $this->db->query('select * from merek');
		$this->template->load('template', 'merek', $data);
	}
	
	public function tambah(){
	    $data['title'] = 'Tambah Data Merek';
		$this->template->load('template', 'merektambah', $data);
    }
    
	public function tambahproses(){
		$data['namaMerek']=$this->input->post("namaMerek");
        $this->form_validation->set_rules('namaMerek','Nama Merek','required');
        if($this->form_validation->run() != false){
            $this->RsModel->TambahData("merek",$data);
            redirect('merek');
        }else{
	        $data['title'] = 'Proses Tambah Data Merek';
        	$this->template->load('template', 'merektambah', $data);
        }
	}

	public function hapus(){
	    $data['title'] = 'Hapus Data Merek';
		$id=$this->uri->segment(3);
		$where=array('idMerek'=>$id);
		$this->RsModel->HapusData('merek',$where);
		redirect('merek');
	}
    
    public function ubah($id){
	    $data['title'] = 'Ubah Data Merek';
        $data['data'] = $this->db->query('select * from merek');
        $dataWhere = array('idMerek' => $id);
		$data['merek'] = $this->RsModel->get_by_id('merek', $dataWhere)->row_object();
		$this->template->load('template', 'merekubah', $data);
    }
    
	public function ubahproses(){
	    $where['idMerek']=$this->input->post('idMerek');
		$data['namaMerek']=$this->input->post("namaMerek");
		$this->form_validation->set_rules('idMerek','Merek','required');
        $this->form_validation->set_rules('namaMerek','Nama Merek','required');
        if($this->form_validation->run() != false){
		    $this->RsModel->EditData("merek",$data,$where);
		    redirect('merek');
        }else{
	        $data['title'] = 'Proses Ubah Data Merek';
        	$data['data'] = $this->db->query('select * from merek');
        	$this->template->load('template', 'merek', $data);
        }
	}
}