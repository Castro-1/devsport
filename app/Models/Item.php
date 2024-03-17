<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the item primary key (id)
     * $this->attributes['order_id'] - int - contains the id of the order associated to the item
     * $this->attributes['product_id'] - int - contains the id of the product associated to the item
     * $this->attributes['quantity'] - int - contains the item quantity
     * $this->attributes['price'] - int - contains the item price
     */
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];

    // TODO: Uncomment this once the orders table is created
    // public function order()
    // {
    //     return $this->belongsTo(Order::class);
    // }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getQuantity(): int
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity(int $quantity): void
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }
}
