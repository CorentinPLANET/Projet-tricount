<?php ob_start() ?>

<header>
    <p>Profil</p>
</header>
<div class="content">

    <img src="" alt="">
    <h1>Connexion</h1>
    <p class="tricount-ad">Liez vos tricount à vos profil, accédez-y sur plusieurs appareils et recevez des notifications s'ils sont édités</p>

    <div class="connect">
        <a href="" class="connect-item"><img src="" alt="">
            <p>Se connecter avec Google</p>
        </a>
        <a href="" class="connect-item"><img src="" alt="">
            <p>Se connecter avec Facebook</p>
        </a>
        <a href="" class="connect-item"><img src="" alt="">
            <p>Se connecter avec un email</p>
        </a>
        <div class="notification">
            <p>Je souhaite être tenu au courant des nouvelles importantes de tricount </p><input type="checkbox" class="news"></input>
        </div>
    </div>

    <div class="section-preference">
        <p>Préférences</p>
        <div class="preference">
            <div class="preference-item">
                <p>Langue</p>
                <p>français(France)</p><img src="" alt="">
            </div>
            <div class="preference-item">
                <p>Mode Sombre</p>
                <p>Activé</p><img src="" alt="">
            </div>
        </div>
    </div>
</div>

<nav>
    <a href="/" class="nav-item"><img src="" alt="">
        <p>tricounts</p>
    </a>
    <a href="#" class="nav-item"><img src="" alt="">
        <p>Demandes de paiment</p>
    </a>
    <a href="#" class="nav-item"><img src="" alt="">
        <p>Carte gratuite</p>
    </a>
    <a href="profil" class="nav-item"><img src="" alt="">
        <p>Profil</p>
    </a>
</nav>





<?php render("default", true, [
    "title" => "Tricount",
    "css" => "profil",
    "content" => ob_get_clean()

]);
