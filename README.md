# The movie database PHP client

#### How to use
###### Search
```php
require_once 'vendor/autoload.php';

$common = new \TmdbApi\Common('https://api.themoviedb.org/3', '{YOU_API_KEY}');
$query = new \TmdbApi\Query('борн', true, ['language' => 'ru']);
$movie = new \TmdbApi\Section\Search\Movie($query);
$tmdb = new \TmdbApi\TmdbApi($common, $movie);
$res = $tmdb->get();

var_dump($res);

```
###### Get movie by id
```php
$query = new \TmdbApi\Query(2502, true, ['language' => 'ru']);

$common = new \TmdbApi\Common('https://api.themoviedb.org/3', '{YOU_API_KEY}');
$query = new \TmdbApi\Query(2502, true, ['language' => 'ru']);
$movie = new \TmdbApi\Section\Movie\Movie($query);
$tmdb = new \TmdbApi\TmdbApi($common, $movie);
$res = $tmdb->get();

var_dump($res);

```

