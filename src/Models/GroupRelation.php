<?php

namespace Models;

use Exception;
use PDO;

class GroupRelation extends Database
{

    private $groupId = null;
    private $userId = null;

    //GETTERS
    public function getUser(){
        return $this->userId;
    }
    public function getGroup(){
        return $this->groupId;
    }

    //SETTERS
    public function setUser($value)
    {
        if (empty($value)) throw new Exception("L'utilisateur doit être sélectionner");
        if (!preg_match('/\d+/', $value)) throw new Exception("Une erreur vient de se produire, veuillez réessayez");
        $this->userId= htmlspecialchars($value);
    }
    public function setGroup($value)
    {
        if (empty($value)) throw new Exception("Le groupe doit être sélectionner");
        if (!preg_match('/\d+/', $value)) throw new Exception("Une erreur vient de se produire, veuillez réessayez");
        $this->groupId= htmlspecialchars($value);
    }
    //METHODS
    /**
     * Creates new GroupRelation between Group and User
     * @return bool true if successful, false otherwise
     */
    public function create()
    {
        if (!isset($this->userId)) throw new Exception("L'utilisateur de la relation doit être sélectionner");
        if (!isset($this->groupId)) throw new Exception("Le groupe de la relation doit être sélectionner");

        $queryExecute = $this->db->prepare("INSERT INTO `group_user` IF NOT EXISTS (`user_id`,`group_id`)
            VALUES (:userId,:groupId)");

        $queryExecute->bindValue(":userId", $this->userId, PDO::PARAM_INT);
        $queryExecute->bindValue(":groupId", $this->groupId, PDO::PARAM_INT);

        return $queryExecute->execute();
    }

    /**
     * Gets all users from a designated group
     * @return array all users from specified group indexed by the column name "user_id" (recommended use with foreach)
    */
    public function getUsersFromGroup()
    {
        if (!isset($this->groupId)) throw new Exception("Le groupe doit être sélectionner");

        $queryExecute = $this->db->prepare("SELECT `user_id` FROM `group_user` WHERE `group_id` = :group");

        $queryExecute->bindValue(":group", $this->groupId, PDO::PARAM_INT);
        $queryExecute->execute();

        return $queryExecute->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * Gets all groups from a designated user
     * @return array all groups from specified group indexed by the column name "group_id" (recommended use with foreach)
     */
    public function getGroupsFromUser()
    {
        if (!isset($this->userId)) throw new Exception("L'utilisateur doit être sélectionner");

        $queryExecute = $this->db->prepare("SELECT `group_id` FROM `group_user` WHERE `user_id` = :user");

        $queryExecute->bindValue(":user", $this->userId, PDO::PARAM_INT);
        $queryExecute->execute();

        return $queryExecute->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * Deletes a Relation between User and Group
     * @return bool true if successful, false otherwise
     */
    public function suppRelation()
    {
        if (!isset($this->userId)) throw new Exception("L'utilisateur doit être sélectionner");
        if (!isset($this->groupId)) throw new Exception("Le groupe doit être sélectionner");

        $queryExecute = $this->db->prepare("DELETE FROM `group_user` WHERE `user_id` = :user AND `group_id` = :group");

        $queryExecute->bindValue(":user", $this->userId, PDO::PARAM_INT);
        $queryExecute->bindValue(":group", $this->groupId, PDO::PARAM_INT);

        return $queryExecute->execute();
    }
}
