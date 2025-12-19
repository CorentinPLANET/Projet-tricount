<?php

namespace Models;

use Exception;
use PDO;

class Group extends Database
{
    private $name;
    //GETTERS
    public function getName()
    {
        return $this->name;
    }

    //SETTERS
    public function setName($value)
    {
        if (empty($value)) throw new Exception("Le groupe doit comporter un nom");
        $this->name = $value;
    }
    //METHODS
    public function register()
    {
        if (empty($this->name)) throw new Exception("Le nom du groupe doit être défini avant de le créer");

        $queryExecute = $this->db->prepare("INSERT INTO `group`(`name`) 
        VALUES (:name)");

        $queryExecute->bindValue(":name", $this->name, PDO::PARAM_STR);
        $queryExecute->execute();
    }
    /**
     * Deletes a group
     * @param int $value Id of group deleted
     * @return bool true if successful, false otherwise
     */
    public function suppGroup($value)
    {
        if (empty($value)) throw new Exception("ERREUR groupe invalide");
        
        $queryExecute = $this->db->prepare("DELETE FROM `group` WHERE `id` = :id");
        $queryExecute->bindValue(":id", $value, PDO::PARAM_INT);
        return $queryExecute->execute();
    }
    /**
     * Gets a group in table by its Id
     * @param int $value Identifier of group
     * @return array group indexed by column name (recommended use with foreach)
     */
    public function getById($value){
        $queryExecute = $this->db->prepare("SELECT * FROM `groups` WHERE id = :id");
        $queryExecute->bindValue(":id",$value,PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Gets all group in table
     * @return array all groups indexed by column name (recommended use with foreach)
     */
    public function getAllGroup()
    {
        $queryExecute = $this->db->prepare("SELECT * FROM `group`");
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_ASSOC);
    }
}
