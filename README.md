# Simple Auth List Rest API
This simple project is created using [laravel 11](https://laravel.com) framework

## Postman Collection
https://github.com/rasyid46/laravel11-auth/blob/main/Basic%20Auth.postman_collection.json
## Installation
Use CMD or Terminal and clone this repo:

1. Clone or Download This Repo:
```bash
$ git clone  https://github.com/rasyid46/laravel11-auth.git
```

2. After Cloning this Repo, you must to install package depencies use composer on terminal

```composer_install
$ composer install
```

3. Create Your Database on mysql or pgsql
4. Create your Environment file, copy .env.example and edit the parts listed below, after that save as .env
```env
...

DB_CONNECTION=mysql or pgsql
DB_HOST=127.0.0.1
DB_PORT=3306 for mysql or 5432 for pgsql
DB_DATABASE=your_database
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

...
```

5. Generate Laravel Key
```bash
$ php artisan key:generate
```
6. Publish the Config JWT-Auth:
```python
$ php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
```
7. Generate JWT Key:
```bash
$ php artisan jwt:secret
```
8. Migrate Database Tables:
```bash
$ php artisan migrate
```
9. Create seed data:
```bash
$ php artisan db:seed
```
10. Run project:
```bash
$ php artisan serve
```
11. Check API route list
```bash
$ php artisan route:list
+--------+----------+---------------------+------+------------------------------------------------------------+----------------------------------+
| Domain | Method   | URI                 | Name | Action                                                     | Middleware                       |
+--------+----------+---------------------+------+------------------------------------------------------------+----------------------------------+
|        | GET|HEAD | /                   |      | Closure                                                    | web                              |
|        | POST     | api/auth/login      |      | App\Http\Controllers\AuthController@login                  | api                              |
|        | POST     | api/auth/logout     |      | App\Http\Controllers\AuthController@logout                 | api                              |
|        |          |                     |      |                                                            | App\Http\Middleware\ApiHasAccess |
|        | POST     | api/auth/me         |      | App\Http\Controllers\AuthController@me                     | api                              |
|        |          |                     |      |                                                            | App\Http\Middleware\ApiHasAccess |
|        | POST     | api/auth/refresh    |      | App\Http\Controllers\AuthController@refresh                | api                              |
|        |          |                     |      |                                                            | App\Http\Middleware\ApiHasAccess |
|        | POST     | api/todo            |      | App\Http\Controllers\TodoController@createAction           | api                              |
|        |          |                     |      |                                                            | App\Http\Middleware\ApiHasAccess |
|        | GET|HEAD | api/todo            |      | App\Http\Controllers\TodoController@index                  | api                              |
|        |          |                     |      |                                                            | App\Http\Middleware\ApiHasAccess |
|        | GET|HEAD | api/todo/{id}       |      | App\Http\Controllers\TodoController@readAction             | api                              |
|        |          |                     |      |                                                            | App\Http\Middleware\ApiHasAccess |
|        | PUT      | api/todo/{id}       |      | App\Http\Controllers\TodoController@updateAction           | api                              |
|        |          |                     |      |                                                            | App\Http\Middleware\ApiHasAccess |
|        | DELETE   | api/todo/{id}       |      | App\Http\Controllers\TodoController@deleteAction           | api                              |
|        |          |                     |      |                                                            | App\Http\Middleware\ApiHasAccess |
|        | POST     | api/user            |      | App\Http\Controllers\AuthController@login                  | api                              |
+--------+----------+---------------------+------+------------------------------------------------------------+----------------------------------+
```

## Feature Test
You can run feature testing for this project with the command:
```bash
$ php artisan test --testsuite=Feature --stop-on-failure

  PASS  Tests\Feature\AuthTest
  ✓ auth login
  ✓ api auth me
  ✓ api auth refresh
  ✓ api auth logout

  PASS  Tests\Feature\ExampleTest
  ✓ example

  PASS  Tests\Feature\TodoTest
  ✓ create todo
  ✓ list todo
  ✓ detail todo
  ✓ update todo
  ✓ delete todo

  Tests:  10 passed
  Time:   0.21s
```