<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesOrderItem extends Model
{
    protected $fillable = [
        'salesorder_id',
        'item',
        'qty',
        'tax_rate',
        'list_price',
        'unit_price',
        'description',
        'created_by',
    ];
    public function items()
    {
        return $this->hasOne('App\Product', 'id', 'item');
    }

    public function taxs()
    {
        return $this->hasOne('App\ProductTax', 'id', 'tax');
    }
    public function tax($taxes)
    {
        $taxArr = explode(',', $taxes);
        $taxes = [];
        foreach($taxArr as $tax)
        {
            $taxes[] = ProductTax::find($tax);
        }
        return $taxes;
    }
}
