<?php

class Compte{
    private string $libelle;
    private float $soldeInitial;
    private string $devise;
    private Titulaire $titulaire;

public function __construct(string $libelle, float $soldeInitial, string $devise, Titulaire $titulaire){
    $this->libelle=$libelle;
    $this->soldeInitial=$soldeInitial;
    $this->devise=$devise;
    $this->titulaire=$titulaire;
    $this->titulaire->ajouterCompte($this);
}


    public function getLibelle() : string
    {
        return $this->libelle;
    }


    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }


    public function getSoldeInitial() : float
    {
        return $this->soldeInitial;
    }


    public function setSoldeInitial($soldeInitial)
    {
        $this->soldeInitial = $soldeInitial;

        return $this;
    }


    public function getDevise() : string
    {
        return $this->devise;
    }


    public function setDevise($devise)
    {
        $this->devise = $devise;

        return $this;
    }


    public function getTitulaire()
    {
        return $this->titulaire;
    }


    public function setTitulaire($titulaire)
    {
        $this->titulaire = $titulaire;

        return $this;
    }

    // -------------fonctions-----------------

    public function __toString(){
        return $this->soldeInitial." ".$this->devise." dans le ".$this->libelle."<br>";
    }

    public function crediter(float $credit){
        $result=($this->soldeInitial + $credit);
        return $result;
    }

    public function debiter(float $debit){
        if ($this->soldeInitial > $debit){
            $result=($this->soldeInitial - $debit);
        }
        else {
            $result= "Solde insuffisant!";
        }
        return $result;
    }

    public function virement($destinataire, float $montant){
        if ($montant > 0 && $this->soldeInitial >= $montant){
            $this->soldeInitial -= $montant;
            $destinataire->soldeInitial += $montant;
            return "Virement de ".$montant." € effectué depuis ".$this->libelle." vers ".$destinataire->libelle." <br>" ;
        }
        else {
            return "Solde insuffisant";
        }
    }

}