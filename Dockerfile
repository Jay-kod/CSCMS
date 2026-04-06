FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nginx \
    supervisor \
    libpq-dev \
    default-mysql-client \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Setup working directory
WORKDIR /var/www

# Copy codebase
COPY . /var/www

# Install composer dependencies
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Install node
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && npm install \
    && npm run build

# Clear caches and set permissions
RUN php artisan optimize:clear \
    && php artisan storage:link \
    && chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Copy Nginx Configuration
COPY docker/nginx.conf /etc/nginx/sites-available/default

# Copy Supervisor Configuration (for workers/queue/redis etc if needed)
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Expose ports
EXPOSE 80

# Start Supervisor (which starts nginx and php-fpm)
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
