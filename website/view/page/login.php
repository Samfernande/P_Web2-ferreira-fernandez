<div class='backgroundLightBlue bigPadding containerSpaceEvenly'>

    <div class= 'containerMiddleColumns'>
        <h1 class='colorDarkBlue'>Connexion</h1>
        
        <form class='backgroundSky' method='POST' action='?link=login'>
            
            <label for="username" class = 'textSmall colorDarkBlue'>Pseudo</label><br>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password" class = 'textSmall colorDarkBlue'>Mot de passe</label><br>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" value="Envoyer" class='buttonLogins'>
        </form>



    </div>

    <div class= 'containerMiddleColumns'>
        <h1 class='colorDarkBlue'>Pas encore inscrit ?</h1>
        
        <form class='backgroundSky' method='POST' action='?link=login'>
            
            <label for="userRegister" class = 'textSmall'>Pseudo</label><br>
            <input type="text" id="userRegister" name="userRegister" required><br><br>

            <label for="passwordRegister" class = 'textSmall'>Mot de passe</label><br>
            <input type="password" id="passwordRegister" name="passwordRegister" required><br><br>

            <label for="repeatPasswordRegister" class = 'textSmall'>Répéter mot de passe</label><br>
            <input type="password" id="passwordRegister" name="repeatPasswordRegister" required><br><br>

            <input type="submit" value="Envoyer" class='buttonLogins'>
        </form>
    </div>
</div>

<?php if(isset($_SESSION['incorrectLogin']) && $_SESSION['incorrectLogin']) {
    $_SESSION['incorrectLogin'] = false; ?>

<div id="popup" class="popup">
        <p>Identifiants incorrects ou n'existent pas !</p>
      </div>

<?php } elseif (isset($_SESSION['sameUser']) && $_SESSION['sameUser']) {  $_SESSION['sameUser'] = false;?>

<div id="popup" class="popup">
        <p>Pseudo déjà utilisé !</p>
      </div>
<?php } elseif (isset($_SESSION['notSamePassword']) && $_SESSION['notSamePassword']) { $_SESSION['notSamePassword'] = false;?>

    <div id="popup" class="popup">
        <p>Les mots de passe ne correspondent pas</p>
      </div>

<?php } ?>

<script src='website/resources/js/successLogin.js'></script>
