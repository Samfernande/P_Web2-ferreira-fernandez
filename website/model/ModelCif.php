<?php 
/**
 * Auteur : João Ferreira & Samuel Fernandez
 * Date : 10.03.2023
 * Description : Classe ModelCif contenant des méthodes de récupération, filtrage, triage et insertion de CIFs
 */

include_once "model.php";

// hérite de la classe Model
class ModelCif extends Model{

     /**
     * Récupération des données de CIFs par apport à un chiffre limite
     */
    public function getLimitCif($number) {
        // requête SQL
        $query = "SELECT t_cif.idCif, t_cif.cifTitre, t_utilisateur.utiPseudo, COALESCE(ROUND(CEIL(AVG(t_evaluation.evaNote) * 2) / 2, 1), 0) AS average, catTitre, cifDate
                  FROM db_cif.t_cif 
                  LEFT JOIN db_cif.t_utilisateur ON t_cif.fkUtilisateur = t_utilisateur.idUtilisateur 
                  LEFT JOIN db_cif.t_evaluation ON t_cif.idCif = t_evaluation.fkCif 
                  INNER JOIN db_cif.t_categorie ON t_cif.fkCategorie = t_categorie.idCategorie 
                  GROUP BY t_cif.idCif 
                  ORDER BY cifDate DESC 
                  LIMIT $number;";

        // préparation de la requête
        $stmt = $this->connector->prepare($query);
        
        // execution de la requête
        $stmt->execute();
        
        // traitement des données en tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupération de tous les CIFs, limité à 50 pour éviter des crash
     */
    public function getAllCifs() {
        // requête SQL
        $query = "SELECT t_cif.idCif, t_cif.cifTitre, t_utilisateur.utiPseudo, 
                  COALESCE(ROUND(CEIL(AVG(t_evaluation.evaNote) * 2) / 2, 1), 0) AS average, 
                  catTitre, cifDate
                  FROM db_cif.t_cif 
                  LEFT JOIN db_cif.t_utilisateur ON t_cif.fkUtilisateur = t_utilisateur.idUtilisateur 
                  LEFT JOIN db_cif.t_evaluation ON t_cif.idCif = t_evaluation.fkCif 
                  INNER JOIN db_cif.t_categorie ON t_cif.fkCategorie = t_categorie.idCategorie 
                  GROUP BY t_cif.idCif 
                  ORDER BY cifDate DESC
                  LIMIT 50;";

        // préparation de la requête
        $stmt = $this->connector->prepare($query);
        
        // execution de la requête
        $stmt->execute();

        // traitement des données en tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupération de tous les CIFs crées par un utilisateur 
     */
    public function getCifsByUserId($idUser) {
        // requête SQL
        $query = "SELECT t_cif.idCif, t_cif.cifTitre, t_utilisateur.utiPseudo, COALESCE(ROUND(CEIL(AVG(t_evaluation.evaNote) * 2) / 2, 1), 0) AS average, catTitre, cifDate
                  FROM db_cif.t_cif 
                  LEFT JOIN db_cif.t_utilisateur ON t_cif.fkUtilisateur = t_utilisateur.idUtilisateur 
                  LEFT JOIN db_cif.t_evaluation ON t_cif.idCif = t_evaluation.fkCif 
                  INNER JOIN db_cif.t_categorie ON t_cif.fkCategorie = t_categorie.idCategorie
                  WHERE  t_cif.fkUtilisateur = $idUser
                  GROUP BY t_cif.idCif 
                  ORDER BY cifDate DESC;";

        // préparation de la requête
        $stmt = $this->connector->prepare($query);

        // execution de la requête
        $stmt->execute();

        // traitement des données en tableau associatif
        return  $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupération des CIFs triés selon des options
     */
    public function getCifSorted($category, $evaluation, $search)
    {

        // regarde si category et evaluation sont donnés. Si ce n'est pas le cas, les requêtes ne sont pas incluses dans la requête principale
        $categorySearch = !empty($category) ? "WHERE fkCategorie = $category" : '';
        $evalSearch = !empty($evaluation) ? "AVG(t_evaluation.evaNote) $evaluation," : '';

        if(!empty($search)) {
            if(!empty($category)){
                $searchBar = !empty($search) ? "AND LOWER(cifTitre) LIKE LOWER('%$search%') OR LOWER(utiPseudo) LIKE LOWER('%$search%')" : '';
            } else {
                $searchBar = !empty($search) ? "WHERE LOWER(cifTitre) LIKE LOWER('%$search%') OR LOWER(utiPseudo) LIKE LOWER('%$search%')" : '';
            }
        }
        else {
            $searchBar = '';
        }
        
        // requête SQL
        $query = "SELECT t_cif.idCif, t_cif.cifTitre, t_utilisateur.utiPseudo, COALESCE(ROUND(CEIL(AVG(t_evaluation.evaNote) * 2) / 2, 1), 0) AS average, catTitre, cifDate
                  FROM db_cif.t_cif 
                  LEFT JOIN db_cif.t_utilisateur ON t_cif.fkUtilisateur = t_utilisateur.idUtilisateur 
                  LEFT JOIN db_cif.t_evaluation ON t_cif.idCif = t_evaluation.fkCif 
                  INNER JOIN db_cif.t_categorie ON t_cif.fkCategorie = t_categorie.idCategorie
                  $categorySearch
                  $searchBar
                  GROUP BY t_cif.idCif
                  ORDER BY $evalSearch
                  cifDate DESC
                  LIMIT 50;";

        // préparation de la requête
        $stmt = $this->connector->prepare($query);

        // execution de la requête
        $stmt->execute();

        // traitement des données en tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupération d'un CIF selon son ID
     */
    public function getCifByID($idCif) {
        // requête SQL
        $query = "SELECT t_cif.idCif, t_cif.cifTitre, t_utilisateur.utiPseudo, COALESCE(ROUND(CEIL(AVG(t_evaluation.evaNote) * 2) / 2, 1), 0) AS average, cifTitre, cifDate, cifDescription, catTitre, utiPseudo, idUtilisateur
                  FROM db_cif.t_cif 
                  LEFT JOIN db_cif.t_utilisateur ON t_cif.fkUtilisateur = t_utilisateur.idUtilisateur 
                  LEFT JOIN db_cif.t_evaluation ON t_cif.idCif = t_evaluation.fkCif 
                  INNER JOIN db_cif.t_categorie ON t_cif.fkCategorie = t_categorie.idCategorie
                  WHERE t_cif.idCif = $idCif
                  GROUP BY t_cif.idCif 
                  ORDER BY cifDate DESC;";

        // préparation de la requête
        $stmt = $this->connector->prepare($query);
        
        // execution de la requête
        $stmt->execute();

        // traitement des données en tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
    }
    
       /**
     * Ajouter un CIF
     */
    public function addCif($data) {
        // séparation du nom de colonnes des données
        $fields = implode(',', array_keys($data));
        $params = implode(',', array_fill(0, count($data), '?'));

        // requête SQL
        $query = "INSERT INTO db_cif.t_cif ($fields) VALUES ($params)";
        
        // préparation de la requête
        $req = $this->connector->prepare($query);

        // execution de la requête
        $req->execute(array_values($data));

        return $req;
    } 
}