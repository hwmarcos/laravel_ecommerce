<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model {

    protected $table = 'order_items';
    protected $fillable = ['product_id', 'qtd', 'price'];

    public function order() {
        $this->belongsTo('CodeCommerce\Order');
    }

}
