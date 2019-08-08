# The movie database PHP client

#### How to use
###### Search
```php
require_once 'vendor/autoload.php';

$query = new \TmdbApi\Query('борн', true, ['language' => 'ru']);

$movie = new \TmdbApi\Section\Search\Movie();
$tmdb = new \TmdbApi\TmdbApi('https://api.themoviedb.org/3', '{YOU_API_KEY}', $movie, $query);
$res = $tmdb->get();

var_dump($res);

```
###### Get movie by id
```php
require_once 'vendor/autoload.php';

$query = new \TmdbApi\Query(2502, true, ['language' => 'ru']);

$movie = new \TmdbApi\Section\Movie\Movie();
$tmdb = new \TmdbApi\TmdbApi('https://api.themoviedb.org/3', '{YOU_API_KEY}', $movie, ['language' => 'ru']);
$res = $tmdb->get();

var_dump($res);

```

