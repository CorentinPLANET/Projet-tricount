<?php ob_start() ?>

<header>
    <a href="groupDepense?id=<?= $group['id'] ?>">
        <img src="../assets/img/Back.png" alt="Back">
    </a>
    <p>Ajouter une dépense</p>
</header>

<div class="content">
    <nav class="nav">
        <a class="nav-item" href="newDepense?id=<?= $group['id'] ?>">Dépense</a>
        <a class="nav-center" href="newRevenu?id=<?= $group['id'] ?>">Revenu</a>
        <a class="nav-item" href="newTransfert?id=<?= $group['id'] ?>">Transfert</a>
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
                <input type="number" name="amount" class="amount-input" id="amount-input">
                <div class="amount-option"></div>
            </div>
        </div>
        <div class="depenseInfo">
            <div class="depense-creator">
                <p>Payé par</p>
                <select name="creator" class="creator-input">
                    <?php
                    foreach ($users as $user) {
                        echo '<option value="' . $user["id"] . '" selected>' . $user["username"] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="date">
                <p>Quand</p>
                <input type="date" name="date" class="date-input">
            </div>
        </div>
        <div class="sharing">
            <input type="checkbox" name="share" class="share-type-input">
            <select name="share-type" class="share-type-option">
                <option value="0">Équitablement</option>
                <option value="1">Parts</option>
                <option value="2">Montant</option>
            </select>
        </div>
        <div class="all-contributor">
            <?php
            foreach ($users as $user) {
                echo '<div class="contributor"> 
                <div class="contributor-left">
                <input type="checkbox" name="' . $user["id"] . '" class="contributor-input">
                    <p class="contributor-name">' . $user["username"] . '</p>
                </div>
                <p class="contributor-amount"></p>
            </div>';
            }
            ?>
            <button type="submit" value="save" class="save">Sauvegarder</button>
    </form>
</div>
<script src="../assets/js/newDepenseScript.js"></script>




<?php render("default", true, [
    "title" => "Tricount",
    "css" => "newDepense",
    "content" => ob_get_clean()
]); ?>