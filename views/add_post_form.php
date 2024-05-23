<?php
include'nav/header.php'
?>

<form action="../controllers/create_new_post.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>
                <h2>info Logement</h2>
            </legend>
            
            <div><h3>
                <label>Titre de l'annonce</label>
                <input type="text" name='title' required>
            </h3></div>
            
            <div>
                <label>Adresse</label>
                <input type="text" name='address' required>
            </div>
            
            <div>
                <label>Ville</label>
                <input type="text" name='city' required>
            </div>
            
            <div>
                <label>Code postal</label>
                <input type="text" name='postal' size="5" required>
            </div>
            
            <div>
                <label>Surface</label>
                <input type="text" name='surface' size="6" required> m²
            </div>
            
            <div>
                <label>Prix</label>
                <input type="text" name='price' size="6" required> €
            </div>
            
            <div>
                <label>Type d'annonce</label>
                <input type=radio id=type1 name=type value="location" checked>
                <label for=type1>location</label>
                <input type=radio id=type2 name=type value="vente">
                <label for=type2>vente</label>
            </div>
            
            <div>
                <label>Photo</label>
                <input type="file" name='image'>
            </div>
            
            <div>
                <label>description</label>
                <textarea maxlength="500" rows="10" cols="50" name='description'></textarea>
            </div>

            <button type=submit>Envoyer</button>
        </fieldset>
    </form>

    <?php
    if(isset($_COOKIE['addErrorMsg'])){
        echo $_COOKIE['addErrorMsg'];
        setCookie('addErrorMsg', '', time(),"/");
    }
    ?>
