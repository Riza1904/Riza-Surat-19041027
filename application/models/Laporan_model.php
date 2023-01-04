<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_model
{

  public function getSuratMasukAjaxByTgl($tgl_awal, $tgl_akhir)
  {
    $this->db->select('data-surat.id,nomor_surat,pengirim,penerima,perihal,file,ket,kategori_surat,tipe_surat,tanggal_surat,divisi');
    $this->db->from('data-surat');
    $this->db->join('divisi', 'data-surat.divisi_id=divisi.id', "left");
    $this->db->where("tipe_surat", "masuk");
    $this->db->where('tanggal_surat BETWEEN "' . $tgl_awal . '" AND "' . $tgl_akhir . '"');
    $query = $this->db->get();
    return $query->result();
  }

  public function getSuratMasukByTgl($tgl_awal, $tgl_akhir)
  {
    $this->db->select('data-surat.id,nomor_surat,pengirim,penerima,perihal,file,ket,kategori_surat,tipe_surat,tanggal_surat,divisi');
    $this->db->from('data-surat');
    $this->db->join('divisi', 'data-surat.divisi_id=divisi.id', "left");
    $this->db->where("tipe_surat", "masuk");
    $this->db->where('tanggal_surat BETWEEN "' . $tgl_awal . '" AND "' . $tgl_akhir . '"');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getSuratKeluarAjaxByTgl($tgl_awal, $tgl_akhir)
  {
    $this->db->select('data-surat.id,nomor_surat,pengirim,penerima,perihal,file,ket,kategori_surat,tipe_surat,tanggal_surat,divisi');
    $this->db->from('data-surat');
    $this->db->join('divisi', 'data-surat.divisi_id=divisi.id', "left");
    $this->db->where("tipe_surat", "keluar");
    $this->db->where('tanggal_surat BETWEEN "' . $tgl_awal . '" AND "' . $tgl_akhir . '"');
    $query = $this->db->get();
    return $query->result();
  }

  public function getSuratKeluarByTgl($tgl_awal, $tgl_akhir)
  {
    $this->db->select('data-surat.id,nomor_surat,pengirim,penerima,perihal,file,ket,kategori_surat,tipe_surat,tanggal_surat,divisi');
    $this->db->from('data-surat');
    $this->db->join('divisi', 'data-surat.divisi_id=divisi.id', "left");
    $this->db->where("tipe_surat", "keluar");
    $this->db->where('tanggal_surat BETWEEN "' . $tgl_awal . '" AND "' . $tgl_akhir . '"');
    $query = $this->db->get();
    return $query->result_array();
  }
}