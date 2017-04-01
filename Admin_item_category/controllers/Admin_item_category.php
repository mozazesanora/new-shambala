<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_item_category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//restrict area only for admin
		$this->load->model('Model_restrict_page');
		$this->Model_restrict_page->restrict_area(
			(object)array(
				'admin' => (object)array(
					'only_section' => array('Receptionist','Super Admin','Research'),
					)
				));

		$this->load->model('model_crud', 'item_category');
		$this->item_category->set_data(
			(object)array(
				'module_name' => 'item_category',
				'table_name' => 'item_category',
				)
			);

	}

	public function index()
	{	
		$data['item_category']=$this->item_category->get(
			(object)array(
				'order_by' => "item_category.id ASC",
				'join' => array(
					(object)array(
						'join_table' => 'item_category as parent_item',
						'on' => 'item_category.parent=parent_item.code',
						'align' => 'left',
						),
					),
				'select'=>'item_category.*,parent_item.name as parent_name',
				)
			);
		//
		//page setting
		$data = array(
			'web_title' => 'Item Category',
			'web_sub_title' => '',
			'web_page_icon' => 'clip-tag',
			'menu_item_category' => 'active',
			'tree_menu' => array(),
			'web_body' => $this->load->view('view_main',$data,true)
			);


		$this->parser->parse('template_inventory', $data);

	}

	public function insert(){
		$user_admin_ses = $this->session->userdata(base_url() . '_user_adm1n');
		$query_add=$this->item_category->add(
			(object)array(
				'fields' => array(
					'code' => $this->input->post('code'),
					'parent' => $this->input->post('parent'),
					'name' => $this->input->post('name'),
					'user_id' => $user_admin_ses->id,
					),
				'get_id'=>true
				)
			);
		redirect('adm1n/inventory/item_category');
	}

	public function update(){
		$query_update=$this->item_category->update(
			(object)array(
				'fields' => array(
					'code' => $this->input->post('code'),
					'parent' => $this->input->post('parent'),
					'name' => $this->input->post('name'),	
					),
				'criteria_value' =>  $this->input->post('id')
				)
			);
		redirect('adm1n/inventory/item_category');
	}

	public function check_id(){
		$id = $_POST["code"];
		if(!empty($id)){
			$check = $this->item_category->get(
				(object)array(
					'where' => array(
						(object)array(
							'param_name' => 'code',
							'param_value' => $id,
							),
						),
					'row'=>true
					)
				);
			if(!empty($check) || $id <= 0){
				echo "<span class='status-not-available' style='color: red'>ID Not Available.</span>";
			}else{
				echo "<span class='status-available' style='color: green'>ID Available.</span>";
			}
		}
	}
}

/* End of file Admin_item_category.php */
/* Location: ./application/controllers/Admin_item_category.php */