<?php

declare(strict_types=1);

namespace GildedRose;

final class Conjured
{
    public static function updateQuality(Item $item)
    {
        $item->sell_in < 0 ?  $item->quality = $item->quality - 4 : $item->quality = $item->quality - 2;

        if ($item->quality < 0) {
            $item->quality = 0;
        }
    }
}
