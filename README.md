
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
