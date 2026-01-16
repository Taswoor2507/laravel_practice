# Todo Application

A simple yet powerful Todo management application built with Laravel 12. This application features user authentication, role-based access control, and a clean interface for managing tasks.

## Features

- **User Authentication**: Register, login, and logout functionality
- **Todo Management**: Create, view, and manage personal todos
- **Role-Based Access**: User and Admin roles with different permissions
- **Admin Dashboard**: Admins can view all todos from all users
- **Responsive Design**: Clean and modern UI using Blade templates
- **Database Migrations**: Proper database structure with relationships

## Tech Stack

- **Backend**: Laravel 12 (PHP 8.2+)
- **Frontend**: Blade Templates, CSS, JavaScript
- **Database**: MySQL/SQLite (configurable)
- **Authentication**: Laravel's built-in authentication system
- **Build Tools**: Vite for asset compilation

## Installation

### Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js and NPM
- Database (MySQL, PostgreSQL, or SQLite)

### Setup Instructions

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd laravel_practice
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure database**
   
   Edit your `.env` file and set up your database connection:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=laravel_todo
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Run migrations**
   ```bash
   php artisan migrate
   ```

6. **Build assets**
   ```bash
   npm run build
   ```

### Quick Setup (Using Composer Scripts)

You can use the built-in setup script to automate the process:

```bash
composer run setup
```

This will install dependencies, set up the environment file, generate the application key, run migrations, and build assets.

## Usage

### Starting the Development Server

1. **Development server with all services**:
   ```bash
   composer run dev
   ```
   This starts:
   - Laravel development server (http://localhost:8000)
   - Queue worker
   - Log viewer
   - Vite development server

2. **Manual server start**:
   ```bash
   php artisan serve
   ```

### Application Routes

- **Home**: `/` - Landing page
- **Register**: `/register` - User registration
- **Login**: `/login` - User login
- **Todos**: `/todos` - User's personal todos (requires authentication)
- **Admin Todos**: `/admin/todos` - All todos (requires admin role)

### User Roles

- **User**: Can only see and manage their own todos
- **Admin**: Can see all todos from all users

### Creating an Admin User

To create an admin user, you can either:

1. **Use the database directly**:
   ```sql
   UPDATE users SET role = 'admin' WHERE email = 'admin@example.com';
   ```

2. **Create a seeder** (recommended for production)

## Database Schema

### Users Table
- `id` - Primary key
- `name` - User name
- `email` - User email (unique)
- `password` - Hashed password
- `role` - User role ('user' or 'admin', default: 'user')
- `email_verified_at` - Email verification timestamp
- `remember_token` - Remember me token
- `created_at`, `updated_at` - Timestamps

### Todos Table
- `id` - Primary key
- `user_id` - Foreign key to users table
- `title` - Todo title/description
- `completed` - Boolean status (default: false)
- `created_at`, `updated_at` - Timestamps

## Testing

Run the test suite:

```bash
composer run test
```

Or manually:

```bash
php artisan test
```

## Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── AuthController.php
│   │   ├── TodoController.php
│   │   └── AdminController.php
│   └── Middleware/
│       └── AdminMiddleware.php
├── Models/
│   ├── User.php
│   └── Todo.php
└── Providers/

database/
├── migrations/
├── seeders/
└── factories/

resources/
├── views/
│   ├── auth/
│   ├── admin/
│   └── layout/
└── css/
└── js/

routes/
└── web.php
```

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Run tests to ensure everything works
5. Submit a pull request

## Security

This application uses Laravel's built-in security features:
- Hashed passwords
- CSRF protection
- Input validation
- SQL injection prevention
- XSS protection

## License

This project is open-sourced software licensed under the MIT license.
