<?php

use Slim\App;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

return function (App $app) {

    $app->get('/', \App\Action\HomeAction::class)->setName('home');

    // Documentation de l'api
    $app->get('/docs', \App\Action\Docs\SwaggerUiAction::class);

    // Generer une nouvelle cle pour l'API Poutine
    $app->get('/cle', \App\Action\Poutine\GenererCleApiAction::class);

    // Toutes les poutines
    $app->get('/poutine', \App\Action\Poutine\PoutineAction::class);

    // Lister seulement la poutine avec le id en paramètre
    $app->get('/poutine/{id}', \App\Action\Poutine\PoutineParIdAction::class);

    // Insert poutine
    $app->post('/poutine', \App\Action\Poutine\AjouterPoutineAction::class);

    // Modifier poutine
    $app->put('/poutine/{id}', \App\Action\Poutine\ModifierPoutineParIdAction::class);
    
    // Supprimer poutine
    $app->delete('/poutine/{id}', \App\Action\Poutine\SupprimerPoutineParIdAction::class);

};