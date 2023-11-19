<?php
class commande
{

    private ?string $adresse = null;
    private ?int $dat = null;

    public function __construct( $a,$d)
    {
        $this->adresse = $a;
        $this->dat = $d;
    }


    public function getadresse()
    {
        return $this->adresse;
    }

    public function setadresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getdate()
    {
        return $this->dat;
    }

    public function setdate($date)
    {
        $this->dat = $date;

        return $this;
    }
}
class panier
{
    private ?int $id = null;
    private ?int $qont = null;
    private ?int $prix = null;
    private ?string $nom = null;


    public function __construct($id = null, $q, $p, $n)
    {
        $this->id = $id;
        $this->qont = $q;
        $this->prix = $p;
        $this->nom = $n;
    }


    public function getid()
    {
        return $this->id;
    }


    public function getqont()
    {
        return $this->qont;
    }


    public function setqont($qont)
    {
        $this->qont = $qont;

        return $this;
    }


    public function getprix()
    {
        return $this->prix;
    }


    public function setprix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    public function getnom()
    {
        return $this->nom;
    }


    public function setnom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

}