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
            $item->sell_in--;
            switch ($item->name) {
                case 'Aged Brie':
                    AgedBrie::updateQuality($item);
                    break;
                case 'Backstage passes to a TAFKAL80ETC concert':
                    Backstage::updateQuality($item);
                    break;
                case 'Conjured Mana Cake':
                    Conjured::updateQuality($item);
                    break;
                case 'Sulfuras, Hand of Ragnaros':
                    $item->sell_in++;
                    break;
                default:
                    DefaultItem::updateQuality($item);
                    break;
            }
        }
    }
}
