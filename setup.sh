#!/bin/bash
set -e

echo "🚀 Đang khởi tạo môi trường Laravel..."

# Cài đặt Composer nếu cần
if ! command -v composer &> /dev/null; then
  echo "⏬ Cài Composer..."
  curl -sS https://getcomposer.org/installer | php
  mv composer.phar /usr/local/bin/composer
fi

# Cài gói PHP
echo "📦 Cài gói backend PHP..."
composer install --no-interaction --prefer-dist

# Cài Node modules nếu có package.json
if [ -f package.json ]; then
  echo "📦 Cài frontend (npm)..."
  npm install
  npm run dev || echo "⚠️ Không thể biên dịch frontend."
fi

# Tạo file .env nếu chưa có
if [ ! -f .env ]; then
  cp .env.example .env
fi

# Khởi tạo khóa ứng dụng Laravel
php artisan key:generate

# (Tuỳ chọn) Migrate DB nếu muốn dùng SQLite
# touch database/database.sqlite
# php artisan migrate --force

echo "✅ Laravel đã sẵn sàng."
