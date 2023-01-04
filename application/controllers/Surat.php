<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Surat_model', 'surat');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['divisi'] = $this->surat->getDivisiAll();
		$data['kategori'] = $this->surat->getKategoriAll();


		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required|trim|is_unique[data-surat.nomor_surat]', ['is_unique' => 'Nomor surat Sudah digunakan']);
		$this->form_validation->set_rules('pengirim', 'Pengirim', 'required|trim');
		$this->form_validation->set_rules('penerima', 'Penerima', 'required|trim');
		$this->form_validation->set_rules('perihal', 'Perihal', 'required|trim');
		$this->form_validation->set_rules('divisi', 'Divisi', 'required|trim');
		$this->form_validation->set_rules('kategori_surat[]', 'Kategori Surat', 'required');
		$this->form_validation->set_rules('ket', 'Keterangan', 'required|trim');
		$this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'required|trim');


		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar');
			$this->load->view('home/index', $data);
			$this->load->view('templates/footer');
		} else {
			$upload_img = $_FILES['image']['name'];
			if (!$upload_img) {
				$this->session->set_flashdata('error',  'Upload scan gamber');
				redirect('surat');
			} else {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2048';
				$config['upload_path'] = './assets/img/surat/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$new_img = $this->upload->data('file_name');
					$this->surat->tambahDataSurat($new_img);
					$this->session->set_flashdata('message', 'Surat Berhasil dibuat');
					redirect('dashboard');
				} else {
					$this->session->set_flashdata('error',  'Data gagal diedit file gambar tidak sesuai');
					redirect('surat');
				}
			}
		}
	}

	public function suratMasuk()
	{
		$data['title'] = 'Surat Masuk';
		$data['surat'] = $this->surat->getSuratMasuk();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('home/surat-masuk', $data);
		$this->load->view('templates/footer');
	}

	public function suratKeluar()
	{
		$data['title'] = 'Surat Keluar';
		$data['surat'] = $this->surat->getSuratKeluar();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('home/surat-keluar', $data);
		$this->load->view('templates/footer');
	}


	public function hapusSurat($id, $redirect_page)
	{
		$file = $this->input->get('file');
		$this->surat->hapusDataSurat($id);
		$this->session->set_flashdata('message', 'Data surat berhasil dihapus!');
		if ($file != 'default.jpg') {
			unlink(FCPATH . 'assets/img/surat/' . $file);
			redirect('surat/' . $redirect_page);
		} else {
			redirect('surat/' . $redirect_page);
		}
	}

	public function ubahSurat($id, $redirect_page)
	{
		$data['title'] = 'Ubah Surat';
		$data['redirect_page'] = $redirect_page;
		$data['surat'] = $this->db->get_where('data-surat', ['id' => $id])->row_array();
		$data['divisi'] = $this->surat->getDivisiAll();
		$data['kategori'] = $this->surat->getKategoriAll();
		$this->form_validation->set_rules('pengirim', 'Pengirim', 'required|trim');
		$this->form_validation->set_rules('penerima', 'Penerima', 'required|trim');
		$this->form_validation->set_rules('perihal', 'Perihal', 'required|trim');
		$this->form_validation->set_rules('divisi', 'Divisi', 'required|trim');
		$this->form_validation->set_rules('kategori_surat[]', 'Kategori Surat', 'required');
		$this->form_validation->set_rules('ket', 'Keterangan', 'required|trim');
		$this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('home/edit-surat', $data);
			$this->load->view('templates/footer');
		} else {
			//cek jika ada gambar yang diupload
			$upload_img = $_FILES['image']['name'];


			if ($upload_img) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2048';
				$config['upload_path'] = './assets/img/surat/';


				$this->load->library('upload', $config);


				if ($this->upload->do_upload('image')) {

					$old_img = $data['surat']['file'];
					if ($old_img != 'default.jpg') {
						unlink(FCPATH . 'assets/img/surat/' . $old_img);
					}
					$new_img = $this->upload->data('file_name');
					$this->db->set('file', $new_img);
				} else {
					$this->session->set_flashdata('error',  'Data gagal diedit file gambar tidak sesuai');
					redirect("surat/" . $redirect_page);
				}
			}

			$this->surat->editDataSurat($id);
			$this->session->set_flashdata('message', 'Ubah surat berhasil!');
			redirect("surat/" . $redirect_page);
		}
	}

	public function download($id)
	{


		// Get file data from database
		$file = $this->surat->getSuratById($id);

		// // Set file path
		$file_path = 'assets/img/surat/' . $file['file'];


		// Set download data
		$data = file_get_contents($file_path);
		$name = $file['file'];
		$size = filesize($file_path);
		// $size = $file->size;

		// Set headers
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="' . $name . '"');
		header('Content-Length: ' . $size);

		// Download file
		echo $data;
	}
}