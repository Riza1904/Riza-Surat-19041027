<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_model extends CI_model
{

  public function tambahDataSurat($new_image)
  {
    $kategori_surat = $this->input->post('kategori_surat');
    $kategori_surat_string = implode(',', $kategori_surat);
    $data = [
      'nomor_surat' => htmlspecialchars($this->input->post('nomor_surat', true)),
      'pengirim' => htmlspecialchars($this->input->post('pengirim', true)),
      'penerima' => htmlspecialchars($this->input->post('penerima', true)),
      'perihal' => htmlspecialchars($this->input->post('perihal', true)),
      'divisi' => htmlspecialchars($this->input->post('divisi', true)),
      'kategori_surat' => $kategori_surat_string,
      'file' => $new_image,
      'tipe_surat' => htmlspecialchars($this->input->post('tipe_surat', true)),
      'ket' => htmlspecialchars($this->input->post('ket', true)),
      'tanggal_surat' => htmlspecialchars($this->input->post('tanggal_surat', true)),
    ];


    $this->db->insert('data-surat', $data);
  }

  public function getSuratMasuk()
  {
    $data = [
      'tipe_surat' => 'masuk'
    ];
    return $this->db->get_where('data-surat', $data)->result_array();
  }
  public function getSuratKeluar()
  {
    $data = [
      'tipe_surat' => 'keluar'
    ];
    return $this->db->get_where('data-surat', $data)->result_array();
  }

  public function hapusDataSurat($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('data-surat');
  }

  public function getSuratById($id)
  {
    $data = [
      'id' => $id
    ];
    return $this->db->get_where('data-surat', $data)->row_array();
  }

  public function editDataSurat($id)
  {
    $kategori_surat = $this->input->post('kategori_surat');
    $kategori_surat_string = implode(',', $kategori_surat);
    $data = [
      'nomor_surat' => htmlspecialchars($this->input->post('nomor_surat', true)),
      'pengirim' => htmlspecialchars($this->input->post('pengirim', true)),
      'penerima' => htmlspecialchars($this->input->post('penerima', true)),
      'perihal' => htmlspecialchars($this->input->post('perihal', true)),
      'divisi' => htmlspecialchars($this->input->post('divisi', true)),
      'kategori_surat' => $kategori_surat_string,
      'tipe_surat' => htmlspecialchars($this->input->post('tipe_surat', true)),
      'ket' => htmlspecialchars($this->input->post('ket', true)),
      'tanggal_surat' => htmlspecialchars($this->input->post('tanggal_surat', true)),
    ];
    $this->db->where('id', $id);
    $this->db->update('data-surat', $data);
  }

  public function getJumlahSuratKeluar()
  {
    $this->db->select('COUNT(*)as total');
    $this->db->where('tipe_surat', 'keluar');
    return $this->db->get('data-surat')->row()->total;
  }
  public function getJumlahSuratMasuk()
  {
    $this->db->select('COUNT(*)as total');
    $this->db->where('tipe_surat', 'masuk');
    return $this->db->get('data-surat')->row()->total;
  }
}