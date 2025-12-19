<?php

namespace Models;

use Exception;
use PDO;

class TransactionRelation extends Database
{

    private $transactionId = null;
    private $contributorId = null;


    //GETTERS
    public function getTransaction()
    {
        return $this->transactionId;
    }
    public function getContributor()
    {
        return $this->contributorId;
    }

    //SETTERS
    public function setTransaction($value)
    {
        if (empty($value)) throw new Exception("La transaction doit être sélectionner");
        if (!preg_match('/\d+/', $value)) throw new Exception("Une erreur vient de se produire, veuillez réessayez");
        $this->transactionId = htmlspecialchars($value);
    }
    public function setContributor($value)
    {
        if (empty($value)) throw new Exception("Le contributeur doit être sélectionner");
        if (!preg_match('/\d+/', $value)) throw new Exception("Une erreur vient de se produire, veuillez réessayez");
        $this->contributorId = htmlspecialchars($value);
    }
    //METHODS
    /**
     * Creates new TransactionRelation between Transaction and User
     * @return bool true if successful, false otherwise
     */
    public function create()
    {
        if (!isset($this->transactionId)) throw new Exception("La transaction doit être sélectionner");
        if (!isset($this->contributorId)) throw new Exception("Le contributeur doit être sélectionner");

        $queryExecute = $this->db->prepare("INSERT INTO `transaction_user` IF NOT EXISTS (`transaction_id`,`contributor_id`)
            VALUES (:transactionId,:contributorId)");

        $queryExecute->bindValue(":transactionId", $this->transactionId, PDO::PARAM_INT);
        $queryExecute->bindValue(":contributorId", $this->contributorId, PDO::PARAM_INT);

        return $queryExecute->execute();
    }
    /**
     * Gets all users from a designated Transaction
     * @return array all users from specified Transaction indexed by the column name "contributor_id" (recommended use with foreach)
     */
    public function getUsersFromTransaction()
    {
        if (!isset($this->transactionId)) throw new Exception("La transaction doit être sélectionner");

        $queryExecute = $this->db->prepare("SELECT `contributor_id` FROM `transaction_user` WHERE `transaction_id` = :transaction");

        $queryExecute->bindValue(":transaction", $this->transactionId, PDO::PARAM_INT);
        $queryExecute->execute();

        return $queryExecute->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * Gets all transactions from a designated user
     * @return array all transactions from specified group indexed by the column name "transaction_id" (recommended use with foreach)
     */
    public function getTransactionsFromUser()
    {
        if (!isset($this->contributorId)) throw new Exception("Le contributeur doit être sélectionner");

        $queryExecute = $this->db->prepare("SELECT `transaction_id` FROM `transaction_user` WHERE `contributor_id` = :contributor");

        $queryExecute->bindValue(":contributor", $this->contributorId, PDO::PARAM_INT);
        $queryExecute->execute();

        return $queryExecute->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * Deletes a TransactionRelation between User and Group
     * @return bool true if successful, false otherwise
     */
    public function suppRelation()
    {
        if (!isset($this->contributorId)) throw new Exception("Le contributeur doit être sélectionner");
        if (!isset($this->transactionId)) throw new Exception("La transaction doit être sélectionner");

        $queryExecute = $this->db->prepare("DELETE FROM `transaction_user` WHERE `contributor_id` = :contributor AND `transaction_id` = :transaction");

        $queryExecute->bindValue(":contributor", $this->contributorId, PDO::PARAM_INT);
        $queryExecute->bindValue(":transaction", $this->transactionId, PDO::PARAM_INT);

        return $queryExecute->execute();
    }
}
