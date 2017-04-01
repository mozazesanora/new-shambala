<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		 $this->thisdb = $this->load->database('default', TRUE);
		
	}

	function get_data_item_category()
    {
        $this->thisdb->from('item_category');
        $this->thisdb->where('deleted_at = ');
        return $this->thisdb->get()->result();
    }

    function generate_serial($category,$year){
    	$parent_id = $this->get_parent_category($category);
    	$key = $category.'/'.$parent_id.''.$year.'/';
    	$result = $this->generate_serial_id($key,1);
    	return $result;
    }

    function get_parent_category($id,$serial=""){
    	$this->thisdb->from('item_category');
        $this->thisdb->where("code = $id");
        $parent = $this->thisdb->get()->row()->parent;
        if($parent!=0){
        	$serial = $serial.''.$parent."/";
        	$serial = $this->get_parent_category($parent,$serial);
        }
        return $serial;
        
    }

    function generate_serial_id($key_serial,$num){
		$key = $key_serial.''.$num;
		$front = $key_serial;
		$this->thisdb->from('inventory_items');
		$this->thisdb->where('serial_number',$key);
		$id = $this->thisdb->get()->num_rows();
		if($id>0){
			$num++;
			$key = $this->generate_serial_id($front,$num);
		}
		return $key;
	}
}

/* End of file  */
/* Location: ./application/models/ */