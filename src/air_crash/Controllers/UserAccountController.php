<?php
namespace AirCrash\Controllers;

use Silex\Application;
use AirCrash\Models;

class UserAccountController{

	public function showProfile(Application $app){
		
		$oUsersSession = new Models\UserSession;
		$sUserId = $oUsersSession->getUserId();

		$oUserModel = new Models\UserModel;
		$accountUser = $oUserModel->getProfile([$sUserId]);

		return $app['twig']->render('userAccount.twig', array('userAccount' => $accountUser));
	}
}