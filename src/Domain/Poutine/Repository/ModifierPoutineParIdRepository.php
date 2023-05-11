<?php

namespace App\Domain\Poutine\Repository;

use App\Domain\Poutine\Repository\PoutineParIdRepository;//Pour pouvoir caller selectMovieById($poutineId)
use App\Domain\Poutine\Repository\AjouterPoutineRepository;//Pour pouvoir caller insertPoutine(...)
use PDO;

/**
 * Repository.
 */
class ModifierPoutineParIdRepository
{
    /**
     * @var PDO The database connection
     */
    private $connection;

    /**
     * Constructor.
     *
     * @param PDO $connection The database connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Update la poutine avec le id.
     * 
     * @param
     * 
     * @return
     */
    public function updatePoutine($poutineId, $jsonInput): array
    {
        //Sanity check.
        $poutineAModifier = (new PoutineParIdRepository($this->connection))->selectPoutineById($poutineId);

        if(is_null($poutineAModifier["id"]))//inexistante
        {
            //Insert une poutine selon le $jsonInput.
            $poutineAjoutee = (new AjouterPoutineRepository($this->connection))->insertPoutine($jsonInput);
            $result = $poutineAjoutee;
            $result["ajout"] = true;
        }
        else
        {
            //Formatter le tableau_associatif_input, pour ne pas qu'il manque de colonne.
            //Ajouter le id du Poutine a Update aussi.
            $paramsSQL = [
                "id" => $poutineId,
                "nom" => $jsonInput["nom"] ?? "",
                "description" => $jsonInput["description"] ?? ""
            ];

            //Requete SQL
            $sql = "UPDATE poutine
                    SET nom=:nom, description=:description
                    WHERE id=:id;";
            //Prepare
            $query = $this->connection->prepare($sql);
            //Execute & Bind
            $query->execute($paramsSQL);

            //return the json of the poutine updated
            $result = $paramsSQL;
        }

        //return the json
        return $result;
    }
}