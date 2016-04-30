<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model {

    protected $table = 'order_items';
    protected $fillable = ['product_id', 'qtd', 'price'];

    public function order() {
        return $this->belongsTo('CodeCommerce\Order');
    }

    public function product() {
        return $this->belongsTo('CodeCommerce\Product');
    }

}
