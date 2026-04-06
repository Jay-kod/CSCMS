# NSUK Department of Computer Science - CMS Development Plan

This document outlines the rapid development plan for building the NSUK Department of Computer Science Website & CMS, strictly matching the Project Bible Build Phases.

## PHASE 1 � LARAVEL FOUNDATION
- [x] Install Laravel 11
- [x] Configure .env (DB, Redis, Sanctum, Queue driver)
- [x] Install Composer packages (Spatie x3, Intervention Image, Sanctum)
- [ ] Create all 25 migrations in dependency order
- [ ] Create all Models with relationships defined
- [ ] Create Seeders (roles, super admin user, default site settings)
- [ ] Run migrations & seeders

## PHASE 2 � API LAYER
- [ ] Create all public GET endpoints
- [ ] Create all admin CRUD endpoints (protected)
- [ ] Create all super admin CRUD endpoints (protected)
- [ ] Create Form Request validation classes
- [ ] Create API Resource classes (consistent JSON)
- [ ] Add Redis caching to all GET endpoints
- [ ] Set up queue jobs (image processing, cache clearing)

## PHASE 3 � AUTHENTICATION
- [ ] Login endpoint (returns Sanctum token)
- [ ] Logout endpoint
- [ ] Forgot/reset password flow
- [ ] Role-based redirect after login

## PHASE 4 � SUPER ADMIN DASHBOARD
- [ ] Install Vue 3 + all NPM packages
- [ ] Configure Tailwind CSS + daisyUI
- [ ] Configure Google Fonts (Inter + Merriweather)
- [ ] Set up Vue Router with all named routes
- [ ] Set up Pinia stores (auth, notifications, settings)
- [ ] Configure Axios interceptors
- [ ] Configure SweetAlert2 global green/white theme
- [ ] Initialize AOS
- [ ] Build SuperAdminLayout.vue (sidebar + topbar + bell)
- [ ] Build all shared management components
- [ ] Build exclusive super admin components (users, settings, logs, roles)

## PHASE 5 � ADMIN DASHBOARD
- [ ] Build AdminLayout.vue (scoped sidebar � no exclusive items)
- [ ] Wire all shared components to /admin/... routes
- [ ] Test role permissions (admin cannot access super-admin routes)

## PHASE 6 � PUBLIC WEBSITE
- [ ] Build PublicLayout.vue (navbar + footer)
- [ ] Build GSAP preloader in App.vue
- [ ] Build all 19 public pages
- [ ] Wire AOS scroll animations (staggered card entrance)
- [ ] Wire Swiper.js carousels (hero, news, events, gallery)
- [ ] Build guest reactions & comments on news article page
- [ ] Test all public API data consumption

## PHASE 7 � POLISH & DEPLOY
- [ ] SEO meta tags populated from site_settings
- [ ] Mobile responsiveness audit (test at 375px)
- [ ] Performance testing (Lighthouse score)
- [ ] Redis cache verification under load
- [ ] Set up Docker + Nginx on VPS
- [ ] Configure Cloudflare DNS + SSL
- [ ] Deploy & go live
