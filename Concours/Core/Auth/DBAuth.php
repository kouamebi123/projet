<?php
namespace Core\Auth;

use Core\Database\Database;

class DBAuth {
    private $db;

    public function __construct(Database $db){

        $this->db = $db;

    }

    public function getIndetifiant(){
        if($this->logged()){
            return $_SESSION['auth'];
        }
        
        return false;
    }

    public function login($username, $password){
            $user = $this->db->prepare("SELECT * FROM session WHERE identifiant = ?",[$username], null,true);
            if($user){
                if($user->password ===($password)){
                        $_SESSION['auth']=$user->identifiant;
                    return true;
                }
            }
            return false;

        }
    public function inscription(array $donnee, $password,$fichier){

        $resultat1=($donnee['N_MathB']+$donnee['N_PhyB']+$donnee['N_AngB'])/3;
        $resultat2=($donnee['N_MathC']+$donnee['N_PhyC']+$donnee['N_AngC'])/3;
        $resultat3=($resultat1+$resultat2)/2;

        $statut = "En cours...";
        $user = $this->db->prepare("SELECT * FROM candidat WHERE Matricule = ?",[$donnee['Matricule']], null,true);
        if($user){
            return false;
        }
        else{
        $this->db->insert('INSERT INTO candidat VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
        $donnee['Matricule'],
        $donnee['NomCand'],
        $donnee['PrenomCand'],
        $donnee['Piece'],
        $donnee['DateCand'],
        $donnee['LieuCand'],
        $donnee['SexeCand'],
        $donnee['emailCand'],
        $donnee['NumeroCand'],
        $donnee['NationCand'],
        $donnee['ResidCand'],
        $donnee['Matricule'],
        $donnee['Matricule'],
        $fichier)
    );
        $this->db->insert('INSERT INTO note VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
        $donnee['Matricule'],
        $donnee['EtaO'],
        $donnee['VilleO'],
        $donnee['Serie'],
        $donnee['N_MathB'],
        $donnee['N_MathC'],
        $donnee['N_PhyB'],
        $donnee['N_PhyC'],
        $donnee['N_AngC'],
        $donnee['N_AngB'],
        $donnee['M_Classe'],
        $donnee['R_annuelle'],
        $donnee['Mention'],
        $resultat3)
    );
        $this->db->insert('INSERT INTO parent VALUES(?,?,?,?,?,?,?,?,?)',array(
        $donnee['Matricule'],
        $donnee['NomPere'],
        $donnee['NomMere'],
        $donnee['PrenomPere'],
        $donnee['PrenomMere'],
        $donnee['NumeroPere'],
        $donnee['NumeroMere'],
        $donnee['ProfessionPere'],
        $donnee['ProfessionMere'])
        
    );
        $this->db->insert('INSERT INTO session VALUES(?,?,?,?)',array(
        $donnee['Matricule'],
        $password,
        $donnee['Matricule'],
        $statut)
    );
        $_SESSION['auth']=$donnee['Matricule'];
        
    }
    return true;;
}


    public function findNote($id){
            return $this->db->prepare("SELECT *
            FROM candidat
            LEFT JOIN note
                ON candidat.Matricule = note.IdNote
            WHERE candidat.Matricule = ?
            ",[$id], null,true);
        }
        public function findParent($id){
            return $this->db->prepare(
                "SELECT *
                FROM candidat
                LEFT JOIN parent
                    ON candidat.Matricule = parent.IdParent
                WHERE candidat.Matricule = ?
                ",[$id], null,true);
        }
    
        public function findStatut($id){
            return $this->db->prepare(
                "SELECT *
                FROM candidat
                LEFT JOIN session
                    ON candidat.Matricule = session.identifiant
                WHERE candidat.Matricule = ?
                ",[$id], null,true);
        }


    public function logged(){
        return isset($_SESSION['auth']);

        
    }
}