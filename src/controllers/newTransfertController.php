<?php 
$group_id = $_GET['id'];

$groupObject = new Models\Group;
$group = $groupObject->getById($group_id)[0];

render("newTransfert", false,[
    "group" => $group]);