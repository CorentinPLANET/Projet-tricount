<?php ob_start() ?>

<header>
    <a href="groupDepense">
        <img src="../assets/img/Back.png" alt="Back">
    </a>
    <p>Ajouter une dépense</p>
</header>

<div class="content">
    <nav class="nav">
        <a class="nav-item" href="newDepense">Dépense</a>
        <a class="nav-center" href="newRevenu">Revenu</a>
        <a class="nav-item" href="newTransfet">Transfert</a>
    </nav>

    <form action="" method="post" class="form">
        <div class="title">
            <p>Titre</p>
            <div class="title-content">
                <input type="text" name="title" class="title-input">
                <div class="title-option"></div>
                <div class="title-option"></div>
            </div>
        </div>
        <div class="amount">
            <p>Montant</p>
            <div class="amount-content">
                <input type="number" name="amount" class="amount-input">
                </label>
                <div class="amount-option"></div>
            </div>
            <div class="depenseInfo">
                <div class="depense-creator">
                    <p>Payé par</p>
                    <select name="creator" class="creator-input">
                        <option value="0">Alex</option>
                        <option value="1">Bruno</option>
                        <option value="2">Julia</option>
                        <option value="3">Loic</option>
                        <option value="4">Thomas</option>
                    </select>
                </div>
                <div class="date">
                    <p>Quand</p>
                    <input type="date" name="date" class="date-input">
                </div>
            </div>
        </div>
        <input type="submit" value="Sauvegarder" class="save">
    </form>
</div>





<?php render("default", true, [
    "title" => "Tricount",
    "css" => "newDepense",
    "content" => ob_get_clean()
]); ?>