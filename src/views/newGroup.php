<?php ob_start() ?>

<header>
    <a href="/">
        <img src="../assets/img/Back.png" alt="Back">
    </a>
    <p>Nouveau tricount</p>
</header>
<div class="content">
    <form action="" method="post" class="form">
        <div class="title">
            <p>Titre</p>
            <div class="title-content">
                <div class="title-option"></div>
                <input type="text" name="title" class="title-input">
            </div>
        </div>

        <button type="submit" value="save" class="save">Créer le tricount</button>
    </form>
</div>


<?php
$content = ob_get_clean();
render("default", true, [
    "title" => "Tricount",
    "css" => "newGroup",
    "content" => $content,
]);

?>