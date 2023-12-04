<?php 
class Panier
{
    private ?int $id_panier = null;
    private ?int $quantite = null;
    private ?int $prix = null;
    private ?string $nom_produit = null;
    private ?string $description_produit = null;

    public function __construct($quantite, $prix, $nom_produit, $description_produit)
    {
        $this->quantite = $quantite;
        $this->prix = $prix;
        $this->nom_produit = $nom_produit;
        $this->description_produit = $description_produit;
    }

    public function getId_panier()
    {
        return $this->id_panier;
    }

    public function getQuantite()
    {
        return $this->quantite;
    }

    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
        return $this;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;
        return $this;
    }

    public function getNom_produit()
    {
        return $this->nom_produit;
    }

    public function setNom_produit($nom_produit)
    {
        $this->nom_produit = $nom_produit;
        return $this;
    }

    public function getDescription_produit()
    {
        return $this->description_produit;
    }

    public function setDescription_produit($description_produit)
    {
        $this->description_produit = $description_produit;
        return $this;
    }
}

?>