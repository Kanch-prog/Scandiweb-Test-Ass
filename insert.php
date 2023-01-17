<script type="text/javascript">

    function validate(){

    var sku = document.product_form.sku.value;
    var name = document.product_form.name.value;
    var price = document.product_form.price.value;
    var product_type = document.product_form.product_type.value;

    // Defining error variables with a default value
    var skuErr = nameErr = priceErr = product_typeErr = true;
    
    // Validate name
    if(name == "") {
        printError("nameErr", "Please enter your name");
    } elseif {
        printError("priceErr", "Please enter your name");
    }
         return isValid;
   
}

</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--font-->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&display=swap" rel="stylesheet">
    <!--bootstrap-->
    <link text="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
       
    <title>Products website</title>
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&display=swap");
    body {
        font-family: "Space Grotesk", sans-serif;
    }
    .card {
        background-color: rgb(202, 212, 99);
        box-shadow: 0 12px 24px rgb(22, 21, 19);
    }
    .fieldset{
        display: none;
    }
   
    </style>
</head>

<body style="background: rgb(46, 139, 87);">
    <nav class="navbar">
    <div class="container-fluid">
        <h1 class="navbar-brand">Product Add</h1>
        <span class="d-flex">
            <form>
                     <button class="btn btn-warning btn-sm" type="submit" form="product_form" onclick="validate()">SAVE</button>
            <button class="btn btn-warning btn-sm" id="delete-product-btn" type="submit">CANCEL</button>
          
            </form>
       
        </span>
    </div>
</nav>
<hr class="mx-3 py-1">

<div class="container-fluid p-5">
    <fieldset>
        <form action="index.php" method="get" id="product_form" class="needs-validation" novalidate>


             <div class="row mb-3">
                <label for="sku" class="col-sm-2 col-form-label">SKU</label>
                <div class="col-sm-auto">
                    <input required type="text" class="form-control" id="sku"
                        value="" name="sku" placeholder="Must be unique">
                    <div class="invalid-feedback">
                        Please provide the name
                    </div>
                </div>

            </div>


            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-auto">
                    <input required type="text" class="form-control" id="name"
                        value="" name="name">
                    <div class="invalid-feedback">
                        Please provide the name
                    </div>
                </div>

            </div>

            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Price ($)</label>
                <div class="col-sm-auto">
                    <input required type="number" class="form-control" id="price" min="0.01" step="0.01"
                        value="" name="price">
                    <div class="invalid-feedback">
                        Please provide the price
                    </div>
                </div>

            </div>

            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Product Type</label>
                <div class="col-sm-auto">
                    <select required class="form-select" id="productType" name="productType" onchange="prodType(this.value);">

                        <option selected value="">Type Switcher</option>

                                                <option value="DVD">DVD</option>
                                                <option value="Furniture">Furniture</option>
                                                <option value="Book">Book</option>
                                            </select>
                    <div class="invalid-feedback">
                        Please choose a product type
                    </div>
                </div>
            </div>
    </fieldset>

    <!--product types-->
    <div id="productDescription" class="mb-5">
        <fieldset class="fieldset" id="dvdDescription">
            <div class="row mb-3">
                <label for="size" class="col-sm-2 col-form-label">Size (MB)</label>
                <div class="col-sm-auto">
                    <input type="number" class="form-control" id="size" min="1" step="1" name="size"
                        value="">
                    <div class="invalid-feedback">
                        Please provide the size
                    </div>
                </div>
            </div>
        </fieldset>

        <fieldset class="fieldset" id="bookDescription">
            <div class="row mb-3">
                <label for="weight" class="col-sm-2 col-form-label">Weight (KG)</label>
                <div class="col-sm-auto">
                    <input type="number" class="form-control" id="weight" min="1" step="1" name="weight"
                        value="">
                    <div class="invalid-feedback">
                        Please provide the weight
                    </div>
                </div>
            </div>
        </fieldset>

        <fieldset class="fieldset" id="furnitureDescription">
            <div class="row mb-3">
                <label for="height" class="col-sm-2 col-form-label">Height (CM)</label>
                <div class="col-sm-auto">
                    <input type="number" class="form-control" id="height" min="1" step="1" name="height"
                        value="">
                    <div class="invalid-feedback">
                        Please provide the height
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="width" class="col-sm-2 col-form-label">Width (CM)</label>
                <div class="col-sm-auto">
                    <input type="number" class="form-control" id="width" min="1" step="1" name="width"
                        value="">
                    <div class="invalid-feedback">
                        Please provide the width
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="length" class="col-sm-2 col-form-label">Length (CM)</label>
                <div class="col-sm-auto">
                    <input type="number" class="form-control" id="length" min="1" step="1" name="length"
                        value="">
                    <div class="invalid-feedback">
                        Please provide the length
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
    </form>
</div>

    <footer class="footer pt-5 mt-5 py-3 text-center">
        <div class="container-fluid">
            <div class="h4 pb-2 mb-4 text-danger border-bottom border-dark"></div>
            <span class="text-center mt-2">Scandiweb test assignment</span>
        </div>
    </footer>
</body>

</html>

<script type="text/javascript">

    function prodType(prod){

  var dvdDescription = document.getElementById("dvdDescription");
  var bookDescription = document.getElementById("bookDescription");
  var furnitureDescription = document.getElementById("furnitureDescription");
  
  dvdDescription.style.display="none";
  bookDescription.style.display="none";
  furnitureDescription.style.display="none";
  
  if(prod=="DVD"){
    dvdDescription.style.display="block";
  }else if(prod=="Book"){
    bookDescription.style.display="block";
  }else if(prod=="Furniture"){
  furnitureDescription.style.display="block";
  }
}
</script>
