<!DOCTYPE html>
<html>

<head>
    <title>Sausage</title>
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
    <link rel="icon" href="Images/FruitCartLogo.png">
</head>

<body onload="document.getElementById('sausageQuantity').value = getSavedValue('sausageQuantity')">
    <nav class="logo-bar navbar navbar-expand-lg navbar-light justify-content-between">
        <a class="navbar-brand" href="index.php">
            <img class="main-logo" src="Images/FruitCartLogo.png">
            <span class="navbar-icon-label">FRESHFAMILY MARKET</span>
        </a>
        <div class="navbar-right">
            <a href="Cart.php">
                <img class="icons" src="Images/AddToCart.png">
                <span class="navbar-icon-label mr-4">My Cart</span>
            </a>
            <a href="SignIn.php">
                <img class="icons" src="Images/SignInIconOnly.png">
                <span class="navbar-icon-label">Sign In</span>
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
                        <a class="btn btn-success mr-3" href="FruitAndVegetables.php" role="button">Fruit and Vegetables</a>
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


    </div>

    <div class="media product" style = "margin-top: 0; margin-left: 5%">
        <img src="Images/sausage.jpeg" width=330px class="mr-5" alt="Italian Sausage">
        <div class="media-body">
            <div class="textblack" style="color: black">
            <h5 class="mt-0">Italian Sausage</h5>
            <p>Weight: 405g</p>
            <p>Price: 4.45$</p>
            <p>
                <button class="btn green-button" type="button" data-toggle="collapse" data-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                    More Description
                </button>
            </p>
            <div class="collapse mr-5" id="collapseExample">
                <div class="card card-body" style="background-color: rgb(210, 235, 182)">
                    <h6>Product Number</h6>
                    <p>684-723-32</p>
                    <h6>Description</h6>
                    <p>4 mild Italian Johnsville Sausages</p>
                    <h6>Ingredients</h6>
                    <p>Pork, water, corn syrup and less than 2% of the following: pork broth with natural flavorings, salt, dextrose, spices, natural flavor, extractives of paprika, BHA, propyl gallate, citric acid.</p>
                    <h6>Storage</h6>
                    <p>Prepare within 3 days of purchase or freeze for up to 30 days.</p>
                </div>
            </div>
        </div>
        <form class="add-to-cart" action="Cart.php" method="post">
            <input class="product-quantity ml-2 mr-2" type="number" name="quantity" id="sausageQuantity" value="sausageQuantity" onchange="saveValue(this)"
                placeholder="1" />
                <input type="hidden" name="productid" value="sausage">
            <input class="add-to-cart-submit" type="image" name="ToCart" src="Images/AddToCart.png"
                alt="Submit Form" />
        </form>
        </div>
    </div>
    <div class = "whitespace2"></div>
    <script type = "text/javascript" src = "JavaScript/AntoineProducts.js"></script>
</body>

<footer>
    <a href="index.php"><img src="Images/FruitCartLogo.png" class="logo mr-2" alt="FRESHFAMILY"></a>
    <span class="navbar-icon-label name">FRESHFAMILY MARKET</span>
</footer>

</html>