<?php ob_start(); ?>

<div class="container">
    <img class="logo-tricount" src="assets/img/logo-tricount.svg" alt="logo tricount">

    <?php if (!empty($success)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <?php if (!empty($error["action"])): ?>
        <div class="alert alert-error"><?= htmlspecialchars($error["action"],) ?></div>
    <?php endif; ?>

    <a class="button-card" href="groupDepense">
         <strong> City-trip </strong><br/> Un petit exemple de compte
    </a>
        
     <div class="bottom-nav">
        <div class="nav-item active">
            <div class="nav-icon">tt</div>
            <div class="nav-label">tricounts</div>
        </div>
        <div class="nav-item">
            <div class="nav-icon">$</div>
            <div class="nav-label">Demandes de paiement</div>
        </div>
        <div class="nav-item">
            <div class="nav-icon">⋮⋮</div>
            <div class="nav-label">Carte gratuite</div>
        </div>
        <div class="nav-item">
            <div class="nav-icon">👤</div>
            <div class="nav-label">Profil</div>
        </div>
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
