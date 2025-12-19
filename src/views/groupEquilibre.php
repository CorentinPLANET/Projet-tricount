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
        <a class="groupNav-item" href="groupDepense?id=<?= $group['id'] ?>">Dépenses</a>
        <a class="groupNav-center" href="groupEquilibre?id=<?= $group['id'] ?>">Equilibres</a>
        <a class="groupNav-item" href="groupPhotos?id=<?= $group['id'] ?>">Photos</a>
    </div>

    <div class="section-equilibre">
        <h2>Équilibres</h2>
        <div class="equilibre">
            <div class="equilibre-money">
                <div class="equilibre-people"><img src="assets/img/pdp.svg" alt="photo de profil">Alex (moi) </div>
                <div class="money">+0.00 €</div>
            </div>
            <div class="equilibre-money">
                <div class="equilibre-people"><img src="assets/img/pdp.svg" alt="photo de profil">Bruno</div>
                <div class="money">+0.00 €</div>
            </div>
            <div class="equilibre-money">
                <div class="equilibre-people"><img src="assets/img/pdp.svg" alt="photo de profil">Julia</div>
                <div class="money-positive">+29.35 €</div>
            </div>
            <div class="equilibre-money">
                <div class="equilibre-people"><img src="assets/img/pdp.svg" alt="photo de profil">Loic</div>
                <div class="money">+0.00 €</div>
            </div>
            <div class="equilibre-money">
                <div class="equilibre-people"><img src="assets/img/pdp.svg" alt="photo de profil">Thomas</div>
                <div class="money-negative">-29.35 €</div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
render("default", true, [
    "title" => "Tricount",
    "css" => "groupEquilibre",
    "content" => $content,
]);

?>