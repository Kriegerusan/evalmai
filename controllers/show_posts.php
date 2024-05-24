<?php

require_once '../models/post_management.php';

//$wordLimit = 19;

echo "<div class='productsContainer'>";

foreach(GetPostInfo() as $product){

    //var_dump(str_word_count($product['description'], 1));


    //var_dump($wordArray = explode(" ", $product['description']));

    //echo $wordArray = strlen($product['description'], 1);

    // if(count($wordArray) > $wordLimit){
    //     $product['description'] = substr($product['description'], 0 , 100) . " ...";
    // }

    echo"
        <a href='../views/show_card.php?&id=" . $product['id_logement'] . "'>
        <div class='productCard'>
            <img src=../uploads/" . $product['photo'] . ">
            <div class='details'>
                <strong class='title'>" . $product['titre'] . "</strong>
                <br>
                <strong>" . $product['type'] . "</strong>
                <p>" . $product['adresse'] . "<br>" . $product['cp'] . " - " . $product['ville'] ."</p>
                <p><strong>" . $product['surface'] . " m²<br>" . $product['prix'] . " €" . "</strong></p>
                <div class='description'>
                    <p>" . mb_strimwidth($product['description'],0,100," ...") . "</p>
                </div>  
            </div>
        </div>
        </a>
    ";
}


echo "</div>";