<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Laporan_model', 'laporan');
  }

  public function suratMasuk()
  {
    $data['title'] = 'Laporan';
    $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required|trim');
    $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required|trim');

    if ($this->form_validation->run() == false) {

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('home/l-surat-masuk', $data);
      $this->load->view('templates/footer');
    } else {
      $this->_prosesCetakSuratMasuk();
    }
  }

  private function _prosesCetakSuratMasuk()
  {
    $tgl_awal = $this->input->post('tgl_awal');
    $tgl_akhir = $this->input->post('tgl_akhir');

    $data['title'] = 'Laporan';
    $data['laporan'] = $this->laporan->getSuratMasukByTgl($tgl_awal, $tgl_akhir);
    $data['tglawal'] = $this->input->post('tgl_awal');
    $data['tglakhir'] = $this->input->post('tgl_akhir');

    $this->load->view('home/cetak-surat-masuk', $data);
  }

  public function getSuratMasukAjax()
  {
    $tgl_awal = $this->input->post('tgl_awal');
    $tgl_akhir = $this->input->post('tgl_akhir');
    $results = $this->laporan->getSuratMasukAjaxByTgl($tgl_awal, $tgl_akhir);
    $data = [];
    $no = 1;
    foreach ($results as $result) {
      $row = [];
      $row[] = $no++;
      $row[] = $result->nomor_surat;
      $row[] = $result->pengirim;
      $row[] = $result->penerima;
      $row[] = $result->perihal;
      $row[] = $result->ket;
      $row[] = $result->kategori_surat;
      $row[] = $result->divisi;
      $row[] = date('d-m-Y', strtotime($result->tanggal_surat));;
      $data[] = $row;
    }

    $output = [
      "data" => $data,
    ];
    echo json_encode($output);
  }
  public function suratKeluar()
  {
    $data['title'] = 'Laporan';
    $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required|trim');
    $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required|trim');

    if ($this->form_validation->run() == false) {

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('home/l-surat-keluar', $data);
      $this->load->view('templates/footer');
    } else {
      $this->_prosesCetakSuratKeluar();
    }
  }

  private function _prosesCetakSuratKeluar()
  {
    $tgl_awal = $this->input->post('tgl_awal');
    $tgl_akhir = $this->input->post('tgl_akhir');

    $data['title'] = 'Laporan';
    $data['laporan'] = $this->laporan->getSuratKeluarByTgl($tgl_awal, $tgl_akhir);
    $data['tglawal'] = $this->input->post('tgl_awal');
    $data['tglakhir'] = $this->input->post('tgl_akhir');

    $this->load->view('home/cetak-surat-keluar', $data);
  }

  public function getSuratKeluarAjax()
  {
    $tgl_awal = $this->input->post('tgl_awal');
    $tgl_akhir = $this->input->post('tgl_akhir');
    $results = $this->laporan->getSuratKeluarAjaxByTgl($tgl_awal, $tgl_akhir);
    $data = [];
    $no = 1;
    foreach ($results as $result) {
      $row = [];
      $row[] = $no++;
      $row[] = $result->nomor_surat;
      $row[] = $result->pengirim;
      $row[] = $result->penerima;
      $row[] = $result->perihal;
      $row[] = $result->ket;
      $row[] = $result->kategori_surat;
      $row[] = $result->divisi;
      $row[] = date('d-m-Y', strtotime($result->tanggal_surat));;
      $data[] = $row;
    }

    $output = [
      "data" => $data,
    ];
    echo json_encode($output);
  }
}