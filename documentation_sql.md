
Introduction 
	
SQL (structured query language) est un language dédié à l'exploitation de base de données. Utilisant plusieurs logiciels notamment une interface graphique comme phpadmin.


Commande de base

Création d'une base de donnée :
	Pour créer une base de données, la commande 'CREATE DATABASE' suivi du nom de la base de données que l'on souhaite créer. DEFAULT CHARACTER est un paramètre qui sert à définir les caractères accepter dans la base de donnée créé. DEFAULT COLLATE est un autre paramètre qui permet de ne pas préciser la gestion de la casse (majuscule/minuscule)


Exemple d'une création de base de donnée nommée "cinéma"
CREATE DATABASE cinema
DEFAULT CHARACTER SET utf8  
DEFAULT COLLATE utf8_general_ci;

Création d'une table:
	Une table est un groupe de données représenter sous forme d'un tablea, il est composé de lignes et de colonnes.
	Pour créer une table, la commande 'CREATE TABLE' suivi du nom de la base de données que l'on souhaite créer. 
	Il est nécessaire de définir  les champs de la table, pour cela il faut définir le nom du champ suivi de son type et si sa valeur de base peut être 'NULL' ou non.
	En général, le 1er champ est un ID, c'est une clé primaire ('PRIMART KEY'), il est auto incrémenter et non null.

ENGINE = INNODB est la manière de stocker les données, il est rajouter après la création de la table comme dans l'exemple ci-dessous. 

Exemple d'une création d'une table nommée "MOVIE"
CREATE TABLE movie(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    title  VARCHAR(255) NOT NULL,
    lauch_at DATE NULL,
    description TEXT NULL
 ) ENGINE=INNODB;

Modification d'une table
	Pour modifier une table, la commande 'ALTER TABLE' suivi du nom de la table que l'on souhaite modifier. Il est nécessaire de mettre la commande 'ADD COLUMN' suivi du nom du champ à créer en précisant sont type et si sa valeur de base peut être 'NULL' ou non.

ALTER TABLE movie
ADD COLUMN duration INT NULL;

Il est possible de modifer une colonne à l'aide de MODIFY, supprimer avec DROP COLUMN
lien à rajouter 

Création d'une liaison
	Une liaison entre 2 tables 
2 tables peuvent être lié grace à une clé étrangère. Pour cela il est nécessaire de créer une colonne 

Exemple : nous souhaitons lier une table director (réalisateur de film) avec country (pays du réalisateur). La table 'country' sera la table cliente de la table 'director'

Dans un 1er temps, il est nécessaire de créer une colonne dans la table 'director'
ALTER TABLE director
ADD COLUMN country_id INT NOT NULL;

Ensuite pour lier les 2 tables, il faut utiliser la commande ALTER TABLE puis ajouter une clé étrangère (ADD FOREYGN KEY).
La commande ADD FOREIGN KEY est composé du nom de la clé étangère, du nom du champ de la table 'director' et du champ id de la table 'country'.

Elle sera écrite comme dans l'exemple ci-dessous
ALTER TABLE director
ADD FOREIGN KEY fk_director_country (country_id) REFERENCES country(id)

Ajouter/Modifier/Supprimer des données

Pour ajouter des données dans une table, la commande 'INSERT TO' suivi du nom de la table. La syntaxe doit respecter l'exemple ci-dessous.

INSERT INTO movie (column1, column2, column3, ...) 
VALUES ( 'value1', `value2`, `value3`, ...);

Pour modifier des données dans une table, la commande 'UPDATE ' suivi du nom de la table. 
La syntaxe doit respecter l'exemple ci-dessous.

UPDATE movie 
SET column1 = 'value1', column2 = 'value2', column3 = 'value3', ...
WHERE condition

La commande 'WHERE' permet de préciser sur quel ligne la modification sera exécuter  (qui revient à l'id de la table) 

Pour supprimer une donnée, la commande 'DELETE FROM' suivi du nom de la table puis la ligne à supprimer.
DELETE FROM `table`
WHERE condition

Il est possible de supprimer plusieurs ligne ou une table entière.

Attention : s’il n’y a pas de condition WHERE alors toutes les lignes seront supprimées et la table sera alors vide.

SELECT

La commande 'SELECT' permet de renvoyer les informations de la base de données que l'on souhaite.

SELECT nom_du_champ FROM nom_du_tableau

La commande SELECT permet de choisir le ou les champs à afficher.
La commande FROM permet de définir dans quel table la recherche sera effectué
La commande WHERE permet de définir une ou plusieur condition à la recherche désirée.

ORDER BY

La commande ORDER BY permet de trier les données recherchées, les paramètres ASC ou DESC permettent de définir le sens du tri (ASC --> ordre croissant et DESC --> ordre décroissant). Si aucun paramètre n'est précisé, la recherche sera classée par ordre ASC.

Exemple
SELECT nom, taille FROM etudiant ORDER BY etudiant.taille ASC;

Cette requete permet de sélectionner les champs 'nom' et 'taille' de la table 'etudiant' classée par ordre croissant selon le champ 'taille'.

GROUP BY

La commande GROUP BY permet de grouper les valeurs diférentes d'une colonne.

Exemple
SELECT `sexe` FROM `etudiant` GROUP BY `sexe`

Cette requete permet de sélectionner le champ 'sexe' de la table 'etudiant' et afficher les différentes valeurs de la colone sexe.

INNER JOIN

La commande INNER JOIN permet de faire une recherche sur plusieurs tables. Elles retrounent les données lorsqu’il y a au moins une ligne dans chaque colonne qui correspond à la condition.

Exemple
SELECT utilisateur.name, pays.label FROM utilisateur INNER JOIN pays ON utilisateur.pays_id = pays.id;

La syntaxe ci-dessus stipule qu’il faut sélectionner les enregistrements des tables 'utilisateur' et 'pays' lorsque les données de la colonne “id” de la table 'utilisateur' est égal aux données de la colonne fk_id de la table 'pays'.

Fonction d'agrégation

La fonction COUNT permet de compter le nombre ligne. Il est souvent utilisé avec une condition.

La fonction AVG permet de faire la moyenne d'un champ

