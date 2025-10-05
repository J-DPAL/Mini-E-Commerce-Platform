# Mini-E-Commerce-Platform

## Description

**Mini-E-Commerce-Platform** is a web-based application designed to provide essential e-commerce functionalities using a modern PHP and JavaScript stack. Built on the Laravel framework, it leverages Blade for templating, PHP for backend logic, and Vue.js with Tailwind CSS for a responsive frontend. The platform serves as a foundation for online stores, supporting modular development and easy customization.

---

## Features

- **Product Catalog Management**  
  Manage products, categories, and inventory with ease.

- **User Authentication**  
  Secure user registration, login, and profile management.

- **Order Processing**  
  Handle cart, checkout, and order history.

- **Responsive UI**  
  Built with Tailwind CSS and Vue.js for smooth user experience across devices.

- **Admin Dashboard**  
  Tools for managing sales, users, and site content.

---

## Technologies Used

- **Languages:** Blade (59.8%), PHP (39.2%), JavaScript, CSS  
- **Frameworks:** Laravel (PHP), Vue.js (JavaScript)  
- **Styling:** Tailwind CSS, PostCSS  
- **Build Tools:** Laravel Mix, Webpack, Vite  
- **Package Managers:** Composer (PHP), npm (JavaScript)

---

## Folder Structure

```
/
├── composer.json         # PHP dependencies and metadata
├── composer.lock         # Locked PHP dependency versions
├── package.json          # Node.js dependencies and project config
├── package-lock.json     # Locked Node.js dependency versions
├── mix-manifest.json     # Laravel Mix asset manifest
├── postcss.config.js     # PostCSS build config
├── tailwind.config.js    # Tailwind CSS config
├── webpack.mix.js        # Laravel Mix build script
├── laravel/              # Main Laravel application code (controllers, models, views)
├── node_modules/         # JavaScript dependencies (auto-generated, do not edit)
├── vendor/               # PHP dependencies (auto-generated, do not edit)
```

### Key Files & Their Roles

- **composer.json / composer.lock:**  
  Define PHP packages (primarily Laravel and related libraries).

- **package.json / package-lock.json:**  
  Define Node.js packages for frontend tooling (Vue, Tailwind, Mix, etc.).

- **mix-manifest.json:**  
  Asset versioning for Laravel Mix (currently empty or auto-generated).

- **postcss.config.js:**  
  Configures PostCSS plugins (TailwindCSS, Autoprefixer) for CSS compilation.

- **tailwind.config.js:**  
  Declares Tailwind themes, paths, and plugins for utility-first styling.

- **webpack.mix.js:**  
  Laravel Mix build steps: compiles JS/CSS assets and integrates Tailwind/PostCSS.

- **laravel/:**  
  Contains all application logic: routes, controllers, models, views, configs.

- **node_modules/:**  
  Houses all npm dependencies, including Vue.js, Tailwind, and build tools.

- **vendor/:**  
  Houses all PHP/Composer dependencies for Laravel and related packages.

---

## Section Summaries

### laravel/
Central directory for Laravel application. Contains all source code, including controllers (business logic), models (data), views (Blade templates), and configuration. This is where the backend and frontend structure is defined and connected.

### vendor/
Composer-managed directory storing all PHP packages, including Laravel, support libraries, and dependencies for optimal backend performance.

### node_modules/
npm-managed directory storing all frontend dependencies: Vue.js, Tailwind CSS, PostCSS, Webpack, and more. All tools for compiling, bundling, and optimizing frontend assets reside here.

---

## Installation & Setup

### Prerequisites

- PHP >= 8.1
- Node.js >= 14.x and npm >= 6.x
- Composer (PHP package manager)

### Steps

1. **Clone the Repository**
   ```bash
   git clone https://github.com/J-DPAL/Mini-E-Commerce-Platform.git
   cd Mini-E-Commerce-Platform
   ```

2. **Install PHP Dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js Dependencies**
   ```bash
   npm install
   ```

4. **Configure Environment**
   - Copy `.env.example` to `.env`, then set your database and app variables.

5. **Generate App Key**
   ```bash
   php artisan key:generate
   ```

6. **Migrate Database**
   ```bash
   php artisan migrate
   ```

7. **Build Frontend Assets**
   ```bash
   npm run dev
   # Or for production
   npm run prod
   ```

8. **Start the Server**
   ```bash
   php artisan serve
   ```

---

## Usage Example

- Visit `http://localhost:8000` to access the platform.
- Register as a user, browse products, add to cart, and proceed to checkout.
- Admins can log in to manage products, orders, and users.

---

## Contribution Guidelines

1. Fork the repository and create your branch (`feature/your-feature`).
2. Submit a pull request with detailed description.
3. Adhere to project coding standards (PSR-12 for PHP, ESLint for JS).
4. Include unit tests when applicable.
- [J-DPAL](https://github.com/J-DPAL)

---

**Ready to launch your own mini e-commerce site? Get started today!**
