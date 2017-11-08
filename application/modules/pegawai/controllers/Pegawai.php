<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends Parent_controller {

  var $parsing_form_input = array('id','nik','nama','alamat','no_telp','email');
  var $tablename = 'm_employee';

    public function __construct() {
        parent::__construct();
        $this->load->model('m_employee','m_empp');

        if ($this->session->userdata('username') == '') {
            redirect(base_url('login'));
        }
    }

    public function index() {
        $data['judul'] = $this->data['judul'];
        $data['listing'] = $this->m_empp->get_all($id=NULL,$this->tablename)->result();
        $data['parse_view'] = 'pegawai/pegawai_view';

        //session
        $data['username'] = $this->session->userdata('username');
        $data['user_group'] = strtoupper(level_help($this->session->userdata('user_group')));
        $data['user_id'] = $this->session->userdata('user_id');


        $this->load->view('template', $data);
    }

    public function store(){
        $data['judul'] = $this->data['judul'];

        $id = $this->uri->segment(3);
        if($id == '' || empty($id) || $id == NULL){
          $data['parseform'] = $this->m_empp->get_new($this->parsing_form_input);
        }else{
          $data['parseform'] = $this->m_empp->get_all($id,$this->tablename)->row();

        }
        $data['parse_view'] = 'pegawai/pegawai_store';

        //session
        $data['username'] = $this->session->userdata('username');
        $data['user_group'] = strtoupper(level_help($this->session->userdata('user_group')));
        $data['user_id'] = $this->session->userdata('user_id');
        $this->load->view('template', $data);
    }


    public function save(){

      $datapos = $this->m_empp->input_array($this->parsing_form_input);
      $id = isset($datapos['id']) ? $datapos['id'] : '';
      $save = $this->m_empp->save($datapos,$id,$this->tablename);
      if($save){
        echo "<script language=javascript>
         alert('Simpan Data Berhasil');
         window.location='" . base_url('pegawai') . "';
             </script>";
      }

    }

    public function delete(){
      $idpost = $this->uri->segment(3);
      $del = $this->m_empp->delete($idpost,$this->tablename);

      if($del){
        echo "<script language=javascript>
         alert('Hapus Data Berhasil');
         window.location='" . base_url('pegawai') . "';
             </script>";
      }
    }

    public function get_bawahan_foreman($idforeman) {
        $data['judul'] = 'Program Aplikasi IP AHM';
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $data['namauser_management'] = $this->session->userdata('namauser_management');
        $data['iduser_management'] = $this->session->userdata('iduser_management');
        $data['idkasie'] = $this->session->userdata('idkasie');
        $data['idpegawai'] = $this->session->userdata('idpegawai');
        $data['idforeman'] = $this->session->userdata('idforeman');
        $data['nrp'] = $this->session->userdata('nrp');



        $data['listing'] = $this->model_user_management->listing_bawahan_foreman($idforeman);

        //var_dump($data['listing']);
        $this->load->view('user_management/user_management_view_bawah', $data);
    }

    public function transaksi_id($param = '') {
        $data = $this->model_user_management->get_no();
        $lastid = $data->row();
        $idnya = $lastid->id;


        if ($idnya == '') { // bila data kosong
            $ID = $param . "0000001";
            //00000001
        } else {
            $MaksID = $idnya;
            $MaksID++;
            if ($MaksID < 10)
                $ID = $param . "000000" . $MaksID;
            else if ($MaksID < 100)
                $ID = $param . "00000" . $MaksID;
            else if ($MaksID < 1000)
                $ID = $param . "0000" . $MaksID;
            else if ($MaksID < 10000)
                $ID = $param . "000" . $MaksID;
            else if ($MaksID < 100000)
                $ID = $param . "00" . $MaksID;
            else if ($MaksID < 1000000)
                $ID = $param . "0" . $MaksID;
            else
                $ID = $MaksID;
        }

        return $ID;
    }

    public function add() {
        $data['judul'] = 'Program Aplikasi IP AHM';
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $data['namauser_management'] = $this->session->userdata('namauser_management');
        $data['iduser_management'] = $this->session->userdata('iduser_management');
        $data['idkasie'] = $this->session->userdata('idkasie');
        $data['idforeman'] = $this->session->userdata('idforeman');
        $data['getname'] = $this->model_user_management->getname($data['username']);
        $data['nrp'] = $this->session->userdata('nrp');
        $data['lastid'] = $this->transaksi_id();
        $data['opt_kas_for'] = $this->model_user_management->get_kas_for();
        $data['opt_pegawai'] = $this->model_user_management->opt_pegawai();
        $this->load->view('user_management/user_management_add', $data);
    }

    public function get_val_peg() {
        $data = $this->input->post('valpeg');
        $this->db->where('id', $data);
        $data = $this->db->get('tb_pegawai')->row();
        echo json_encode($data);
    }

    public function edit() {
        $id = $this->uri->segment(3);
        $data['judul'] = 'Program Aplikasi IP AHM';
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $data['namauser_management'] = $this->session->userdata('namauser_management');
        $data['iduser_management'] = $this->session->userdata('iduser_management');
        $data['idkasie'] = $this->session->userdata('idkasie');
        $data['idforeman'] = $this->session->userdata('idforeman');
        $data['nrp'] = $this->session->userdata('nrp');
        $data['opt_kas_for'] = $this->model_user_management->get_kas_for();
        $data['opt_pegawai'] = $this->model_user_management->opt_pegawai();
        $data['listing'] = $this->model_user_management->edit($id)->row();
        $this->load->view('user_management/user_management_edit', $data);
    }

    public function pro_add() {

        $datapos = array('nrp' => $this->input->post('nrp'),
            'nama' => $this->input->post('nama'),
            'opt_nama' => $this->input->post('opt_nama'),
            'id_pegawai' => $this->input->post('id_pegawai'),
            'seksi' => $this->input->post('seksi'),
            'risalah' => $this->input->post('risalah'),
            'tanggal' => $this->input->post('tanggal'),
            'no_reg' => $this->input->post('no_reg'),
            'tema_ip' => $this->input->post('tema_ip'),
            'ksp' => $this->input->post('ksp'),
            'fupload_ksp' => str_replace(" ", "_", $this->input->post('fupload_ksp')),
            'akibat' => $this->input->post('akibat'),
            'kstp' => $this->input->post('kstp'),
            'fupload_kstp' => str_replace(" ", "_", $this->input->post('fupload_kstp')),
            'standarisasi' => $this->input->post('standarisasi'),
            'fupload_standarisasi' => str_replace(" ", "_", $this->input->post('fupload_standarisasi')),
            'manfaat' => $this->input->post('manfaat')
        );
        //var_dump($datapos);
        //exit();
        /*
          $datapos = array('nrp'=> $this->input->post('nrp'),
          'nama'=> $this->input->post('nama'),
          'opt_nama'=> $this->input->post('opt_nama'),
          'seksi'=> $this->input->post('seksi'),
          'risalah'=> $this->input->post('risalah'),
          'tanggal'=> $this->input->post('tanggal'),
          'no_reg'=> $this->input->post('no_reg'),
          'tema_ip'=> $this->input->post('tema_ip'),
          'ksp'=> $this->input->post('ksp'),
          'fupload_ksp'=> $this->input->post('fupload_ksp'),
          'akibat'=> $this->input->post('akibat'),
          'kstp'=> $this->input->post('kstp'),
          'fupload_kstp'=> $this->input->post('fupload_kstp'),
          'standarisasi'=> $this->input->post('standarisasi'),
          'fupload_standarisasi'=> $this->input->post('fupload_standarisasi'),
          'manfaat'=> $this->input->post('manfaat'),
          'komentar'=> $this->input->post('komentar'),
          'penilaian'=> $this->input->post('penilaian'),
          'komentar_aprove'=> $this->input->post('komentar_aprove'),
          'is_aprove_kasie'=> $this->input->post('is_aprove_kasie'),
          'is_aprove_foreman'=> $this->input->post('is_aprove_foreman'),
          'is_aprove_ahmic'=> $this->input->post('is_aprove_ahmic')
          );

         */
        //print_r($datapos);
        //exit();
        //bagian upload file
        $config['upload_path'] = "uploads/";
        $config['allowed_types'] = 'gif|bmp|jpg|jpeg|png';
        $config['max_size'] = 5000;
        $config['remove_spaces'] = TRUE;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if ($datapos['fupload_ksp'] != '') {
            $this->upload->do_upload('upload_ksp');
        }
        if ($datapos['fupload_kstp'] != '') {
            $this->upload->do_upload('upload_kstp');
        }
        if ($datapos['fupload_standarisasi'] != '') {
            $this->upload->do_upload('upload_standarisasi');
        }

        $sql = $this->model_user_management->pro_add($datapos);

        if ($sql) {
            echo "<script language=javascript>
				alert('Penambahan Data Berhasil');
				window.location='" . base_url('user_management') . "';
		        </script>";
        } else {
            echo "<script language=javascript>
				alert('Penambahan Data Berhasil');
				window.location='" . base_url('user_management') . "';
		        </script>";
        }
    }

    public function detail() {
        $id = $this->uri->segment(3);
        $data['judul'] = 'Program Aplikasi IP AHM';
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $data['namauser_management'] = $this->session->userdata('namauser_management');
        $data['iduser_management'] = $this->session->userdata('iduser_management');
        $data['idkasie'] = $this->session->userdata('idkasie');
        $data['idforeman'] = $this->session->userdata('idforeman');
        $data['nrp'] = $this->session->userdata('nrp');

        $data['opt_kas_for'] = $this->model_user_management->get_kas_for();
        $data['opt_pegawai'] = $this->model_user_management->opt_pegawai();
        $data['listing'] = $this->db->where('id', $id)->get('tb_ip')->row();
        $this->load->view('user_management/user_management_detail', $data);
    }

    public function detail_pos() {
        $id = $this->uri->segment(3);

        $datapos = array('id' => $this->input->post('id'),
            'komentar_foreman' => $this->input->post('komentar_foreman'),
            'penilaian_foreman' => $this->input->post('penilaian_foreman'),
            'komentar_aprove_kasie' => $this->input->post('komentar_aprove_kasie'),
            'komentar_aprove_ahmic' => $this->input->post('komentar_aprove_ahmic'),
            'is_aprove_kasie' => $this->input->post('is_aprove_kasie'),
            'is_aprove_ahmic' => $this->input->post('is_aprove_ahmic')
        );

        if ($_SESSION['level'] == 'kasie') {
            //kasie persetujuan
            $this->db->set('komentar_aprove_kasie', $datapos['komentar_aprove_kasie']);
            $this->db->set('is_aprove_kasie', $datapos['is_aprove_kasie']);
            $this->db->where('id', $datapos['id']);
            $res = $this->db->update('tb_ip');
        } else if ($_SESSION['level'] == 'foreman') {
            //foreman menilai
            $this->db->set('komentar_foreman', $datapos['komentar_foreman']);
            $this->db->set('penilaian_foreman', $datapos['penilaian_foreman']);
            $this->db->where('id', $datapos['id']);
            $res = $this->db->update('tb_ip');
        } else if ($_SESSION['level'] == 'ahmic') {
            $this->db->set('komentar_aprove_ahmic', $datapos['komentar_aprove_ahmic']);
            $this->db->set('is_aprove_ahmic', $datapos['is_aprove_ahmic']);
            $this->db->where('id', $datapos['id']);
            $res = $this->db->update('tb_ip');

            //kasie persetujuan
        }

        if ($res) {
            echo "<script language=javascript>
				alert('Transaksi Data Berhasil');
				window.location='" . base_url('user_management') . "';
		        </script>";
        } else {
            echo "<script language=javascript>
				alert('Transaksi Data Berhasil');
				window.location='" . base_url('user_management') . "';
		        </script>";
        }
        /*
          $data['judul'] = 'Program Aplikasi IP AHM';
          $data['username'] = $this->session->userdata('username');
          $data['level'] = $this->session->userdata('level');
          $data['namauser_management'] = $this->session->userdata('namauser_management');
          $data['iduser_management'] = $this->session->userdata('iduser_management');
          $data['idkasie'] = $this->session->userdata('idkasie');
          $data['idforeman'] = $this->session->userdata('idforeman');
          $data['nrp'] = $this->session->userdata('nrp');

          $data['opt_kas_for'] = $this->model_user_management->get_kas_for();
          $data['opt_pegawai'] = $this->model_user_management->opt_pegawai();
          $data['listing'] = $this->db->where('id',$id)->get('tb_ip')->row();
          $this->load->view('user_management/user_management_detail',$data);
         */
    }

    public function pro_edit() {

        $datapos = array('id' => $this->input->post('id'),
            'nrp' => $this->input->post('nrp'),
            'nama' => $this->input->post('nama'),
            'opt_nama' => $this->input->post('opt_nama'),
            'id_pegawai' => $this->input->post('id_pegawai'),
            'seksi' => $this->input->post('seksi'),
            'risalah' => $this->input->post('risalah'),
            'tanggal' => $this->input->post('tanggal'),
            'no_reg' => $this->input->post('no_reg'),
            'tema_ip' => $this->input->post('tema_ip'),
            'ksp' => $this->input->post('ksp'),
            'fupload_ksp' => str_replace(" ", "_", $this->input->post('fupload_ksp')),
            'akibat' => $this->input->post('akibat'),
            'kstp' => $this->input->post('kstp'),
            'fupload_kstp' => str_replace(" ", "_", $this->input->post('fupload_kstp')),
            'standarisasi' => $this->input->post('standarisasi'),
            'fupload_standarisasi' => str_replace(" ", "_", $this->input->post('fupload_standarisasi')),
            'manfaat' => $this->input->post('manfaat')
        );

        $dataget = $this->db->where("id", $datapos['id'])->get("tb_ip")->row();

        $config['upload_path'] = "uploads/";
        $config['allowed_types'] = 'gif|bmp|jpg|jpeg|png';
        $config['max_size'] = 1000;
        $config['remove_spaces'] = TRUE;

        $this->load->library('upload');
        $this->upload->initialize($config);


        //buang file lama jika memang inputan ada file baru

        if (($_FILES['upload_ksp']['name']) != '') {
            unlink('uploads/' . $dataget->upload_ksp);

            if ($datapos['fupload_ksp'] != '') {
                $this->upload->do_upload('upload_ksp');
            }
        }


        if (($_FILES['upload_kstp']['name']) != '') {
            unlink('uploads/' . $dataget->upload_kstp);

            if ($datapos['fupload_kstp'] != '') {
                $this->upload->do_upload('upload_kstp');
            }
        }


        if (($_FILES['upload_standarisasi']['name']) != '') {
            unlink('uploads/' . $dataget->upload_standarisasi);
            if ($datapos['fupload_standarisasi'] != '') {
                $this->upload->do_upload('upload_standarisasi');
            }
        }


        //masukin file baru


        $sql = $this->model_user_management->pro_edit($datapos);

        if ($sql) {
            echo "<script language=javascript>
				alert('Perubahan Data Berhasil');
				window.location='" . base_url('user_management') . "';
		        </script>";
        } else {
            echo "<script language=javascript>
				alert('Perubahan Data Berhasil');
				window.location='" . base_url('user_management') . "';
		        </script>";
        }
    }



    public function cetak() {
        $id = $this->uri->segment(3);

        $data['listing'] = $this->db->where('id', $id)->get('tb_ip')->row();



        $this->load->library("pdf");
        $this->pdf->setPrintHeader(false);
        $this->pdf->setPrintFooter(true, 'aku', 'kau');
        $this->pdf->SetHeaderData("", "", 'Judul Header', "codedb.co");
        $this->pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        // set auto page breaks
        $this->pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        // add a page
        $this->pdf->AddPage("L", "A4");
        // set font
        $this->pdf->SetFont("helvetica", "", 9);
        $html = $this->load->view('user_management/user_management_print', $data, true);

        $this->pdf->writeHTML($html, true, false, true, false, "");
        ob_end_clean();
        //$this->pdf->Output("Employee Information.pdf", "I");
        $this->pdf->Output('c:/xampp/htdocs/tnd/store_files/filename.pdf', 'I');


        echo "<script language=javascript>
				alert('Your file has been saved to your server on root directory');
				window.location='" . base_url('user_management') . "';
		      </script>";
    }

}
