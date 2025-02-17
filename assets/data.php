<?php

$articles = [
    [
        'title' => 'Créer une base de donnée',
        'article' => "Pour créer une base de données, la commande 'CREATE DATABASE' 
        suivi du nom de la base de données que l'on souhaite créer. 'DEFAULT CHARACTER' est un paramètre qui sert à 
        définir les caractères accepter dans la base de donnée créé. DEFAULT COLLATE est un autre paramètre qui permet de ne pas préciser la gestion de la casse (majuscule/minuscule)",
        'example' => "Exemple : <br>'CREATE DATABASE' cinema <br>'DEFAULT CHARACTER' <br>'SET' utf8 'DEFAULT COLLATE' utf8_general_ci;",
        'link' => 'https://sql.sh/cours/create-database'
    ],
    [
        'title' => "Créer d'une table de donnée",
        'article' => "Une table est un groupe de données représenter sous forme d'un tablea, il est composé de lignes et de colonnes.
	    Pour créer une table, la commande 'CREATE TABLE' suivi du nom de la base de données que l'on souhaite créer. 
        Il est nécessaire de définir  les champs de la table, pour cela il faut définir le nom du champ suivi de son type et si sa valeur de base peut être 'NULL' ou non.
        En général, le 1er champ est un ID, c'est une clé primaire ('PRIMART KEY'), il est auto incrémenter et non null. ENGINE = INNODB est la manière de stocker les données, 
        il est rajouter après la création de la table comme dans l'exemple ci-dessous.",
        'example' => "Exemple : <br>'CREATE TABLE' movie(<br>
        id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,<br>
        title  VARCHAR(255) NOT NULL,<br>
        lauch_at DATE NULL,<br>
        description TEXT NULL<br>
        ) ENGINE=INNODB;",
         'link' => 'https://sql.sh/cours/create-table'
    ],
    [
        'title' => "Modification d'une table",
        'article' => "Pour modifier une table, la commande 'ALTER TABLE' suivi du nom de la table que l'on souhaite modifier. 
        Il est nécessaire de mettre la commande 'ADD COLUMN' suivi du nom du champ à créer en précisant sont type et si sa valeur de base peut être 'NULL' ou non.",
        'example' => "Exemple : <br>'ALTER TABLE' movie<br> 'ADD COLUMN' duration INT NULL;",
        'link' => 'https://sql.sh/cours/alter-table'
    ],
    [
        'title' => "Création d'une liaison",
        'article' => "Dans un 1er temps, il est nécessaire de créer une colonne dans la table 'director'
                        ALTER TABLE director
                        ADD COLUMN country_id INT NOT NULL;
                        Ensuite pour lier les 2 tables, il faut utiliser la commande ALTER TABLE puis ajouter une clé étrangère (ADD FOREYGN KEY).
                        La commande ADD FOREIGN KEY est composé du nom de la clé étangère, du nom du champ de la table 'director' et du champ id de la table 'country'.",
        'example' => "Exemple : <br>'ALTER TABLE director
                    ADD FOREIGN KEY fk_director_country (country_id) REFERENCES country(id)",
        'link' => 'test'
    ],
    [
        'title' => 'Ajouter des données dans une table',
        'article' => 'Ici, movie est le nom de la table, column1, column2, ... 
                    sont les noms des colonnes auxquelles vous souhaitez ajouter des données, et value1, value2, ... 
                    sont les valeurs que vous souhaitez ajouter à ces colonnes.',
        'example' => "Exemple : <br>'INSERT INTO movie (column1, column2, column3, ...)<br>
                    VALUES ( 'value1', `value2`, `value3`, ...);",
        'link' => 'https://sql.sh/cours/insert-into'        
    ],
    [
        'title' => "'Modifier des données dans une table'",
        'article' => "'Ici, movie est le nom de la table. Ensuite, column1, column2, ... 
        sont les noms des colonnes que vous souhaitez modifier, et value1, value2, ... 
        sont les nouvelles valeurs que vous souhaitez définir pour ces colonnes. Enfin, condition est le critère de sélection des lignes à modifier.
        La commande 'WHERE' permet de préciser sur quel ligne la modification sera exécuter  (qui revient à l'id de la table)",
        'example' => "Exemple : <br>'UPDATE' movie 'SET' column1 = 'value1', column2 = 'value2', ...<br>'WHERE' condition;",
        'link' => 'testhttps://sql.sh/cours/update'
    ],
    [
        'title' => "Supprimer des données",
        'article' => "Pour supprimer une donnée, la commande 'DELETE FROM' suivi du nom de la table puis la ligne à supprimer.<br>
        Attention : s’il n’y a pas de condition WHERE alors toutes les lignes seront supprimées et la table sera alors vide.",
        'example' => "Exemple : <br>'DELETE FROM `table`<br>
                        WHERE condition'",
        'link' => 'https://sql.sh/cours/delete'
    ],
    [
        'title' => "Selectionner des données",
        'article' => "La commande 'SELECT' permet de renvoyer les informations de la base de données que l'on souhaite.<br>
                    La commande SELECT permet de choisir le ou les champs à afficher.<br>
                    La commande FROM permet de définir dans quel table la recherche sera effectué.<br>
                    La commande WHERE permet de définir une ou plusieur condition à la recherche désirée.",
        'example' => "Exemple : <br>'SELECT nom_du_champ FROM nom_du_tableau'",
        'link' => 'https://learnsql.fr/blog/les-commandes-sql-les-plus-importantes/#select'
    ],
    [
        'title' => "Triage de données",
        'article' => "'La commande ORDER BY permet de trier les données recherchées, 
                    les paramètres ASC ou DESC permettent de définir le sens du tri (ASC --> ordre croissant et DESC --> ordre décroissant). 
                    Si aucun paramètre n'est précisé, la recherche sera classée par ordre ASC.",
        'example' => "Exemple : <br>'SELECT' nom, taille FROM etudiant ORDER BY etudiant.taille ASC;<br>
                    Cette requete permet de sélectionner les champs 'nom' et 'taille' de la table 'etudiant' classée par ordre croissant selon le champ 'taille'.",
        'link' => 'https://learnsql.fr/blog/les-commandes-sql-les-plus-importantes/#order-by'
    ],
    [
        'title' => 'Regroupement de données',
        'article' => "La commande GROUP BY permet de grouper les valeurs diférentes d'une colonne.",
        'example' => "Exemple : <br>'SELECT `sexe` FROM `etudiant` GROUP BY `sexe`<br>
                        Cette requete permet de sélectionner le champ 'sexe' de la table 'etudiant' et afficher les différentes valeurs de la colone sexe.",
        'link' => 'https://learnsql.fr/blog/les-commandes-sql-les-plus-importantes/#group-by'
    ],
    [
        'title' => 'Liaison entre table',
        'article' => 'La commande INNER JOIN permet de faire une recherche sur plusieurs tables. 
        Elles retrounent les données lorsqu’il y a au moins une ligne dans chaque colonne qui correspond à la condition.',
        'example' => "Exemple : <br>'SELECT utilisateur.name, pays.label<br>FROM utilisateur<br>INNER JOIN pays ON utilisateur.pays_id = pays.id;<br><br>
                    La syntaxe ci-dessus stipule qu’il faut sélectionner les enregistrements des tables 'utilisateur' 
                    et 'pays' lorsque les données de la colonne “id” de la table 'utilisateur' est égal aux données de la colonne fk_id de la table 'pays'.",
        'link' => 'https://learnsql.fr/blog/les-commandes-sql-les-plus-importantes/#join'
    ],
    [
        'title' => 'Agrégation : COUNT, AVG',
        'article' => "La fonction COUNT permet de compter le nombre ligne.<br>Elle est souvent utilisé avec une condition.<br>
                        La fonction AVG permet de faire la moyenne d'un champ",
        'example' => 'Exemple a faire',
        'link' => 'https://sql.sh/fonctions/agregation'
    ],
]
?>