<?php
class commande
{

    private ?string $id_c = null;
    private ?string $adresse = null;
    private ?string $date_commande = null;
    private ?string $client_nom = null;  
    private ?string $id_panier = null;  

    public function __construct( $adresse ,$date_commande ,$client_nom , $id_panier)
    {
        $this->adresse = $adresse;
        $this->date_commande = $date_commande;
        $this->client_nom = $client_nom;
        $this->id_panier = $id_panier;

    }

/**
     * Get the value of id_c
     */ 
    public function getId_c()
    {
        return $this->id_c;
    }

    public function setadId_c($id_c)
    {
        $this->id_c = $id_c;

        return $this;
    }

    /**
     * Get the value of adresse
     */ 
    public function getAdresse()
    {
        return $this->adresse;
    }

    public function setadresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }


    /**
     * Get the value of client_nom
     */ 
    public function getClient_nom()
    {
        return $this->client_nom;
    }

    /**
     * Get the value of date_commande
     */ 
    public function getDate_commande()
    {
        return $this->date_commande;
    }

    /**
     * Get the value of id_panier
     */ 
    public function getId_panier()
    {
        return $this->id_panier;
    }

    /**
     * Set the value of date_commande
     *
     * @return  self
     */ 
    public function setDate_commande($date_commande)
    {
        $this->date_commande = $date_commande;

        return $this;
    }

    /**
     * Set the value of client_nom
     *
     * @return  self
     */ 
    public function setClient_nom($client_nom)
    {
        $this->client_nom = $client_nom;

        return $this;
    }

    /**
     * Set the value of id_panier
     *
     * @return  self
     */ 
    public function setId_panier($id_panier)
    {
        $this->id_panier = $id_panier;

        return $this;
    }
}
