<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] 	= "home";
$route['404_override'] 			= 'events/view';


//$route['vendors/(:num)'] 	= 'vendors/vendor_lookup_by_id/$1';
$route['vendors/view/(:any)']	= 'vendors/view/$1';

//$route['events/(:event_slug)']	= 'events/view/$slug';

$route['myprofile']	= 'customers/profile';

$route['login']		= 'users/login';
$route['logout']	= 'users/logout';

$route['page-not-found'] = 'home/not_found';

/* --------------------Admin routing------------*/
$route['add-event-manager']	= 'event_managers/add';
$route['event-managers/view-all'] = 'event_managers/view_all_managers';
$route['events/view-all'] = 'events/view_all_events';

$route['book-tickets']		= 'events/booking';


$route['about']			= 'pages/about';
$route['team']			= 'pages/team';
$route['contact']		= 'pages/contact';

$route['vendors']		= 'vendors/view_all_vendors';
$route['venue/(:any)']	= 'vendors/venue_details/$1';
$route['catering/(:any)']	= 'vendors/catering_details/$1';
$route['photographer/(:any)']	= 'vendors/studio_details/$1';

$route['change-password'] = 'users/change_password';
$route['forgot-password'] = 'users/forgot_password';
$route['reset-password/(:any)']  = 'users/reset_password/$1';

$route['add-default-image'] = 'admin/upload_default_image';
$route['view-default-images'] = 'admin/view_default_image';
$route['disable-default-image/(:any)'] = 'admin/disable_default_image/$1';
$route['enable-default-image/(:any)'] = 'admin/enable_default_image/$1';

/* End of file routes.php */
/* Location: ./application/config/routes.php */