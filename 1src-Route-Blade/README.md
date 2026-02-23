# MegaShop

Un site web statique d'e-commerce proposant des produits électroniques et électroménagers.

# Laravel - Travail à faire

Objectif : migrer et enrichir le site statique en une application Laravel fonctionnelle:

1. Initialisation
	- Créer le projet Laravel : `laravel new megashop`
	- Générer la clé : `php artisan key:generate`

3. Routes
	- Ajouter routes web dans `routes/web.php` (accueil, catégories, produit, contact, cgv)

4. Vues Blade
	- Créer `resources/views/layouts/app.blade.php` contenant la structure générale
	- Créer `resources/views/partials/header.blade.php` contenant le header du site
	- Créer `resources/views/partials/footer.blade.php` contenant le footer du site
	- Convertir les pages statiques en vues Blade : index, catégories, produit-detail, cgv, contact

5. contrôleurs
	- Créer le contrôleur : `ShopController` concernant les routes de `accueil`, `contact`, `cgv`
	- Créer le contrôleur : `ProductController` concernant les routes des `catégories`et `produit`

6. Vues Blade - data & Link
	- dynamiser l'affichage des vues avec les données du fichiers data.php
    - en utilisant les routes du web.php, dynamiser les liens figurants dans les vues

# Source - Site Web Statique

## 📁 Structure du Projet

```
srcRouting/
├── index.html                          # Page d'accueil
├── css/
│   └── style.css                       # Feuille de styles CSS
├── pages/
│   ├── informatique.html               # Catégorie Informatique
│   ├── petit-electromenager.html       # Catégorie Petit Électroménager
│   ├── grand-electromenager.html       # Catégorie Grand Électroménager
│   ├── produit-detail.html             # Détail d'un produit
│   ├── cgv.html                        # Conditions Générales de Vente
│   └── contact.html                    # Page de Contact
└── images/                             # Dossier pour les images (à compléter)
```

## 📄 Pages du Site

### 1. **Accueil (index.html)**
- Présentation du site avec un héros attractif
- Grille des 3 catégories de produits
- Produits en vedette

### 2. **Informatique (pages/informatique.html)**
- Liste de 8 produits informatiques
- Ordinateurs portables, desktops, tablettes, accessoires
- Fil d'Ariane pour la navigation

### 3. **Petit Électroménager (pages/petit-electromenager.html)**
- Liste de 9 produits petit électroménager
- Cafetière, grille-pain, mixeur, robot culinaire, etc.
- Grille de produits responsive

### 4. **Grand Électroménager (pages/grand-electromenager.html)**
- Liste de 9 produits grand électroménager
- Réfrigérateur, lave-linge, lave-vaisselle, climatiseur, etc.
- Navigation cohérente

### 5. **Détail Produit (pages/produit-detail.html)**
- Affichage détaillé d'un produit
- Image en grand formato
- Caractéristiques techniques complètes
- Ports et connexions
- Produits similaires
- Informations de livraison et garantie

### 6. **CGV (pages/cgv.html)**
- Conditions Générales de Vente complètes
- 12 sections couvrant tous les aspects légaux
- Livraison, paiement, retours, garantie
- Informations de contact

### 7. **Contact (pages/contact.html)**
- Formulaire de contact complet
- Coordonnées de l'entreprise
- Horaires d'ouverture
- Réseaux sociaux
- FAQ (Questions fréquemment posées)
- Localisation

## 🚀 Utilisation

1. Ouvrir `index.html` dans un navigateur web
2. Naviguer entre les pages via le menu
3. Cliquer sur les produits pour voir les détails
4. Utiliser le formulaire de contact pour envoyer un message
5. Consulter les CGV pour plus d'informations

## 📝 Notes

- Les images sont des placeholders (à remplacer par de vraies images)
- Le formulaire de contact est un élément HTML (non fonctionnel sans backend)
- Le site est entièrement statique - aucun serveur requis
- Peut être facilement déployé sur un serveur web statique


**MegaShop &copy; 2026 - Tous droits réservés**
