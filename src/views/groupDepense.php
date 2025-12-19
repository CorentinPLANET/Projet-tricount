<?php ob_start() ?>

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
<div class="content">
    <?php 
    echo "<h1>" . $group['name'] . " </h1>"   ?>
    <div class="groupNav">
        <a class="groupNav-item" href="groupDepense?id=<?= $group['id'] ?>">Dépenses</a>
        <a class="groupNav-center" href="groupEquilibre?id=<?= $group['id'] ?>">Equilibres</a>
        <a class="groupNav-item" href="groupPhotos?id=<?= $group['id'] ?>">Photos</a>
    </div>
    <div class="depense">
        <div class="depense-item">
            <p>Mes dépenses</p>
            <p>54,65€</p>
        </div>
        <div class="depense-item">
            <p>Total des dépenses</p>
            <p>279,00€ </p>
        </div>
    </div>
    <div class="transaction">
        <?php foreach ($transactions as $transaction) {
            $name = $user->getById($transaction['creator_id'])[0]['username'];
            echo
            "<div class='transaction-item'>
            <div class='transaction-item-left'>
                <div class='transaction-info'>
                    <p>" . $transaction['transaction_name'] . "</p>
                    <p>payé par " . $name . "</p>
                </div>
            </div>
            <p class='transaction-item-right'>" . $transaction['amount'] . "</p>
        </div>";
        }
        ?>
        <a class="addTransaction" href="newDepense?id=<?= $group['id'] ?>"><img src="../assets/img/placeholder.png" alt="newTransaction">
            <p>Ajouter une dépense</p>
        </a>
    </div>



    <?php render("default", true, [
        "title" => "Tricount",
        "css" => "groupDepense",
        "content" => ob_get_clean()

    ]);
