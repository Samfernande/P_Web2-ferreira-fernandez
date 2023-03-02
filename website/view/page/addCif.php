<?php 
$data['cif'];
?>


<div class = 'backgroundLightBlue littlePadding'>

<form action="" method="post" id="form" class=''>

                <h1>Ajouter un CIF</h1>

                <div class='alignLeft'>
                    <div>
                        <label for="title">Titre</label><br>
                        <input type="text" name="title" value="" class='textSmall2'>
                    </div>

                    
                    <div>
                        <label for="category">Catégorie</label><br>
                        <select name="category" class='selectCif'>
                        <option value="">

                            <?php foreach ($data['category'] as $item) {?>

                                <option value="<?php echo $item['catTitre']; ?>"><?php echo $item['catTitre']; ?></option>

                            <?php } ?>
                        </select>
                    </div>
                    
                </div>

                <div>
                    <label for="description">Description</label><br>
                    <textarea name="description"></textarea>
                </div>
                
                <div class='alignRight'>
                    <input type="submit" name="btnSubmit" value="Ajouter">
                    <button type="button" onclick="document.getElementById('form').reset();">Effacer</button>
                </div>

</form>

</div>