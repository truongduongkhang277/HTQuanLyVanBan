#!/bin/bash
set -e

echo "🚀 Đang khởi tạo môi trường Laravel..."

# 1. Cài Composer nếu chưa có
if ! command -v composer &> /dev/null; then
  echo "⏬ Cài đặt Composer..."
  curl -sS https://getcomposer.org/installer | php
  mv composer.phar /usr/local/bin/composer
fi

# 2. Cài các gói PHP
echo "📦 Cài đặt gói PHP Laravel..."
composer install

# 3. Tạo file .env nếu chưa có
if [ ! -f .env ]; then
  cp .env.example .env
fi

# 4. Generate APP_KEY
php artisan key:generate

# 5. Chạy migrate DB (nếu muốn dùng SQLite chẳng hạn)
php artisan migrate --force || echo "⚠️ Migration lỗi, có thể do DB chưa kết nối."

echo "✅ Laravel đã sẵn sàng."
