<?php
class categorie
{
    private ?int $id_categorie;
    private ?string $nom_categorie;
    private ?string $descrip_categorie;
   
    public function __construct($id = null, $n, $d)
    {
        $this->id_categorie = $id;
        $this->nom_categorie = $n;
        $this->descrip_categorie = $d;

    }
   

    /**
     * Get the value of id_categorie
     */ 
    public function getId_categorie()
    {
        return $this->id_categorie;
    }

    /**
     * Set the value of id_categorie
     *
     * @return  self
     */ 
    public function setId_categorie($id_categorie)
    {
        $this->id_categorie = $id_categorie;

        return $this;
    }

    /**
     * Get the value of nom_categorie
     */ 
    public function getNom_categorie()
    {
        return $this->nom_categorie;
    }

    /**
     * Set the value of nom_categorie
     *
     * @return  self
     */ 
    public function setNom_categorie($nom_categorie)
    {
        $this->nom_categorie = $nom_categorie;

        return $this;
    }

    /**
     * Get the value of descrip_categorie
     */ 
    public function getDescrip_categorie()
    {
        return $this->descrip_categorie;
    }

    /**
     * Set the value of descrip_categorie
     *
     * @return  self
     */ 
    public function setDescrip_categorie($descrip_categorie)
    {
        $this->descrip_categorie = $descrip_categorie;

        return $this;
    }
}