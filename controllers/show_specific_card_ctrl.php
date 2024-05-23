<?php

require_once'../models/post_management.php';


$cardDetail = GetSpecificPostInfo($_GET['id']);

echo"<div class='detailContainer'>";

echo "
    <a href='../views/homepage.php'>
        <div class='productCard'>
            <img src=../uploads/" . $cardDetail['photo'] . ">
            <div class='details'>
                <strong class='title'>" . $cardDetail['titre'] . "</strong>
                <p><strong>" . $cardDetail['type'] . "</strong></p>
                <p>" . $cardDetail['adresse'] . "<br>" . $cardDetail['cp'] . " - " . $cardDetail['ville'] ."</p>
                <p><strong>" . $cardDetail['surface'] . " m²<br>" . $cardDetail['prix'] . " €" . "</strong></p>
                <div class='description'>
                    <p>" . $cardDetail['description'] . "</p>
                </div>  
            </div>
        </div>
    </a>
";

echo "</div>";