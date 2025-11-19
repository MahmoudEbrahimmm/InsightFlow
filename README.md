InsightFlow
Project Overview

InsightFlow is a modern blogging platform designed for sharing ideas, stories, and knowledge with ease. Its clean design and robust content management features empower writers and readers to engage with meaningful content seamlessly. The platform supports multiple languages, user roles, and media uploads, making it ideal for professional blogging and community-driven content.

Key Features

Multi-language support (English & Arabic)

Role-based access: Admin and regular users

Create, edit, view, and delete posts

Media uploads for posts (images)

User-specific permissions: only authors or admins can modify posts

Clean and responsive dashboard for managing content

Category management for better organization

reCAPTCHA protection for secure login

Technologies Used

PHP 8 & Laravel Framework

MySQL Database

Blade Templating Engine

Tailwind CSS for styling

Font Awesome icons

Installation

Clone the repository:

git clone https://github.com/MahmoudEbrahimmm/InsightFlow.git


Navigate to the project directory:

cd InsightFlow


Install dependencies:

composer install


Copy .env.example to .env and configure your database:

cp .env.example .env


Generate the application key:

php artisan key:generate


Run migrations:

php artisan migrate


Start the server:

php artisan serve

Usage

Admins can manage all posts and users.

Regular users can create and manage only their own posts.

The dashboard provides a streamlined interface for content management.

Posts can include images and support translations.

Project Structure

app/Models – User, Post, Category models

app/Http/Controllers/Dashboard – Dashboard controllers

resources/views/dashboard – Blade templates

routes/dashboard.php – Admin routes

public/uploads/posts – Uploaded post images

Contribution

Contributions are welcome. Open issues or submit pull requests to improve InsightFlow.
