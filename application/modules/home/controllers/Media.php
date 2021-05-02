<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('media_model');
		$this->load->helper('content');
		$this->load->library('esg');
		$this->load->library('ZEA/Zea');
		if(empty($_SESSION[base_url().'_logged_in']['username'])){
			redirect('home/login');
		}
	}
	public function getType($type)
	{
		if(!empty($type))
		{
			return match($type){
				'radio' => 1,
				'koran' => 2,
				'sosmed' => 3,
				default => 1,
			};
			// switch($type){
			// 	case 'radio':
			// 		return 1;
			// 	break;
			// 	case 'koran':
			// 		return 2;
			// 	break;
			// 	case 'sosmed':
			// 		return 3;
			// 	break;
			// 	default:
			// 		return 1;
			// 	break;

			// }
		}else{
			return 1;
		}
	}
	public function tipe($tipe = 'radio')
	{
		$tipe_id = $this->getType($tipe);
		$this->esg->add_css('//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
		$this->esg->add_js(['https://code.jquery.com/ui/1.12.1/jquery-ui.js',base_url('templates/iklanku/js/media.js')]);
		$this->load->view('index',['label'=>$tipe,'data'=>$this->media_model->get_list($tipe_id),'full'=>1,'tipe_id'=>$tipe_id]);
	}

	public function json_list()
	{
		$tipe_id = 1;
		$output = ['data'=>$this->media_model->get_list($tipe_id)['data'],'q'=>$this->db->last_query()];
		echo json_encode($output);
	}
	public function json_kota()
	{
		$data = $this->db->query('SELECT kota FROM iklan GROUP BY kota ORDER BY kota ASC LIMIT 6')->result_array();
		if(!empty($data))
		{
			$output = [];
			foreach ($data as $key => $value) 
			{
				$output[] = $value['kota'];
			}
			echo json_encode($output);
		}
	}

	public function index()
	{
		$this->esg->add_css('//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
		$this->esg->add_js(['https://code.jquery.com/ui/1.12.1/jquery-ui.js',base_url('templates/iklanku/js/home.js')]);


		$data    = $this->media_model->get_list();
		$status  = $this->media_model->status();
		$ukuran  = $this->media_model->ukuran();
		$jenis  = $this->media_model->jenis();
		$dimensi = $this->media_model->dimensi();
		$light   = $this->media_model->light();

		$this->load->view('index',['data'=>$data,'ukuran'=>$ukuran,'jenis'=>$jenis,'status'=>$status,'dimensi'=>$dimensi,'light'=>$light,'full'=>1]);
	}
	public function media()
	{
		$this->load->view('index');
	}
	public function order($id = 0, $tipe = 0)
	{
		$this->esg->add_css(base_url('templates/iklanku/css/detail.css'));
		// if ($tipe < 3) {
			$data = $this->db->query('SELECT * FROM media WHERE id = ? ',$id)->row_array();
		// }else if($tipe ==3){
		// 	$data = $this->media_model->paket_sosmed()[$id];
		// }
		if($data['tipe'] == 3){
			$data['desain_grafis'] = json_decode($data['param'],1)['desain_grafis'];
			$data['fotografi'] = json_decode($data['param'],1)['fotografi'];
			$data['posting'] = json_decode($data['param'],1)['posting'];
			$data['admin_handling'] = json_decode($data['param'],1)['admin_handling'];
			$data['add_on'] = json_decode($data['param'],1)['add_on'];
		}
		if($data['tipe'] == 1){
			$this->media_model->send_sewa();
		}else if($data['tipe'] == 2){
			$this->media_model->sewa_koran();
		}
		$jam_tayang = $this->session->userdata('jam_tayang');
		if(!empty($_POST['jam_tayang'])) 
		{
			$jam_tayang[$_POST['jam_tayang']] = $_POST['jam_tayang'];
			$this->session->set_userdata('jam_tayang', $jam_tayang);
		}
		if(!empty($_POST['del_jam_tayang'])) 
		{
			unset($jam_tayang[$_POST['del_jam_tayang']]);
			$this->session->set_userdata('jam_tayang', $jam_tayang);
		}
		$this->load->view('index',['data'=>$data]);
	}
	public function next_order($id = 0, $tipe =0)
	{
		$data = $this->db->query('SELECT * FROM media WHERE id = ? ',$id)->row_array();
		$this->load->view('index',['data'=>$data]);
	}
	public function confirmation_order($id=0, $tipe = 0)
	{
		$thumbnail = '';
		if (!empty($_FILES['photo'])) {
			$file = file_get_contents($_FILES['photo']['tmp_name']);
			$file_photo = base64_encode($file);
			$thumbnail = 'data:image/*;base64,'.$file_photo;
		}
		$data = $this->db->query('SELECT * FROM media WHERE id = ? ',$id)->row_array();
		$this->load->view('index',['data'=>$data,'thumbnail'=>$thumbnail]);
	}

	public function finish_order($id=0, $tipe = 0)
	{
		$user = $this->session->userdata(base_url().'_logged_in');
		$data = $this->db->query('SELECT * FROM media WHERE id = ? ',$id)->row_array();
		$post = $this->input->post();
		$data['last_id'] = 1;
		if (!empty($post)) {
			if($data['tipe'] < 3){
				if($post['masa'] == 1){
					$masa = 1;
				}else if($post['masa'] == 2){
					$masa = 7;
				}else{
					$masa = 30;
				};
				$waktu = $masa*$post['durasi'];
				$post['total'] = $data['tarif']*$waktu;
			}else if($data['tipe'] == 3){
				$waktu = 30*$post['durasi'];
				$post['total'] = $data['tarif']*$waktu;
			}
			$post['media_id'] = $data['id'];
			$post['harga_dasar'] = $data['tarif'];
			$post['user_id'] = $user['id'];

			if($data['tipe'] == 1){
				$this->db->insert('order_radio',$post);
				$data['last_id'] = $this->db->insert_id();
			// $this->media_model->sewa_radio($data['last_id']);
			}else if($data['tipe'] == 2){
				$this->db->insert('order_koran',$post);
				$data['last_id'] = $this->db->insert_id();
				// $this->media_model->sewa_koran($data['last_id']);
			}else if($data['tipe'] == 3){
				$this->db->insert('order_sosmed',$post);
				$data['last_id'] = $this->db->insert_id();
				$this->media_model->sewa_sosmed($data['last_id']);
			}
		}
		$this->load->view('index',['data'=>$data,'post'=>$post]);	
	}
	public function status_pembayaran($id=0,$media_id=0)
	{
		$user       = $this->session->userdata(base_url().'_logged_in');
		$media      = $this->db->get_where('media',['id'=>$media_id])->row_array();
		$pembayaran = [];

		if (!empty($media)) {
			if ($media['tipe'] == 1) {
				$pembayaran = $this->db->get_where('order_radio',['id'=>$id])->row_array();
			}else if($media['tipe'] == 2){
				$pembayaran = $this->db->get_where('order_koran',['id'=>$id])->row_array();
			}
		}
		$this->load->view('index',['data'=>$media,'pembayaran'=>$pembayaran]);
	}
	public function konfirmasi_pembayaran($id=0,$media_id=0)
	{
		$this->esg->add_js([
			base_url('templates/iklanku/js/konfirmasi.js')
		]);

		$user       = $this->session->userdata(base_url().'_logged_in');
		$media      = $this->db->get_where('media',['id'=>$media_id])->row_array();
		$pembayaran = [];

		if(!empty($media))
		{
			if($media['tipe'] == 1){
				$pembayaran = $this->db->get_where('order_radio',['id'=>$id])->row_array();
			}else if($media['tipe'] == 2){
				$pembayaran = $this->db->get_where('order_koran',['id'=>$id])->row_array();
			}
		}
		$this->load->view('index',['data'=>$media,'pembayaran'=>$pembayaran]);
	}
	
	public function pesanan_radio()
	{
		$user = $this->session->userdata(base_url().'_logged_in');
		$data = $this->media_model->get_radio_order($user['id']);
		$this->load->view('index',['data'=>$data]);
	}
	public function detail_order_radio($id = 0)
	{
		$data = $this->media_model->get_radio_order_detail($id);
		$data['tipe_media'] = 1;
		$this->load->view('index',['data'=>$data]);
	}
	public function detail_order_koran($id = 0)
	{
		$data = $this->media_model->get_koran_order_detail($id);
		$data['tipe_media'] = 2;
		$this->load->view('index',['data'=>$data]);
	}

	public function pesanan_koran()
	{
		$user = $this->session->userdata(base_url().'_logged_in');
		$data = $this->media_model->get_koran_order($user['id']);
		$this->load->view('index',['data'=>$data]);
	}
}