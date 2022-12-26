<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Surat_model', 'surat');
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['suratkeluar'] = $this->surat->getJumlahSuratKeluar();
    $data['suratmasuk'] = $this->surat->getJumlahSuratMasuk();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('dashboard/index', $data);
    $this->load->view('templates/footer');
  }
}