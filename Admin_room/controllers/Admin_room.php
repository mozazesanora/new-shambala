<?php
class Admin_room extends CI_Controller
{

	function __construct(){
		parent::__construct();
		//restrict area only for admin
		$this->load->model('Model_restrict_page');
		$this->Model_restrict_page->restrict_area(
			(object)array(
				'admin' => (object)array(
					'only_section' => array('Press','Super Admin','Research'),
				)
			));
		$this->load->model('model_crud', 'room');
		$this->room->set_data(
			(object)array(
				'module_name' => 'room',
				'table_name' => 'room_setting',
			)
		);
	}



	function index(){
		$data['room'] = $this->room->get(
			(object)array(
				'select'=>'*',
			)
		);

		//page setting
		$data = array(
			'web_title' => 'Room Manajement',
			'web_sub_title' => '',
			'web_page_icon' => 'clip-pencil',
			'menu_room' => 'active', //give name page like title with small character _ for space
			'tree_menu' => array(),
			'web_body' => $this->load->view('view_main', $data, true)
		);

		$this->parser->parse('template_adminside', $data);
	
	}

	function form($type,$id){
		if (strcmp($type, 'add')==0) {
			$data['title']="Add";
			$data['url']=base_url()."adm1n/inventory/room/add";
			
		} elseif (strcmp($type, 'edit')==0) {
			$data['title']="Edit";
			$data['url']=base_url()."adm1n/inventory/room/edit";

			$data['room']=$this->room->get((object)array(
				'where'=>array(
					(object)array(
						'param_name'=>'id',
						'param_value'=>$id,
					),
				),
				'row'=>true
			));			
		}
		//page setting
		$data = array(
			'web_title' => $data['title'],
			'web_sub_title' => 'Room Manajement',
			'web_page_icon' => 'clip-wrench',
			'menu_room' => 'active', 
			'tree_menu' => array(
				array('value' => 'room', 'link' => base_url()."adm1n/inventory/room")
			),
			'web_body' => $this->load->view('view_form', $data, true)
		);

		$this->parser->parse('template_adminside', $data);
	}
	
	function insert(){
		$user_admin_ses=$this->session->userdata(base_url().'_user_adm1n');

		$data = $this->input->post('data');
		//$data['user_id'] = $user_admin_ses->id;

		$yes=$this->room->add((object)array(
				'fields' => $data,
				'get_id'=>true,
			)
		);
		redirect(base_url()."adm1n/inventory/room");
	}

	public function delete($id){
		$this->room->delete((object)array(
			'criteria_value'=>$id
		));
		redirect(base_url()."adm1n/inventory/room");
	}

	function update(){
		$data = $this->input->post('data');
		echo "<pre>>";
		print_r($data);
		echo "</pre>";
		// print_r(expression)
		$yes=$this->room->update((object)array(
			'fields'=> $data,
			'criteria_value' => $data['id'],
		));


		redirect(base_url()."adm1n/inventory/room");
	}
}

?>