<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Homepage_setting extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();


        $this->load->model('madmin/m_homepage_setting', 'home_model');
    }

    public function index(){

        $agenda = $this->home_model->getAgenda();
        $data['agenda'] = $agenda[0]->agenda;
        $this->load->view('admin/header');
        $this->load->view('admin/homepage_setting', $data);
        $this->load->view('admin/footer');
    }

    public function saveAgenda(){
        $agendaText = $this->input->post('agendaText');
        $result = $this->home_model->saveAgenda($agendaText);
        if(!empty($result)){
            echo json_encode($result);
        }
    }

    public function getAgenda(){
        $result = $this->home_model->getAgenda();
        if(!empty($result)){
            echo json_encode($result);
        }else{
            echo json_encode('error');
        }
    }
}
