# 📌 Gestion de Cours en Ligne

## 📝 Description
Cette application web, développée avec Laravel, permet aux professeurs d'ajouter et de gérer leurs cours en ligne. Chaque cours est associé à une vidéo explicative et une description détaillée.

## 🚀 Fonctionnalités
- 📚 **Gestion des cours** : ajout, modification, suppression  
- 🎥 **Ajout de vidéos** pour chaque cours  
- 🔐 **Authentification des professeurs**  
- 📊 **Interface intuitive** pour consulter et gérer les cours  

## 🛠 Technologies utilisées
- **Framework** : Laravel 10  
- **Langage** : PHP 8.2  
- **Base de données** : MySQL  
- **Front-end** : Blade, Bootstrap  

## 📂 Installation
1. **Cloner le projet**  
   ```bash
   git clone https://github.com/aya-sahmi/gestion-cours-laravel.git
   cd gestion-cours-laravel
   ```

2. **Installer les dépendances**  
   ```bash
   composer install
   ```

3. **Configurer l’environnement**  
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configurer la base de données**  
   - Modifier le fichier `.env` avec les identifiants MySQL  
   - Lancer la migration :  
     ```bash
     php artisan migrate
     ```

5. **Lancer le serveur local**  
   ```bash
   php artisan serve
   ```

