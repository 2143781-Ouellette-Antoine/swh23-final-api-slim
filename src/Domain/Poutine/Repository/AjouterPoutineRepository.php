<?php

namespace App\Domain\Poutine\Repository;

use PDO;

/**
 * Repository.
 */
class AjouterPoutineRepository
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
     * Insere une poutine.
     * 
     * @param $jsonInput Les informations de la poutine.
     * 
     * @return $result La poutine inseree.
     */
    public function insertPoutine($jsonInput): array
    {
        //Formatter le tableau_associatif_input, pour ne pas qu'il manque de colonne.
        $paramsSQL = [
            "nom" => $jsonInput["nom"] ?? "",
            "description" => $jsonInput["description"] ?? ""
        ];

        //Requete SQL
        $sql = "INSERT INTO poutine(nom, description)
            VALUES (:nom, :description);";
        //Prepare
        $query = $this->connection->prepare($sql);
        //Execute & Bind
        $query->execute($paramsSQL);
        //Request the id it just inserted.
        $idPoutineInserted = $this->connection->lastInsertId();

        //return the json of the poutine inserted
        $result = [
            "id" => $idPoutineInserted,
            "nom" => $paramsSQL["nom"],
            "description" => $paramsSQL["description"]
        ];
        return $result;
    }
}