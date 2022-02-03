<?php
class M_analytics extends CI_Model{

    function __construct() {
        parent::__construct();
    }

    public function getAnalytics(){
        $this->db->select('*')
            ->from('user_activity ua')
            ->join('customer_master cm', 'ua.user_id = cm.cust_id', 'left')
            ->where('page_name','User Dashboard')

            ->group_by('user_id');
        $result = $this->db->get();


        if($result->num_rows() > 0){
//            print_r($result->result());
            return $result->result();
        }else{
            return '';
        }
    }


}
