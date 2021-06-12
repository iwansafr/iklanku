<?php
class Digital_print_model extends CI_Model{
	public function ukuran_kertas()
	{
		return 
		[
			'A3','A3+','A4','A5','F4'
		];
	}
	public function sisi_kertas()
	{
		return [1,2];
	}
	public function colour()
	{
		return ['FULL COLOUR','BLACK WHITE'];
	}
	public function flipped()
	{
		return ['FLIPPED','NO FLIPPED'];
	}
}