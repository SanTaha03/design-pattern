<?php

namespace JeuPrototype;

// Interface du prototype
interface PrototypePersonnage
{
    public function cloner(): PrototypePersonnage;
    public function afficherStats(): void;
}

// Prototype concret : Guerrier
class Guerrier implements PrototypePersonnage
{
    private $nom;
    private $sante;
    private $degatsAttaque;

    public function __construct($nom, $sante, $degatsAttaque)
    {
        $this->nom = $nom;
        $this->sante = $sante;
        $this->degatsAttaque = $degatsAttaque;
    }

    public function cloner(): PrototypePersonnage
    {
        return new self($this->nom, $this->sante, $this->degatsAttaque);
    }

    public function afficherStats(): void
    {
        echo "Guerrier - Nom : {$this->nom}, Santé : {$this->sante}, Dégâts d'attaque : {$this->degatsAttaque}\n";
    }
}

// Prototype concret : Mage
class Mage implements PrototypePersonnage
{
    private $nom;
    private $sante;
    private $puissanceMagique;

    public function __construct($nom, $sante, $puissanceMagique)
    {
        $this->nom = $nom;
        $this->sante = $sante;
        $this->puissanceMagique = $puissanceMagique;
    }

    public function cloner(): PrototypePersonnage
    {
        return new self($this->nom, $this->sante, $this->puissanceMagique);
    }

    public function afficherStats(): void
    {
        echo "Mage - Nom : {$this->nom}, Santé : {$this->sante}, Puissance Magique : {$this->puissanceMagique}\n";
    }
}

// Code client
function codeClient()
{
    $prototypeGuerrier = new Guerrier("Aldric", 100, 25);
    $prototypeMage = new Mage("Elara", 80, 30);

    // Création de personnages basés sur les prototypes
    $guerrier1 = $prototypeGuerrier->cloner();
    $mage1 = $prototypeMage->cloner();

    $guerrier2 = $prototypeGuerrier->cloner();
    $guerrier2->afficherStats(); // Affichage des statistiques du guerrier 2

    $mage3 = $prototypeMage->cloner();
    $mage3->afficherStats(); // Affichage des statistiques du mage 3
}

codeClient();
