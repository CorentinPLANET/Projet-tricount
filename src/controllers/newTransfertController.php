<?php 
$group_id = $_GET['id'];

$groupObject = new Models\Group;
$group = $groupObject->getById($group_id);

render("newTransfert", false,[
    "group" => $group]);