# The movie database PHP client

#### How to use
###### Search
```php
require_once 'vendor/autoload.php';

$movie = new \TmdbApi\Section\Search\Movie();
$movie->setQuery('борн');
$tmdb = new \TmdbApi\TmdbApi('https://api.themoviedb.org/3', '{YOU_API_KEY}', $movie, ['language' => 'ru']);
$res = $tmdb->get();

var_dump($res);
```
###### Get movie by id
```php
require_once 'vendor/autoload.php';

$movie = new \TmdbApi\Section\Movie\Movie();
$movie->setQuery(2502);
$tmdb = new \TmdbApi\TmdbApi('https://api.themoviedb.org/3', '{YOU_API_KEY}', $movie, ['language' => 'ru']);
$res = $tmdb->get();

var_dump($res);

```

