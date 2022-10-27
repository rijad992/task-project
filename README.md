
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
