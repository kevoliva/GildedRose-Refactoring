<?php

declare(strict_types=1);

namespace GildedRose;

final class AgedBrie
{
    public static function updateQuality(Item $item): void
    {
        if ($item->quality < 50) {
            $item->sell_in < 0 ? $item->quality = $item->quality + 2 : $item->quality++;
        }
        if ($item->quality > 50) {
            $item->quality = 50;
        }
    }
}
