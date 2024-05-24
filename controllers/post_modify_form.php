<?php

require_once '../models/post_management.php';

$postInfos = GetSpecificPostInfo($_GET['id']);

echo "
<form action='../controllers/update_post_ctrl.php?&id=".$_GET['id']."' method='post' enctype='multipart/form-data'>
    <fieldset>
        <legend>
            <h2>Modification Annonce</h2>
        </legend>
        <div class=fieldContainer>
        <div class=row>
            <div class=col1><label><strong>Titre de l'annonce</strong></label></div>
            <div class=col2><input type='text' name='title' value='" . $postInfos['titre'] . "' required></div>
        </div>
        <div class=row>
        <div class=col1><label>Adresse</label></div>
        <div class=col2><input type='text' name='address' value='" .$postInfos['adresse'] . "' required></div>
        </div>
        
        <div class=row>
        <div class=col1><label>Ville</label></div>
        <div class=col2><input type='text' name='city' value='".$postInfos['ville']."' required></div>
        </div>
    
        <div class=row>
        <div class=col1><label>Code postal</label></div>
        <div class=col2><input type='text' name='postal' size='5' value='".$postInfos['cp']."' required></div>
        </div>
            
        <div class=row>
        <div class=col1><label>Surface</label></div>
        <div class=col2><input type='text' name='surface' size='6' value='".$postInfos['surface']."' required> m²</div>
        </div>
        
        <div class=row>
        <div class=col1><label>Prix</label></div>
        <div class=col2><input type='text' name='price' size='6' value='".$postInfos['prix']."' required> €</div>
        </div>
    
        <div class=row>
        <div class=col1><label>Type d'annonce</label></div>
        <div class=col2><input type=radio id=type1 name=type value='location' checked>
            <label for=type1>location</label>
            <input type=radio id=type2 name=type value='vente'>
            <label for=type2>vente</label>
            </div>
        </div>
    
        <div class=row>
        <div class=col1><label>Photo</label></div>
        <div class=col2><input type='file' name='image' ></div>
        <input type='hidden' name='oldImage' value='".$postInfos['photo']."'>
        </div>
            
        <div class=row>
        <div class=col1><label>description</label></div>
        <div class=col2>
            <textarea maxlength='500' rows='10' cols='50' name='description'>".$postInfos['description']."</textarea>
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

";