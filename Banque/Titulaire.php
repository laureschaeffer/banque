<?php

class Titulaire{
    private string $nom;
    private string $prenom;
    private DateTime $dateNaissance;
    private string $ville;
    private array $comptes;

    public function __construct(string $nom, string $prenom, string $dateNaissance, string $ville){
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->dateNaissance= new DateTime($dateNaissance);
        $this->ville=$ville;
        $this->comptes=[];
    }



    public function getNom() : string
    {
        return $this->nom;
    }


    public function setNom($nom) 
    {
        $this->nom = $nom;

        return $this;
    }


    public function getPrenom() : string
    {
        return $this->prenom;
    }


    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }


    public function getDateNaissance() : dateTime
    {
        return $this->dateNaissance;
    }


    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }


    public function getVille() : string
    {
        return $this->ville;
    }


    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }
    
    public function getComptes() : array
    {
        return $this->comptes;
    }


    public function setComptes($comptes)
    {
        $this->comptes = $comptes;

        return $this;
    }

//    ------------------- fonctions-------------------------------
    public function __toString(){
        return $this->nom." ".$this->prenom."<br>";
    }

    public function ajouterCompte(Compte $compte){
        $this->comptes[]=$compte;
    }

    public function afficherCompte(){
        $result= "<h1> Compte de Mme ".$this."</h1>";
        foreach($this->comptes as $compte);
            $result.= $compte;
        return $result;
    }
    
    public function donnerAge(){
        $dateJour= new DateTime();
        $difference= $this->dateNaissance->diff($dateJour);
        return $difference->format('%Y');

    }


}