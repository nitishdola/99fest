<?php
class Catering_categories_model extends MY_Model {
    public $categories_validation = array(
        array(
           'field' => 'cname',
            'label' => 'First Name',
            'rules' => 'required|trim'
        ),
    );
	
	
	public function __construct() {
		parent::__construct();
		$this->_database = $this->db;
	}
public function get_catering_for() {

		
        $qry = $this->db->select('catering_categories.*');
         // $qry= $this->db->get('cateror_service_types');

         return $this->get_all();

        
	}

	public function get_cateror_service() {

		
        $qry = $this->db->select('catering_categories.*');
         // $qry= $this->db->get('cateror_service_types');

         return $this->get_all();

        
	}

    public function get_category($id = NULL) {
        $this->db->select('catering_categories.*');
        $this->db->where('catering_categories.id', $id);
        
        return $this->get_all();
    }

    public function update($id,$category){
             $this->db->where('id', $id);
             $this->db->update('catering_categories', $category);
          }


 public function record_count()
    {
        return $this->db->count_all("catering_categories");
    }

    //to pasignation view
   
     public function fetch_vendors($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("catering_categories");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

	
	

}