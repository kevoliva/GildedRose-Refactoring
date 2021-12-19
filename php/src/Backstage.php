<?php

declare(strict_types=1);

namespace GildedRose;

final class Backstage
{
    public static function updateQuality(Item $item)
    {
        $item->sell_in--;

        if ($item->quality <= 50) {
            if ($item->sell_in < 10) {
                if ($item->sell_in < 5) {
                    if ($item->sell_in < 0) {
                        $item->quality = 0;
                    } else {
                        $item->quality = $item->quality + 3;
                    }
                } else {
                    $item->quality = $item->quality + 2;
                }
            } else {
                $item->quality++;
            }
        }
        if ($item->quality > 50) {
            $item->quality = 50;
        }
    }
}
