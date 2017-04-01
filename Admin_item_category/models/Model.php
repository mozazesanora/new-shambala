<?php

class model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->thisdb = $this->load->database('default', TRUE);
    }

}

?>