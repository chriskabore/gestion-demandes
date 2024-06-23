

## A propos du projet Gestion demandes

Gestion demandes est un mini projet dont l'objectif est de verifier que les concepts abordés lors de la formation en Laravel, ont été bien assimilés.
Il s"agit d'une mini application de demandes à travers laquel des citoyens peuvent faire des demandes de service publics. Ils peuvent suivre leur demandes et voir 
les services disponibles.
L'utilisateur admin a pour role la gestion des services, des citoyens, des pièces et des demandes

## Utilisation 

 
 1- Aller dans le repertoire du projet gestion-demandes 
	$cd gestion-demandes
	
 2- Configurer la connexion à la base de donnée
 
 3- Generer la clé de l'application
	$php artisan key:generate
	
 4- executer les migrations
	$php artisan migrate
	
 5- executer le seeder DatabaseSeeder
    $php artisan db:seed --class=DatabaseSeeder
	
 6- executer le seeder RoleSeeder
    $php artisan db:seed --class=RoleSeeder
	
	
 7- Se connecter en tant que admin 
	username: admin@example.com
	password: demandes@2024
	
 8- Se connecter en tant que citoyen
	username:chris@example.com
	password: demandes@2024
 
 Menu Admin
	- Dashboard admin
	- Services
	- Pieces
	- Citoyens
	- Demandes
 
 Menu Citoyen 
	- Dashboard citoyen
	- Mes demandes 
	- Services disponibles


