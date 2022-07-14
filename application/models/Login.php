<?php

defined('BASEPATH') or exit('No direct script access allowed');

class login extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function validate($uname, $password)
    {
        $this->db->where('user', $uname);
        $this->db->where('pass', $password);
        $result = $this->db->get('login', 1);
        return $result;
    }
}
                        
/* End of file login.php */
