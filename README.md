Application Symfony – Gestion d’un Club de Football
Ce projet est une mini-application web développée avec le framework Symfony 7. Il permet de gérer un club de football avec différentes fonctionnalités accessibles selon le rôle de l’utilisateur (Administrateur ou Entraîneur). L’application respecte le modèle MVC, met en place un système d’authentification sécurisé, et propose une interface claire pour administrer les joueurs, entraîneurs, rencontres, séances et compositions d’équipe.

Auteur

Nom : Diawara Kolonkan
Niveau : Licence 3
Faculté : Centre Informatique
Cours : Symfony 7

Sommaire
	•	Fonctionnalités
	•	Structure du projet
	•	Rôles utilisateurs
	•	Comptes de test
	•	Installation
	•	Captures d’écran
	•	Livraison

Fonctionnalités implémentées
	•	Système d’authentification complet avec rôles (ROLE_ADMIN, ROLE_ENTRAINEUR)
	•	CRUD complet des entités :
	•	Utilisateurs
	•	Joueurs
	•	Entraîneurs
	•	Rencontres
	•	Séances
	•	Compositions
	•	Restrictions d’accès selon le rôle
	•	Relations entre entités (ex : joueur lié à une composition, entraîneur lié à une séance)
	•	Affichage conditionnel des actions (ex : validation de rencontre)
	•	Action métier : valider une rencontre
	•	Interface personnalisée selon l’utilisateur connecté
	•	Respect des bonnes pratiques Symfony

Structure du projet

src/Entity : contient les entités (User, Joueur, Entraineur, Rencontre, Composition, Seance)
src/Controller : contient les contrôleurs de chaque fonctionnalité
templates/ : contient les vues en Twig
config/routes.yaml : enregistre les routes
config/packages/security.yaml : gère la sécurité et les rôles

Rôles utilisateurs

ROLE_ADMIN : a accès à toutes les fonctionnalités (gestion des utilisateurs, rencontres, séances…)
ROLE_ENTRAINEUR : peut accéder à la gestion des séances et compositions uniquement

Comptes de test

Email : admin@club.com
Mot de passe : admin123
Rôle : Administrateur (ROLE_ADMIN)

Email : entraineur@gmail.com
Mot de passe : 123
Rôle : Entraîneur (ROLE_ENTRAINEUR)

Installation du projet
	1.	Cloner le projet :
git clone https://github.com/kolonkan/mondevoir_symfony.git
cd mondevoir_symfony
	2.	Installer les dépendances :
composer install
	3.	Créer la base de données :
php bin/console doctrine:database:create
	4.	Exécuter les migrations :
php bin/console doctrine:migrations:migrate
	5.	Lancer le serveur :
php -S localhost:8000 -t public

Accéder à l’application via :
http://localhost:8000

Captures d’écran

Ajoutez ici vos captures d’écran :
	•	Page de connexion
	•	Tableau de bord admin
	•	Liste des joueurs
	•	Formulaire de séance
	•	Page de validation de rencontre

Livraison
Dépôt GitHub du projet : https://github.com/kolonkan/mondevoir_symfony.git
Délai de remise : Avant samedi 21/06/2025 à 00h00
