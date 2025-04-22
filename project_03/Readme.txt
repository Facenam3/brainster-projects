This is admin panel for MHRA website project

My project generates admin panel for the main project so you can control everything into the website you are having.

##Tehnologies Used
-**Backend:** - Laravel 11 / Laravel Breeze
-**Database:** - Mysql
-**Styling:** - Tailwind Css


##Installation

Follow this steps to set your project locally:

1.Clone the repository:
```bash/terminal:

git clone https://git.brainster.co/Dalibor.Jovanovski-FS16/brainsterprojects_daliborjovanovskifs16.git..


2.After clonning you have to set up the composer dependencies so add this into ur bash/terminal:

composer install

3.After installing the composer you have to instal npm packages also

npm install

4.When you finish with this installations you have to configure your .env.example file or your .env file. You have to set up your connection
with your database into ur mysql/sqlite:
DB_CONNECTION=mysql //depends what are you using mysql/sqlite/etc..
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel-mhra //your database name
DB_USERNAME=root
DB_PASSWORD=

5.Update migrations: Because I'm using some packages that require specific setup, follow these steps carefully:

Navigate to database/migrations/dd_country_id_to_users_table.php and delete this migration.

Run the following commands:

1. php artisan migrate:fresh
2. php artisan db:seed  
3. php artisan db:seed --class=WorldSeeder

then you have to create new migration:

php artisan make:migration add_country_id_to_users_table

When you finish making this migration find that migration and add the following code 

 public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
           $table->foreignId('country_id')->nullable()->after('title')->constrained('countries')->onDelete('cascade');
        });
    }

Run migrations again: Finally, run the migrations:

php artisan migrate

This should give you all the setup so you can check my project localy to you working envirement
