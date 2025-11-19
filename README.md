InsightFlow
Project Overview

InsightFlow is a modern Laravel-based blog platform that allows users to create, edit, and manage posts in multiple languages. The system supports user roles, including admin and regular users, ensuring proper access control for different functionalities. The platform also includes media uploads, translation support, and a clean dashboard interface for managing content.

Features

Multi-language support (English and Arabic)

User authentication and role management (Admin and User)

Create, edit, view, and delete posts

Upload images for posts

User-specific permissions: only admins or post authors can update/delete posts

Clean and responsive dashboard using Blade templates and Tailwind CSS

Category management for posts

reCAPTCHA protection for login

Breadcrumb navigation in the dashboard

Technologies Used

PHP 8

Laravel Framework

MySQL Database

Tailwind CSS for styling

Font Awesome icons

Blade templating engine

Installation

Clone the repository:

git clone https://github.com/YourUsername/InsightFlow.git


Navigate to the project directory:

cd InsightFlow


Install dependencies:

composer install


Copy .env.example to .env and configure your database and environment settings:

cp .env.example .env


Generate the application key:

php artisan key:generate


Run migrations:

php artisan migrate


Start the development server:

php artisan serve

Usage

Admin users can manage all posts and users.

Regular users can create posts and edit only their own posts.

Posts can have multiple translations (English and Arabic) and include images.

The dashboard provides a clean interface to view, edit, or delete posts.

Project Structure

app/Models – Eloquent models for User, Post, and Category

app/Http/Controllers/Dashboard – Controllers for managing the dashboard operations

resources/views/dashboard – Blade templates for admin dashboard and post management

routes/dashboard.php – Routes for the dashboard

public/uploads/posts – Directory for uploaded post images

Contribution

Contributions are welcome. Feel free to open issues or submit pull requests to improve InsightFlow.
