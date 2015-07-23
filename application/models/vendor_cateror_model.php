<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Message Model
*
* Description:  Message related operations done here.
*
*
*/

class Vendor_cateror_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
//to count vendors
  public function record_count()
    {
        return $this->db->count_all("vendor_catering_service_information");
    }

    //to pasignation view
   
     public function fetch_cateror($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("vendor_catering_service_information");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   
     
}