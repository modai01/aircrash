<?php
namespace AirCrash\Controllers;

use Silex\Application;
use AirCrash\Models;


class Homepage
{
	public function showPage(Application $app)
 	{
 		$oUsersSession = new Models\UserSession;

		if ($oUsersSession->getUserId() == null) {

	        return $app['twig']->render('home.twig');
    	}

        return $app['twig']->render('admin.twig');

    }
}



