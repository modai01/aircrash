<?php 

namespace AirCrash\Controllers;

use AirCrash\Models;
use Symfony\Component\HttpFoundation\Request;
use Silex\Application;

class LoginController 
{

	public function showForm(Application $app)
    {
        return $app['twig']->render('login.twig');
    }

	public function onSubmitForm(Request $request, Application $app)
    {


		if( !empty($request->get('email')) && !empty($request->get('password')))
		{
            $oUser = new Models\UserModel();
            $aUser = $oUser->signIn(
                $request->get('email'), 
                $request->get('password')
            );

            if($aUser != false) {
                $oUserSession = new Models\UserSession();
                $oUserSession->create(
                    $aUser['id'],
                    $aUser['firstname'],
                    $aUser['lastname'],
                    $aUser['email']
                );
             
               return $app->redirect($app['url_generator']->generate('home'));
            } 
    	}

    	return $app['twig']->render('login.twig');
    }
};