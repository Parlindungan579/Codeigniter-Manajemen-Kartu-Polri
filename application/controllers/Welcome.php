<?php

class Welcome extends CI_Controller
{
	public function auth()
	{
		$u = $this->input->post('user_id');
		$p = $this->input->post('password');

		$this->db->where('user_id', $u);
		$obj = $this->db->get('user');

		if ($obj->num_rows()) {
			$data = $obj->row_array();
			if ($data['password'] == md5($p)) {
				$inputCaptcha = $this->input->post('captcha');
				$sessCaptcha = $this->session->userdata('captchaCode');
				if ($inputCaptcha === $sessCaptcha) {
					// unlink($captcha['filename']);
					$cek = $this->mkpModel->cek_login($u, $p);
					$this->session->set_userdata('levelid', $cek->levelid);
					switch ($cek->levelid) {
						case 07:
							redirect('signer/dashboard');
							break;
						case 04:
							redirect('checker/dashboard');
							break;
						case 03:
							redirect('maker/dashboard');
							break;
						default:
							break;
					}
				} else {
					$this->session->set_flashdata('msg', 'Captcha code does not match, please try again. !');
					redirect('welcome');
				}
			} else {
				$this->session->set_flashdata('msg', 'Incorrect Password !');
				redirect('welcome');
			}
		} else {
			$this->session->set_flashdata('msg', 'Incorrect Username !');
			redirect('welcome');
		}
	}

	public function index()
	{
		$random_number = substr(number_format(time() * rand(), 0, '', ''), 0, 5);
		// Captcha configuration
		$config = array(
			'word' => $random_number,
			'img_path' => 'captcha/',
			'img_url' => base_url() . 'captcha/',
			'img_width' => '200',
			'img_height' => 50,
			'expiration' => 7200,
			'colors'        => array(
				'background' => array(171, 194, 177),
				'border' => array(10, 51, 11),
				'text' => array(0, 0, 0),
				'grid' => array(185, 234, 237)
			)
		);
		// $captcha = create_captcha($config);
		$captcha = create_captcha($config);


		// Unset previous captcha and set new captcha word
		$this->session->unset_userdata('captchaCode');
		$this->session->set_userdata('captchaCode', $captcha['word']);

		// Pass captcha image to view
		$data['captchaImg'] = $captcha['image'];

		// Load the view
		$title['title'] = "Form Login";
		$this->load->view('templates_signer/header', $title);
		$this->load->view('formLogin', $data);
	}

	public function refresh()
	{
		$random_number = substr(number_format(time() * rand(), 0, '', ''), 0, 5);
		// Captcha configuration
		$config = array(
			'word' => $random_number,
			'img_path' => 'captcha/',
			'img_url' => base_url() . 'captcha/',
			'img_width' => '200',
			'img_height' => 50,
			'expiration' => 7200
		);
		$captcha = create_captcha($config);

		// Unset previous captcha and set new captcha word
		$this->session->unset_userdata('captchaCode');
		$this->session->set_userdata('captchaCode', $captcha['word']);

		// Display captcha image
		echo $captcha['image'];
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Welcome');
	}
}
