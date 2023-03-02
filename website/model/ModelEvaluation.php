<?php 

include_once "model.php";

class ModelEvaluation extends Model{

    public function addEvaluation($user, $cif, $evaluation) {
        $query = "INSERT INTO db_cif.t_evaluation (db_cif.t_evaluation.evaNote, db_cif.t_evaluation.fkUtilisateur, db_cif.t_evaluation.fkCif) VALUES ($evaluation, $user, $cif)";
        
        $req = $this->connector->prepare($query);

        $req->execute();
    }

}