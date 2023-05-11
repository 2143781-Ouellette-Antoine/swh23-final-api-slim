<?php

namespace App\Domain\Poutine\Repository;

use PDO;

/**
 * Repository.
 */
class PoutineRepository
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
     * Sélectionne la liste de toutes les poutines
     * 
     * @return DataResponse
     */
    public function selectAllPoutines(): array
    {
        $sql = "SELECT * FROM poutine;";

        $query = $this->connection->prepare($sql);
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}