<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function index()
	{
	    $data['title'] = 'Data Produk';
	    $data['error'] = '';
        $data['data'] = $this->db->query('select * from produk
            join kategori on produk.idKategori = kategori.idKategori
            join merek on produk.idMerek = merek.idMerek');
		$this->template->load('template', 'produk', $data);
	}
	
	public function tambah(){
	    $data['title'] = 'Tambah Data Produk';
	    $data['error'] = '';
        $data['datakategori'] = $this->db->query('select * from kategori');
        $data['datamerek'] = $this->db->query('select * from merek');
		$this->template->load('template', 'produktambah', $data);
    }
    
	public function tambahproses(){
		$data['idKategori']=$this->input->post("idKategori");
		$data['idMerek']=$this->input->post("idMerek");
		$data['namaProduk']=$this->input->post("namaProduk");
		$data['harga']=$this->input->post("harga");
		$data['stok']=$this->input->post("stok");
		$data['deskripsi']=$this->input->post("deskripsi");
		$data['status']=$this->input->post("status");
		$this->form_validation->set_rules('idKategori','Kategori','required');
		$this->form_validation->set_rules('idMerek','Merek','required');
		$this->form_validation->set_rules('namaProduk','Nama Produk','required');
		$this->form_validation->set_rules('harga','Harga','required');
		$this->form_validation->set_rules('stok','Stok','required');
		if (empty($_FILES['foto']['name'])) { $this->form_validation->set_rules('foto','Foto','required'); }
		$this->form_validation->set_rules('deskripsi','Deskripsi','required');
		$this->form_validation->set_rules('status','Status','required');
		if($this->form_validation->run() != false) {
            $config['upload_path']          = './assets/images/produk/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['overwrite']            = 'FALSE';
            $config['encrypt_name']         = 'TRUE';
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                $error = array('error' => $this->upload->display_errors()); }
            else {
                $_data = array('upload_data' => $this->upload->data());
                 $data = array(
            		'idKategori' => $this->input->post("idKategori"),
            		'idMerek' => $this->input->post("idMerek"),
            		'namaProduk' => $this->input->post("namaProduk"),
            		'harga' => $this->input->post("harga"),
            		'stok' => $this->input->post("stok"),
            		'deskripsi' => $this->input->post("deskripsi"),
            		'status' => $this->input->post("status"),
                    'foto' => $_data['upload_data']['file_name']
                    );
                $query = $this->RsModel->TambahData("produk",$data);
                redirect('produk'); }
		} else {
	        $data['title'] = 'Proses Tambah Data Produk';
    	    $data['error'] = '';
            $data['data'] = $this->db->query('select * from produk');
            $data['datakategori'] = $this->db->query('select * from kategori');
            $data['datamerek'] = $this->db->query('select * from merek');
    		$this->template->load('template', 'produktambah', $data);
		}
	}

    public function hapus($id){
	    $data['title'] = 'Hapus Data Produk';
        $_id = $this->db->get_where('produk',['idProduk' => $id])->row();
        $query = $this->db->delete('produk',['idProduk'=>$id]);
        if($query){
            unlink("assets/images/produk/".$_id->foto);
        }
        redirect('produk');
    }
    
    public function ubah($id){
	    $data['title'] = 'Ubah Data Produk';
        $data['data'] = $this->db->query('select * from produk');
        $data['datakategori'] = $this->db->query('select * from kategori');
        $data['datamerek'] = $this->db->query('select * from merek');
        $dataWhere = array('idProduk' => $id);
		$data['produk'] = $this->RsModel->get_by_id('produk', $dataWhere)->row_object();
		$this->template->load('template', 'produkubah', $data);
    }
    
	public function ubahproses(){
	    $where['idProduk']=$this->input->post('idProduk');
		$data['idKategori']=$this->input->post("idKategori");
		$data['idMerek']=$this->input->post("idMerek");
		$data['namaProduk']=$this->input->post("namaProduk");
		$data['harga']=$this->input->post("harga");
		$data['stok']=$this->input->post("stok");
		$data['deskripsi']=$this->input->post("deskripsi");
		$data['status']=$this->input->post("status");
		$this->form_validation->set_rules('idProduk','Produk','required');
		$this->form_validation->set_rules('idKategori','Kategori','required');
		$this->form_validation->set_rules('idMerek','Merek','required');
		$this->form_validation->set_rules('namaProduk','Nama Produk','required');
		$this->form_validation->set_rules('harga','Harga','required');
		$this->form_validation->set_rules('stok','Stok','required');
		$this->form_validation->set_rules('deskripsi','Deskripsi','required');
		$this->form_validation->set_rules('status','Status','required');
		if($this->form_validation->run() != false) {
            $config['upload_path']          = './assets/images/produk/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['overwrite']            = 'FALSE';
            $config['encrypt_name']         = 'TRUE';
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')){
                    $error = array('error' => $this->upload->display_errors()); }
            else {
                $_data = array('upload_data' => $this->upload->data());
                 $data = array(
            		'idKategori' => $this->input->post("idKategori"),
            		'idMerek' => $this->input->post("idMerek"),
            		'namaProduk' => $this->input->post("namaProduk"),
            		'harga' => $this->input->post("harga"),
            		'stok' => $this->input->post("stok"),
            		'deskripsi' => $this->input->post("deskripsi"),
            		'status' => $this->input->post("status"),
                    'foto' => $_data['upload_data']['file_name']
                    );
                $query = $this->RsModel->EditData("produk",$data,$where);
                redirect('produk'); }
            $this->RsModel->EditData("produk",$data,$where);
            redirect('produk');
		} else {
	        $data['title'] = 'Proses Ubah Data Produk';
    	    $data['error'] = '';
            $data['data'] = $this->db->query('select * from produk
                join kategori on produk.idKategori = kategori.idKategori
                join merek on produk.idMerek = merek.idMerek');
    		$this->template->load('template', 'produk', $data); }
	}
}