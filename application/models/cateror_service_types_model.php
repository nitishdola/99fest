<?php
class Cateror_service_types_model extends MY_Model {
	
	
	public function __construct() {
		parent::__construct();
		$this->_database = $this->db;
	}
public function get_cateror_service() {

		
        $qry = $this->db->select('cateror_service_types.*');
         // $qry= $this->db->get('cateror_service_types');

         return $this->get_all();

        
	}


 public function record_count()
    {
        return $this->db->count_all("cateror_service_types");
    }

    //to pasignation view
   
     public function fetch_vendors($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("cateror_service_types");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }



    public function get_service($id = NULL) {
        $this->db->select('cateror_service_types.*');
        $this->db->where('cateror_service_types.id', $id);
        
        return $this->get_all();
    }

    public function update($id,$service){
             $this->db->where('id', $id);
             $this->db->update('cateror_service_types', $service);
          }

	
	

}