<?php
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') OR exit('No direct script access allowed');

class Simpanan extends MY_Controller {

  var $parsing_form_input = array('id','id_anggota','jumlah_bayar','tanggal_bayar','status');
  var $tablename = 't_simpanan';
 

    public function __construct() {
        parent::__construct();
        $this->load->model('m_simpanan','m_sup');

        // if ($this->session->userdata('username') == '') {
        //     redirect(base_url('login'));
        // }
    }

    public function index() {
    
        $data['listing'] = $this->m_sup->get_all_sum_trans()->result();
        // var_dump($data['listing']);
        $data['title'] = $this->data['meta_title'];
        $data['content'] = 'simpanan/simpanan_view';
        
        //session
        $data['username'] = $this->session->userdata('username');
        $data['user_group'] = strtoupper(level_help($this->session->userdata('user_group')));
        $data['user_id'] = $this->session->userdata('user_id');
        $this->load->view('template_admin', $data);
    }

    public function simpanan_detail_view(){
        $data['title'] = $this->data['meta_title'];
        $data['content'] = 'simpanan/simpanan_detail_view';
        $data['id'] = $this->uri->segment(3);
        
        $data['id_anggota'] =  $this->uri->segment(4);
         
        $data['name'] = $this->db->query("select * from m_anggota where id = '".$data['id_anggota']."' ")->row();
        $data['listing'] = $this->db->query("select * from t_simpanan where  id_anggota = '".$data['id_anggota']."' ")->result();
        //var_dump($data['listing']);
        //session
        $data['username'] = $this->session->userdata('username');
        $data['user_group'] = strtoupper(level_help($this->session->userdata('user_group')));
        $data['user_id'] = $this->session->userdata('user_id');
        $this->load->view('template_admin', $data);
    }

    public function rekap() {
        $filename = "rekapitulasi_iuran_wajib_anggota_".date('Y-m-d').".xls";
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");;
        header("Content-Disposition: attachment;filename=$filename");
        header("Content-Transfer-Encoding: binary ");
  
         $data = $this->db->query("select a.*,b.nama_asli from t_simpanan a
         left join m_anggota b on b.id = a.id_anggota")->result();
         echo '<table border="1" cellpadding="3" cellspacing="0">
         <tr>
         <td> <b>Nama</b> </td>
         <td> <b>Tanggal Bayar</b> </td>
         <td> <b>Jumlah Setoran</b> </td>
         <td> <b>Status</b> </td>
         </tr> 

         ';
         foreach($data as $key=>$val){
            echo '<tr>';
            echo '<td>'.$val->nama_asli.'</td>';
            echo '<td>'.tanggalan($val->tanggal_bayar).'</td>';
            echo '<td> Rp. '.number_format($val->jumlah_bayar,"0").'</td>';
            echo '<td>'.strtoupper($val->status).'</td>';
            echo '</tr>';
         }
         echo '<tr> 
         <td colspan="4"> <b> NB : Data yang ditampilkan dalam list hanya para member yang sudah membayar iuran,apabila belum melakukan pembayaran iuran maka nama member tidak akan di list </td>
         </tr>';
         echo '</table>';
    }

    public function simpanan_detail_getdata(){
        $dataid = $this->input->post('id');
        $dataidanggota = $this->input->post('id_anggota');
        //$hb = $dataid.'-'.$dataidanggota;
        $sql = $this->db->query("select * from  t_simpanan where id = '$dataid' AND id_anggota = '$dataidanggota'")->row();
        echo json_encode($sql);
    }

    public function simpanan_detail_delete(){
        $id = $this->uri->segment(3);
        $id_anggota = $this->uri->segment(4);
        $qry = $this->db->query("delete from t_simpanan where id = '".$id."' AND id_anggota = '".$id_anggota."' ");
        if($qry){
            echo "<script language=javascript>
            alert('Hapus Data Berhasil');
            window.location='" . base_url('simpanan/simpanan_detail_view/'.$id.'/'.$id_anggota) . "';
                </script>";
        }
    }

    public function simpanan_detail_save(){
        $datapos = $this->m_sup->array_from_post($this->parsing_form_input);
        $idsimpan = $this->input->post('idsimpan');
        if($datapos['id'] == '' || $datapos['id'] == NULL || empty($datapos['id'])){
           $savesimpan = $this->m_sup->save_data($datapos,$this->tablename);
           if($savesimpan){
            echo "<script language=javascript>
             alert('Simpan Data Berhasil');
             window.location='" . base_url('simpanan/simpanan_detail_view/'.$idsimpan.'/'.$datapos['id_anggota']) . "';
                 </script>";
            } 

        }else{

            $saveupdate = $this->m_sup->save_data_update($datapos,$this->tablename);
            if($saveupdate){
                echo "<script language=javascript>
                 alert('Ubah Data Berhasil');
                 window.location='" . base_url('simpanan/simpanan_detail_view/'.$datapos['id'].'/'.$datapos['id_anggota']) . "';
                     </script>";
            }   
        }
 
       
    }

    public function simpanan_detail_save_edit(){
        $datapos = $this->m_sup->array_from_post($this->parsing_form_input);
        
        $save = $this->m_sup->save_data_update($datapos,$this->tablename);
        if($save){
          echo "<script language=javascript>
           alert('Ubah Data Berhasil');
           window.location='" . base_url('simpanan/simpanan_detail_view/'.$datapos['id'].'/'.$datapos['id_anggota']) . "';
               </script>";
        }   
    }

    

    
    public function store(){
        $data['judul'] = $this->data['judul'];

        $id = $this->uri->segment(3);
        if($id == '' || empty($id) || $id == NULL){
          $data['parseform'] = $this->m_sup->get_new($this->parsing_form_input);
        }else{
          $data['parseform'] = $this->m_sup->get_all($id,$this->tablename)->row();

        }
        $data['parse_view'] = 'simpanan/simpanan_store';

        //session
        $data['username'] = $this->session->userdata('username');
        $data['user_group'] = strtoupper(level_help($this->session->userdata('user_group')));
        $data['user_id'] = $this->session->userdata('user_id');
        $this->load->view('template', $data);
    }

    public function cetak(){
        echo 1;
    }


    public function save(){

      $datapos = $this->m_sup->input_array($this->parsing_form_input);
      $id = isset($datapos['id']) ? $datapos['id'] : '';
      $save = $this->m_sup->save($datapos,$id,$this->tablename);
      if($save){
        echo "<script language=javascript>
         alert('Simpan Data Berhasil');
         window.location='" . base_url('simpanan') . "';
             </script>";
      }

    }

    public function delete(){
      $idpost = $this->uri->segment(3);
      $del = $this->m_sup->delete($idpost,$this->tablename);

      if($del){
        echo "<script language=javascript>
         alert('Hapus Data Berhasil');
         window.location='" . base_url('simpanan') . "';
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
        $data['idsimpanan'] = $this->session->userdata('idsimpanan');
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
        $data['opt_simpanan'] = $this->model_user_management->opt_simpanan();
        $this->load->view('user_management/user_management_add', $data);
    }

    public function get_val_peg() {
        $data = $this->input->post('valpeg');
        $this->db->where('id', $data);
        $data = $this->db->get('tb_simpanan')->row();
        echo json_encode(simpanan_detail_getdata);
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
        $data['opt_simpanan'] = $this->model_user_management->opt_simpanan();
        $data['listing'] = $this->model_user_management->edit($id)->row();
        $this->load->view('user_management/user_management_edit', $data);
    }

    public function pro_add() {

        $datapos = array('nrp' => $this->input->post('nrp'),
            'nama' => $this->input->post('nama'),
            'opt_nama' => $this->input->post('opt_nama'),
            'id_simpanan' => $this->input->post('id_simpanan'),
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
        $data['opt_simpanan'] = $this->model_user_management->opt_simpanan();
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
          $data['opt_simpanan'] = $this->model_user_management->opt_simpanan();
          $data['listing'] = $this->db->where('id',$id)->get('tb_ip')->row();
          $this->load->view('user_management/user_management_detail',$data);
         */
    }

    public function pro_edit() {

        $datapos = array('id' => $this->input->post('id'),
            'nrp' => $this->input->post('nrp'),
            'nama' => $this->input->post('nama'),
            'opt_nama' => $this->input->post('opt_nama'),
            'id_simpanan' => $this->input->post('id_simpanan'),
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


 
}
