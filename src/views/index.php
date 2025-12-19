<?php ob_start(); ?>

<div class="container">
    <img class="logo-tricount" src="assets/img/logo-tricount.svg" alt="logo tricount">

    <a class="button-card" href="groupDepense">
        <strong> City-trip </strong><br /> Un petit exemple de compte
    </a>

    <a href="newGroup" class="newGroup">
        <img src="../assets/img/placeholder.png" alt="new tricount">
        <p>Ajouter un tricount</p>
    </a>
    <div class="bottom-nav">
        <a href="/" class="nav-item active">
            <div class="nav-icon">tt</div>
            <div class="nav-label">tricounts</div>
        </a>
        <a href="#" class="nav-item">
            <div class="nav-icon">$</div>
            <div class="nav-label">Demandes de paiement</div>
        </a>
        <a href="#" class="nav-item">
            <div class="nav-icon">⋮⋮</div>
            <div class="nav-label">Carte gratuite</div>
        </a>
        <a href="profil" class="nav-item">
            <div class="nav-icon">👤</div>
            <div class="nav-label">Profil</div>
        </a>
    </div>
</div>

<?php
$content = ob_get_clean();
render("default", true, [
    "title" => "Tricount",
    "css" => "index",
    "content" => $content,
]);

?>