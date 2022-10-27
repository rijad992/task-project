
## Requirements

- Docker
- Node v16+

## Project info

- Project is using lavarel framework for backend built from docker image using sail.
- Frontend is using Vue3 with typescript and composition API.
- Vue rontend is contained inside `frontend` directory
- Database used is sqLite seeded from provided csv file.

### Project setup

- Clone repository:
`git clone`

- Change to project directory
`cd task-app`

- Rename `.env.example` to `.env`
- Exposed port for backend is `8000`.
- If backend port change is required, `apiUrl` will require change in `task-project/frontend/src/config.ts`

- Install composer dependencies
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```
More info: `https://laravel.com/docs/8.x/sail#installing-composer-dependencies-for-existing-projects`

- Build lavarel project and start container
`./vendor/bin/sail up`

- Run migrations and seed database
`./vendor/bin/sail php artisan migrate --seed`

- Type `yes` when prompted for creating `database.sqlite`

- Serve laravel backend
`./vendor/bin/sail php artisan serve`

- Change to frontend directory `/task-app/frontend`

- Install dependencies
`npm i`

- Serve frontend
`npm run dev`
