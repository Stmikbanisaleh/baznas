<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembuatannis extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_pembuatan');
    }

    function render_view($data)
    {
        $this->template->load('template', $data); //Display Page

    }

    public function search()
    {
        $tahun = $this->input->post('tahun');
        $programsekolah = $this->input->post('programsekolah');
        $result = $this->model_pembuatan->getjadwal($tahun, $programsekolah)->result();
        echo json_encode($result);
    }

    public function showguru()
    {
        $ps = $this->input->post('ps');
        $data = array('GuruBase' => $ps);
        $my_data = $this->model_pembuatan->viewWhereOrdering('tbguru', $data, 'id', 'asc')->result_array();
        echo "<option value='0'>--Pilih Guru --</option>";
        foreach ($my_data as $value) {
            echo "<option value='" . $value['IdGuru'] . "'>[" . $value['GuruNama'] . "] </option>";
        }
    }

    public function showmapel()
    {
        $ps = $this->input->post('ps');
        $data = array('PS' => $ps);
        $my_data = $this->model_pembuatan->viewWhereOrdering('mspelajaran', $data, 'id_mapel', 'asc')->result_array();
        echo "<option value='0'>--Pilih Mapel --</option>";
        foreach ($my_data as $value) {
            echo "<option value='" . $value['id_mapel'] . "'>[" . $value['nama'] . "] </option>";
        }
    }

    public function index()
    {
        $myjurusan = $this->model_pembuatan->getjurusan()->result_array();
        $data = array(
            'page_content'  => 'pembuatannis/view',
            'ribbon'        => '<li class="active">Pembuatan NIS</li>',
            'page_name'     => 'Pembuatan NIS',
            'myjurusan'        => $myjurusan,
        );
        $this->render_view($data); //Memanggil function render_view
    }

    public function tampil()
    {
        $my_data = $this->model_pembuatan->getdata()->result_array();
        echo json_encode($my_data);
    }

    public function proses()
    {
        $kode = $this->input->post('kode');
        $tahunmasuk = $this->input->post('tahunmasuk');
        $jurusan = $this->input->post('jurusan');
        $data = $this->model_pembuatan->proses($jurusan, $tahunmasuk)->result_array();
        if ($data) {
            foreach ($data as $value) {
                $datas = array(
                    'Noreg' => $value['Noreg'],
                    'NMSISWA' => $value['Namacasis'],
                    'AGAMA' => $value['agama'],
                    'PS' => $value['kodesekolah'],
                    'TGLHR' => $value['tgllhr'],
                    'TPLHR' => $value['tptlhr'],
                    'NMBAPAK' => $value['NmBapak'],
                    'NMIBU' => $value['NmIbu'],
                    'PEKERJAANORTU' => $value['Perkerjaanortu'],
                    'GAJIORTU' => $value['GajiOrtu'],
                    'ALAMATRUMAH' => $value['AlamatRumah'],
                    'KELURAHAN' => $value['Kelurahan'],
                    'KECAMATAN' => $value['Kecamatan'],
                    'KABUPATEN' => $value['Kabupaten'],
                    'PROVINSI'  => $value['Propinsi'],
                    'KDPOS' => $value['Kodepos'],
                    'TLPRUMAH' => $value['TelpRumah'],
                    'NOHP'  => $value['TelpHp'],
                    'NMWALI'  => $value['NamaWali'],
                    'PEKERJAAN'  => $value['Pekerjaan'],
                    'TLPWALI'   => $value['TelpWali'],
                    'TLPHPWALI' => $value['TelpHpwali'],
                    'NMASLSKL' => $value['AsalSekolah'],
                    'ALMASLSKL'  => $value['AlamatASalSek'],
                    'KELURAHANSEKOLAHASAL'  => $value['ASlKelurahan'],
                    // ''  => $value['Aslsekkecamatan'],
                    // ''  => $value['aslsekkabupaten'],
                    // ''  => $value['aslsekpropinsi'],
                    'STTBASLSKL'  => $value['NoIjazah'],
                    'NILSTTBASLSKL'  => $value['NilaiJazah'],
                    // ''  => $value['NoNem'],
                    'NILNEMASLSKL'  => $value['NilaiNem'],
                    // ''  => $value['potoijazah'],
                    // ''  => $value['potonem'],
                    // ''  => $value['potocalsis'],
                    'TAHUN'  => $value['thnmasuk'],
                    'STATUSCALONSISWA'  => 4,
                    'createdAt' => $value['tglentri'],
                    'IDUSER' => $value['userentri'],
                    'JK'  => $value['Jk']
                );
                $insert = $this->model_pembuatan->insert($datas, 'mssiswa');
                if ($insert) {
                    $siswa = $this->model_pembuatan->generate($tahunmasuk, $jurusan)->result_array();
                    $no = 1;
                    foreach ($siswa as $value) {
                        $nis = $this->model_pembuatan->getnis($tahunmasuk, $jurusan)->result_array();
                        $v_ni = $nis[0]['ni'];
                        if ($v_ni == '' || $v_ni == null) {
                            $v_ni2 = $no;
                            if ($no < 10) {
                                $v_no = '00' . $no;
                            } elseif ($no >= 10 && $no <= 99) {
                                $v_no = '0' . $no;
                            } elseif ($no >= 100) {
                                $v_no = $no;
                            }
                        } else {
                            $v_ni2 = $v_ni + 1;
                            if ($v_ni2 < 10) {
                                $v_no = '00' . $v_ni2;
                            } elseif ($v_ni2 >= 10 && $v_ni2 <= 99) {
                                $v_no = '0' . $v_ni2;
                            } elseif ($v_ni2 >= 100) {
                                $v_no = $v_ni2;
                            }
                        }
                        $password = hash('sha512', md5($tahunmasuk . $kode . $v_no));
                        $update = $this->db->query("update mssiswa set
						NOINDUK ='" . $tahunmasuk . $kode . $v_no . "',
						STATUSCALONSISWA='4', PASSWORD = '" . $password . "'
                        WHERE Noreg='" . $value['NOREG'] . "'");
                        $no + 1;
                    }
                }
            }
        }
        echo json_encode(true);
    }

    public function getnis($tahunmasuk, $jurusan)
    {
        $nis = $this->model_pembuatan->getnis($tahunmasuk, $jurusan)->result_array();
        return $nis;
    }
    public function tampil_byid()
    {
        $data = array(
            'id'  => $this->input->post('id'),
        );
        $my_data = $this->model_pembuatan->view_where('tbjadwal', $data)->result();
        echo json_encode($my_data);
    }

    public function simpan()
    {
        $this->load->library('Configfunction');
        $tampil_thnakad = $this->configfunction->getthnakd();
        $data = array(
            'ps'  => $this->input->post('programsekolahs'),
            'id_mapel'  => $this->input->post('mataajar'),
            'id_ruang'  => $this->input->post('ruang'),
            'id_guru'  => $this->input->post('guru'),
            'hari'  => $this->input->post('hari'),
            'jam'  => $this->input->post('jam'),
            'nmklstrjdk'  => $this->input->post('kelas'),
            'periode'  => $tampil_thnakad[0]['THNAKAD'],
            'semester'  => $tampil_thnakad[0]['SEMESTER'],
            'createdAt' => date('Y-m-d H:i:s'),
        );
        $action = $this->model_pembuatan->insert($data, 'tbjadwal');
        echo json_encode($action);
    }

    public function update()
    {
        $data_id = array(
            'id'  => $this->input->post('e_id')
        );
        $data = array(
            'nama'  => $this->input->post('e_nama'),
            'updatedAt' => date('Y-m-d H:i:s'),
        );
        $action = $this->model_pembuatan->update($data_id, $data, 'tbjadwal');
        echo json_encode($action);
    }

    public function delete()
    {
        $data_id = array(
            'id'  => $this->input->post('id')
        );
        $data = array(
            'isdeleted'  => 1,
        );
        $action = $this->model_pembuatan->update($data_id, $data, 'tbjadwal');
        echo json_encode($action);
    }
}
