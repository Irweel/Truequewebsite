<?php

namespace App;


class Cart
{
    public $items = null;

    public function __construct($oldCart)
    {
      if($oldCart){
        $this->items = $oldCart->items;
      }
    }

    public function add($item, $id){
      $storedItem = ['item' => $item];
      if ($this->items) {
        if (array_key_exists($id, $this->items)) {
          $storedItem = $this->items[$id];
        }
      }
      $this -> items[$id] = $storedItem;
    }
}
