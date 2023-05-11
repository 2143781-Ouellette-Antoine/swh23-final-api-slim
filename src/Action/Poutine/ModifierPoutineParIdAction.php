<?php

namespace App\Action\Poutine;

use App\Action\Poutine\AjouterPoutineView;
use App\Domain\Poutine\Service\ModifierPoutineParIdView;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ModifierPoutineParIdAction
{
    private $poutineView;

    public function __construct(ModifierPoutineParIdView $poutineView)
    {
        $this->poutineView = $poutineView;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {

        // Récupération du contenu de la HTTP Request (PUT)
        $jsonInput = $request->getParsedBody();
        // Récupération des parametres dans l'URL
        $poutineId = $request->getAttribute('id');

        $resultat = $this->poutineView->modifierPoutine($poutineId, $jsonInput);

        if ($resultat["ajout"]==true)//Poutine existait pas.
        {
            unset($resultat['ajout']);

            // Construit la réponse HTTP
            $response->getBody()->write((string)json_encode($resultat));

            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(201);
        }
        else
        {
            // Construit la réponse HTTP
            $response->getBody()->write((string)json_encode($resultat));

            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }

    }
}
