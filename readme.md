# laravel-loremipsum

Easy Lorem ipsum generator for laravel. Generate easy text, paragraphs or placeholder images.

#### Installation

```
composer require --dev brnbio/laravel-loremipsum
```

It's recommended to use this package in dev environment only.

#### Usage

##### Random text

```php
public function text($words = self::TEXT_MIN_LENGTH): string
```

```php
echo lorem()->text();
// result: qui fugiat quasi laboriosam nemo commodi... [default: 200 words]

// fixed word count
echo lorem()->text(3);

// random word count
echo lorem()->text([1, 10]);
```

##### Html paragraph

Same as text, but with paragraph tags. Return type is a HtmlString.

```php
public function paragraphs(int $count = 1, $words = self::TEXT_MIN_LENGTH): HtmlString
```

```php
echo lorem()->paragraph();
// <p>qui fugiat quasi laboriosam nemo commodi ...[default: 200]</p>

echo lorem()->paragraph(2);
// <p>qui fugiat quasi laboriosam nemo commodi ...[default: 200]</p>
// <p>quia velit ut eum deleniti qui est ex numquam ...[default: 200]</p>

echo lorem()->paragraph(2, [1, 10]);
// <p>qui fugiat quasi</p>
// <p>quia velit ut eum deleniti qui est ex numquam</p>
```

##### Image

Return type HtmlString.

```php
public function image(int $width = 640, int $height = null): string
```

```php
echo lorem()->image();
// result: <img src="https://via.placeholder.com/640" alt="placeholder image" border="0">

echo lorem()->image(100);
// result: <img src="https://via.placeholder.com/100" alt="placeholder image" border="0">

echo lorem()->image(240, 150);
// result: <img src="https://via.placeholder.com/240x150" alt="placeholder image" border="0">
```

##### Fake

Additional fake function to get a faker instance. For more information look at https://github.com/fzaninotto/Faker.

```php
echo lorem()->fake();
// result: Faker\Generator

echo lorem()->fake()->address;
// result: 20607 Tromp Trace\n Jaymefurt, AR 09783
```
