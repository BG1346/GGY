<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

class Index extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Spot_m');
	}
	public function index(){
		$this->load->view('navbar_v');
		$this->load->view('mainJumbo_v');
		$this->categorization();
		$this->map();
	}
	public function map_page(){
		$this->load->view('navbar_v');
		$this->map();
	}
	public function map(){
		$table = 'spot';
		$category = '';
		$subcategory = '';

		if(isset($_GET['table']))	$table = $_GET['table'];
		if(isset($_GET['category']))	$table = $_GET['category'];
		if(isset($_GET['subcategory']))	$table = $_GET['subcategory'];

		$data['list'] = $this->Spot_m->get_list($table, '', '', '', '', $category, $subcategory);
		$data['category'] = $this->Spot_m->get_category($table);
		$data['subcategory'] = $this->Spot_m->get_subcategory('SUBCATEGORY', $category);
		$this->load->view('map_v', $data);
	}
	public function categorize_page(){
		$this->load->view('navbar_v');
		$this->categorization();
	}
	public function categorization(){
		$table = 'spot';
		$category = '';
		$subcategory = '';

		if(isset($_GET['table']))	$table = $_GET['table'];
		if(isset($_GET['category']))	$category = $_GET['category'];
		if(isset($_GET['subcategory']))	$subcategory = $_GET['subcategory'];
		$data['spot_list'] = $this->Spot_m->get_list($table, '', '', '', '', $category, $subcategory);
		$data['category_list'] = $this->Spot_m->get_list('category', '', '', '', '', '', $subcategory);
		$data['subcategory_list'] = $this->Spot_m->get_list('SUBCATEGORY', '', '', '', '', $category, '');
		$this->load->view('categorization_v', $data);
	}
	
	public function search(){
		$table = 'spot';
		$category = '';
		$subcategory = '';
		$s_word = '';

		if(isset($_GET['table']))	$table = $_GET['table'];
		if(isset($_GET['s_word']))	$s_word = $_GET['s_word'];
		$data['spot_list'] = $this->Spot_m->get_list($table, '', '', '', $s_word, $category, $subcategory);
		$this->load->view('navbar_v');
		$this->load->view('categorization_v', $data);
	}
	
	public function check_if_i_like(){
		$table = 'LIKE';
		$id = '';
		$ip = $this->input->ip_address();
		if(isset($_GET['id']))	$id = $_GET['id'];
		$result = $this->Spot_m->check($table, $id, $ip);
		if($result == null)
			return 0;
		return $result;
	}
	public function toggle_like(){
		$table = 'LIKE';
		$id = '';
		$ip = $this->input->ip_address();
		if(isset($_GET['id']))	$id = $_GET['id'];
		$result = $this->Spot_m->toggle_like($table, $id, $ip);
	}
	public function spot_view(){
		$id = $_GET['id'];
		$table = 'spot';
		$data['data'] = $this->Spot_m->get_view($table, $id);
		$data['like_bool'] = $this->check_if_i_like();
		$this->load->view('navbar_v', $data);
		$this->load->view('spot_view_v', $data);
	}
    public function _remap($method)
    {
		$this->load->view('header_v');

       if( method_exists($this, $method) )
       {
           $this->{"{$method}"}();
       }

    //    푸터 include
       $this->load->view('footer_v');
   }
}
