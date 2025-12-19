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
    <img src="" alt="">
    <h1>City-trip</h1>
    <div class="groupNav">
        <a class="groupNav-item" href="groupDepense">Dépenses</a>
        <a class="groupNav-center" href="groupEquilibre">Equilibres</a>
        <a class="groupNav-item" href="#">Photos</a>
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
        <div class="transaction-item">
            <div class="transaction-item-left">

                <img src="" alt="">
                <div class="transaction-info">
                    <p>Test D</p>
                    <p>payé par Moi</p>
                </div>
            </div>
            <p class="transaction-item-right">100,00€</p>
        </div>
        <div class="transaction-item">
            <div class="transaction-item-left">
                <img src="" alt="">
                <div class="transaction-info">
                    <p>Test</p>
                    <p>transféré par Moi</p>
                </div>
            </div>
            <p class="transaction-item-right">60,00€</p>
        </div>
    </div>

    <a class="addTransaction" href="newDepense"><img src="../assets/img/newTransaction.png" alt="newTransaction">
        <p>Ajouter une dépense</p>
    </a>
</div>



<?php render("default", true, [
    "title" => "Tricount",
    "css" => "groupDepense",
    "content" => ob_get_clean()

]);
