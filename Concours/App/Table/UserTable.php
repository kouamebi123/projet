<?php
 namespace App\Table;
 use Core\Table\Table;


 class UserTable extends Table{

    protected $table = 'session';
    public $title = "Espace candidat";
    
    public function last(){
        return $this->query(
            "SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie 
            FROM articles 
            LEFT JOIN categories 
                ON categorie_id = categories.id
            ");
    }

    public function findNote($id){
        return $this->query(
            "SELECT *
            FROM candidat
            LEFT JOIN note
                ON candidat.Matricule = candidat.IdNote
            WHERE candidat.Matricule = ?
            ",[$id]);
    }

    public function findParent($id){
        return $this->query(
            "SELECT *
            FROM candidat
            LEFT JOIN parent
                ON candidat.Matricule = candidat.IdParent
            WHERE candidat.Matricule = ?
            ",[$id]);
    }

    public function findStatut($id){
        return $this->query(
            "SELECT *
            FROM candidat
            LEFT JOIN session
                ON candidat.Matricule = session.identifiant
            WHERE candidat.Matricule = ?
            ",[$id]);
    }

 }