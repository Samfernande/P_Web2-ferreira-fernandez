<!--
Auteur : João Ferreira & Samuel Fernandez
Date : 10.03.2023
Description : Template contenant l'en-tête de toutes les pages
-->

<header class = "backgroundDarkBlue noMarge">

        <div class = "containerSpaceBetween noMarge">

            <ul class = alignLeft>

           
                <li class = "colorWhite">
                <a href="?link=index"> <img src= "/website/resources/img/logo.png" alt = "logo" class = "littleImg animationLink"> </a>
                </li>
          

                <li class = "colorWhite animationLink sideMarge">
                    <a href="?link=index" class = "textSmall colorWhite"> Accueil</a>
                </li>

                <li class = "colorWhite animationLink sideMarge">
                    <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn textSmall">CIFS</button>
                        <div id="myDropdown" class="dropdown-content">
                            <a href="?link=allCIF" class = "textDropDownSmall colorWhite">Tous les CIFS</a>
                            
                            <?php
                            // check si l'utilisateur est connecté
                            if (!isset($_SESSION['isConnected'])){ 
                                // renvoie sur la page de login
                                echo "<a href='?link=login'";

                            } // pas connecté
                            else { 
                                // renvoie sur la bonne page
                                echo "<a href='?link=addCIF'";
                            } // connecté

                            echo "class = 'textDropDownSmall colorWhite'>Ajouter une CIF</a>"; ?>

                        </div>
                    </div>
                </li>

            </ul>
            
            <ul class = alignRight>
            
            <?php 
            // check si l'utilisateur est connecté
            if (!isset($_SESSION['isConnected'])){ 
            
            // affiche le logo de connexion?>
            <li class = "colorWhite">
                <a href="?link=login"> <img src= "/website/resources/img/login.png" alt = "login" class = "veryLittleImg animationLink"> </a>
            </li>
            <?php } else { 
                
            // affiche le logo de déconnexion?>
                <a href="?connection=false"> <img src= "/website/resources/img/deconnect.png" alt = "login" class = "veryLittleImg animationLink"> </a>
            <?php } ?>
            </ul>

        </div>

    </header>
