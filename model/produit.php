<?php
class produit
{
    private ?int $id_prod = null;
    private ?string $nom_prod = null;
    private ?string $image_prod = null;
    private ?int $quantite = null;
    private ?string $categorie = null;
    private ?int $prix_prod = null;
    private ?string $descrip = null;

    public function __construct($id = null, $n, $i, $q, $c, $p, $d)
    {
        $this->id_prod = $id;
        $this->nom_prod = $n;
        $this->image_prod = $i;
        $this->quantite = $q;
        $this->categorie = $c;
        $this->prix_prod = $p;
        $this->descrip = $d;

    }


    public function getIdProduit()
    {
        return $this->id_prod;
    }


    public function getNom()
    {
        return $this->nom_prod;
    }


    public function setNom($nom_prod)
    {
        $this->nom_prod = $nom_prod;

        return $this;
    }


    public function getimageprod()
    {
        return $this->image_prod;
    }


    public function setimageprod($image_prod)
    {
        $this->image_prod = $image_prod;

        return $this;
    }


    public function getquantite()
    {
        return $this->quantite;
    }


    public function setquantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }


    public function getcategorie()
    {
        return $this->categorie;
    }


    public function setcategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get the value of descrip
     */ 
    public function getDescrip()
    {
        return $this->descrip;
    }


    public function setDescrip($descrip)
    {
        $this->descrip = $descrip;

        return $this;
    }

    /**
     * Get the value of prix_prod
     */ 
    public function getPrix_prod()
    {
        return $this->prix_prod;
    }


    public function setPrix_prod($prix_prod)
    {
        $this->prix_prod = $prix_prod;

        return $this;
    }
}
