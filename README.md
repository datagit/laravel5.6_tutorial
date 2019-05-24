#### Init
    - https://www.cloudways.com/blog/whats-new-in-laravel-5-6/
#### Best Practices Examples
    - https://www.cloudways.com/blog/laravel-tutorials-for-beginners/#LaravelRoutes
    - http://www.laravelbestpractices.com/#debugging
#### Common Packages
    - https://github.com/barryvdh/laravel-debugbar
    - https://laravel.com/docs/5.6/logging#building-log-stacks
#### Basic
    - https://www.cloudways.com/blog/routing-in-laravel/
    - https://laravel.com/docs/5.6/migrations
    - (Best Practices for Development with Laravel) https://medium.com/@cloudways/best-practices-for-development-with-laravel-5e4746a327ab
    - (how to using tinker)  https://scotch.io/tutorials/tinker-with-the-data-in-your-laravel-apps-with-php-artisan-tinker
        https://tighten.co/blog/supercharge-your-laravel-tinker-workflow
        https://gist.github.com/jarektkaczyk/9a540a81ee7d40ce20c78c9f2197a1a9#file-config-php-L121-L124
    ```bash
        #check connect to DB
        $php artisan tinker
        DB::connection()->getPdo()
    ```
    .env
        PSYSH_CONFIG=./config/tinker.php

    - (version control database schema) https://laravel.com/docs/5.6/migrations
    - (testing database) factory https://laravel.com/docs/5.6/database-testing
    - (data seed for testing) https://laravel.com/docs/5.6/seeding
    
#### Testing
    - https://laravel.com/docs/5.2/testing#custom-http-requests
    - https://semaphoreci.com/community/tutorials/getting-started-with-phpunit-in-laravel
    - https://github.com/laravel/browser-kit-testing
    - https://tighten.co/blog/writing-better-css-selectors-in-dusk
    - https://scotch.io/tutorials/introduction-to-laravel-dusk
    ```bash
    $ composer require laravel/browser-kit-testing --dev
    $ ./vendor/bin/phpunit
    ```
    - Browser Tests (Laravel Dusk) for automation testing: https://laravel.com/docs/5.6/dusk
    ```bash
        composer require --dev laravel/dusk
        php artisan dusk:install
        php artisan dusk
        php artisan dusk --group=insingdotcom
    ```
#### Laravel Log View
    - doc: https://github.com/rap2hpoutre/laravel-log-viewer 
#### Laravel 5 Web Artisan
    - doc: https://github.com/emir/laravel-webartisan
    ```php
    #vendor/emir/laravel-webartisan/src/WebartisanController.php
        /**
         * Runs console command.
         *
         * @param string $command
         *
         * @return array [status, output]
         */
        private function runCommand($command)
        {
            //$cmd = base_path("artisan $command 2>&1");
            $path_artisan = base_path() . "/artisan";
            $php_path = exec("which php");
            $cmd = "$php_path $path_artisan $command 2>&1";
            $handler = popen($cmd, 'r');
            $output = '';
            while (!feof($handler)) {
                $output .= fgets($handler);
            }
            $output = trim($output);
            $status = pclose($handler);
    
            return [$status, $output];
        }
    #/Users/daomanhdat/my_php/laravel5.6_tutorial/blog/vendor/emir/laravel-webartisan/src/views/index.blade.php
    var exitUrl             = "{{ url('/') }}";
    ```
#### queues
    - https://laravel.com/docs/5.0/queues
    ```bash
    $ php artisan queue:table
    $ php artisan migrate
    ```
#### Artisan CLI, Scheduling
    - https://laravel.com/docs/5.0/artisan
#### Model Eloquent
    - https://eloquentbyexample.com/
    - https://stackify.com/laravel-eloquent-tutorial/
    - https://laravel-news.com/eloquent-tips-tricks
    ```bash
    # Create Model Eloquent: model(class), migrate(schema), seed and factory (insert dummy data)
    $ php artisan make:model --help
    ```
#### Examples
```bash
$ php artisan make:model Category --migration --factory
    #app/Category.php
    #database/factories/CategoryFactory.php
    #database/migrations/2019_01_03_034337_create_categories_table.php
$ php artisan make:seeder CategoryTableSeeder
    #database/seeds/CategoryTableSeeder.php
$ php artisan migrate --seed

$ php artisan tinker
```
```php
//get all
MyLearnLaravel5x\Category::all();
$category = MyLearnLaravel5x\Category::find(1);
$category->delete();
MyLearnLaravel5x\Category::destroy(1);
MyLearnLaravel5x\Category::destroy(1,2,3);

MyLearnLaravel5x\Category::where('id', 10)->get();
MyLearnLaravel5x\Category::where('id', '>', 10)->get();
```
```bash
$ php artisan make:model Product --migration --factory
$ php artisan make:seeder ProductTableSeeder
$ php artisan migrate
$ php artisan db:seed --class=ProductTableSeeder
```
log all queries
https://arjunphp.com/laravel-5-5-log-eloquent-queries/

make authen
```bash
$ php artisan make:auth
```
how to log queries using tinker
https://laracasts.com/discuss/channels/laravel/how-to-log-sql-using-tinker
```bash
$ php artisan tinker
```
```php
DB::enableQueryLog();

# then to view the queries...
DB::getQueryLog();
```

new tables: tags, posts, post_tag(Pivot)
```bash
# tags
$ php artisan make:model Tag --migration --factory
$ php artisan make:seeder TagTableSeeder
$ php artisan migrate
$ php artisan db:seed --class=TagTableSeeder
# posts
$ php artisan make:model Post --migration --factory
$ php artisan make:seeder PostTableSeeder
$ php artisan migrate
$ php artisan db:seed --class=PostTableSeeder
# post_tag
$ php artisan make:migration create_post_tag_table
# https://laravel.com/docs/5.7/migrations#foreign-key-constraints
$ php artisan migrate
$ php artisan tinker
```
https://laravel.com/docs/5.7/eloquent-relationships#updating-many-to-many-relationships
```php
$p = MyLearnLaravel5x\Post::find(1);
//Attaching / Detaching
$p->tags()->attach(1);
$p->tags();
$p->tags()->attach(2);
$p->tags();

$p->tags()->toggle(1,2,3);
$p->tags()->toggle(1,2,3);

$p->tags()->sync([1,2,3]);
$p->tags()->sync([1,2,3]);
$p->tags();
```
Constraining Eager Loads
```php
//case 1:
$users = App\User::with(['posts' => function ($query) {
    $query->where('title', 'like', '%first%');
}])->get();
//case 2:
$users = App\User::with(['posts' => function ($query) {
    $query->orderBy('created_at', 'desc');
}])->get();
```
Lazy Eager Loading
```php
//case 1:
$books = App\Book::all();

//case 2:
if ($someCondition) {
    $books->load('author', 'publisher');
}

//case 3:
$books->load(['author' => function ($query) {
    $query->orderBy('published_date', 'asc');
}]);
```

Json API Rest from scratch
https://www.youtube.com/watch?v=4pc6cgisbKE
https://laravel.com/docs/5.7/eloquent
https://laravel.com/docs/5.7/eloquent-resources
```bash
# create model, migration, seeder, controller with option --resource
# create model and migration and factory
$ php artisan make:model Article --migration --factory

# create seeder
$ php artisan make:seeder ArticleTableSeeder

# migrate to create schema table into DB
$ php artisan migrate
# init dummy data into DB
$ php artisan db:seed --class=ArticleTableSeeder

# create controller with --resource
$ php artisan make:controller ArticleController --resource

# add route api: routes/api.php

# make resource
$ php artisan make:resource Article
# update custom response fields...
# add code to controller

```

app/Http/Controllers/ArticleController.php
```php
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
    $articles = Article::paginate(10);
    return ArticleResource::collection($articles);
}
``` 
app/Http/Resources/Article.php
```php
/**
 * Transform the resource into an array.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return array
 */
public function toArray($request)
{
    //get all fields
    //return parent::toArray($request);

    //get custom fields
    return [
        'id' => $this->id,
        'title' => $this->title,
        'body' => $this->body,
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,
        'status' => 'ok',
    ];
}
```
new frameworks
- install
- configuration
- structure folder
- console commands line
- logger
- router
- controller
- template
- model: [migration, factory, seeder]
- JSON API REST from scratch to make an examples
- testing
- web full: to make an examples
- admin panel to make an examples
- package bundles to make an examples

init API

```bash

$ composer dump-autoload
# migrate to create schema table into DB
$ php artisan migrate
# init dummy data into DB
$ php artisan db:seed --class=ArticleTableSeeder

```

https://laravel.com/docs/master/artisan
```bash
$ php artisan help email:send
$ php artisan email:send 1 --queue=default
```

Crawler and Scraper data from other website
[Document Laravel 5 Facade for Goutte, a simple PHP Web Scraper](http://docs.guzzlephp.org/en/stable/)
https://api.symfony.com/2.7/Symfony/Component/DomCrawler/Link.html
https://symfony.com/doc/current/components/dom_crawler.html
- Links
- Images
- Forms
[https://github.com/dweidner/laravel-goutte](https://github.com/dweidner/laravel-goutte)


Test mock: mockery
https://github.com/datagit/mockery
https://viblo.asia/p/testing-with-mockery-in-laravel-PdbGnojBeyA


Publish vendor
```bash
$ php artisan vendor:publish
```
HTMLMin Is A Simple HTML Minifier For Laravel 5
https://packalyst.com/packages/package/htmlmin/htmlmin

#### 
```bash
# vi app/Services/DemoClassService.php
$ php artisan make:provider DemoClassServiceProvider

```
