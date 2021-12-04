<?php

class PermintaanKartu extends CI_Controller
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
        if ($this->input->post()) {

            $this->rules();

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "Permintaan Kartu";
                $this->load->view('templates_maker/header', $data);
                $this->load->view('templates_maker/sidebar');
                $this->load->view('maker/permintaanKartu', $data);
                $this->load->view('templates_maker/footer');
            } else {
                $nrp = $this->input->post('nrp');
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'http://api.updating.sipp.polri.go.id/index.php/EKTABRIApi/getDataNRP/' . $nrp,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_HTTPHEADER => array(
                        'app_key: UOZFxRnueapKe6FQ',
                        'app_id: 198'
                    ),
                ));

                $response = curl_exec($curl);
                $dataresponse = json_decode($response, TRUE);
                curl_close($curl);

                if ($dataresponse['success'] == "success" || $dataresponse['success'] == "1") {
                    $data['personel'] = $dataresponse['personel'];
                    $data['title'] = "Permintaan Kartu";
                    $this->load->view('templates_maker/header', $data);
                    $this->load->view('templates_maker/sidebar');
                    $this->load->view('maker/permintaanKartuTampil', $data);
                    $this->load->view('templates_maker/footer');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Data tidak ditemukan !</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect('maker/permintaanKartu');
                }
            }
        } else {
            $data['title'] = "Permintaan Kartu";
            $this->load->view('templates_maker/header', $data);
            $this->load->view('templates_maker/sidebar');
            $this->load->view('maker/permintaanKartu', $data);
            $this->load->view('templates_maker/footer');
        }
    }

    public function rules()
    {
        $this->form_validation->set_rules('nrp', 'nrp', 'required');
    }

    public function permintaanKartuAksi()
    {
        $nrp                = $this->input->post('nrp');
        $nama               = $this->input->post('nama_lengkap');
        $tmpt_lahir         = $this->input->post('tempat_lahir');
        $tgl_lahir          = $this->input->post('tanggal_lahir');
        $jabatan            = $this->input->post('jabatan');
        $tmt_jabatan        = $this->input->post('tmt_jabatan');
        $pangkat            = $this->input->post('pangkat');
        $tmt_pangkat        = $this->input->post('tmt_pangkat');
        $satker             = $this->input->post('satker');
        $tgl_input          = $this->input->post('tgl_input');
        $jenis_request      = $this->input->post('jenis_request');
        $status_request     = $this->input->post('status_request');
        $status_kartu       = $this->input->post('status_kartu');
        $jumlah_cetak       = $this->input->post('jumlah_cetak');

        $data = array(
            'nrp'                  => $nrp,
            'nama'                 => $nama,
            'tmpt_lahir'           => $tmpt_lahir,
            'tgl_lahir'            => $tgl_lahir,
            'jabatan'              => $jabatan,
            'tmt_jabatan'          => $tmt_jabatan,
            'pangkat'              => $pangkat,
            'tmt_pangkat'          => $tmt_pangkat,
            'satker'               => $satker,
            'tgl_input'            => $tgl_input,
            'jenis_request'        => $jenis_request,
            'status_request'       => $status_request,
            'isAktif'              => $status_kartu,
            'isPrinting'           => $jumlah_cetak,
        );

        $cek_nrp = $this->mkpModel->cek_nrp($nrp);
        if ($cek_nrp == TRUE) {
            $this->session->set_userdata('jenis_request', $cek_nrp->jenis_request);
            switch ($cek_nrp->jenis_request) {
                case 1:
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Anda sudah mengajukan permintaan kartu !</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                    redirect('maker/permintaanKartu');
                    break;
                case 2:
                    $this->mkpModel->insert_data($data, 'master');
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Permintaan kartu berhasil masuk ke checklist permintaan.</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>');
                    redirect('maker/permintaanKartu');
                    break;
                default:
                    break;
            }
        } else {
            $this->mkpModel->insert_data($data, 'master');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Permintaan kartu berhasil masuk ke checklist permintaan.</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>');
            redirect('maker/permintaanKartu');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nrp', 'nrp', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('tmpt_lahir', 'tmpt_lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
        $this->form_validation->set_rules('tmt_jabatan', 'tmt_jabatan', 'required');
        $this->form_validation->set_rules('pangkat', 'pangkat', 'required');
        $this->form_validation->set_rules('tmt_pangkat', 'tmt_pangkat', 'required');
        $this->form_validation->set_rules('jenis_request', 'jenis_request', 'required');
        $this->form_validation->set_rules('satker', 'satker', 'required');
    }
}
