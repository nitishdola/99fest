<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Message Model
*
* Description:  Message related operations done here.
*
*
*/

class Message extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
public function record_count()
    {
        return $this->db->count_all('messages');
    }
    
    public function search_record_count($searchterm)
    {
        $sql = "SELECT COUNT(*) As cnt FROM messages WHERE sender_type LIKE '%" . $searchterm . "%'";
        $q = $this->db->query($sql);
        $row = $q->row(); 
        return $row->cnt;
    }
    
    public function search($searchterm,$limit)
    {
        $sql = "SELECT * FROM messages 
                WHERE sender_type LIKE '%" . $searchterm . "%' LIMIT " .$limit . ",15";
        $q = $this->db->query($sql);
        if($q->num_rows() > 0)
        {
            foreach($q->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
        }
        else
        {
            return 0;
        }
    }

    public function fetch_countries($limit,$start)
    {
        $this->db->limit($limit,$start);
        $query = $this->db->get('messages');
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }

            return $data;
        }
        else
        {
            return FALSE;
        }
    }
    
    public function searchterm_handler($searchterm)
    {
        if($searchterm)
        {
            $this->session->set_userdata('searchterm', $searchterm);
            return $searchterm;
        }
        elseif($this->session->userdata('searchterm'))
        {
            $searchterm = $this->session->userdata('searchterm');
            return $searchterm;
        }
        else
        {
            $searchterm ="";
            return $searchterm;
        }
    }
    

  /*  function view()
    {   
        $this->db->where('status', 1); //get only active states
		
		$this->db->order_by("name","asc");
        $qry = $this->db->get('messages');
        return $qry->result();
    }*/

   
}