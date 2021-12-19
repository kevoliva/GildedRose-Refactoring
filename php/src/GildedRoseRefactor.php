<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRoseRefactor
{
    /**
     * @var Item[]
     */
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            switch ($item->name) {
                case 'Aged Brie':
                    $this->updateQualityAgedBrie($item);
                    break;
                case 'Backstage passes to a TAFKAL80ETC concert':
                    $this->updateQualityBackstage($item);
                    break;
                case 'Sulfuras, Hand of Ragnaros':
                    break;
                default:
                $this->updateQualityDefault($item);
                    break;
            }
        }
    }

    public function updateQualityAgedBrie($item)
    {
        $item->sell_in--;

        if ($item->quality < 50) {
            if ($item->sell_in < 0) {
                $item->quality = $item->quality + 2;
            }
            else {
                $item->quality++;
            }
        }
        if ($item->quality > 50) {
            $item->quality = 50;
        }
    }

    public function updateQualityBackstage($item)
    {
        $item->sell_in--;
        
        if ($item->quality <= 50) {
            if ($item->sell_in < 10) {
                if ($item->sell_in < 5) {
                    if ($item->sell_in < 0) {
                        $item->quality = 0;
                    }
                    else {
                        $item->quality = $item->quality + 3;
                    }
                }
                else {
                    $item->quality = $item->quality + 2;
                }
            }
            else {
                $item->quality++;
            }
        }
        if ($item->quality > 50) {
            $item->quality = 50;
        }
    }

    public function updateQualityDefault($item)
    {
        $item->sell_in--;
        
        if ($item->sell_in < 0) {
            $item->quality = $item->quality - 2;
        }
        else {
            $item->quality--;
        }
        if ($item->quality < 0) {
            $item->quality = 0;
        }
    }
}
