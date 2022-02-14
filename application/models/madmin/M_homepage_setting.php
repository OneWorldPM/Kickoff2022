<?php

class M_homepage_setting extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getAgenda(){
        $agenda = $this->db->select('*')
            ->get('homepage_setting');

        return $agenda->result();
    }

    function saveAgenda($agendaText){
        $agenda = $this->db->select('agenda')
            ->get('homepage_setting');

        if($agenda->num_rows()> 0){
            $this->db->update('homepage_setting', array('agenda'=>$agendaText), array('id'=>1));
            return $this->db->affected_rows();
        }else{
            $this->db->insert('homepage_setting', array('agenda'=>$agendaText));
            return $this->db->insert_id();
        }

    }

}
