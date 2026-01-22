# Le Restaurant des Plantes 🌿

[![Symfony](https://img.shields.io/badge/Symfony-6.4-000000?style=for-the-badge&logo=symfony&logoColor=white)](https://symfony.com/)
[![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net/)
[![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-3.0+-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com/)
[![License](https://img.shields.io/badge/License-Proprietary-red?style=for-the-badge)](LICENSE)

Bienvenue sur le dépôt du site officiel du **Restaurant des Plantes**. Une application web élégante conçue pour offrir une expérience gastronomique numérique à la hauteur de l'établissement.

---

## ✨ Points Forts du Projet

- **🍽️ Gestion de la Carte** : Un système dynamique pour présenter les mets et les menus d'exception.
- **🍷 Cave à Vins** : Showcase de la sélection soignée du sommelier.
- **👨‍🍳 Cours de Cuisine** : Modules de réservation et présentation des ateliers culinaires.
- **📧 Communication Intégrée** : Formulaire de contact robuste avec notifications par email.
- **�️ Back-Office Puissant** : Administration simplifiée via EasyAdmin 4 pour une autonomie totale du restaurateur.

## 🛠️ Stack Technique

### Backend
- **Core** : Symfony 6.4 (LTS)
- **Base de données** : PostgreSQL / MySQL (Doctrine ORM)
- **Administration** : EasyAdmin Bundle 4
- **Sécurité** : Symfony Security (Firewalls, Guard)

### Frontend
- **Design** : Tailwind CSS (via SymfonyCast TailwindBundle)
- **Moteur de rendu** : Twig with Component architecture
- **Images** : LiipImagineBundle pour l'optimisation des performances (Lazy loading & resizing)

---

## 🚀 Installation Locale

### Prérequis
- **PHP** 8.1 ou supérieur
- **Composer**
- **Docker** (recommandé pour la base de données)
- **Symfony CLI**

### Étapes d'installation

1. **Clonage du projet** :
   ```bash
   git clone <url-du-depot>
   cd restaurantdesplantes
   ```

2. **Installation des dépendances** :
   ```bash
   composer install
   ```

3. **Environnement** :
   Configuration de la base de données dans `.env.local`
   ```bash
   cp .env .env.local
   ```

4. **Base de données** :
   ```bash
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate
   ```

5. **Interface Graphique (Assets)** :
   Compiler les styles Tailwind :
   ```bash
   php bin/console tailwind:build --watch
   ```

6. **Démarrage** :
   ```bash
   symfony serve -d
   ```

---

## 🔐 Administration

L'accès à l'interface de gestion se fait via :
```
URL : http://localhost:8000/admin
```
*Note : Un compte utilisateur avec le rôle `ROLE_ADMIN` est requis.*

## 📂 Structure du Projet

- `src/Controller/Admin/` : Contrôleurs d'administration (Dashboards & CRUD).
- `templates/` : Architecture Twig modulaire.
- `migrations/` : Suivi historique de la structure de données.
- `public/` : Point d'entrée et assets compilés.

---

Projet développé avec passion pour **Le Restaurant des Plantes**. 🌿
