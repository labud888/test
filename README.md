Test
 -PHP Developer Assignment Request - Pirate Technologies

 Installing

 With Git: Clone the repository git clone https://github.com/labud888/test

 1. Run composer update to install dependencies
 2. Configure .env file with your credentials (rename .env.example to .env)
 3. Run php artisan key:generate
 4. Change emails in config/constants for manager and moderator to live test
 5. Create database 'story'
 6. Run php artisan migrate:refresh --seed // to create and fill db tables 
 7. Run composer dump-autoload
 8. Run php artisan serve. This command will start a development server at http://localhost:8000:
