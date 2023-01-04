<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Surat_model', 'surat');
  }

  public function divisi()
  {
    $data['title'] = 'Setting';
		$data['divisi'] = $this->surat->getDivisiAll();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('setting/divisi', $data);
    $this->load->view('templates/footer');
  }

  public function tambahDivisi()
  {
    $data['title'] = 'Setting';

		$this->form_validation->set_rules('divisi', 'Divisi', 'required|trim');


		if ($this->form_validation->run() == false) {
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('setting/tambah-divisi', $data);
    $this->load->view('templates/footer');
    }else {
      $this->surat->tambahDataDivisi();
      $this->session->set_flashdata('message', 'Divisi Berhasil dibuat');
      redirect('setting/divisi');
    }
  }

  public function hapusDivisi($id)
	{
		$this->surat->hapusDataDivisi($id);
		$this->session->set_flashdata('message', 'Data divisi berhasil dihapus!');
    redirect('setting/divisi');
	}

  public function ubahDivisi($id)
	{
		$data['title'] = 'Setting';
		$data['divisi'] = $this->db->get_where('divisi', ['id' => $id])->row_array();

		$this->form_validation->set_rules('divisi', 'Divisi', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('setting/ubah-divisi', $data);
			$this->load->view('templates/footer');
		} else {
			$this->surat->editDataDivisi($id);
			$this->session->set_flashdata('message', 'Ubah divisi berhasil!');
      redirect('setting/divisi');
		}
	}

  public function kategori()
  {
    $data['title'] = 'Setting';
		$data['kategori'] = $this->surat->getKategoriAll();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('setting/kategori', $data);
    $this->load->view('templates/footer');
  }

  public function tambahKategori()
  {
    $data['title'] = 'Setting';

		$this->form_validation->set_rules('kategori_surat', 'Kategori Surat', 'required|trim');


		if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('setting/tambah-kategori', $data);
      $this->load->view('templates/footer');
    }else {
      $this->surat->tambahDataKategori();
      $this->session->set_flashdata('message', 'Kategori Berhasil dibuat');
      redirect('setting/kategori');
    }
  }

  public function hapusKategori($id)
	{
		$this->surat->hapusDataKategori($id);
		$this->session->set_flashdata('message', 'Data kategori berhasil dihapus!');
    redirect('setting/kategori');

	}

  public function ubahKategori($id)
	{
		$data['title'] = 'Setting';
		$data['kategori'] = $this->db->get_where('kategori_surat', ['id' => $id])->row_array();

		$this->form_validation->set_rules('kategori_surat', 'Kategori Surat', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('setting/ubah-kategori', $data);
			$this->load->view('templates/footer');
		} else {
			$this->surat->editDataKategori($id);
			$this->session->set_flashdata('message', 'Ubah kategori surat berhasil!');
      redirect('setting/kategori');
		}
	}
}