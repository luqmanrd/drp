<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tes extends CI_Controller {
	public function index(){
		$b = "";
		for ($i=0; $i < 5; $i++) { 
			$b .= "<h1>".$i."</h1>";
		}
		echo $b;
	}


}