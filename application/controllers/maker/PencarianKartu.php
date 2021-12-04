<?php

class PencarianKartu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('levelid') != '3') {
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
        $data['title'] = "Pencarian Kartu";
        $data['personel'] = $this->mkpModel->get_data('master')->result();
        $this->load->view('templates_maker/header', $data);
        $this->load->view('templates_maker/sidebar');
        $this->load->view('maker/pencarianKartu', $data);
        $this->load->view('templates_maker/footer');
    }

    public function pencarianKartuAksi()
    {
        $keyword = $this->input->post('keyword');
        $data['personel'] = $this->mkpModel->get_personel_keyword($keyword);
        $data['title'] = "Pencarian Kartu";
        $this->load->view('templates_maker/header', $data);
        $this->load->view('templates_maker/sidebar');
        $this->load->view('pencarianKartuTampil', $data);
        $this->load->view('templates_maker/footer');
    }
}
