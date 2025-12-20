<?php

use Models\GroupRelation;
use Models\Group;
$error = [];

$groupRelation = new GroupRelation;
$groupRelation->setUser(1);

$groupsRelation = $groupRelation->getGroupsFromUser();
$groupObject = new Group;
$groups = [];
foreach ($groupsRelation as $group) {
    array_push($groups, $groupObject->getById($group['group_id']));
};

render("index", false, [
    "groups" => $groups
]);