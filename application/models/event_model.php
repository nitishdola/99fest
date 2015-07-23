<?php
class Event_model extends MY_Model {
	protected $belongs_to 	= array('user', 'city', 'state');
	
	public function __construct() {
		parent::__construct();
		$this->_database = $this->db;
	}

	public $add_event_validation = array(
		array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'required|trim'
		),
		
		array(
			'field' => 'event_duration_hr',
			'label' => 'Event Duration Hour',
			'rules' => 'required|trim|less_than[25]|integer'
		),
		
		array(
			'field' => 'event_duration_minutes',
			'label' => 'Event Duration Minutes',
			'rules' => 'required|trim|less_than[61]|integer'
		),

		array(
			'field' => 'event_start_date',
			'label' => 'Event start date',
			'rules' => 'required|trim'
		),

		array(
			'field' => 'venue',
			'label' => 'venue',
			'rules' => 'required|trim'
		),

		array(
			'field' => 'venue_address',
			'label' => 'Venue Address',
			'rules' => 'required|trim'
		),

		array(
			'field' => 'venue_pin',
			'label' => 'Venue PIN',
			'rules' => 'required|trim|exact_length[6]|numeric'
		),

		array(
			'field' => 'state_id',
			'label' => 'State',
			'rules' => 'required|trim|integer'
		),

		array(
			'field' => 'city_id',
			'label' => 'City',
			'rules' => 'required|trim|integer'
		),
		/*
		array(
			'field' => 'mobile_number',
			'label' => 'Mobile Number',
			'rules' => 'is_unique[customer_profiles.mobile_number]|required|trim|exact_length[10]|numeric|'
		),
		*/
	);

	public $create_event_ticket_validation = array(
		
		array(
			'field' => 'event_id',
			'label' => 'Event',
			'rules' => 'required|trim|integer'
		),

		array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'required|trim'
		),
		
	);

	public $create_event_review_validation = array(
		
		array(
			'field' => 'title',
			'label' => 'Title',
			'rules' => 'required|trim'
		),

		array(
			'field' => 'review',
			'label' => 'Review',
			'rules' => 'required|trim'
		),
		
	);

	public function get_events_by_manager($user_id = NULL) {
		$this->db->select('events.id, events.name' );
		$this->db->where('events.user_id', $user_id);
        
		return $this->get_all();
	}

	public function get_event_details($event_id = NULL) {
		$this->db->select('events.id as event_id,events.*, u.*, c.name as cityname, s.name as statename' );
        
        $this->db->join('users u', 'u.id = events.user_id');
        $this->db->join('cities c', 'c.id = events.city_id');
        $this->db->join('states s', 's.id = events.state_id');
        if($event_id != NULL) {
			$this->db->where('events.id', $event_id);
		}
        
		return $this->get_all();
	}

	/**
	* events details 
	* @parameter 
	* returns event details
	*/
	public function get_all_events($category_id = NULL, $city_id = NULL, $limit = EVENTSPERPAGE, $offset = 0, $sponsored = FALSE){

		$this->db->select('events.id as event_id,events.*, u.*, c.name as cityname, s.name as statename' );
        $this->db->join('users u', 'u.id = events.user_id');
        $this->db->join('cities c', 'c.id = events.city_id');
        $this->db->join('states s', 's.id = events.state_id');
        
        if($city_id != NULL) {
        	$this->db->where('c.id', $city_id);
        }

		if($category_id != NULL) {
			$this->db->from('event_categories ec');
			$this->db->join('events_categories ecs', 'ecs.id = ec.id');
			$this->db->where('ecs.event_category_id', $category_id);
		}
		if($sponsored == TRUE) {
			$this->db->where('events.sponsored', 1);
		}

		$this->db->limit($limit, $offset);

		$res = $this->get_all(); 
		$ret_ar = array();
		$check_key_arr = array();

		foreach($res as $k => $v) {
			if(!in_array($v->event_id, $check_key_arr)) {
				$check_key_arr[] = $v->event_id;				
			}else{
				unset($res[$k]);
			}
		}

		return $res;
	}

	public function get_all_events_admin() {
		$this->db->select('events.id as event_id,events.*, u.*, c.name as cityname, s.name as statename' );
        $this->db->join('users u', 'u.id = events.user_id');
        $this->db->join('cities c', 'c.id = events.city_id');
        $this->db->join('states s', 's.id = events.state_id');

        $this->db->order_by("event_start_date","desc");

        return $this->get_all();
	}

	

	function get_event_id_from_slug($slug) {
		$this->db->select('events.id');
		$this->db->where('events.slug', $slug);
		$res = $this->get_all();
		if(!empty($res)) {
			return $res[0]->id;
		}
		return false;
	}

	function check_if_already_voted($userId, $event_id) {
		$this->db->where('event_ratings.user_id', $userId);
		$this->db->where('event_ratings.event_id', $event_id);
		$num_rows = $this->db->count_all_results('event_ratings');
		return $num_rows;
	}

	/**
	* check_if_event_closed()
	* checks is event is already closed
	* @parrams event_id
	* @return TRUE if end date is less than curent date
	* FALSE otherwise
	*/

	function check_if_event_closed( $event_id ) {
		$this->db->where('events.status', 1);
		$this->db->where('events.id', $event_id);
		$this->db->where('events.event_end_date <', date('Y-m-d'));
		$num_rows = $this->db->count_all_results('events');
		return $num_rows;
	}

	function get_events_home_data( $city_id = NULL ) {
		$this->db->select('events.id as eventId,events.name as eventName, events.slug as eventSlug, events.event_start_time, events.event_start_date, events.sponsored, events.event_end_date,events.poster, events.thumb,events.venue, events.about, c.name as cityname' );
        $this->db->join('cities c', 'c.id = events.city_id');

        $this->db->where('events.event_start_date >=', date('Y-m-d'));

        $this->db->order_by('events.event_start_date','DESC');

        if($city_id != NULL) {
			$this->db->where('c.id', $city_id);
		}
        
		return $this->get_all();
	}


	function get_upcoming_events( $city_id ) {

		$date = strtotime("+15 day");
		$upto = date('Y-m-d', $date);


		$this->db->select('events.id as eventId,events.name as eventName, events.slug as eventSlug, events.event_start_time, events.event_start_date, events.sponsored, events.event_end_date,events.poster, events.thumb,events.venue, events.about, c.name as cityname' );
        $this->db->join('cities c', 'c.id = events.city_id');

        $this->db->where('events.event_start_date >=', date('Y-m-d'));

        $this->db->where('events.event_start_date <=', $upto);

        $this->db->order_by('events.event_start_date','ASC');

        if($city_id != NULL) {
			$this->db->where('c.id', $city_id);
		}
        
		return $this->get_all();
	}	

}