<?php

class Analytics extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('madmin/m_analytics', 'manalytics');

    }

  function index(){
        $data['analytics']=$this->manalytics->getAnalytics();
        $this->load->view('admin/header');
        $this->load->view('admin/analytics', $data);
      $this->load->view('admin/footer');
  }

  function export_csv_analytics(){
      $analytics=$this->manalytics->export_analytics();


      header("Content-type: application/csv");
      header("Content-Disposition: attachment; filename=\"analytics".".csv\"");
      header("Pragma: no-cache");
      header("Expires: 0");

      $handle = fopen('php://output', 'w');
      fputcsv($handle, array("No","First Name","Last Name", "Page Visited", "Date"));
      $cnt=1;
      foreach ($analytics->result() as $index=>$key) {
          $narray=array(($index+1),$key->first_name,$key->last_name,$key->page_name,$key->activity_date_time);
          fputcsv($handle, $narray);
      }
      fclose($handle);
      exit;
  }

}

?>