<div class='backgroundLightBlue bigPadding containerSpaceEvenly'>
<?php var_dump($_SESSION);?>
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

            <input type="submit" value="Envoyer" class='buttonLogins'>
        </form>
    </div>
</div>
