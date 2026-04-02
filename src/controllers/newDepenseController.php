<?php

use Models\TransactionRelation;

$group_id = $_GET['id'];

$groupObject = new Models\Group;
$group = $groupObject->getById($group_id);

$groupRelationObject = new Models\GroupRelation;
$groupRelationObject->setGroup($group_id);
$usersId = $groupRelationObject->getUsersFromGroup();

$userObject = new Models\User;
$users = [];
foreach ($usersId as $userId) {
    $user = $userObject->getById($userId['user_id']);
    array_push($users, $user);
}

// Gestion de l'ajout d'une dépense
$transaction = new Models\Transaction;
$transactionRelation = new Models\TransactionRelation;
$error = [];

if (!empty($_POST)) {

    try {
        $transaction->setName($_POST["title"]);
    } catch (\Exception $e) {
        $error["title"] = $e->getMessage();
    }
    try {
        $transaction->setCreator($_POST["creator"]);
    } catch (\Exception $e) {
        $error["creator"] = $e->getMessage();
    }
    try {
        $transaction->setAmount($_POST["amount"]);
    } catch (\Exception $e) {
        $error["amount"] = $e->getMessage();
    }

    if (empty($error)) {
        try {
            $transaction->register();
            $success = "Dépense rajouté avec succès !";
        } catch (\Exception $e) {
            $error["db-transaction"] = "Erreur lors de l'ajout de la dépense";
        }
    }
    $lastId = $transaction->lastId();
    foreach ($usersId as $userId) {
        try {
            $transactionRelation->setGroup($group_id);
        } catch (\Exception $e) {
            $error["group-relation"] = $e->getMessage();
        }

        try {
            $transactionRelation->setContributor($userId['user_id']);
        } catch (\Exception $e) {
            $error["contributorRelation" . $userId['user_id']] = $e->getMessage();
        }

        try {
            $transactionRelation->setAmount($_POST["contributor-amount" . $userId['user_id']]);
        } catch (\Exception $e) {
            $error["contributor-amount"] = $e->getMessage();
        }

        try {
            $transactionRelation->setTransaction($lastId);
        } catch (\Exception $e) {
            $error["transaction"] = $e->getMessage();
        }

        if (empty($error)) {
            try {
                $transactionRelation->create();
                $success = "Dépense rajouté avec succès !";
            } catch (\Exception $e) {
                $error["db-relation"] = $e->getMessage();
            }
        }
    }
    $_POST = [];
}


render("newDepense", false, [
    "group" => $group,
    "users" => $users,
    "errors" => $error
]);
