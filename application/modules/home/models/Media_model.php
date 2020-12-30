<?php

class Media_model extends CI_Model
{
	public function get_list($tipe = 1)
	{
		$form = new zea();
		$form->init('roll');
		$form->setTable('media');

		$where = '';
		if(!empty($_GET['nama']))
		{
			$where = ' nama LIKE "%'.$this->db->escape_like_str($_GET['nama']).'%"';
		}
		
		if(!empty($_GET['tipe']))
		{
			$tipe = @intval($_GET['tipe']);
		}

		if(!empty($where))
		{
			$where .= ' AND tipe = '.$tipe;
		}else{
			$where = ' tipe = '.$tipe;
		}

		$form->setWhere($where);
		$form->addInput('id','plaintext');
		$form->addInput('nama','plaintext');
		$form->addInput('tarif','plaintext');
		$form->addInput('alamat','plaintext');
		$form->addInput('photo','plaintext');
		// $form->setLimit(2);
		return $form->getData();
	}
	public function send_sewa()
	{
		if(!empty($_POST['media_id']))
		{
			$data = $_POST;
			$email_config = $this->esg->get_config('email_config');
			if(!empty($email_config))
			{
				if($this->db->insert('media_iklan',$data)){
					$this->load->library('email');
					$config['protocol']     = $email_config['protocol'];
					$config['smtp_host']    = $email_config['smtp_host'];
					$config['smtp_port']    = $email_config['smtp_port'];
					$config['smtp_timeout'] = $email_config['smtp_timeout'];
					$config['smtp_user']    = $email_config['email'];
					$config['smtp_pass']    = $email_config['password'];
					$config['charset']      = $email_config['charset'];
					$config['newline']      = $email_config['newline'];
					$config['mailtype']     = $email_config['mailtype'];
					$config['validation']   = $email_config['validation'];

					$pesan   = '
					<h5>ORDER ADSBOX - ['.date('d').'/'.date('m').'/'.date('Y').']</h5>
					<table>
						<tr>
							<td>Nama Media</td>
							<td>:'.$data['nama_media'].'</td>
						</tr>
						<tr>
							<td>Alamat Media</td>
							<td>:'.$data['alamat_media'].'</td>
						</tr>
						<tr>
							<td>Judul Iklan</td>
							<td>:'.$data['judul'].'</td>
						</tr>
						<tr>
							<td>Isi Iklan</td>
							<td>:'.$data['isi'].'</td>
						</tr>
						<tr>
							<td>Jam Tayang</td>
							<td>:'.$data['jam_tayang'].'</td>
						</tr>
						<tr>
							<td>Durasi</td>
							<td>:'.$data['durasi'].' Detik</td>
						</tr>
						<tr>
							<td>Biaya</td>
							<td>:Rp '.number_format($data['biaya'],0,',','.').'</td>
						</tr>
					</table>

					<h5>Data Diri penyewa</h5>
					<table>
						<tr>
							<td>username</td>
							<td>: '.$data['username'].'</td>
						</tr>
						<tr>
							<td>email</td>
							<td>: '.$data['email'].'</td>
						</tr>
						<tr>
							<td>phone</td>
							<td>: '.$data['hp'].'</td>
						</tr>
						<tr>
							<td>level</td>
							<td>: '.$data['role'].'</td>
						</tr>
					</table>
					';


					$this->email->initialize($config);
					$this->email->from($email_config['email'], 'esoftgreat corp');
					$this->email->to('marketing@billboardku.com');
					// $this->email->to('iwansafr@gmail.com');
					$this->email->subject('Sewa');
					$this->email->message($pesan);
					$this->email->send();
					unset($_POST);
					unset($_SESSION['jam_tayang']);
					redirect(base_url('home/sewa_success'));
					// pr($pesan);die();
				}
			}
		}
	}
}