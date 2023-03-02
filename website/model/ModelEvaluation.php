<?php 

include_once "model.php";

class ModelEvaluation extends Model{

    public function getEvaluation() {
        $stmt = $this->connector->prepare("SELECT * FROM db_cif.t_evaluation");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addEvaluation($user, $cif, $evaluation) {
        $query = "INSERT INTO db_cif.t_evaluation (db_cif.t_evaluation.evaNote, db_cif.t_evaluation.fkUtilisateur, db_cif.t_evaluation.fkCif) VALUES ($evaluation, $user, $cif)";
        
        $req = $this->connector->prepare($query);

        $req->execute();
    }

}