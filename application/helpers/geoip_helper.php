<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* Geo Location Plugin
*
* @package        CodeIgniter
* @subpackage        System
* @category        Plugin
*/

// ------------------------------------------------------------------------

/*
Instructions:

Load the plugin using:

$this->load->plugin('geo_location');

Once loaded you can get user's geo location details by IP address

$ip = $this->input->ip_address();
$geo_data = geolocation_by_ip($ip);

echo "Country code : ".$geo_data['country_name']."\n";
echo "Country name : ".$geo_data['city']."\n";
...

NOTES:

The get_geolocation function will use current IP address, if IP param is not given.

RETURNED DATA

The get_geolocation() function returns an associative array with this data:

[array]
(
'ip'=>$ip,
'country_code'=>$result->CountryCode,
'country_name'=>$result->CountryName,
'region_name'=>$result->RegionName,
'city'=>$result->City,
'zip_postal_code'=>$result->ZipPostalCode,
'latitude'=>$result->Latitude,
'longitude'=>$result->Longitude,
'timezone'=>$result->Timezone,
'gmtoffset'=>$result->Gmtoffset,
'dstoffset'=>$result->Dstoffset
)
*/

/**
* Get Geo Location by Given/Current IP address
*
* @access    public
* @param    string
* @return    array
*/
if (!function_exists('get_geolocation')) {

function get_geolocation($ip) {
	$d = file_get_contents("http://api.db-ip.com/addrinfo?addr=$ip&api_key=966b143b0d760a408f7fc5685fce6bbf477591a0");
	
	$d = json_decode($d);

	if(isset($d->error)) {
		$d = file_get_contents("http://ip-api.com/json/$ip");
		$stateName = json_decode($d)->regionName;
		$cityName  = json_decode($d)->city;
	}else{
		$stateName = $d->stateprov;
		$cityName  = $d->city;
	}
	//Return the data as an array
	return array('ip'=>$ip,'state'=>$stateName , 'city'=>$cityName);
	}
}
/* End of file geoip_helper.php */
/* Location: ./application/helper/geoip_helper.php */ 