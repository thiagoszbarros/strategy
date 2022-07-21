<?php

namespace src;

use Exception;

class Purchase
{
    private $products = [
        ['name' => 'Milk', 'price' => '7.99'],
        ['name' => 'Bean', 'price' => '10.00'],
        ['name' => 'Rice', 'price' => '6.00'],
        ['name' => 'Noodle', 'price' => '6.90'],
        ['name' => 'Flour', 'price' => '3.99'],
    ];

    public function totalPurchase()
    {
        $totalPurchase = 0;
        foreach ($this->products as $purchaseItem) {
            $totalPurchase += $purchaseItem['price'];
        }
        return $totalPurchase;
    }

    public function totalPurchaseWithDiscount($category)
    {
        $grossPricePurchase = $this->totalPurchase();

        if ($category === 1) {
            $netPricePurchase = $grossPricePurchase -= ($grossPricePurchase * 0.10);
        } else if ($category === 2) {
            $netPricePurchase = $grossPricePurchase -= ($grossPricePurchase * 0.20);
        } else if ($category === 3) {
            $netPricePurchase = $grossPricePurchase -= ($grossPricePurchase * 0.30);
        } else if ($category === 4) {
            $netPricePurchase = $grossPricePurchase -= ($grossPricePurchase * 0.40);
        } else if ($category === 5) {
            $netPricePurchase = $grossPricePurchase -= ($grossPricePurchase * 0.50);
        }
        /*
            This implementation violates the open-closed principle as, 
            with each new category added, a new else if must be created. 
            This function is not closed for modification.
            This function will never stop growing.
        */
        else {
            throw new Exception("Invalid category.");
        }
        return $netPricePurchase;
    }
}
