<?php
    session_start();
    if (!isset($_SESSION['admin']) || $_SESSION['admin'] == "" || $_SESSION['admin'] != 1)  {
        header('location: index.php');
    }

     
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['postdata'] = $_POST;
        unset($_POST);
        header("Location: ".$_SERVER[REQUEST_URI]);
        exit;
        }
        
        if (@$_SESSION['postdata']){
        $_POST=$_SESSION['postdata'];
        unset($_SESSION['postdata']);
        }
        $orderArr=array();
    $xml1=simplexml_load_file("order.xml") or die("Error: Cannot create object");

    $obj = array();
    $itemArr = array();
    $itemA = array();
    $productArr = array();
    $orderArr = array();

    foreach($xml1->order as $item){
        foreach($item->product as $product){
        $obj = array('id' => (string)$product->id,'name' => (string)$product->name, 'price' => (string)$product->price,'quantity'=> (string)$product->quantity, 'image'=> (string)$product->image);
        $itemArr = $obj;
        array_push($itemA, $itemArr);
        $itemArr= array();
    }
    array_push($productArr, $itemA);
    $itemA = array();
    }
    array_push($orderArr,$productArr);
    
?>
<html>

<head>
    <Title>Order List</Title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/CSS" href="StyleCSS.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
        <script src="JavaScript/order.js" async></script>
        <link rel="icon" href="Images/FruitCartLogo.png">
</head>

<body>
    <nav class="logo-bar navbar navbar-expand-lg navbar-light justify-content-between">
        <a class="navbar-brand" href="index.php">
            <img class="main-logo" src="Images/FruitCartLogo.png">
            <span class="navbar-icon-label">FRESHFAMILY MARKET</span>
        </a>
        <div class="navbar-right">
            <a href="SignIn.php">
                <img class="icons" src="Images/SignInIconOnly.png">
                <span class="navbar-icon-label">Sign Out</span>
            </a>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-full" style="background-color:rgb(104, 170, 5)">
        <div class="mx-auto d-sm-flex d-block flex-sm-nowrap">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample11"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-center" id="navbarsExample11">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="btn btn-success mr-3" href="index.php" role="button">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-success mr-3" href="FruitAndVegetables.php" role="button">Fruit and
                            Vegetables</a>
                    </li>
                    <a class="btn btn-success mr-3" href="Meat.php" role="button">Meat</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-success mr-3" href="Dairy.php" role="button">Dairy</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-success mr-3" href="Pantry.php" role="button">Bread and Pantry</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-success mr-3" href="Drinks.php" role="button">Beverages</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-success mr-3" href="Organic.php" role="button">Organic</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="back-end-nav-title">
        <nav id="back-end-nav">
            <a href="userlist.php">User List</a>
            <a href="productlist.php">Product List</a>
            <a href="orderlist.php">Order List</a>
        </nav>

        <div class="back-end-title">
            <h1>ORDER LIST</h1>
        </div>
    </div>

    <div class="back-end-title-alt">
        <h1>ORDER LIST</h1>
    </div>

    <div class="container-fluid user-list" style="padding-bottom: 0px;">
        <div class="row user-table-title">
            <div class="col-sm-2"></div>
            <div class="col-sm-2">ORDER NUMBER</div>
            <div class="col-sm-2">NAME</div>
            <div class="col-sm-2">TRACKING ID</div>


        </div>
        <?php
       $j = 0;
       $arrayCount = 0;
        foreach($orderArr as $obj){
            $total =0;
            $quantity =0;
           
            foreach ($obj as $order){
                $j++;
        echo'  <div class="row user-row">
        <div class="col-sm-2"></div>
        <div class="col-sm-2">'.$j.'</div>
        <div class="col-sm-2">User</div>
        <div class="col-sm-2">'.rand(100000000,50000000).'</div>
        <div class="col-sm-2">
        <form action ="editorder.php" method = "post" style = "display: inline;">
        <input class="btn red-button" type = "submit" value="Edit">
        <input type = "hidden" name = "action" value = "edit">
        <input type = "hidden" name = "editCount" value ='.$arrayCount.'>
        </form>
        </div>
        <div class="col-sm-1">
        <form method="post" style = "display: inline;">
        <input class="btn red-button" type = "submit" id="delete" type="button" value="Delete">
        <input type = "hidden" name = "deleteOrder" value ='.$arrayCount.'>
        </form>
        </div>
        </div>

     </div>
    <div class="card card-body" style="background-color: rgb(210, 235, 182);margin-bottom: 5px;">    
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Item</th>
                    <th scope="col" style="padding-left:0px">Quantity</th>
                    <th scope="col">Price</th>
                  </tr>
                </thead>
                <tbody>
            <tr>';
             $i=1;
             $arrayCount++;
            foreach ($order as $product){
                            echo' <tr>
                    <th scope="row">'.$i.'</th>
                    <td>'.$product['name'].'</td>
                    <td>'.$product['quantity'].'</td>
                    <td>'.$product['price'].'</td>
                    </tr>';
                    $i++; }
                        
                        
        echo' </tbody>
            </table>
             </div>
            </div>';
    
            }
    }
    ?>
    <?php
   
    if (isset($_POST['deleteOrder'])){
    
        unset($orderArr[0][$_POST['deleteOrder']]);

        $xml = new DOMDocument("1.0", "UTF-8");
        $xml->load('order.xml');

        $elements = $xml->getElementsByTagName('order');
        for ($i = $elements->length; --$i >= 0; ) {
            $href = $elements->item($i);
            $href->parentNode->removeChild($href);    
        }
    
        $rootTag = $xml->getElementsByTagName("root")->item(0);
    if(!empty($orderArr)){
        foreach($orderArr[0] as $order){
            $orderTag = $xml->createElement("order");

            foreach ($order as $product){
                $id=$product['id'];
                $productName = $product['name'];
                $price = $product['price'];
                $quantity = $product['quantity'];
                $image = $product['image'];
       
                $productNameTag = $xml->createElement("product");
                $idTag=$xml->createElement("id",$id);
                $nameTag=$xml->createElement("name",$productName);
                $quantityTag= $xml->createElement("quantity",$quantity);
                $priceTag =$xml->createElement("price",$price);
                $imageTag =$xml->createElement("price",$image);

                $productNameTag->appendChild($idTag);
                $productNameTag->appendChild($nameTag);
                $productNameTag->appendChild($quantityTag);
                $productNameTag->appendChild($priceTag);
                $productNameTag->appendChild($imageTag);
    
                $orderTag->appendChild($productNameTag);
            }
            $rootTag->appendChild($orderTag);}
            $xml->formatoutput = true;
            $xml->save('order.xml');
           
            
        } 
        echo'<script>
        window.location.href = document.URL;
        </script>';
        $orderArr = array();       
    }

      
    ?>
    
    <a class = "ml-3 left-button" href="addorder.php"> <input class = "btn red-button" type = "button" value = "Add Order"></a>
    <form method="post" style = "display: inline;">
    <a class = "center-button">
    <input class = "btn red-button" type = "Submit" value = "Save">
    <input type = "hidden" name = "Save">
    </a>
    </form>
    <?php 
    if (isset($_POST['Save'])){
        echo"<script type='text/javascript'>alert('Saved Cart');</script>";
    }
    ?>

    <div class="whitespace2"></div>

    <footer>
        <a href="index.php"><img src="Images/FruitCartLogo.png" class="logo mr-2" alt="FRESHFAMILY"></a>
        <span class="navbar-icon-label name">FRESHFAMILY MARKET</span>
    </footer>
</body>

</html>