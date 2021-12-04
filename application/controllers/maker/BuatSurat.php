<?php

class BuatSurat extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    if ($this->session->userdata('levelid') != '03') {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Anda belum login !</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>');
      redirect('welcome');
    }
  }

  public function index()
  {
    $data['title'] = "Buat Surat Permintaan Kartu";
    $data['total_isPati'] = $this->mkpModel->cek_isPati();

    $this->session->set_userdata('Tahap', 'M');

    $id = $this->input->post('id');
    for ($i = 0; $i < count($id); $i++) {
      $result = $this->db->select()
        ->from('master')
        ->where_in('id', $id)
        ->get();
    }
    if ($result->num_rows() > 0) {
      $stu_data = $result->result();
    } else {
      $stu_data = $result->result();
    }

    $this->load->view('templates_maker/header', $data);
    $this->load->view('templates_maker/sidebar');
    $this->load->view('maker/buatSurat', ['personel' => $stu_data]);
    $this->load->view('templates_maker/footer');
  }

  public function buatSuratAksi()
  {
    $id                 = $this->input->post('id');
    $noSuratMaker       = $this->input->post('noSuratMaker');
    $status_request     = $this->input->post('status_request');

    for ($i = 0; $i < count($id); $i++) {
      $result = $this->db->where(['id' => $id[$i]])
        ->update('master', [
          'noSuratMaker'    => $noSuratMaker[$i],
          'status_request'  => $status_request[$i],
        ]);
    }

    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Surat berhasil dibuat. Terima kasih.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect('maker/checklistPermintaan');
  }
}
