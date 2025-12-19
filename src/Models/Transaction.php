<?php

namespace Models;

use Exception;
use PDO;

class Transaction extends Database
{
    private $name;
    private $creatorId;
    private $amount;

    //GETTERS
    public function getName()
    {
        return $this->name;
    }
    public function getCreator()
    {
        return $this->creatorId;
    }
    public function getAmount()
    {
        return $this->amount;
    }

    //SETTERS
    public function setName($value)
    {
        if (empty($value)) throw new Exception("Le transaction doit comporter un nom");
        $this->name = $value;
    }
    public function setCreator($value)
    {
        if (empty($value)) throw new Exception("ERREUR identifiant createur");
        $this->creatorId = $value;
    }
    public function setAmount($value)
    {
        if (empty($value)) throw new Exception("ERREUR quantité argent");
        $this->amount = $value;
    }
    //METHODS
    /**
     * Registers a new transaction
     * @return bool true if successful, false otherwise
     */
    public function register()
    {
        if (empty($this->name)) throw new Exception("Le nom de la transaction doit être défini");
        if (empty($this->creatorId)) throw new Exception("ERREUR identifiant createur");
        if (empty($this->amount)) throw new Exception("ERREUR quantité argent");

        $queryExecute = $this->db->prepare("INSERT INTO `transactions`(`name`,`creator_id`,`amount`) 
        VALUES (:name, :creator_id, :amount)");

        $queryExecute->bindValue(":name", $this->name, PDO::PARAM_STR);
        $queryExecute->bindValue(":creator_id", $this->creatorId, PDO::PARAM_INT);
        $queryExecute->bindValue(":name", $this->amount, PDO::PARAM_INT);

        return $queryExecute->execute();
    }
    /** Deletes a Transaction
     * @param int $value Id of transaction deleted
     * @return bool true if successful, false otherwise
     */
    public function suppGroup($value)
    {
        if (empty($value)) throw new Exception("ERREUR transaction invalide");

        $queryExecute = $this->db->prepare("DELETE FROM `transactions` WHERE `id` = :id");
        $queryExecute->bindValue(":id", $value, PDO::PARAM_INT);
        return $queryExecute->execute();
    }
    /**
     * Gets a transaction in table by its Id
     * @param int $value Identifier of transaction
     * @return array group indexed by column name (recommended use with foreach)
     */
    public function getById($value)
    {
        $queryExecute = $this->db->prepare("SELECT * FROM `transactions` WHERE id = :id");
        $queryExecute->bindValue(":id", $value, PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * Gets all transactions in table
     * @return array all transactions are indexed by column name (recommended use with foreach)
     */
    public function getAllTransactions()
    {
        $queryExecute = $this->db->prepare("SELECT * FROM `transactions`");
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_ASSOC);
    }
}
