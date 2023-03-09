<?php 
$data['cif'];
?>


<div class = 'backgroundLightBlue littlePadding'>

<form action="" method="post" id="form">

                <h1>Ajouter un CIF</h1>

                <div class='containerSpaceEvenly'>

                    <div>
                        <label for="title">Titre</label><br>
                        <input type="text" name="title" value="" class='textSmall2' required>
                    </div>

                    
                    <div>
                        <label for="category">Catégorie</label><br>
                        <select name="category" class='selectCif' required>
                        <option value="">

                            <?php foreach ($data['category'] as $item) {?>

                                <option value="<?php echo $item['catTitre']; ?>"><?php echo $item['catTitre']; ?></option>

                            <?php } ?>
                        </select>
                    </div>
                    
                </div>

                <div class='containerMiddle'>
                    <div>
                        <textarea name="description" placeholder="Décrivez votre CIF" cols='100' rows='20' class='textSmall' required></textarea>
                    </div>
                </div>
                
                <div class='containerSpaceBetween'>
                    <button type="button" onclick="document.getElementById('form').reset();" class='buttonAddCifRed textSmall'>Effacer</button>
                    <input type="submit" name="btnSubmit" value="Ajouter" class='buttonAddCifGreen textSmall'>
                </div>

</form>

<?php if(isset($_SESSION['error']) && $_SESSION['error']) { ?>

    <div id="popup" class="popup">
        <p>Nombre de caractères maximum dépassés</p>
    </div>

<?php  } $_SESSION['error'] = false; ?>

<script src='website/resources/js/successLogin.js'></script>


</div>