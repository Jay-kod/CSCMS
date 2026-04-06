<h1 align="center">NSUK Department of Computer Science CMS</h1>

<p align="center">
  <strong>A modern, headless-style Laravel 11 & Vue 3 Content Management System for Nasarawa State University, Keffi.</strong>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11-FF2D20?style=for-the-badge&logo=laravel" alt="Laravel">
  <img src="https://img.shields.io/badge/Vue.js-3-4FC08D?style=for-the-badge&logo=vue.js" alt="Vue 3">
  <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css" alt="Tailwind">
  <img src="https://img.shields.io/badge/Docker-2496ED?style=for-the-badge&logo=docker" alt="Docker">
  <img src="https://img.shields.io/badge/Status-Production_Ready-success?style=for-the-badge" alt="Status">
</p>

---

## 📖 Overview

The **NSUK Computer Science CMS** is a comprehensive, full-stack web application designed to manage the department's public presence and internal data workflows. Built on the bleeding edge of PHP and JavaScript ecosystems, it features a **Headless API architecture** serving a blazing fast **Single Page Application (SPA)**.

From managing student reading materials and displaying complex academic hierarchies (HODs, Staff, Programs), to publishing real-time news and interacting with guests, the system provides an intuitive experience for users and deep administrative controls.

## ✨ Key Features

### 🏢 Department & Association Management
- Complete hierarchy support: Department -> Sub-Departments -> Programmes -> Courses -> Resources.
- Detailed Staff and Head of Department (HOD) profile management.
- Dynamic FYP (Final Year Project) and SIWES documentation repositories.
- Dedicated scopes for **Student Association (NACOSS)** executives, gallery, and news.

### 📰 Dynamic News & Content Engine
- Admin rich-text content publishing for News, Events, and Announcements.
- Automated API endpoints for guest user **reactions** and **comments** tracking.
- Dynamic Hero Banners and programmatic UI alerts via SweetAlerts.

### 🔐 Powerful Authorization & Audit
- **Strict Role-Based Access Control (RBAC):** Configured via Spatie explicitly for mapping `super_admin` vs `dept_admin` boundaries.
- **API Token Authentication:** SPA state management authorized via Laravel Sanctum.
- Global Action Logging & centralized System Setting controls.

### ⚡ Blazing Performance & UX
- Redis-driven persistent query caching for instantaneous data delivery.
- Background Jobs & Queues (Image Processing, Cache Busting) handled via Supervisor.
- Built strictly **Mobile-First** natively verified via automated Tailwind layout tests.

---

## 🛠 Tech Stack

**Backend (API & Services):**
- PHP 8.3 / Laravel 11
- MySQL (or SQLite for automated testing workflows)
- Redis Server (Queues & Component Caching)
- Laravel Sanctum (Stateless API Auth)
- Spatie Permissions (RBAC) & Intervention Image

**Frontend (SPA):**
- Vue 3 (Composition API)
- Vite (HMR Build Tooling)
- Pinia (Centralized State Management)
- Tailwind CSS & daisyUI component library
- SweetAlert2 & Vue3 Toastify (Visual Notifications)

**DevOps & Infrastructure:**
- Docker & Docker Compose (Containerized Stacks)
- Custom raw Nginx configs & Worker Supervisor hooks

---

## 🚦 Getting Started (Local Development)

Follow these steps to set up the project on your local machine using standard artisan/npm combinations.

### Prerequisites
- PHP >= 8.2 & Composer
- Node.js >= 18 & NPM
- Redis (Optional, but recommended for Queues)
- MySQL / SQLite

### Installation Process

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/your-username/nsuk-cscms.git
   cd nsuk-cscms
   ```

2. **Install Backend Dependencies:**
   ```bash
   composer install
   ```

3. **Install Frontend Dependencies:**
   ```bash
   npm install
   ```

4. **Environment Setup:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   *Edit `.env` to configure your specific database & redis connections.*

5. **Run Migrations & Database Seeders:**
   *(Note: This seeds the required Super Admin account and RBAC roles.)*
   ```bash
   php artisan migrate --seed
   ```

6. **Serve the Application:**
   Spin up two terminals, one for Vite and one for Laravel:
   ```bash
   # Terminal 1 - Frontend Hot Module Reloading
   npm run dev

   # Terminal 2 - Backend API Server
   php artisan serve
   ```
   *The application will now be available at `http://localhost:8000`.*

---

## 🧪 Automated Testing

The platform maintains extensive programmatic regression barriers. It leverages dynamic analysis mapped to API endpoints and layout grids.

```bash
# Run the complete test suite
php artisan test
```

**Key Test Suites Included:**
- `Feature\ApiHealthTest`: Dynamically crawls and hits all 44+ API endpoints asserting safety against 500 fatal errors.
- `Feature\MobileResponsivenessAuditTest`: Statically crawls `.vue` nodes globally ensuring Tailwind CSS mobile-first grid prefixes exist.
- `Feature\SystemAuditTest`: Asserts lifecycle tests strictly simulating unauthorized admin privilege expansions and lifecycle content flows.
- `Feature\ErrorHandlingTest`: Ensures JSON API standardization when unhandled code exceptions throw 500s or 404s.
- `Feature\AlertConfirmationResponseTest`: Asserts strict Vue interceptor formatting mapped to Axios SweetAlerts.

---

## 🐳 Live Deployment & Docker

The repository comes pre-packaged with production-ready `Dockerfile` and `docker-compose.yml` wrappers to auto-build Vue dists and configure Nginx / PHP-FPM without relying on local node environments on VPS instances.

For comprehensive deployment instructions, Cloudflare SSL configurations, and Docker spinning details, refer to the **[DEPLOYMENT.md](DEPLOYMENT.md)** documentation.

---

## 📝 License

The NSUK Department of Computer Science CMS is proprietary software built for the institution. External distributions require explicit educational clearances.
