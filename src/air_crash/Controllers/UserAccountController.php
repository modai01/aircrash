<?php
namespace AirCrash\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Silex\Application;
use AirCrash\Models;

class UserAccountController{

	public function showProfile(Application $app){
		
		$oUsersSession = new Models\UserSession($app);
		$sUserId = $oUsersSession->getUserId();

		if ($oUsersSession->getUserId() == null) {

			return $app['twig']->render('home.twig');
		}

		$oUserModel = new Models\UserModel;
		$accountUser = $oUserModel->getProfile([$sUserId]);

		return $app['twig']->render('userAccount.twig', array('userAccount' => $accountUser));
	}

	public function editProfile(Request $request,Application $app){
		$oUsersSession = new Models\UserSession;
		$sUserId = $oUsersSession->getUserId();
		
		$oUserModel = new Models\UserModel;
		$aNewData = [
			$request->get('firstname'),
			$request->get('lastname'),
			$request->get('birthDate'),
			$request->get('email'),
			$request->get('password'),
			$request->get('address'),
			$request->get('city'),
			$request->get('country'),
			$request->get('zipCode'),
			$request->get('phone'),
			$sUserId
		];

		$oUserModel->editUserAccount($aNewData);
		// return $app['twig']->render('home.twig');

	}
}