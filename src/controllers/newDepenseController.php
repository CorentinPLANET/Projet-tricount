<?php
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

render("newDepense", false, [
    "group" => $group,
    "users" => $users
]);
