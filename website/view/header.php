<header class = "backgroundDarkBlue noMarge">

        <div class = "containerSpaceEvenly noMarge">

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
                            
                            <?php  if (!isset($_SESSION['isConnected'])){
                                echo "<a href='?link=login'";
                            } else { 
                                echo "<a href='?link=addCIF'";
                            }
                            echo "class = 'textDropDownSmall colorWhite'>Ajouter une CIF</a>"; ?>

                        </div>
                    </div>
                </li>

            </ul>
            
            <ul class = alignRight>
            
            <?php if (!isset($_SESSION['isConnected'])){ ?>
            <li class = "colorWhite">
                <a href="?link=login"> <img src= "/website/resources/img/login.png" alt = "login" class = "veryLittleImg animationLink"> </a>
            </li>
            <?php } else { ?>
                <a href="?connection=false"> <img src= "/website/resources/img/deconnect.png" alt = "login" class = "veryLittleImg animationLink"> </a>
            <?php } ?>
            </ul>

        </div>

    </header>
