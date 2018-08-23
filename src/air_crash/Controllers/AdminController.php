<?php
namespace AirCrash\Controllers;

use Silex\Application;

class AdminController{
	
	public function showPage(Application $app){
	

	        return $app['twig']->render('admin.twig');
    }
}
