<?php 
$group_id = $_GET['id'];
$userObject = new Models\User;

$groupObject = new Models\Group;
$group = $groupObject->getById($group_id)[0];

$transaction = new Models\TransactionRelation;
$transactionObject = new Models\Transaction;

$transaction->setGroup($group_id);
$transaction_id = $transaction->getTransactionsFromGroup();
$transactions = [];
foreach ($transaction_id as $transaction) {
    array_push($transactions, $transactionObject->getById($transaction['transaction_id'])[0]);
}

render("groupDepense", false, [
    "group" => $group,
    "transactions" => $transactions,
    "user" => $userObject
]);