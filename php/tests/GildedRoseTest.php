<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testFoo(): void
    {
        $items = [new Item('foo', 0, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('foo', $items[0]->name);
    }

    public function testAgedBrieOneDay(): void
    {
        $items = [
            new Item('Aged Brie', 2, 0),
        ];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $itemAfterUpdate = new Item('Aged Brie', 1, 1);
        $this->assertEquals($items[0], $itemAfterUpdate);
    }
}
