<?php

declare(strict_types=1);

namespace Brnbio\LaravelLoremIpsum\Lorem;

use Faker\Factory as Faker;
use Faker\Generator;
use Illuminate\Support\HtmlString;

/**
 * Class Helper
 * @package Brnbio\LaravelLoremIpsum\Lorem
 */
class Helper
{
    public const IMAGE_URL = 'https://via.placeholder.com/';
    public const TEXT_MIN_LENGTH = 200;

    /**
     * @var Helper
     */
    protected static $instance;

    /**
     * @return Helper
     */
    public static function getInstance(): self
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * @param int|array $words
     * @param bool $addStyle
     * @return string
     */
    public function text($words = self::TEXT_MIN_LENGTH): string
    {
        if (is_array($words) && count($words) === 2) {
            $words = rand($words[0], $words[1]);
        }

        return $this->fake()->words($words, true);
    }

    /**
     * @return Generator
     */
    public function fake(): Generator
    {
        return Faker::create();
    }

    /**
     * @param int $count
     * @param int $words
     * @return HtmlString
     */
    public function paragraphs(int $count = 1, $words = self::TEXT_MIN_LENGTH): HtmlString
    {
        $result = '';
        for ($i = 1; $i <= $count; $i++) {
            $result .= '<p>' . $this->text($words) . '</p>';
        }

        return new HtmlString($result);
    }

    /**
     * @param int $width
     * @param int|null $height
     * @return HtmlString
     */
    public function image(int $width = 640, int $height = null): HtmlString
    {
        $url = self::IMAGE_URL . $width;
        if (!is_null($height)) {
            $url .= 'x' . $height;
        }

        return new HtmlString('<img src="' . $url . '" alt="placeholder image" border="0">');
    }
}
