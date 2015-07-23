<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Message Model
*
* Description:  Message related operations done here.
*
*
*/

class Vendor_view extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
//to count vendors
  public function record_count()
    {
        return $this->db->count_all("vendors");
    }

    //to pasignation view
   
     public function fetch_vendors($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("vendors");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   
     
}