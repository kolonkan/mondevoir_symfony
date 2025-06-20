Application Symfony – Gestion d’un Club de Football
Ce projet est une mini-application web développée avec le framework Symfony 7. Il permet de gérer un club de football avec différentes fonctionnalités accessibles selon le rôle de l'utilisateur (administrateur ou entraîneur). L'application respecte le modèle MVC, met en place un système d'authentification sécurisé, et propose une interface claire pour administrer les joueurs, les entraîneurs, les rencontres, les séances et les compositions d'équipe.

Auteur
Nom : Diawara Kolonkan
Niveau : Licence 3
Faculté : Centre Informatique
Cours : Symfony 7

Fonctionnalités implémentées
Système d’authentification complet avec rôles (ROLE_ADMIN et ROLE_ENTRAINEUR)

CRUD complet des entités

Restrictions d’accès selon le rôle (seul l’administrateur peut créer des utilisateurs ou gérer certaines entités)

Relations entre entités (exemple : joueur lié à une composition, entraîneur lié à séance)

Affichage conditionnel (exemple : validation d’une rencontre)

Action métier : valider une rencontre

Affichage personnalisé selon l’utilisateur connecté

Respect des bonnes pratiques de développement Symfony

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

Captures d’écran
Screenshot 2025-06-20 235617
Screenshot 2025-06-20 235625
Screenshot 2025-06-20 235807
Installation du projet
Cloner le projet
git clone https://github.com/kolonkan/mondevoir_symfony.git
Se déplacer dans le dossier
cd mondevoir_symfony
Installer les dépendances
composer install
Créer la base de données
php bin/console doctrine:database:create
Exécuter les migrations
php bin/console doctrine:migrations:migrate
Lancer le serveur
 php -S localhost:8000 -t public

Accéder à l’application via :
http://localhost:8000

Livraison
Dépôt GitHub du projet : https://github.com/kolonkan/mondevoir_symfony.git
Délai de remise : avant samedi 21/06/2025 à 00h00
