<?php 
$data['cif'];
?>


<div class = 'backgroundLightBlue littlePadding'>

<form action="" method="post" id="form">
                <h1>Ajout d'un CIF</h1>
                <p>
                    <label for="category">Catégorie</label>
                    <select name="category" id="category">
                    <option value="">
                        <?php foreach ($data['category'] as $item) {?>
                        <option value="<?php echo $item['catTitre']; ?>">
                            <?php echo $item['catTitre']; ?></option>
                        <?php } ?>
                    </select>
                </p>
                <p>
                    <label for="title">Titre :</label>
                    <input type="text" name="title" id="title" value="">
                </p>
                <p>
                    <label for="description">Description :</label>
                    <textarea name="description" id="description"></textarea>
                </p>
                
                <p>
                    <input type="submit" name="btnSubmit" value="Ajouter">
                    <button type="button" onclick="document.getElementById('form').reset();">Effacer</button>
                </p>
            </form>

</div>