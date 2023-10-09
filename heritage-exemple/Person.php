<?php

// La classe Personne est la classe Parente.
class Personne
{
    // les propriété communes à toutes les classes enfants
    protected $nom;
    private $age;
    private $nationalité;

    public function sePresenter()
    {
        return "Bonjour je suis " . $this->nom;
    }

        /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
}
// la classe prof hérite de la classe personne
// elle à donc accès à toute les méthodes et
// propriété hormis celle en visibilité private
class Prof extends Personne
{
    public function afficherNote($note)
    {
        return "Bonjour :".$this->nom."voici une note " . $note;
    }
}

class Eleve extends Personne
{
    
    public function consulterEmploiDuTemps()
    {
        return "Tu as cours à 9h";
    }
}

class Parents extends Personne
{

    public function consulterBulletin()
    {
        return "Voici le buletin : ";
    }


}

$Prof = new Prof();
$Prof->setNom('Jean');
// var_dump($Prof->sePresenter());
// var_dump($Prof->afficherNote(15));


class Entite
{
    protected $nom;
    private $pv;
    protected $degats;

    public function __construct($paramNom, $paramPv, $paramDegats)
    {
        $this->nom = $paramNom;
        $this->pv = $paramPv;
        $this->degats = $paramDegats;
    }

    public function attaque()
    {
        return $this->nom . ' attaque et fait ' . $this->degats;
    }
}

class Guerrier extends Entite
{

    protected $armure;

    public function __construct($paramNom, $paramPv, $paramDegats, $paramArmure)
    {
        $this->armure = $paramArmure;
        parent::__construct($paramNom, $paramPv, $paramDegats);
    }

    public function attaqueEpee()
    {
        return $this->nom . ' attaque avec une épée et fait ' . $this->degats;
    }
}

class Humain extends Guerrier
{

    public function frimer()
    {
        return "haha, j'ai plus d'armure que l'elfe, j'ai " . $this->armure . "pts d'armure !";
    }

}

class Orc
{
    // code spécifique à l'orc
}


class Archer extends Entite
{
    public function attaqueArc()
    {
        return $this->nom . ' attaque avec une arc et fait ' . $this->degats;
    }
}

$guerrier = new Guerrier('Guerrier', 100, 10, 50);
// var_dump($guerrier->attaque());
// var_dump($guerrier->attaqueEpee());

$humain = new Humain('humain', 100, 100, 100);
// var_dump($humain->attaque());
// var_dump($humain->attaqueEpee());
// var_dump($humain->frimer());


