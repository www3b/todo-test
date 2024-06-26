# TODO App

#### 1. Rename .env.example -> .env in the *project* directory


#### 2. Run docker compose command

```bash
docker compose up -d
```

#### 3. Install composer dependencies and run migrations in "app" container

```bash
docker compose exec app composer install
docker compose exec app php artisan migrate
```