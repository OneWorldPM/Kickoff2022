<?php
class Lobby_video extends CI_Controller {
    function __construct() {
        parent::__construct();
        $login_type = $this->session->userdata('aname');
        if ($login_type != 'admin') {
            redirect('admin/alogin');
        }
    }

    function index() {
        $data['video_data'] = $this->getDetails();

        $this->load->view('admin/header');
        $this->load->view('admin/lobby_video', $data);
        $this->load->view('admin/footer');
    }



    function getDetails()
    {
        $this->db->select('*');
        $this->db->from('lobby_video');
        $video = $this->db->get();
        if ($video->num_rows() > 0)
        {
            return $video->result()[0];
        }else{
            return false;
        }
    }

    function updateDetails()
    {
        $this->db->set('status', $this->input->post()['status']);
        $this->db->set('vimeo_video_id', $this->input->post()['video_id']);
        $this->db->where('id', 1);
        $this->db->update('lobby_video');

        if ($this->db->affected_rows() > 0)
            echo 1;
        else
            echo 0;

        return;
    }
}
?>
