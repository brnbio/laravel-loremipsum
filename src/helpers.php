<?php

declare(strict_types=1);

use Brnbio\LaravelLoremIpsum\Lorem\Helper as LoremIpsumHelper;

if (! function_exists('lorem')) {
    /**
     * @return LoremIpsumHelper
     */
    function lorem(): LoremIpsumHelper
    {
        return LoremIpsumHelper::getInstance();
    }
}
