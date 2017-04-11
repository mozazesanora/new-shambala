<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_item_inventory extends CI_Controller {

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

		$this->load->model('model_crud', 'item_inventory');
		$this->load->model('Model');
		$this->item_inventory->set_data(
			(object)array(
				'module_name' => 'item_inventory',
				'table_name' => 'inventory_items',
				)
			);

	}

	public function index()
	{	
		$data['item_inventory']=$this->item_inventory->get(
			(object)array(
				'order_by' => "inventory_items.created_at DESC",
				'join' => array(
					(object)array(
						'join_table' => 'inventory_items as parent_inventory',
						'on' => 'inventory_items.parent=parent_inventory.id',
						'align' => 'left',
						),
					(object)array(
						'join_table' => 'item_category',
						'on' => 'inventory_items.category_item=item_category.id',
						'align' => 'left',
						),
					(object)array(
						'join_table' => 'user',
						'on' => 'inventory_items.user_id = user.id',
						'align' => 'left',
						),
					),
				'select'=>'inventory_items.*,parent_inventory.name as parent_name,item_category.name as category_name,user.full_name as username',
				)
			);

		$data['category_list'] = $this->Model->get_data_item_category();
		//page setting
		$data = array(
			'web_title' => 'Inventory',
			'web_sub_title' => 'Item and Tools',
			'web_page_icon' => 'fa fa-archive',
			'menu_inventory_item' => 'active',
			'tree_menu' => array(),
			'web_body' => $this->load->view('view_main',$data,true)
			);

		$this->parser->parse('template_inventory', $data);

	}

	public function insert(){
		$user_admin_ses = $this->session->userdata(base_url() . '_user_adm1n');
		$category_item = $this->input->post('item_category');
		$date = $this->input->post('entry');
		$year = strtok($date, '-');
		$generate_serial = $this->Model->generate_serial($category_item,$year);
		$key = $generate_serial;
		$query_add=$this->item_inventory->add(
			(object)array(
				'fields' => array(
					'parent' => $this->input->post('parent'),
					'name' => $this->input->post('name'),
					'category_item' => $this->input->post('item_category'),
					'can_be_rent' => $this->input->post('rentable'),
					'serial_number' => $key,
					'sn_product' => $this->input->post('serial_number'),
					'entry_date' => $this->input->post('entry'),
					'description' => $this->input->post('description'),
					'availability' => 1,
					'status' => $this->input->post('condition'),
					'location' => $this->input->post('location'),
					'user_id' => $user_admin_ses->id,
					),
				'get_id'=>true
				)
			);
		redirect('adm1n/inventory/item');
	}

	public function update(){
		$query_update=$this->item_inventory->update(
			(object)array(
				'fields' => array(
					'category_item' => $this->input->post('item_category'),
					'parent' => $this->input->post('parent'),
					'name' => $this->input->post('name'),
					'can_be_rent' => $this->input->post('rentable'),
					'description' => $this->input->post('description'),
					'sn_product' => $this->input->post('serial_number'),
					'entry_date' => $this->input->post('entry'),
					'status' => $this->input->post('condition'),
					'location' => $this->input->post('location'),	
					),
				'criteria_value' =>  $this->input->post('id')
				)
			);
		redirect('adm1n/inventory/item');
	}

	public function generate_code($serial,$name,$size){
		$serial = str_replace('~', '/', $serial);
		$name = str_replace('%20', ' ', $name);
		$data['serial'] = $serial;
		$data['name'] = $name;
		$data['size'] = $size;
		$this->load->view('generate_code',$data);
	}

	public function delete($id){
		$this->item_inventory->delete(
			(object)array(
				'criteria_value' => $id
				)
			);
		redirect('adm1n/inventory/item');
	}

}

/* End of file Admin_inventory.php */
/* Location: ./application/controllers/Admin_inventory.php */