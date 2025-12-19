


<?php
$content = ob_get_clean();
render("default", true, [
    "title" => "Tricount",
    "css" => "newGroup",
    "content" => $content,
]);

?>