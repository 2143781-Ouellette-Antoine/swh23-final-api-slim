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

        // Récupération du contenu dans le Header 'Authorization'.
        $valeurAuthorization = $request->getHeaderLine('Authorization');
        $token = explode(' ', $valeurAuthorization)[1];
        
        //Decoder usager et mot de passe.
        $decodedToken = base64_decode($token);
        
        $codeUsager = explode(' ', $decodedToken)[0] ?? "";
        $motDePasseInput = explode(' ', $decodedToken)[1] ?? "";

        $resultat = $this->genererCleApiView->authentificationEtCleApi($codeUsager, $motDePasseInput);

        // Construit la réponse HTTP
        $response->getBody()->write((string)json_encode($resultat));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}