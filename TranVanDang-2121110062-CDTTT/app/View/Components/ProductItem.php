<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductItem extends Component
{
  /**
     * Create a new component instance.
     */
    private $row_product=null;

    public function __construct($productitem)
    {
        $this->row_product=$productitem;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $product=$this->row_product;
        return view('components.product-item',compact('product'));
    }
}
