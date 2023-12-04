CREATE TABLE Panier (
    id_panier INT AUTO_INCREMENT PRIMARY KEY,
    quantite INT,
    prix INT,
    nom_produit VARCHAR(255),
    description_produit TEXT
);

CREATE TABLE Commande (
    id_c INT AUTO_INCREMENT PRIMARY KEY,
    adresse_livraison VARCHAR(255),
    date_commande DATE,
    client_nom VARCHAR(255),
    id_panier INT,
    FOREIGN KEY (id_panier) REFERENCES Panier(id_panier) ON DELETE CASCADE
);
