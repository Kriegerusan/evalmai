<?php
include 'nav/header.php'
?>

<form action='../controllers/create_new_post.php' method='post' enctype='multipart/form-data'>
    <fieldset>
        <legend>
            <h2>Ajout Annonce</h2>
        </legend>
        <div class=fieldContainer>
            <div class=row>
                <div class=col1><label><strong>Titre de l'annonce</strong></label></div>
                <div class=col2><input type='text' name='title'  required></div>
        </div>
        <div class=row>
        <div class=col1><label>Adresse</label></div>
        <div class=col2><input type='text' name='address' required></div>
        </div>
        
        <div class=row>
        <div class=col1><label>Ville</label></div>
        <div class=col2><input type='text' name='city' required></div>
            </div>

            <div class=row>
                <div class=col1><label>Code postal</label></div>
                <div class=col2><input type='text' name='postal' size='5' required></div>
            </div>

            <div class=row>
                <div class=col1><label>Surface</label></div>
                <div class=col2><input type='text' name='surface' size='6' required> m²</div>
            </div>

            <div class=row>
                <div class=col1><label>Prix</label></div>
                <div class=col2><input type='text' name='price' size='6' required> €</div>
            </div>

            <div class=row>
                <div class=col1><label>Type d'annonce</label></div>
                <div class=col2>
                    <input type=radio id=type1 name=type value='location' checked>
                    <label for=type1>location</label>
                    <input type=radio id=type2 name=type value='vente'>
                    <label for=type2>vente</label>
                </div>
            </div>

            <div class=row>
                <div class=col1><label>Photo</label></div>
                <div class=col2><input type='file' name='image' ></div>
            </div>

            <div class=row>
                <div class=col1>
                    <label>description</label>
                </div>
                <div class=col2>
                    <textarea maxlength='500' rows='10' cols='50' name='description'></textarea>
                </div>
            </div>

            <div class=row>
                <div class=col1></div>
                <div class=col2>
                    <button type=submit>Envoyer</button>
                </div>
            </div>
        </div>

    </fieldset>
</form>


<?php
if (isset($_COOKIE['addErrorMsg'])) {
    echo $_COOKIE['addErrorMsg'];
    setCookie('addErrorMsg', '', time(), "/");
}
?>