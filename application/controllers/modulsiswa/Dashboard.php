<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('modulsiswa/model_siswa');
        $this->load->library('configfunction');
    }

    function render_view($data)
    {
        $this->template->load('templatesiswa', $data); //Display Page
    }

    public function index()
    {
        if ($this->session->userdata('username_siswa') != null && $this->session->userdata('nis') != null) {
            $idthnakademik = $this->configfunction->getidthnakd();
            $th_akademik = $idthnakademik[0]['ID'];
            $visit = $this->model_siswa->count_visit()->result();
            $click = $this->model_siswa->count_click()->result();
            $guru = $this->model_siswa->count_guru()->result();
            $siswa = $this->model_siswa->count_siswa($th_akademik)->result();
            $data = array(
                'page_content'     => 'dashboard',
                'ribbon'         => '',
                'page_name'     => 'Home',
                'visit'         => $visit,
                'click'         => $click,
                'guru'          => $guru,
                'siswa'         => $siswa
            );
            $this->render_view($data); //Memanggil function render_view
        } else {
            $this->load->view('pagesiswa/login'); //Memanggil function render_view
        }
    }

    public function login()
    {
        $email = $this->input->post('email');
        $password = hash("sha512", md5($this->input->post('password')));
        $query = $this->db->query("select count(NOINDUK) as jml,NMSISWA,NOINDUK,EMAIL from mssiswa where NOINDUK='" . $email . "' and PASSWORD = '$password'  GROUP BY NOINDUK");
        if ($query->num_rows() > 0) {
            $data = $query->result_array();
            foreach ($data as $value) {
                $data = [
                    'username_siswa' => $value['NMSISWA'],
                    'email' => $value['EMAIL'],
                    'nis' => $value['NOINDUK'],
                ];
            }
            $this->session->set_userdata($data);
            redirect('modulsiswa/dashboard/index');
        } else {
            $this->session->set_flashdata('category_error', 'Email atau password salah');
            redirect('modulsiswa/dashboard/index');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('modulsiswa/dashboard/index');
    }

    private function _token($length = 12)
    {
        $str = "";
        $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str  .= $characters[$rand];
        }
        return $str;
    }

    public function forgot_password()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('category_error', '<div class="alert alert-danger" role="alert">
            Email belum terdaftar!</div>');
            redirect('modulsiswa/dashboard');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('mssiswa', ['EMAIL' => $email, 'isdeleted' => 0])->row_array();
            if (count($user) > 0) {
                $token = $this->_token();
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];
                $insert = $this->model_siswa->insert( $user_token,'msusertoken');
                $ngimail = $this->_send_email($token, 'forgot');
                $this->session->set_flashdata('category_success', '<div class="alert alert-success" role="alert">
            Periksa email untuk reset password!</div>');
                redirect('modulsiswa/dashboard');
            } else {
                $this->session->set_flashdata('category_error', '<div class="alert alert-danger" role="alert">
            Email belum terdaftar!</div>');
                redirect('modulsiswa/dashboard');
            }
        }
    }

    private function _send_email($token, $type)
	{
		require 'assets/PHPMailer/PHPMailerAutoload.php';


		$mail = new PHPMailer;

		// Konfigurasi SMTP
		$mail->isSMTP();
        $mail->Host = HOST_EMAIL;
		$mail->SMTPAuth = true;
		$mail->Username = EMAIL_BANTUAN;
		$mail->Password = PASSWORD_BANTUAN;
		$mail->SMTPSecure = 'tls';
		$mail->Port = EMAIL_PORT;
		$mail->setFrom(EMAIL_BANTUAN);
		// Menambahkan penerima
		$mail->addAddress($this->input->post('email'));
		if ($type == 'forgot') {
			// Subjek email
			$mail->Subject = 'School Gemanurani  - Reset Password';
			// Mengatur format email ke HTML
			$mail->isHTML(true);
			// Konten/isi email
			$mailContent = 'Klik untuk reset password akun anda  <a href="'.base_url().'modulsiswa/dashboard/resetpassword?email='.$this->input->post('email').'&token='.urlencode($token).'">Reset Password</a>';
			$mail->Body = $mailContent;
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
        $user = $this->lapan_api_library->call_gateway('users/getuserbyemail2', ['email' => $email]);
        // print_r($user);exit;
        if ($user) {

            $user_token = $this->lapan_api_library->call_gateway('users/getuserstdbytoken', ['token' => $token]);
            // print_r($user_token);exit;
            if (count($user_token)) {
                $aktivasi = $this->lapan_api_library->call_gateway('users/aktivasiuser', ['is_active' => '3', 'email' => $email]);
                if ($aktivasi['status'] == 200) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Aktivasi berhasil,silahkan Login</div>');
                }
                $haha = $this->lapan_api_library->call_gateway('users/deletetoken', ['email' => $email]);
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

    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->db->get_where('mssiswa', ['EMAIL' => $email])->row_array();
        if (count($user)>0)  {
            $token = ['token' => $token];
            $user_token = $this->db->query("select token from msusertoken where email ='".$email."'")->result_array();
            if ($user_token[0]) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Reset password gagal,token salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Reset password gagal,Email salah</div>');
            redirect('auth');
        }
    }

    public function changepassword()
    {
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password Ulang', 'required|trim|min_length[8]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('pagesiswa/changepassword');
        } else {
            $password = hash('sha512',md5($this->input->post('password1')));
            $email = $this->session->userdata('reset_email');
            $this->db->set('PASSWORD', $password);
            $this->db->set('updatedAt', date('Y-m-d'));
            $this->db->where('EMAIL', $email);
            $this->db->update('mssiswa');
            $this->db->query("delete from msusertoken where email = '".$email."'");
            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Password telah diubah,silahkan Login</div>');
            redirect('modulsiswa/dashboard/login');
        }
    }
}
