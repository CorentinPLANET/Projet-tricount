<?php
$group_id = $_GET['id'];
$userObject = new Models\User;

$groupObject = new Models\Group;
$group = $groupObject->getById($group_id);

$transactionRelationObject = new Models\TransactionRelation;
$transactionRelationObject->setGroup($group_id);
$transactionsData = $transactionRelationObject->getTransactionsFromGroup();

$transactionObject = new Models\Transaction;
$transactions = [];
foreach ($transactionsData as $transactionData) {
    $transactionId = $transactionData['transaction_id'];
    $transaction = $transactionObject->getById($transactionId);
    array_push($transactions, $transaction);
}

render("groupDepense", false, [
    "group" => $group,
    "transactions" => $transactions,
    "user" => $userObject
]);
