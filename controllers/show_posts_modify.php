
<?php
require_once '../models/post_management.php';


echo "<div class='productsContainer'>";

foreach(GetPostInfo() as $product){

    echo"
        
        <div class=productCard>
            <img src=../uploads/" . $product['photo'] . ">
            <div class=details>
                <strong class=title>" . $product['titre'] . "</strong>
                <br>
                <strong>" . $product['type'] . "</strong>
                <p>" . $product['adresse'] . "<br>" . $product['cp'] . " - " . $product['ville'] ."</p>
                <p><strong>" . $product['surface'] . " m²<br>" . $product['prix'] . " €" . "</strong></p>
                <div class=description>
                    <p>" . mb_strimwidth($product['description'],0,100," ...") . "</p>
                </div>
                
                <div class=buttonPanel>
                <a href=../views/show_modify_post_form.php?&id=".$product['id_logement'].">
                    <button>Modifier</button>
                </a>
                <a href=../controllers/post_delete.php?&id=".$product['id_logement'].">
                    <button>Supprimer</button>
                </a>
            </div>
            </div>
            
        </div>
        
    ";
}


echo "</div>";