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

    public function editUserAccount($data){

    	$oBdd = new Connect();
    	$oBdd->executeSql(
	    	'UPDATE `user` 
	    	SET `lastLoginTimestamp`=NOW(),
	    		`creationTimestamp`=NOW(),
	    		`firstname`=?,
	    		`lastname`=?,
	    		`birthDate`=?,
	    		`email`=?,
	    		`password`=?,
	    		`address`=?,
	    		`city`=?,
	    		`country`=?,
	    		`zipCode`=?,
	    		`phone`=? 
	    	WHERE id=?',
	    	$data
    	);
    }
}
