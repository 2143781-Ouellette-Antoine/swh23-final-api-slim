<?php

namespace App\Action\Poutine;

use App\Domain\Poutine\Service\AjouterPoutineView;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class AjouterPoutineAction
{
    private $poutineView;

    public function __construct(AjouterPoutineView $poutineView)
    {
        $this->poutineView = $poutineView;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {

        // Récupération du contenu de la HTTP Request (POST)
        $jsonInput = $request->getParsedBody();

        $resultat = $this->poutineView->ajouterPoutine($jsonInput);

        // Construit la réponse HTTP
        $response->getBody()->write((string)json_encode($resultat));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}
