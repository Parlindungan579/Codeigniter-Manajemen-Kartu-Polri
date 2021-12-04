<?php

class ChecklistMabes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('levelid') != '07') {
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
        $data['personel'] = $this->mkpModel->get_data('master')->result();
        $data['title'] = "Checklist Permintaan Kartu";
        $this->load->view('templates_signer/header', $data);
        $this->load->view('templates_signer/sidebar');
        $this->load->view('signer/checklistMabes', $data);
        $this->load->view('templates_signer/footer');
    }
}
