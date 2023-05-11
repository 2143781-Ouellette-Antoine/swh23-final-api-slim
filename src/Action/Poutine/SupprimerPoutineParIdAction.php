<?php

namespace App\Action\Poutine;

use App\Domain\Poutine\Service\SupprimerPoutineParIdView;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class SupprimerPoutineParIdAction
{
    private $poutineView;

    public function __construct(SupprimerPoutineParIdView $poutineView)
    {
        $this->poutineView = $poutineView;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {

        // Récupération des parametres
        $poutineId = $request->getAttribute('id');

        $resultat = $this->poutineView->supprimerPoutineParId($poutineId);

        if ($resultat["succes"]==true)
        {
            unset($resultat['succes']);

            // Construit la réponse HTTP
            $response->getBody()->write((string)json_encode($resultat));

            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }
        else
        {
            // Construit la réponse HTTP
            $resultat = [
                "erreur" => "le id poutine est invalide."
            ];
            $response->getBody()->write((string)json_encode($resultat));

            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(404);
        }
    }
}
