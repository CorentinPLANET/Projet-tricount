<?php ob_start() ?>






<?php render("default", true, [
    "title" => "Tricount",
    "css" => "groupDepense",
    "content" => ob_get_clean()

]);