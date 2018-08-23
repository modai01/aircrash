<?php
// vous devez charger le fichier autoload en fonction 
// de la position ou se trouve votre fichier index.php
require_once '../vendor/autoload.php';

// On instancie la classe Application se trouvant 
// dans le namespace Silex
// $app est donc un objet contenant Silex
$app = new Silex\Application();

// Vous pouvez activer le mode debug comme ceci
$app['debug'] = true;

$app->register(new Silex\Provider\SessionServiceProvider());

// dirname(__DIR__).'/views/' correspond au dossier de base 
// ou vous mettrez vos templates
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => dirname(__DIR__).'/views/',
));

// inclusion des routes
include 'route.php';


$app->run(); // INDISPENSABLE permet de démarrer “l’application”
