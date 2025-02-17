
Introduction 
	
SQL (structured query language) est un language d�di� � l'exploitation de base de donn�es. Utilisant plusieurs logiciels notamment une interface graphique comme phpadmin.


Commande de base

Cr�ation d'une base de donn�e :
	Pour cr�er une base de donn�es, la commande 'CREATE DATABASE' suivi du nom de la base de donn�es que l'on souhaite cr�er. DEFAULT CHARACTER est un param�tre qui sert � d�finir les caract�res accepter dans la base de donn�e cr��. DEFAULT COLLATE est un autre param�tre qui permet de ne pas pr�ciser la gestion de la casse (majuscule/minuscule)


Exemple d'une cr�ation de base de donn�e nomm�e "cin�ma"
CREATE DATABASE cinema
DEFAULT CHARACTER SET utf8  
DEFAULT COLLATE utf8_general_ci;

Cr�ation d'une table:
	Une table est un groupe de donn�es repr�senter sous forme d'un tablea, il est compos� de lignes et de colonnes.
	Pour cr�er une table, la commande 'CREATE TABLE' suivi du nom de la base de donn�es que l'on souhaite cr�er. 
	Il est n�cessaire de d�finir  les champs de la table, pour cela il faut d�finir le nom du champ suivi de son type et si sa valeur de base peut �tre 'NULL' ou non.
	En g�n�ral, le 1er champ est un ID, c'est une cl� primaire ('PRIMART KEY'), il est auto incr�menter et non null.

ENGINE = INNODB est la mani�re de stocker les donn�es, il est rajouter apr�s la cr�ation de la table comme dans l'exemple ci-dessous. 

Exemple d'une cr�ation d'une table nomm�e "MOVIE"
CREATE TABLE movie(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    title  VARCHAR(255) NOT NULL,
    lauch_at DATE NULL,
    description TEXT NULL
 ) ENGINE=INNODB;

Modification d'une table
	Pour modifier une table, la commande 'ALTER TABLE' suivi du nom de la table que l'on souhaite modifier. Il est n�cessaire de mettre la commande 'ADD COLUMN' suivi du nom du champ � cr�er en pr�cisant sont type et si sa valeur de base peut �tre 'NULL' ou non.

ALTER TABLE movie
ADD COLUMN duration INT NULL;

Il est possible de modifer une colonne � l'aide de MODIFY, supprimer avec DROP COLUMN
lien � rajouter 

Cr�ation d'une liaison
	Une liaison entre 2 tables 
2 tables peuvent �tre li� grace � une cl� �trang�re. Pour cela il est n�cessaire de cr�er une colonne 

Exemple : nous souhaitons lier une table director (r�alisateur de film) avec country (pays du r�alisateur). La table 'country' sera la table cliente de la table 'director'

Dans un 1er temps, il est n�cessaire de cr�er une colonne dans la table 'director'
ALTER TABLE director
ADD COLUMN country_id INT NOT NULL;

Ensuite pour lier les 2 tables, il faut utiliser la commande ALTER TABLE puis ajouter une cl� �trang�re (ADD FOREYGN KEY).
La commande ADD FOREIGN KEY est compos� du nom de la cl� �tang�re, du nom du champ de la table 'director' et du champ id de la table 'country'.

Elle sera �crite comme dans l'exemple ci-dessous
ALTER TABLE director
ADD FOREIGN KEY fk_director_country (country_id) REFERENCES country(id)

Ajouter/Modifier/Supprimer des donn�es

Pour ajouter des donn�es dans une table, la commande 'INSERT TO' suivi du nom de la table. La syntaxe doit respecter l'exemple ci-dessous.

INSERT INTO movie (column1, column2, column3, ...) 
VALUES ( 'value1', `value2`, `value3`, ...);

Pour modifier des donn�es dans une table, la commande 'UPDATE ' suivi du nom de la table. 
La syntaxe doit respecter l'exemple ci-dessous.

UPDATE movie 
SET column1 = 'value1', column2 = 'value2', column3 = 'value3', ...
WHERE condition

La commande 'WHERE' permet de pr�ciser sur quel ligne la modification sera ex�cuter  (qui revient � l'id de la table) 

Pour supprimer une donn�e, la commande 'DELETE FROM' suivi du nom de la table puis la ligne � supprimer.
DELETE FROM `table`
WHERE condition

Il est possible de supprimer plusieurs ligne ou une table enti�re.

Attention : s�il n�y a pas de condition WHERE alors toutes les lignes seront supprim�es et la table sera alors vide.

SELECT

La commande 'SELECT' permet de renvoyer les informations de la base de donn�es que l'on souhaite.

SELECT nom_du_champ FROM nom_du_tableau

La commande SELECT permet de choisir le ou les champs � afficher.
La commande FROM permet de d�finir dans quel table la recherche sera effectu�
La commande WHERE permet de d�finir une ou plusieur condition � la recherche d�sir�e.

ORDER BY

La commande ORDER BY permet de trier les donn�es recherch�es, les param�tres ASC ou DESC permettent de d�finir le sens du tri (ASC --> ordre croissant et DESC --> ordre d�croissant). Si aucun param�tre n'est pr�cis�, la recherche sera class�e par ordre ASC.

Exemple
SELECT nom, taille FROM etudiant ORDER BY etudiant.taille ASC;

Cette requete permet de s�lectionner les champs 'nom' et 'taille' de la table 'etudiant' class�e par ordre croissant selon le champ 'taille'.

GROUP BY

La commande GROUP BY permet de grouper les valeurs dif�rentes d'une colonne.

Exemple
SELECT `sexe` FROM `etudiant` GROUP BY `sexe`

Cette requete permet de s�lectionner le champ 'sexe' de la table 'etudiant' et afficher les diff�rentes valeurs de la colone sexe.

INNER JOIN

La commande INNER JOIN permet de faire une recherche sur plusieurs tables. Elles retrounent les donn�es lorsqu�il y a au moins une ligne dans chaque colonne qui correspond � la condition.

Exemple
SELECT utilisateur.name, pays.label FROM utilisateur INNER JOIN pays ON utilisateur.pays_id = pays.id;

La syntaxe ci-dessus stipule qu�il faut s�lectionner les enregistrements des tables 'utilisateur' et 'pays' lorsque les donn�es de la colonne �id� de la table 'utilisateur' est �gal aux donn�es de la colonne fk_id de la table 'pays'.

Fonction d'agr�gation

La fonction COUNT permet de compter le nombre ligne. Il est souvent utilis� avec une condition.

La fonction AVG permet de faire la moyenne d'un champ

