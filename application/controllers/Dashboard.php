<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function render_view($data)
	{
		$this->template->load('template', $data); //Display Page
	}
	function crousel()
	{
		$this->load->view('crouselmenu');
	}

	public function index()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$data = array(
				'page_content' 	=> 'dashboard',
				'ribbon' 		=> '<li class="active">Dashboard</li>',
				'page_name' 	=> 'Dashboard',
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function login()
	{
		$email = $this->input->post('email');
		$password = hash('sha512',md5($this->input->post('password')));
		$query = $this->db->query("select * from tbpengawas where nip ='" . $email . "' and password = '" . $password . "' and level ='operator' and isdeleted != 1 and status = 1");
		if ($query->num_rows() == 1) {
			$data = $query->result_array();
			foreach ($data as $value) {
				$data = [
					'username' => $value['username'],
					'nama' => $value['nama'],
					'nip' => $value['nip'],
					'jabatan' => $value['jabatan'],
					'level' => $value['level'],
					'gambar' => $value['gambar'],
				];
			}
			$this->session->set_userdata($data);
			redirect('dashboard/index');
		} else {
			$this->session->set_flashdata('category_error', 'Email atau password salah');
			redirect('dashboard/index');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('dashboard/index');
	}

	private function _send_email($token, $type)
	{
		require 'assets/PHPMailer/PHPMailerAutoload.php';


		$mail = new PHPMailer;

		// Konfigurasi SMTP
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'dummyarif3228@gmail.com';
		$mail->Password = '1234dummy';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;
		$mail->setFrom('dummyarif3228@gmail.com');
		// Menambahkan penerima
		$mail->addAddress($this->input->post('email'));
		// Menambahkan beberapa penerima
		if ($type == 'verify') {
			// Subjek email
			$mail->Subject = 'Manajemen Teknologi LAPAN - Verifikasi akun';

			// Mengatur format email ke HTML
			$mail->isHTML(true);

			// Konten/isi email
			$mailContent = 'Klik untuk aktivasi <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>';

			$mail->Body = $mailContent;
			// Menambahakn lampiran
			//$mail->addAttachment('berita/'.$file);
			//$mail->addAttachment('lmp/file2.png', 'nama-baru-file2.png'); //atur nama baru

		}

		// Kirim email
		if (!$mail->send()) {
			$pes = 'Pesan tidak dapat dikirim.';
			$mai = 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			$pes = 'Pesan telah terkirim';
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('msuser', ['email' => $email])->row_array();

		if ($user) {
			$user_token  = $this->db->get_where('msusertoken', ['token' => $token])->row_array();

			if ($user_token) {
				$this->db->set('is_active', 3);
				$this->db->where('email', $email);
				$this->db->update('msuser');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Aktivasi berhasil,silahkan Login</div>');
				redirect('auth');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Aktivasi gagal,token salah</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Aktivasi gagal,User salah</div>');
			redirect('auth');
		}
	}
}
