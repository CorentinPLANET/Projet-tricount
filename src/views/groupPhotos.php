<?php ob_start(); ?>

<header>
    <a href="/">
        <img src="../assets/img/Back.png" alt="Back">
    </a>
    <div class="header-right">
        <a href="#">
            <img src="../assets/img/Search.png" alt="Search"></a>
        <a href="#">
            <img src="../assets/img/More.png" alt="More">
        </a>
    </div>
</header>
<div class="container">


    <h1> City-trip </h1>

    <?php if (!empty($success)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <?php if (!empty($error["action"])): ?>
        <div class="alert alert-error"><?= htmlspecialchars($error["action"],) ?></div>
    <?php endif; ?>

    <div class="groupNav">
        <a class="groupNav-item" href="groupDepense">Dépenses</a>
        <a class="groupNav-center" href="groupEquilibre">Equilibres</a>
        <a class="groupNav-item" href="groupPhotos">Photos</a>
    </div>

    <div class="photo">
        Fonctionnalité pas encore disponible
    </div>
</div>


<?php
$content = ob_get_clean();
render("default", true, [
    "title" => "Tricount",
    "css" => "groupPhotos",
    "content" => $content,
]);

?>