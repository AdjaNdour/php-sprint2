Projet E-Wallet - Partie A
Présentation

Ce projet consiste à développer un système de gestion de portefeuille électronique (E-Wallet) en PHP procédural.

Cette application en mode console permet à l'utilisateur d'effectuer les principales opérations liées à la gestion d'un portefeuille électronique grâce à un menu interactif.

La première partie du projet est entièrement réalisée en PHP procédural, conformément aux contraintes et aux spécifications imposées.

Réalisé par

Nom Complet : Adja Coura Ndour.

Objectifs

L'application permet de :

    Créer un wallet
    Effectuer un dépôt
    Effectuer un retrait
    Consulter les transactions
    Quitter l'application
    Architecture

Le projet est composé des fichiers suivants :

    index.php
    controller.php
    services.php
    repository.php
    validator.php
    Description des fichiers
    index.php

Point d'entrée de l'application.

    Affiche le menu
    Gère la boucle principale
    Lit le choix de l'utilisateur
    controller.php

Intermédiaire entre l'utilisateur et les services.

Récupère les saisies
Appelle les traitements nécessaires
services.php

Contient la logique métier.

    Création d'un wallet
    Dépôt
    Retrait
    Calcul des frais
    repository.php

Gère les données de l'application.

    Stockage des wallets
    Stockage des transactions
    Recherche et mise à jour des données
    validator.php

Contient toutes les fonctions de validation.

    Validation des téléphones
    Validation des montants
    Validation des soldes
    Vérification de l'unicité
    Contraintes techniques

Cette partie respecte les contraintes suivantes :

PHP procédural uniquement
Aucune classe
Aucun namespace
Aucun framework
Aucune fonction native de manipulation des tableaux (array_push, array_filter, array_search, etc.)
Utilisation de boucles et de structures conditionnelles uniquement
Fonctionnalités
1. Création d'un wallet
    Saisie du numéro de téléphone
    Saisie du nom
    Saisie du solde initial
    Saisie du code secret
Vérification des règles de gestion
2. Dépôt
    Recherche du wallet
    Vérification du montant
    Mise à jour du solde
    Enregistrement de la transaction
3. Retrait
    Recherche du wallet
    Calcul automatique des frais
    Vérification du solde disponible
    Mise à jour du solde
    Enregistrement de la transaction
4. Consultation des transactions

Affichage de l'historique des opérations effectuées.

Lancement du projet

Depuis le terminal :

php index.php
Git

Le projet est développé avec Git.

    Branches utilisées
    main
    develop-partA
    feature/*
Convention des commits
    feat
    fix
    refactor
    docs