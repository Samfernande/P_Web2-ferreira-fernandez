<?php 

include_once "model.php";

class ModelCif extends Model{

    public function getLimitCif($number) {
        $stmt = $this->connector->prepare(
        "SELECT t_cif.idCif, t_cif.cifTitre, t_utilisateur.utiPseudo, COALESCE(ROUND(CEIL(AVG(t_evaluation.evaNote) * 2) / 2, 1), 0) AS average, catTitre, cifDate
        FROM db_cif.t_cif 
        LEFT JOIN db_cif.t_utilisateur ON t_cif.fkUtilisateur = t_utilisateur.idUtilisateur 
        LEFT JOIN db_cif.t_evaluation ON t_cif.idCif = t_evaluation.fkCif 
        INNER JOIN db_cif.t_categorie ON t_cif.fkCategorie = t_categorie.idCategorie 
        GROUP BY t_cif.idCif 
        ORDER BY cifDate DESC 
        LIMIT $number;");

        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function getAllCifs() {
        $stmt = $this->connector->prepare(
        "SELECT t_cif.idCif, t_cif.cifTitre, t_utilisateur.utiPseudo, COALESCE(ROUND(CEIL(AVG(t_evaluation.evaNote) * 2) / 2, 1), 0) AS average, catTitre, cifDate
        FROM db_cif.t_cif 
        LEFT JOIN db_cif.t_utilisateur ON t_cif.fkUtilisateur = t_utilisateur.idUtilisateur 
        LEFT JOIN db_cif.t_evaluation ON t_cif.idCif = t_evaluation.fkCif 
        INNER JOIN db_cif.t_categorie ON t_cif.fkCategorie = t_categorie.idCategorie 
        GROUP BY t_cif.idCif 
        ORDER BY cifDate DESC;");
        
        $stmt->execute();
          $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    // Récupère les CIFs triés selon des options
    public function getCifSorted($category, $evaluation)
    {

        // Regarde si category et evaluation sont donnés. Si ce n'est pas le cas, les requêtes ne sont pas incluses dans la requête principale
        $categorySearch = !empty($category) ? "WHERE fkCategorie = $category" : '';
        $evalSearch = !empty($evaluation) ? "AVG(t_evaluation.evaNote) $evaluation," : '';

        $stmt = $this->connector->prepare(
            "SELECT t_cif.idCif, t_cif.cifTitre, t_utilisateur.utiPseudo, COALESCE(ROUND(CEIL(AVG(t_evaluation.evaNote) * 2) / 2, 1), 0) AS average, catTitre, cifDate
            FROM db_cif.t_cif 
            LEFT JOIN db_cif.t_utilisateur ON t_cif.fkUtilisateur = t_utilisateur.idUtilisateur 
            LEFT JOIN db_cif.t_evaluation ON t_cif.idCif = t_evaluation.fkCif 
            INNER JOIN db_cif.t_categorie ON t_cif.fkCategorie = t_categorie.idCategorie
            $categorySearch
            GROUP BY t_cif.idCif
            ORDER BY $evalSearch
            cifDate DESC;");

        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function getCifByID($idCif) {
        $stmt = $this->connector->prepare(
        "SELECT t_cif.idCif, t_cif.cifTitre, t_utilisateur.utiPseudo, COALESCE(ROUND(CEIL(AVG(t_evaluation.evaNote) * 2) / 2, 1), 0) AS average, cifTitre, cifDate, cifDescription, catTitre, utiPseudo
        FROM db_cif.t_cif 
        LEFT JOIN db_cif.t_utilisateur ON t_cif.fkUtilisateur = t_utilisateur.idUtilisateur 
        LEFT JOIN db_cif.t_evaluation ON t_cif.idCif = t_evaluation.fkCif 
        INNER JOIN db_cif.t_categorie ON t_cif.fkCategorie = t_categorie.idCategorie
        WHERE t_cif.idCif = $idCif
        GROUP BY t_cif.idCif 
        ORDER BY cifDate DESC;");
        
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
        return $results;
    }
    
    public function addCif($data) {
        $fields = implode(',', array_keys($data));
        $params = implode(',', array_fill(0, count($data), '?'));

        $query = "INSERT INTO db_cif.t_cif ($fields) VALUES ($params)";
        
        $req = $this->connector->prepare($query);

        $req->execute(array_values($data));

        return $req;
    } 
}