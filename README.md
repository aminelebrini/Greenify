<img src="https://www.unimedia.tech/wp-content/uploads/2023/11/2560px-Logo.min_.svg_-1024x297.png">

# 🌿 Greenify - Eco-friendly E-commerce API

## 📝 Project Presentation
**Greenify** is an API-first e-commerce platform designed for the modern "Green" economy. Developed as a professional brief at **YouCode**, this project focuses on building a robust backend capable of handling complex inventory, real-time cart management, and secure transaction histories. 

The core mission of Greenify is to provide a seamless shopping experience while maintaining strict data integrity between products, user sessions (Carts), and final financial records (Orders).

---

## 🏗️ Architecture & Design (UML)

The project is built following a strict design phase to ensure scalability and clean code.

### 1. Use Case Diagram
The system distinguishes between two primary actors:
* **Customer (User):** Manages their profile, browses the eco-catalog, handles their **Shopping Cart** (Add/Update/Delete), and performs **Checkout**.
* **Administrator:** Manages the inventory (Full CRUD on **Products** and **Categories**), monitors global orders, and manages user roles.

### 2. Class Diagram Logic
* **Cart vs. Order Separation:** We implemented a clear distinction between a temporary **Cart** (volatile session data) and a permanent **Order** (immutable historical record).
* **Association Classes:** Both `cart_items` and `order_items` act as pivot tables with extra attributes like `quantity`.
* **The "Price Snapshot" Pattern:** To ensure financial accuracy, the `order_items` table stores the `unit_price` at the exact moment of purchase. This prevents future product price changes from altering historical invoice data.

---

## 🛠️ Technical Stack

* **Framework:** Laravel 11/13 (PHP 8.2+)
* **Database:** PostgreSQL (Containerized via Docker)
* **Authentication:** Laravel Sanctum (Stateful/Token-based)
* **Testing:** Pest PHP (Feature & Unit Testing)
* **UI Components:** Tailwind CSS (for frontend integration)

---

## 💻 CLI Commands (Quick Reference)

### Docker Management
```bash
# Start the containers (Background)
docker-compose up -d

# Stop and remove containers
docker-compose down

# Run migrations and seed the database with initial data
php artisan migrate --seed

# Refresh the entire database (Warning: Deletes data)
php artisan migrate:fresh
```
Development & Testing
```Bash
# Run all automated tests (Pest)
php artisan test

# Clear application cache
php artisan optimize:clear

# List all registered API routes
php artisan route:list
```
* Clone Project
```Bash
git clone https://github.com/aminelebrini/Greenify.git
cd greenify
```
👨‍💻 Author
Amine Lebrini Full-stack Developer & Student at YouCode / Protfolio : https://amine-lebrini.pages.dev/
