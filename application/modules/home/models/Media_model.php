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
					// $this->email->to('marketing@billboardku.com');
					$this->email->to('iwansafr@gmail.com');
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
	public function sewa_koran()
	{
		if(!empty($_POST['media_id']))
		{
			$data = $_POST;
			$email_config = $this->esg->get_config('email_config');
			if(!empty($email_config))
			{
				if($this->db->insert('order_koran',$data)){
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
							<td>Isi Iklan</td>
							<td>:'.$data['isi'].'</td>
						</tr>
						<tr>
							<td>Jumlah Kolom</td>
							<td>:'.$data['kolom'].'</td>
						</tr>
						<tr>
							<td>Jumlah Baris</td>
							<td>:'.$data['baris'].' Detik</td>
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
					// $this->email->to(
					// 	[
					// 		'admin@billboardku.com',
					// 		'finance@billboardku.com',
					// 		'digi.envi@billboardku.com',
					// 	]
					// );
					$this->email->to('iwansafr@gmail.com');
					$this->email->subject('Sewa');
					$this->email->message($pesan);
					$this->email->send();
					unset($_POST);
					redirect(base_url('home/sewa_success'));
					// pr($pesan);die();
				}
			}
		}
	}

	public function media_type()
	{
		return [
			'1' => 'Radio',
			'2' => 'Koran'
		];
	}

	public function tipe_radio()
	{
		return [
			"1"=>'ADLIPS 60"',
			"2"=>'SPOT 60"',
			"3"=>'TIME SIGNAL 60"',
		];
	}
	public function tipe_koran()
	{
		return [
			'1' => 'IKLAN KOLOM',
			'2' => 'IKLAN BANNER ATAS',
			'3' => 'IKLAN BANNER BAWAH',
			'4' => 'IKLAN BARIS / KECIK',
		];
	}
	public function kolom()
	{
		return [
			1=>1,
			2=>2,
			3=>3,
			7=>7
		];
	}
	public function colour()
	{
		return [
			'1' => 'FULL COLOUR',
			'2' => 'BLACK WHITE'
		];
	}
	public function time_radio()
	{
		return [
			"1"=>'PRIME TIME',
			"2"=>'REGULER TIME',
		];
	}
	public function masa_radio()
	{
		return [
			"1"=>'HARI',
			"2"=>'MINGGU',
			"3"=>'BULAN',
		];
	}
	public function kategori_radio()
	{
		return [
			"1"=>'PRODUK',
			"2"=>'USAHA',
			"3"=>'EVENT',
			"4"=>'KEHILANGAN',
			"5"=>'LAIN-LAIN',
		];
	}

	public function get_radio_order($user_id = 0)
	{
		return $this->db->query('
				SELECT 
					o.*,
					m.nama AS nama_media,
					m.alamat AS alamat_media,
					m.photo AS gambar_media,
					m.id AS id_media
				FROM order_radio AS o 
				LEFT JOIN media AS m
				ON(m.id = o.media_id)
				WHERE o.user_id = ?',
				$user_id
			)->result_array();
	}
	public function get_radio_order_detail($id = 0)
	{
		return $this->db->query('
				SELECT 
					o.*,
					m.nama AS nama_media,
					m.alamat AS alamat_media,
					m.photo AS gambar_media,
					m.id AS id_media,
					u.username AS username,
					u.email AS email,
					u.phone AS phone
				FROM order_radio AS o 
				LEFT JOIN media AS m
				ON(m.id = o.media_id)
				LEFT JOIN user AS u
				ON(u.id = o.user_id)
				WHERE o.id = ?',
				$id
			)->row_array();	
	}

	public function sewa_radio($order_id = 0)
	{
		if(!empty($order_id))
		{
			$user = $this->session->userdata(base_url().'_logged_in');
			$data = $this->db->query('
				SELECT 
					o.*,
					m.nama AS nama_media,
					m.alamat AS alamat_media
				FROM order_radio AS o 
				LEFT JOIN media AS m
				ON(m.id = o.media_id)
				WHERE o.id = ?',
				$order_id
			)->row_array();
			$email_config = $this->esg->get_config('email_config');
			if(!empty($email_config))
			{
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
						<td>Kategori</td>
						<td>:'.$this->kategori_radio()[$data['kategori']].'</td>
					</tr>
					<tr>
						<td>Tipe Iklan</td>
						<td>:'.$this->tipe_radio()[$data['tipe']].'/ '.$this->time_radio()[$data['time']].'</td>
					</tr>
					<tr>
						<td>Masa Tayang</td>
						<td>:'.$data['durasi'].' '.$this->masa_radio()[$data['masa']].'</td>
					</tr>
					<tr>
						<td>Isi Iklan</td>
						<td>:'.$data['iklan'].'</td>
					</tr>
					<tr>
						<td>Biaya</td>
						<td>:Rp '.number_format($data['total'],0,',','.').'</td>
					</tr>
				</table>

				<h5>Data Diri penyewa</h5>
				<table>
					<tr>
						<td>username</td>
						<td>: '.$user['username'].'</td>
					</tr>
					<tr>
						<td>email</td>
						<td>: '.$user['email'].'</td>
					</tr>
					<tr>
						<td>phone</td>
						<td>: '.$user['phone'].'</td>
					</tr>
					<tr>
						<td>level</td>
						<td>: '.$user['role'].'</td>
					</tr>
				</table>
				';


				$this->email->initialize($config);
				$this->email->from($email_config['email'], 'esoftgreat corp');
				// $this->email->to(
				// 	[
				// 		'admin@billboardku.com',
				// 		'finance@billboardku.com',
				// 		'digi.envi@billboardku.com',
				// 	]
				// );
				$this->email->to('iwansafr@gmail.com');
				$this->email->subject('Sewa');
				$this->email->message($pesan);
				$this->email->send();
				unset($_POST);
				// redirect(base_url('home/sewa_success'));
				// pr($pesan);die();
			}
		}
	}
}