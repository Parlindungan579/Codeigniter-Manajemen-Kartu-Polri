<?php

class PermintaanMassal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mkpModel');
        $this->load->library('csvimport');
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
        $data['title'] = "Permintaan Massal";
        $this->load->view('templates_maker/header', $data);
        $this->load->view('templates_maker/sidebar');
        $this->load->view('maker/permintaanMassal', $data);
        $this->load->view('templates_maker/footer');
    }

    public function importcsv()
    {
        $data['error'] = '';
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '1000';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $data['error'] = $this->upload->display_errors();
            $data['title'] = "Permintaan Massal";
            $this->load->view('templates_maker/header', $data);
            $this->load->view('templates_maker/sidebar');
            $this->load->view('maker/permintaanMassal', $data);
            $this->load->view('templates_maker/footer');
        } else {
            $file_data = $this->upload->data();

            $file_path =  './uploads/' . $file_data['file_name'];

            if ($this->csvimport->get_array($file_path)) {
                $csv_array = $this->csvimport->get_array($file_path);
                foreach ($csv_array as $row) {
                    $insert_data = array(
                        'nama' => $row['NAMA'],
                        'pangkat' => $row['PANGKAT'],
                        'nrp' => $row['NRP'],
                        'satker' => $row['SATKER'],
                        'sub_satker1' => $row['SUB SATKER'],
                        'tgl_input' => date('Y-m-d'),
                        'jenis_request' => '1',
                        'status_request' => '0',
                        'isAktif' => '0',
                        'isPrinting' => '0',
                    );
                    $this->mkpModel->insert_csv($insert_data);
                }

                unlink($file_path);
            }
            $personel = $this->mkpModel->all_personel();
            $data['data'] = "Error occured";
            $data['title'] = "Permintaan Massal";
            $this->load->view('templates_maker/header', $data);
            $this->load->view('templates_maker/sidebar');
            $this->load->view('maker/upload_success', ['personel' => $personel]);
            $this->load->view('templates_maker/footer');
        }
    }

    public function permintaanMassalAksi()
    {
        $button = $this->input->post('button_action');
        if ($button == "update_data") {
            $id = $this->input->post('id');
            //print_r($id);
            if ($id == "") {
                echo "please select student id";
            } else {
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
            }

            $data['title'] = "Permintaan Massal";
            $this->load->view('templates_maker/header', $data);
            $this->load->view('templates_maker/sidebar');
            $this->load->view('maker/updateDataPersonel', ['personel' => $stu_data]);
            $this->load->view('templates_maker/footer');
        } elseif ($button == "save_data") {
            $id = $this->input->post('id');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                         <strong>Data berhasil disimpan ke tabel checklist.</strong>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                       </div>');
            redirect('maker/permintaanMassal');
        } else {
            $id = $this->input->post('id');
            if ($id == "") {
                echo "please select personel id";
            }
        }
    }

    public function updateDataPersonel()
    {
        $id                 = $this->input->post('id');
        $nama               = $this->input->post('nama');
        $pangkat            = $this->input->post('pangkat');
        $nrp                = $this->input->post('nrp');
        $satker             = $this->input->post('satker');
        $status_request     = $this->input->post('status_request');
        $tgl_input          = $this->input->post('tgl_input');

        for ($i = 0; $i < count($id); $i++) {
            $result = $this->db->where(['id' => $id[$i]])
                ->update('master', [
                    'nama'              => $nama[$i],
                    'pangkat'           => $pangkat[$i],
                    'nrp'               => $nrp[$i],
                    'satker'            => $satker[$i],
                    'status_request'    => $status_request[$i],
                    'tgl_input'         => $tgl_input[$i],
                ]);
        }
        if ($result) {
            $personel = $this->mkpModel->all_personel();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                         <strong>Data berhasil diedit.</strong>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                       </div>');
            $data['data'] = "Error occured";
            $data['title'] = "Permintaan Massal";
            $this->load->view('templates_maker/header', $data);
            $this->load->view('templates_maker/sidebar');
            $this->load->view('maker/upload_success', ['personel' => $personel]);
            $this->load->view('templates_maker/footer');
        } else {
            echo "Data gagal diedit";
        }
    }
}
