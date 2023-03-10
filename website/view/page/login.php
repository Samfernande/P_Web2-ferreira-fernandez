<!--
Auteur : João Ferreira & Samuel Fernandez
Date : 10.03.2023
Description : Page de connexion et d'inscription
-->

<div class='backgroundLightBlue bigPadding containerSpaceEvenly'>

    <div class= 'containerMiddleColumns'>
        <h1 class='colorDarkBlue'>Connexion</h1>
        
        <form class='backgroundSky formLogin' method='POST' action='?link=login'>
            
            <label for="username" class = 'textSmall colorDarkBlue'>Pseudo</label><br>
            <input type="text" id="username" name="username" required class='inputLogin'><br><br>

            <label for="password" class = 'textSmall colorDarkBlue'>Mot de passe</label><br>
            <input type="password" id="password" name="password" required class='inputLogin'><br><br>

            <input type="submit" value="Envoyer" class='buttonLogins'>
        </form>



    </div>

    <div class= 'containerMiddleColumns'>
        <h1 class='colorDarkBlue'>Pas encore inscrit ?</h1>
        
        <form class='backgroundSky formLogin' method='POST' action='?link=login'>
            
            <label for="userRegister" class = 'textSmall'>Pseudo</label><br>
            <input type="text" id="userRegister" name="userRegister" maxlength="25" required class='inputLogin'><br><br>

            <label for="passwordRegister" class = 'textSmall'>Mot de passe</label><br>
            <input type="password" id="passwordRegister" name="passwordRegister" required maxlength="25" class='inputLogin'><br><br>

            <label for="repeatPasswordRegister" class = 'textSmall'>Répéter mot de passe</label><br>
            <input type="password" id="passwordRegister" name="repeatPasswordRegister" required maxlength="25" class='inputLogin'><br><br>

            <input type="submit" value="Envoyer" class='buttonLogins'>
        </form>
    </div>
</div>

<?php 
// si l'utilisateur saisie des informations de connexion incorrectes, message d'erreur
if(isset($_SESSION['incorrectLogin']) && $_SESSION['incorrectLogin']) {
    $_SESSION['incorrectLogin'] = false; ?>

<div id="popup" class="popup">
        <p>Identifiants incorrects ou n'existent pas !</p>
      </div>

<?php } 
// si on s'inscrit et le compte existe déjà, message d'erreur
elseif (isset($_SESSION['sameUser']) && $_SESSION['sameUser']) {  $_SESSION['sameUser'] = false;?>
<div id="popup" class="popup">
        <p>Pseudo déjà utilisé !</p>
      </div>

<?php } 
// si la confirmation mots de passe est mal faite, message d'erreur
elseif (isset($_SESSION['notSamePassword']) && $_SESSION['notSamePassword']) { $_SESSION['notSamePassword'] = false;?>
    <div id="popup" class="popup">
        <p>Les mots de passe ne correspondent pas</p>
      </div>

<?php } ?>

<script src='website/resources/js/successLogin.js'></script>
