<?php

namespace CodeCommerce;

class Cart {

    private $items;

    public function __construct() {
        $this->items = [];
    }

    public function add($id, $name, $price) {
        $this->items += [
            $id => [
                'qtd' => isset($this->items[$id]['qtd']) ? $this->items[$id]['qtd'] ++ : 1,
                'name' => $name,
                'price' => $price
        ]];
        return $this->items;
    }

    public function remove($id) {
        if ($this->items[$id]['qtd'] > 1) {
            $this->items[$id]['qtd'] --;
        } else {
            unset($this->items[$id]);
        }
        return;
    }

    public function updateQtd($id, $qtd) {
        $this->items[$id]['qtd'] = $qtd;
        return;
    }

    public function all() {
        return $this->items;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['qtd'] * $item['price'];
        }
        return $total;
    }

}
