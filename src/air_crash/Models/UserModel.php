<?php 

namespace AirCrash\Models;

use Symfony\Component\HttpFoundation\Request;
use Silex\Application;


class UserModel
{	

    public function signIn($sEmail, $sPassword)
    {
        $oBdd = new Connect();
        // @todo revoir cette requete si hashage !
        return $oBdd->queryOne(
            'SELECT `id`, `firstname`, `lastname`, `password`, `email` 
                FROM user WHERE email=? AND password=?', 
                [$sEmail, $sPassword]
        );
    }
    // requête Sql pour récupérer les infos user
    public function getProfile($id){

    	$oBdd = new Connect();
    	return $oBdd -> queryOne(
    		'SELECT *
    		FROM user
    		WHERE id=?',
    		$id
    	);


    }
}
