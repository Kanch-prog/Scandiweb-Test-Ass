<?php

class Book extends ListItems{
    

    public function setValues($sku, $name, $price, $size, $height, $width, $length, $weight){
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->size = $size;
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
        $this->weight = $weight;
    }


    public function getProductList(){
         echo '<div class="col mt-1 card border-dark card-order">';
         echo '<form>';
         echo '<input class="delete-checkbox form-check-input bg-dark m-2" type="checkbox" name="delete[]" value='.$this->sku.'>';
         echo  '</form>';
         echo '<p>'.$this->sku.'</p>';
         echo '<p>'. $this->name.'</p>';
         echo '<p>'.$this->price.'.00 $</p>';
         echo '<p>Weight: '. $this->weight.'KG</p>';
         echo '</div>';


    }
};


?>