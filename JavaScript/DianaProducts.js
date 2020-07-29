//~~~~~~~//
// PRICE //
//~~~~~~~//

// Initializing product prices
var avocadoSingle = 1.49;
var avocado6pack = 6.99;
var avocadoTotalPrice;

// AVOCADO //

//Displaying price
function displayAvocadoPriceOnload()  {

    updateAvocadoPrice();
    if (avocadoTotalPrice != null)
        document.getElementsByName("avocadoPrice")[0].innerHTML = "Price: $" + avocadoTotalPrice;
    else 
        document.getElementsByName("avocadoPrice")[0].innerHTML = "Price: $" + avocadoSingle + " each or $" + avocado6pack + " for 6";
}

// updating total price for avocado
function updateAvocadoPrice()  {
    var quantity = window.localStorage.getItem("avocadoQuantity");
    if (quantity <= 0) {
        alert("Please enter a valid quantity (1 or more)");
        document.getElementById("avocadoQuantity").value = 1;
        window.localStorage.setItem("avocadoQuantity", 1);
        quantity.focus();
    }
    if (window.localStorage.getItem("avocadoQuantityType") == "SingleUnit")
        avocadoTotalPrice = avocadoSingle * quantity;
    if (window.localStorage.getItem("avocadoQuantityType") == "6pack")
        avocadoTotalPrice = avocado6pack * quantity;
}

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
// SAVING AND STORING PRODUCT TYPE AND QUANTITY //
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//

// loading a product quantity from session storage
function loadQuantity(id)  {
    document.getElementById(id).value = window.localStorage.getItem(id);
}

// calling loadQuantity of all dairy products upon reloading page
function loadAllDairyQuantity() {
    loadQuantity('milkQuantity');
    loadQuantity('creamQuantity');
    loadQuantity('butterQuantity');
    loadQuantity('cheeseQuantity');
}

// calling loadQuantity of all friot avd vegetables products upon reloading page
function loadAllFruitAndVegetablesQuantity() {

    loadQuantity('avocadoQuantity');
    loadQuantity('eggplantQuantity');
    loadQuantity('strawberriesQuantity');
    loadQuantity('zucchiniQuantity');
}


// Saving session changes in quantity
function saveQuantity(id)  {
    var quantity = document.getElementById(id).value;
    window.localStorage.setItem(id, quantity);
}

// Saving session choices for package type
function savePackageType(id, key)  {
    var packageType = document.getElementById(id).value;
    window.localStorage.setItem(key, packageType);
}

 // Loading a package type from session storage
function loadPackageType(key) {
    if (window.localStorage.getItem(key) == "SingleUnit")  
        document.getElementById("SingleUnit").checked=true;
    if (window.localStorage.getItem(key) == "6pack")
        document.getElementById("6pack").checked=true;
}

//~~~~~~~~~~~~~~~~~~~~~~~~~//
// MORE DESCRIPTION BUTTON //
//~~~~~~~~~~~~~~~~~~~~~~~~~//
function openCollapse()  {
    var collapse = document.getElementById("collapse");
    if (collapse.style.display == "block")  {
        collapse.style.display = "none";
        collapse.style.maxHeight = 0;
    }
    else  {
        collapse.style.display = "block";
        collapse.style.maxHeight = collapse.scrollHeight + "px";
    }
}
