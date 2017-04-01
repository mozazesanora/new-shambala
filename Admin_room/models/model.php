<?php

class model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->thisdb = $this->load->database('default', TRUE);
    }

    /*

    function get_data_schedule(){
        $this->thisdn->from('')
    }

    

    /*get all data users*/
    function get_data_users()
    {
        $this->thisdb->from('user');
        $this->thisdb->join('user_student', 'user_student.user_id=user.id');
        $this->thisdb->order_by('user.user_name', 'ASC');
        return $this->thisdb->get()->result();
    }
}

?>
