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
      'divisi_id' => htmlspecialchars($this->input->post('divisi', true)),
      'kategori_surat' => $kategori_surat_string,
      'file' => $new_image,
      'tipe_surat' => htmlspecialchars($this->input->post('tipe_surat', true)),
      'ket' => htmlspecialchars($this->input->post('ket', true)),
      'tanggal_surat' => htmlspecialchars($this->input->post('tanggal_surat', true)),
    ];


    $this->db->insert('data-surat', $data);
  }

  public function getDivisiAll()
  {
    return $this->db->get('divisi')->result_array();
  }

  public function tambahDataDivisi()
  {
    $data = [
      'divisi' => htmlspecialchars($this->input->post('divisi', true)),
    ];

    $this->db->insert('divisi', $data);
  }

  public function hapusDataDivisi($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('divisi');
  }

  public function editDataDivisi($id)
  {

    $data = [
      'divisi' => htmlspecialchars($this->input->post('divisi', true)),
    ];
    $this->db->where('id', $id);
    $this->db->update('divisi', $data);
  }

  public function getKategoriAll()
  {
    return $this->db->get('kategori_surat')->result_array();
  }

  public function tambahDataKategori()
  {
    $data = [
      'kategori_surat' => htmlspecialchars($this->input->post('kategori_surat', true)),
    ];

    $this->db->insert('kategori_surat', $data);
  }

  public function hapusDataKategori($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('kategori_surat');
  }

  public function editDataKategori($id)
  {

    $data = [
      'kategori_surat' => htmlspecialchars($this->input->post('kategori_surat', true)),
    ];
    $this->db->where('id', $id);
    $this->db->update('kategori_surat', $data);
  }

  public function getSuratMasuk()
  {
    $data = [
      'tipe_surat' => 'masuk'
    ];
    $this->db->select('data-surat.id,nomor_surat,pengirim,penerima,perihal,file,ket,kategori_surat,tipe_surat,tanggal_surat,divisi');
    $this->db->from('data-surat');
    $this->db->join('divisi', 'data-surat.divisi_id=divisi.id', 'left');
    $this->db->where($data);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getSuratKeluar()
  {
    $data = [
      'tipe_surat' => 'keluar'
    ];
    $this->db->select('data-surat.id,nomor_surat,pengirim,penerima,perihal,file,ket,kategori_surat,tipe_surat,tanggal_surat,divisi');
    $this->db->from('data-surat');
    $this->db->join('divisi', 'data-surat.divisi_id=divisi.id','left');
    $this->db->where($data);
    $query = $this->db->get();
    return $query->result_array();
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
      'divisi_id' => htmlspecialchars($this->input->post('divisi', true)),
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