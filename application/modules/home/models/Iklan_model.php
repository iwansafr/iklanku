<?php

class Iklan_model extends CI_Model
{
	public function status()
	{
		return ['Unavailable','Available'];
	}
	public function dimensi()
	{
		return ['1'=>'Horizontal','2'=>'Vertical'];
	}
	public function light()
	{
		return ['1'=>'BackLight','2'=>'FrontLight'];
	}
}