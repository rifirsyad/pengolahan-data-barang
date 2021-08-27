<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function index()
	{
	    $data['title'] = 'Data Kategori';
		$data['data'] = $this->db->query('select * from kategori');
		$this->template->load('template', 'kategori', $data);
	}
	
	public function tambah(){
	    $data['title'] = 'Tambah Data Kategori';
		$this->template->load('template', 'kategoritambah', $data);
    }
    
	public function tambahproses(){
		$data['namaKategori']=$this->input->post("namaKategori");
        $this->form_validation->set_rules('namaKategori','Nama Kategori','required');
        if($this->form_validation->run() != false){
		    $this->RsModel->TambahData("kategori",$data);
		    redirect('kategori');
        }else{
	        $data['title'] = 'Proses Tambah Data Kategori';
        	$this->template->load('template', 'kategoritambah', $data);
        }
	}

	public function hapus(){
	    $data['title'] = 'Hapus Data Kategori';
		$id=$this->uri->segment(3);
		$where=array('idKategori'=>$id);
		$this->RsModel->HapusData('kategori',$where);
		redirect('kategori');
	}
    
    public function ubah($id){
	    $data['title'] = 'Ubah Data Kategori';
        $data['data'] = $this->db->query('select * from kategori');
        $dataWhere = array('idKategori' => $id);
		$data['kategori'] = $this->RsModel->get_by_id('kategori', $dataWhere)->row_object();
		$this->template->load('template', 'kategoriubah', $data);
    }
    
	public function ubahproses(){
	    $where['idKategori']=$this->input->post('idKategori');
		$data['namaKategori']=$this->input->post("namaKategori");
        $this->form_validation->set_rules('idKategori','Kategori','required');
        $this->form_validation->set_rules('namaKategori','Nama Kategori','required');
        if($this->form_validation->run() != false){
		    $this->RsModel->EditData("kategori",$data,$where);
		    redirect('kategori');
        }else{
	        $data['title'] = 'Proses Ubah Data Kategori';
        	$data['data'] = $this->db->query('select * from kategori');
        	$this->template->load('template', 'kategori', $data);
        }
	}
}