LARAVEL CHALLENGE CODE
	This application displays 3 random jokes!
	
Features
	Laravel backend with Blade templates
	Frontend assets bundled using Vite

Requirements
	PHP 8.x
	Composer
	Node.js 18+
	NPM / Yarn
	MySQL 8 (or compatible database)
	Laravel 10

Installation
	Clone the repository:
		git clone https://github.com/jhoezel16/Laravel-Exam.git
	Install PHP dependencies
		composer install
	Install Node.js dependencies
		npm install
		# or yarn
Configuration
	Copy .env.example to .env and update environment variables:
		cp .env.example .env
		php artisan key:generate
		
Update database settings

	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=your_db#I used exam database
	DB_USERNAME=root
	DB_PASSWORD=secret

Authentication (Laravel Sanctum)
	This application uses Laravel Sanctum for API and/or SPA authentication.
	
	Installation (if not yet installed)
		composer require laravel/sanctum
	Publish Sanctum configuration
		php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
	Configuration
		Add Sanctum middleware in app/Http/Kernel.php:
			'api' => [
					\Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
					'throttle:api',
					\Illuminate\Routing\Middleware\SubstituteBindings::class,
				],
	
Running the Application
	Run database migrations
		php artisan migrate	
	Run Seeder
		php artisan db:seed for the default user
	Start Laravel server
		php artisan serve
	Start Vite for development:
	npm run dev
	# or yarn dev

	Visit http://localhost:8000 in your browser.
		
		
Application Usage
	Login
		default password is:admin123
		*application does not support change password or new user creation
