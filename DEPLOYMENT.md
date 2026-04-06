# NSUK CMS Live Deployment & Cloudflare Guide

We are deploying a fully containerized Laravel + Vue Application behind Cloudflare.

## 1. Core Prerequisites
1. **VPS (Virtual Private Server)**: A Linux server running Ubuntu 22.04 or 24.04.
2. **Domain Name**: Registered and accessible.
3. **Cloudflare Account**: For managing DNS and providing Free edge SSL.

## 2. Cloudflare DNS & SSL Setup
1. Log in to [Cloudflare](https://dash.cloudflare.com) and add your domain site.
2. Add your **A Record** pointing to your VPS IP address. Ensure the **Proxy status** is toggled ON (Orange Cloud icon).
3. Navigate to **SSL/TLS** -> **Overview**:
   - Set the encryption mode to **Flexible** if your VPS does not have an SSL loaded yet, or **Full (Strict)** if you will run letsencrypt locally/origin-cert. (For this docker setup on port 80, use **Flexible** and let Cloudflare handle HTTPS edge resolution to users).
4. Navigate to **SSL/TLS** -> **Edge Certificates**:
   - Enable **Always Use HTTPS** to automatically redirect all `http://` traffic to `https://`.
5. Under **Caching** -> **Configuration**:
   - Set Caching Level to **Standard**.
   - Enable **Brotli** compression.

---

## 3. VPS Preparation & Deployment
SSH into your production server and install Docker if you haven't already:
```bash
sudo apt update
sudo apt install docker.io docker-compose -y
```

### 3.1 Clone the Repository
Clone the codebase into your target directory:
```bash
git clone <your-repository-url> /var/www/cscms
cd /var/www/cscms
```

### 3.2 Configure Environment
```bash
cp .env.example .env
nano .env
```
Ensure the following variables are correctly configured for production Docker:
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=cscms_db
DB_USERNAME=cscms_user
DB_PASSWORD=YOUR_SECURE_PASSWORD

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379

QUEUE_CONNECTION=redis
```

### 3.3 Build and Spin Up the Containers
Build and run the stack in detached mode:
```bash
sudo docker-compose up -d --build
```
*Note: This process runs the `Dockerfile` we created, which automatically installs Composer dependencies, Node NPM packages, builds Vite for production, and wires up PHP-FPM / Nginx inside the container.*

### 3.4 First-Time Database Setup on Live 
Since the code is running inside the `cscms_app` container, run migrations and seed the database using Docker Exec:
```bash
sudo docker exec -it cscms_app php artisan key:generate --force
sudo docker exec -it cscms_app php artisan migrate --seed --force
```

### 3.5 Storage Links and Optimizations
Set up your active symlink for images and optimize the Laravel Cache for max performance:
```bash
sudo docker exec -it cscms_app php artisan storage:link
sudo docker exec -it cscms_app php artisan optimize
sudo docker exec -it cscms_app php artisan view:cache
sudo docker exec -it cscms_app chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
```

## 4. Verifying Deploy Success
1. **Frontend Ping**: Visit `https://yourdomain.com` and ensure it resolves correctly.
2. **Access Admin**: Go to `https://yourdomain.com/login` and log in with your seeded Super Admin account to confirm the database seeded successfully.
3. **Queue Diagnostics**: Run `sudo docker exec -it cscms_app supervisorctl status` to verify `laravel-worker` and `nginx` are showing as RUNNING.