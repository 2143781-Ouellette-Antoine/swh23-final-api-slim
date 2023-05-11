<?php

namespace App\Action\Poutine;

use App\Domain\Poutine\Service\PoutineParIdView;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class PoutineParIdAction
{
    private $poutineParIdView;

    public function __construct(PoutineParIdView $poutineParIdView)
    {
        $this->poutineParIdView = $poutineParIdView;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {

        // Récupération des parametres dans l'URL.
        $poutineId = $request->getAttribute('id');

        $resultat = $this->poutineParIdView->viewPoutineById($poutineId);

        // Construit la réponse HTTP
        if (empty($resultat))
        {
            $responseStatus = 404;
            $resultat = ["erreur" => "Le id entré n'existe pas."];
        }
        else
        {
            $responseStatus = 200;
        }
        $response->getBody()->write((string)json_encode($resultat));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus($responseStatus);
    }
}
