<h1 align="center">Autoverse</h1>

<p align="center">
  <strong>A modern automotive business management platform</strong>
</p>

<p align="center">
  <a href="#features">Features</a> •
  <a href="#getting-started">Getting Started</a> •
  <a href="#contributing">Contributing</a>
</p>

---

## Overview

Autoverse is a comprehensive automotive dealership management system built with Laravel. It provides tools for inventory management, customer relationships, and sales tracking.

## Features

- **Vehicle Inventory** — Manage car listings with photos and specifications
- **Customer Management** — Track customer information and purchase history
- **Sales Dashboard** — Monitor sales performance and analytics
- **Inquiry System** — Handle customer inquiries and test drive requests
- **Admin Panel** — Complete administrative controls
- **Responsive Design** — Mobile-friendly interface

## Tech Stack

- **Framework:** Laravel 10.x
- **PHP:** 8.2+
- **Database:** MySQL 8.0
- **Cache/Queue:** Redis 7
- **Web Server:** Nginx
- **Containerization:** Docker & Docker Compose

## Getting Started

### Prerequisites

- Docker Desktop
- Git

### Quick Start

```bash
# Clone the repository
git clone https://github.com/dhtml/autoverse.git
cd autoverse

# Install with Make
make install

# Or manually
cp .env.example .env
docker compose up -d --build
docker compose exec app composer install
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate --seed
```

Access the application at http://localhost:8080

### Commands

```bash
make dev      # Start development
make down     # Stop containers
make logs     # View logs
make shell    # App shell access
make fresh    # Fresh migration
make test     # Run tests
```

### Environment

```env
APP_NAME=Autoverse
DB_HOST=mysql
DB_DATABASE=autoverse
REDIS_HOST=redis
CACHE_DRIVER=redis
```

## Project Structure

```
blessedcjauto/
├── app/
│   ├── Http/Controllers/
│   ├── Models/
│   └── Services/
├── config/
├── database/
│   ├── migrations/
│   └── seeders/
├── docker/
├── resources/views/
├── routes/
└── tests/
```

## Contributing

1. Fork the repository
2. Create feature branch (`git checkout -b feature/amazing`)
3. Commit changes (`git commit -m 'Add feature'`)
4. Push (`git push origin feature/amazing`)
5. Open Pull Request

## License

MIT License - see [LICENSE](LICENSE)
