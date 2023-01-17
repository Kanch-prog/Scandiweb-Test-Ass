<?php

include_once 'connect-to-mysql.php';
?>
<?php

if(isset($_GET['sku'])){

    $sku = mysqli_real_escape_string($con, $_GET['sku']);
    $name = mysqli_real_escape_string($con, $_GET['name']);
    $price = mysqli_real_escape_string($con, $_GET['price']);
    $productType = mysqli_real_escape_string($con, $_GET['productType']);
    $size = mysqli_real_escape_string($con, $_GET['size']);
    $height = mysqli_real_escape_string($con, $_GET['height']);
    $width = mysqli_real_escape_string($con, $_GET['width']);
    $length = mysqli_real_escape_string($con, $_GET['length']);
    $weight = mysqli_real_escape_string($con, $_GET['weight']);

     $sql = mysqli_query($con, "SELECT sku FROM products WHERE sku='$sku'LIMIT 1");

     $skuSame = mysqli_num_rows($sql);

    if($skuSame > 0){
        echo 'sku already exists';

        exit();
    }

    $sql = mysqli_query($con, "INSERT INTO products(sku, name, price, productType, size, height, width, length, weight) 
    VALUES('$sku', '$name', '$price', '$productType', '$size', '$height', '$width', '$length', '$weight')") or die(mysqli_error($con));

    }
?>

<?php
abstract class ListItems
{
    private $sku;
    private $name;
    private $price;
    private $size;
    private $height;
    private $width;
    private $length;
    private $weight;
    
    abstract public function setValues($sku, $name, $price, $size, $height, $width, $length, $weight);
    abstract public function getProductList();
}
?>

<?php

include_once 'DVD.php';
include_once 'furniture.php';
include_once 'book.php';



$children = array();

/*foreach(get_declared_classes() as $child ){
    if(is_a ($child, 'ListItems'))
    $children[] = $child;
    
}<------- expect an instance of an object, not a classname.*/

foreach(get_declared_classes() as $child ){
    if(is_subclass_of( $child, 'ListItems' )){
    $children[] = $child;
    }
}
if(isset($_POST['delete'])){
    
    if(isset($_POST['checkbox'])){
        foreach($_POST['checkbox'] as $sku){

             $con->query("DELETE FROM products WHERE sku='".$sku."'");

        }
    }

}

?>
<script language="javascript">

   function redirectMe(){
      window.location = 'insert.php';
   }
</script>



<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          
    <!--font-->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&display=swap" rel="stylesheet">
     <!--bootstrap-->
    <link text="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <title>Products List</title>
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&display=swap");
    body {
        font-family: "Space Grotesk", sans-serif;
    }
    .card {
        background-color: rgb(202, 212, 99);
        box-shadow: 0 12px 24px rgb(22, 21, 19);
    }
    .card-order{
        width: 310px;
        border: 1px solid blakc;
        margin: 15px;
       }
    </style>
</head>

<body style="background: rgb(46, 139, 87);">
    <nav class="navbar">
    <div class="container-fluid">
        <h1 class="navbar-brand">Product List</h1>
        <span class="d-flex">
            <form action="" method="post" id="delete-form">
                <button type="button" class="btn btn-warning btn-sm" onClick="redirectMe()">ADD</button>
            
               <!------- <button class="btn btn-warning btn-sm" id="delete-product-btn" type="submit" value="MASS DELETE" name="please_delete">MASS DELETE</button>---->
           </form>
            <form action="" method="post" id="delete-fom" onSubmit="return validate1();">
                <input id="delete-product-btn" type="submit" value="MASS DELETE" name="delete" class="btn btn-danger btn-sm">
            
        </span>
    </div>
</nav>
<hr class="mx-3 py-2">
    

<div class="container p-5">

    <div class="row row-cols-1 row-cols-sm-6 row-cols-md-4 text-center">
       
            
                <?php
                    $order = "SELECT * FROM products ORDER BY name ASC";
                    $sql = mysqli_query($con, $order);
                    $productCount = mysqli_num_rows($sql);
                    if($productCount > 0){

                                while($row = mysqli_fetch_object($sql)){
                        
                                    
                                    $a = array_search("$row->productType",$children);
                                    $newProduct = new $children[$a]();
                                   
                                    $newProduct->setValues("$row->sku","$row->name", "$row->price","$row->size", "$row->height", "$row->width", "$row->length", "$row->weight");
                                     echo '<div class="col mt-1 card border-dark card-order">';
                                    echo '<input class="delete-checkbox form-check-input bg-dark m-2" type="checkbox" name="checkbox[]" value='.$row->sku.'>';
                                    echo $newProduct->getProductList();
                                      echo '</div>';
                                    
                                }
                                
                        }   

            

                ?>
      
            
    </div>

</div>
</form>
    <footer class="footer pt-5 mt-5 py-3 text-center">
        <div class="container-fluid">
            <div class="h4 pb-2 mb-4 text-danger border-bottom border-dark"></div>
            <span class="text-center mt-2">Scandiweb test assignment</span>
        </div>
        
    </footer>
</body>

</html>
<script language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js">

function validate1()
{
var chks = document.getElementsByName('checkbox[]');
var hasChecked = false;
for (var i = 0; i < chks.length; i++)
{
if (chks[i].checked)
{
hasChecked = true;
break;
}
}
if (hasChecked == false)
{
alert("Please select at least one.");
return false;
}
return true;
}
</script>