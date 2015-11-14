<?php
/* Title : Ajax Pagination with jQuery & PHP
Example URL : http://www.sanwebe.com/2013/03/ajax-pagination-with-jquery-php */

$db_username 		= 'wewe'; //database username
$db_password 		= ''; //dataabse password
$db_name 			= 'player'; //database name
$db_host 			= '37.59.47.108'; //hostname or IP
$item_per_page 		= 50; //item to display per page

$mysqli_conn = new mysqli($db_host, $db_username, $db_password,$db_name); //connect to MySql
//Output any connection error
if ($mysqli_conn->connect_error) {
    die('Error : ('. $mysqli_conn->connect_errno .') '. $mysqli_conn->connect_error);
}

?>