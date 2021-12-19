<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\GildedRoseRefactor;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    // public function testFoo(): void
    // {
    //     $items = [new Item('foo', 0, 0)];
    //     $gildedRose = new GildedRose($items);
    //     $gildedRose->updateQuality();
    //     $this->assertSame('foo', $items[0]->name);
    // }

    // Ici, nous supposons que la classe GildedRose est fonctionnelle, nous nous appuyons sur celle-ci pour tester
    // la nouvelle classe que nous créons (GildedRoseRefactor) afin de vérifier si nos résultats sont toujours équivalents à
    // ceux de GildedRose
    public function testTwentyDays(): void
    {
        // Nous créons deux tableaux car si nous faisons une copie du premier, les valeurs seront données par référence,
        // cela nous empêchera de modifier un objet sans modifier l'autre
        $itemsSafes = [
            new Item('+5 Dexterity Vest', 10, 20),
            new Item('Aged Brie', 2, 0),
            new Item('Elixir of the Mongoose', 5, 7),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', -1, 80),
            new Item('Backstage passes to a TAFKAL80ETC concert', 15, 20),
            new Item('Backstage passes to a TAFKAL80ETC concert', 10, 49),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49),
        ];

        $itemsToTest = [
            new Item('+5 Dexterity Vest', 10, 20),
            new Item('Aged Brie', 2, 0),
            new Item('Elixir of the Mongoose', 5, 7),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', -1, 80),
            new Item('Backstage passes to a TAFKAL80ETC concert', 15, 20),
            new Item('Backstage passes to a TAFKAL80ETC concert', 10, 49),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49),
        ];

        $gildedRose = new GildedRose($itemsSafes);
        $gildedRoseRefactor = new GildedRoseRefactor($itemsToTest);

        for ($j = 0; $j < 20; $j++) {
            $gildedRose->updateQuality();
            $gildedRoseRefactor->updateQuality();
            for ($i = 0; $i < sizeof($itemsSafes); $i++) {
                $this->assertEquals(($gildedRose->getItems())[$i], ($gildedRoseRefactor->getItems())[$i]);
            }
        }
    }

    public function testConjuredSixDays(): void
    {
        $items = [
            new Item('Conjured Mana Cake', 3, 6),
            new Item('Conjured Mana Cake', 4, 49),
        ];
        $gildedRoseRefactor = new GildedRoseRefactor($items);
        for ($j = 0; $j < 6; $j++) {
            $gildedRoseRefactor->updateQuality();
        }
        $itemAfterUpdate = new Item('Conjured Mana Cake', -3, 0);
        $itemAfterUpdate2 = new Item('Conjured Mana Cake', -2, 33);

        $this->assertEquals($items[0], $itemAfterUpdate);
        $this->assertEquals($items[1], $itemAfterUpdate2);
    }
}
