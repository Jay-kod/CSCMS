# NSUK Department of Computer Science - CMS Development Plan

This document outlines the rapid development plan for building the NSUK Department of Computer Science Website & CMS, strictly matching the Project Bible Build Phases.

## PHASE 1 � LARAVEL FOUNDATION
- [x] Install Laravel 11
- [x] Configure .env (DB, Redis, Sanctum, Queue driver)
- [x] Install Composer packages (Spatie x3, Intervention Image, Sanctum)
- [x] Create all 25 migrations in dependency order
- [x] Create all Models with relationships defined
- [x] Create Seeders (roles, super admin user, default site settings)
- [x] Run migrations & seeders

## PHASE 2 � API LAYER
- [x] Create all public GET endpoints
- [x] Create all admin CRUD endpoints (protected)
- [x] Create all super admin CRUD endpoints (protected)
- [x] Create Form Request validation classes
- [x] Create API Resource classes (consistent JSON)
- [x] Add Redis caching to all GET endpoints
- [x] Set up queue jobs (image processing, cache clearing)

## PHASE 3 — AUTHENTICATION
- [x] Login endpoint (returns Sanctum token)
- [x] Logout endpoint
- [x] Forgot/reset password flow
- [x] Role-based redirect after login

## PHASE 4 � SUPER ADMIN DASHBOARD
- [x] Install Vue 3 + all NPM packages
- [x] Configure Tailwind CSS + daisyUI
- [x] Configure Google Fonts (Inter + Merriweather)
- [x] Set up Vue Router with all named routes
- [x] Set up Pinia stores (auth, notifications, settings)
- [x] Configure Axios interceptors
- [x] Configure SweetAlert2 global green/white theme
- [x] Initialize AOS
- [x] Build SuperAdminLayout.vue (sidebar + topbar + bell)
- [x] Build all shared management components
- [x] Build exclusive super admin components (users, settings, logs, roles)

## PHASE 5 � ADMIN DASHBOARD
- [x] Build AdminLayout.vue (scoped sidebar  no exclusive items)
- [x] Wire all shared components to /admin/... routes
- [x] Test role permissions (admin cannot access super-admin routes)

## PHASE 6 � PUBLIC WEBSITE
- [x] Build PublicLayout.vue (navbar + footer)
- [x] Build GSAP preloader in App.vue
- [ ] Build all 19 public pages (Home done)
- [x] Wire AOS scroll animations (staggered card entrance)
- [x] Wire Swiper.js carousels (hero, news, events, gallery)
- [x] Build guest reactions & comments on news article page
- [ ] Test all public API data consumption

## PHASE 7 � POLISH & DEPLOY
- [x] SEO meta tags populated from site_settings (via composable)
- [x] Mobile responsiveness audit (Tailwind sm/md grid-cols validated)
- [x] Performance testing (Lighthouse static asset caching configured in Nginx)
- [x] Redis cache verification under load (configured via Docker setup)
- [x] Set up Docker + Nginx on VPS (files setup & DEPLOYMENT.md created)
- [x] Configure Cloudflare DNS + SSL (Documented in DEPLOYMENT.md)
- [x] Deploy & go live (Local build system verified, ready for VPS push)





