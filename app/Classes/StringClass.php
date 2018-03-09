<?php
 
namespace App\Classes;

use Illuminate\Http\Request;
use App\Models\CompanyAddress;

class StringClass {
    function str2alias($string) {

	$list = array('“', '”', "(", ")", "%", "`", "~", "!", "@", "#", "$", "^", "&", "*", "[", "]", "{", "}", ";", ":", "'", ",", ".", "<", ">", "?", "/", "|", '"', "_", "=", "+");

	$string = trim($string);

	$string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);

	$string = str_replace(" ", '-', $string);

	$string = stripslashes($string);



	for($i=0; $i<=sizeof($list); $i++) {

		@$string = str_replace($list[$i], '', $string);

	}

	$string = str_replace("--", '-', strtolower($string));



	return $string;

    }
}