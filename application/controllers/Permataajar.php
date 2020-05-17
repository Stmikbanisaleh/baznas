<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permataajar extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_permataajar');
	}

	function render_view($data)
	{
		$this->template->load('template', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$mytahun = $this->model_permataajar->gettahun()->result_array();
			$mysemester = $this->model_permataajar->getsemester()->result_array();
			$myps = $this->model_permataajar->getps()->result_array();
			$data = array(
				'page_content' 	=> '/permataajar/view',
				'ribbon' 		=> '<li class="active">Dashboard</li><li>Data Permataajar</li>',
				'page_name' 	=> 'Data Permataajar',
				'js' 			=> 'js_file',
				'mytahun'		=> $mytahun,
				'mysemester'	=> $mysemester,
				'myps'			=> $myps
			);
			$this->render_view($data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function search()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$tahun = $this->input->post('tahun');
			$semester = $this->input->post('semester');
			$programsekolah = $this->input->post('programsekolah');
			$result = $this->model_permataajar->getpermataajar($tahun, $semester, $programsekolah)->result();
			echo json_encode($result);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}
	public function simpan()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$config['upload_path']          = './assets/gambar';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);
			if ($this->upload->do_upload("file")) {
				$data = array('upload_data' => $this->upload->data());
				$foto = $data['upload_data']['file_name'];
				$data = array(
					'nip'  => $this->input->post('nip'),
					'nama'  => $this->input->post('nama'),
					'jabatan'  => $this->input->post('jabatan'),
					'username'  => $this->input->post('email'),
					'password'  => $this->input->post('password'),
					'level' => $this->input->post('level'),
					'status'  => 1,
					'gambar'  => $foto,
					'createdAt' => date('Y-m-d H:i:s')
				);
				$result = $this->model_karyawan->insert($data, 'tbpengawas');
				echo json_decode($result);
			} else {
				$data = array(
					'nip'  => $this->input->post('nip'),
					'nama'  => $this->input->post('nama'),
					'jabatan'  => $this->input->post('jabatan'),
					'username'  => $this->input->post('email'),
					'password'  => $this->input->post('password'),
					'level' => $this->input->post('level'),
					'status'  => 1,
					'gambar'  => null,
					'createdAt' => date('Y-m-d H:i:s')
				);
				$result = $this->model_karyawan->insert($data, 'tbpengawas');
				echo json_decode($result);
			}
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function tampil_byid()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$data = array(
				'id_pengawas'  => $this->input->post('id'),
			);
			$my_data = $this->model_karyawan->view_where('tbpengawas', $data)->result();
			echo json_encode($my_data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function kirim_email()
	{
		$semester = $this->input->post('semester');
		$ps = $this->input->post('ps');
		$periode = $this->input->post('periode');
		if (empty($ps) && empty($semester) && empty($periode)) {
			echo json_encode(404);
		} else {
			$data = $this->model_permataajar->getdataemail($semester, $ps, $periode)->result_array();
			$this->send_email($data);
		}
	}

	private function send_email($type)
	{
		require 'assets/PHPMailer/PHPMailerAutoload.php';
		$mail = new PHPMailer;
		// Konfigurasi SMTP
		$mail->isSMTP();
		$mail->Host = HOST_EMAIL;
		$mail->SMTPAuth = true;
		$mail->Username = EMAIL_NILAI;
		$mail->Password = PASSWORD_NILAI;
		$mail->SMTPSecure = 'tls';
		$mail->Port = EMAIL_PORT;
		foreach ($type as $value) {
			print_r($value);
			$mail->setFrom(EMAIL_NILAI, 'Mata Pelajaran ' . $value['KLSTRNIL'] . "-" . $value['nama_siswa']);
			$mail->addReplyTo(EMAIL_LOG, 'Mata Pelajaran ' . $value['KLSTRNIL'] . "-" . $value['nama_siswa']);
			$mail->addAddress($value['EMAIL']);

			if (!empty($value)) {
				// Subjek email
				$mail->Subject = 'Nilai Siswa Mata Pelajaran';
				// Mengatur format email ke HTML
				$mail->isHTML(true);
				// Konten/isi email
				$mailContent = "<p>
								  <table width='70%'style='border-style:solid' class='table' border=1>
									<thead>
									  <tr>
										<th>Mata Ajar</th>
										<th>Kelas</th>
										<th>UTS</th>	
										<th>UAS</th>	
									  </tr>
									</thead>
									<tbody>";
				$mailFooter = "</tbody>
								  </table>
			<br>
			<br>Terima kasih atas perhatian dan kerjasamanya.
			<br>
			<br>
			<br>Regards,
			<br><b><font color=blue>Server Gema Nurani</font></b>
			<br><font color=green>ICT</font>
			<br>Gema Nurani
			<br>Jl. Raya Kaliabang Tengah No.75B, Kaliabang Tengah, Bekasi Utara, Kota Bks, Jawa Barat 17125
			<br><font color=green>Ph :</font> (021) 88871329
			<br><font color=green>Website :</font> berita.gemanurani-bks.sch.id
			<br><font color=green>E-Mail :</font> server.gemanurani@gmail.com
			<br>Integrated And Holistic Islamic School</p>";
				$data = $this->model_permataajar->getformatemail($value['NPMTRNIL'])->result_array();
				$no = 1;
				foreach ($data as $value) {
					$vm[$no] = "
					<tr>
						<td>" . $value['KDMKTRNIL'] . "-" . $value['nama_mapel'] . "</td> 
						<td text-align='center'>" . $value['KLSTRNIL'] . "</td> 
						<td align-text='center'>" . $value['UTSTRNIL'] . "</td> 
						<td align-text='center'>" . $value['UASTRNIL'] . "</td> 
					</tr>
				";
					$no++;
				}
				$mail->Body = $mailContent . $vm[1] . $vm[2] . $vm[3] . $vm[4] . $vm[5] . $vm[6] . $vm[7] . $vm[8] . $vm[9] . $vm[10] . $vm[11] . $vm[12] . $vm[13] . $vm[14] . $mailFooter;
			}

			// Kirim email
			if (!$mail->send()) {
				$pes = 'Pesan tidak dapat dikirim.';
				$mai = 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				$pes = 'Pesan telah terkirim';
			}
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$my_data = $this->model_karyawan->view_karyawan()->result_array();
			echo json_encode($my_data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function update()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$data_id = array(
				'id'  => $this->input->post('e_id')
			);
			$config['upload_path']          = './assets/gambar';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);
			if ($this->upload->do_upload("e_file")) {
				$data = array('upload_data' => $this->upload->data());
				$foto = $data['upload_data']['file_name'];
				$data = array(
					'nip'  => $this->input->post('nip'),
					'nama'  => $this->input->post('nama'),
					'jabatan'  => $this->input->post('jabatan'),
					'username'  => $this->input->post('email'),
					'password'  => $this->input->post('password'),
					'level' => $this->input->post('level'),
					'status'  => 1,
					'gambar'  => $foto,
					'createdAt' => date('Y-m-d H:i:s')
				);
				$result = $this->model_karyawan->update($data_id, $data, 'tbpengawas');
				echo json_decode($result);
			} else {
				$data = array(
					'nip'  => $this->input->post('e_nip'),
					'nama'  => $this->input->post('e_nama'),
					'jabatan'  => $this->input->post('e_jabatan'),
					'username'  => $this->input->post('e_email'),
					'password'  => $this->input->post('e_password'),
					'level' => $this->input->post('e_level'),
					'status'  => $this->input->post('e_status'),
					'gambar'  => null,
					'createdAt' => date('Y-m-d H:i:s')
				);
				$result = $this->model_karyawan->update($data_id, $data, 'tbpengawas');
				echo json_decode($result);
			}
			echo json_encode($result);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function delete()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$data_id = array(
				'id_pengawas'  => $this->input->post('id')
			);
			$data = array(
				'isdeleted'  => 1,
			);
			$action = $this->model_karyawan->update($data_id, $data, 'tbpengawas');
			echo json_encode($action);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}
}
