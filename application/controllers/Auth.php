<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    function __construct()
    {
        parent::__construct();
        $this->load->model('login');
    }

    public function index()
    {
        $this->load->view('template/auth/header');
        $this->load->view('auth/login');
        $this->load->view('template/auth/footer');
    }

    public function login()
    {
        $uname   = $this->input->post('uname', TRUE);
        $password = md5($this->input->post('pass', TRUE));
        $validate = $this->login->validate($uname, $password);
        if ($validate->num_rows() > 0) {
            $sesdata = array(
                'logged_in' => TRUE
            );
            $this->session->set_userdata($sesdata);
            redirect(base_url("home"));
            // redirect('home');
        } else {
            redirect('auth');
        }
    }

    function logout()
    {
        // unset session's userdata
        $this->session->sess_destroy();
        redirect('');
    }
}
