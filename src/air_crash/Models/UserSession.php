<?php
namespace AirCrash\Models;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Silex\Application;

class UserSession
{
    private $app;

	public function __construct(Application $app)
	{
        $this->app = $app;
		if(session_status() == PHP_SESSION_NONE)
		{
			session_start();
		}
	}

	    public function create($userId, $firstName, $lastName, $email)
    {
        // Construction de la session utilisateur.
        $this->app['session']->set('user',
        [
            'UserId'    => $userId,
            'FirstName' => $firstName,
            'LastName'  => $lastName,
            'Email'     => $email
       ]);
    }
    
    
    public function destroy()
    {
    	unset($_SESSION['user']);
    }
    
    
    public function getEmail()
    {
    	if($this->isAuthenticated() == false)
        {
            return null;
        }

        return $_SESSION['user']['Email'];
    }
    
    
    public function getFirstName()
    {
        if($this->isAuthenticated() == false)
        {
            return null;
        }

        return $_SESSION['user']['FirstName'];
    }

    public function getFullName()
    {
        if($this->isAuthenticated() == false)
        {
            return null;
        }

        return $_SESSION['user']['FirstName'].' '.$_SESSION['user']['LastName'];
    }

    public function getLastName()
    {
        if($this->isAuthenticated() == false)
        {
            return null;
        }

        return $_SESSION['user']['LastName'];
    }

    public function getUserId()
    {
        // null coalescent
        return $this->app['session']->get('user')['UserId'] ?? null;
    }

	public function isAuthenticated()
	{
		if(array_key_exists('user', $_SESSION) == true)
		{
			if(empty($_SESSION['user']) == false)
			{
				return true;
			}
		}

		return false;
	}
    
}