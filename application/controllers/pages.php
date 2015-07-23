<?php
if(!defined('BASEPATH')) exit('No direct script access  is allowed !');
	class Pages extends MY_Controller {
		public function about() {
			$this->load_view('pages/about', 'customer');
		}

		public function team() {
			$this->load_view('pages/team', 'customer');
		}

		public function contact() {
			$this->load_view('pages/contact', 'customer');
		}
	}