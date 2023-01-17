<?php

class DVD extends ListItems{
    
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
         
         echo '<p>'.$this->sku.'</p>';
         echo '<p>'. $this->name.'</p>';
         echo '<p>'.$this->price.'.00 $</p>';
         echo '<p>Size: '. $this->size.' MB</p>';
       

    }
};


?>