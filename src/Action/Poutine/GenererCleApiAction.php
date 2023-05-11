<?php

namespace App\Action\Poutine;

use App\Domain\Poutine\Service\GenererCleApiView;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class GenererCleApiAction
{
    private $genererCleApiView;

    public function __construct(GenererCleApiView $genererCleApiView)
    {
        $this->genererCleApiView = $genererCleApiView;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {

        // Récupération du contenu du body de la HTTP Request
        $jsonInput = $request->getParsedBody();

        //Parse JSON
        $codeUsager = $jsonInput["codeUsager"] ?? "";
        $motDePasseInput = $jsonInput["motDePasse"] ?? "";

        $resultat = $this->genererCleApiView->authentificationEtCleApi($codeUsager, $motDePasseInput);

        // Construit la réponse HTTP
        $response->getBody()->write((string)json_encode($resultat));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}