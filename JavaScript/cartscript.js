var cartArray  = []
console.log(cartArray);
function Item(name, price, count, img) {
    this.name = name;
    this.price = price;
    this.count = count;
    this.imgFile = img
  }

var item1= new Item('Chicken Thighs', "$7.25", 1, 'Images/chicke.png' );
var item2 = new Item('Avocado', "$1.49", 1, 'Images/avocado1.png' );
var item3 = new Item('Italian Sausage', "$4.45", 1, 'Images/sausage.jpeg' );
var item4 = new Item('Quebon 10% Coffee Creme', "$2.25", 1, 'Images/creme1.png' );
var item5 = new Item('California Eggplant', "$2.49", 1, 'Images/eggplant1.png' );

if (sessionStorage.getItem("cartArray") == null) {
    cartArray = [item1, item2, item3, item4, item5];
    saveCart()
    console.log(sessionStorage);
}
if (sessionStorage.getItem("cartArray") != null) {
    loadCart();
    }

 function saveCart() {
    sessionStorage.setItem('cartArray', JSON.stringify(cartArray));
}
function loadCart() {
    cartArray = JSON.parse(sessionStorage.getItem('cartArray'));
  }

displayCart()
function displayCart() {
var result = "";
  for(var i in cartArray) {
    result += `
    <div class="cart-row" id="${cartArray[i].name}"> 
      <div class="cart-item cart-column">
          <img class="cart-item-image" src=${cartArray[i].imgFile} width="100" height="100">
          <span class="cart-item-title">${cartArray[i].name}</span>
      </div>
      <span class="cart-price cart-column">${cartArray[i].price}</span>
      <div class="cart-quantity cart-column">
      <div class="quantity">
          <button class="plus-btn" type="cartbutton" name="button">
            <div class="plus">+</div>
          </button>
          <input class ="cart-quantity-input" type="text" name="name" value=${cartArray[i].count}>
          <button class="minus-btn" type="cartbutton" name="button">
              <div class="minus">-</div>
          </button>
        </div>
      <button class="btn btn-danger" type="cartbutton">X</button>
      </div>
  </div>
 `;
  };
  document.getElementById('productcart').innerHTML = result;
  updateCartTotal()
}


  var removeItemButtons = document.getElementsByClassName('btn-danger')
  for (var i = 0; i < removeItemButtons.length; i++) {
      var button = removeItemButtons[i];
      button.addEventListener('click', removeItem)
  }

  function removeItem(event) {
    var buttonClicked = event.target;
    var removeID = buttonClicked.parentElement.parentElement.id;
    console.log(removeID);
   for (var i = 0; i < cartArray.length; i++) {
       console.log(i);
       if (cartArray[i].name == removeID){
            cartArray.splice(i, 1);
            break;
        }
    }
    buttonClicked.parentElement.parentElement.remove()
    console.log(cartArray);
    saveCart()
    updateCartTotal()
}

$('.minus-btn').on("click", function() {
  var $button = $(this);
  var oldValue = $button.parent().find('input').val();

   // Don't allow decrementing below 1
    if (oldValue > 1) {
      var newVal = parseFloat(oldValue) - 1;
    } else {
      newVal = 1;
    }
  
  $button.parent().find('input').val(newVal);
  saveQuantity()
  saveCart()
  updateCartTotal()

});

$('.plus-btn').on("click", function() {
  var $button = $(this);
  var oldValue = $button.parent().find('input').val();

      var newVal = parseFloat(oldValue) + 1;
  
  $button.parent().find('input').val(newVal);
  saveQuantity()
  saveCart()
  updateCartTotal()

});

function saveQuantity(){
    var cartItemContainer = document.getElementsByClassName('cart-items')[0]
    var cartRows = cartItemContainer.getElementsByClassName('cart-row')
    for (var i = 0; i < cartRows.length; i++) {
      var cartRow = cartRows[i]
      var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0]
      console.log( quantityElement.value);
        cartArray[i].count = quantityElement.value}
        console.log(cartArray);
    saveCart();
}

function quantityChanged(event) {
  var input = event.target
  if (isNaN(input.value) || input.value <= 0) {
      input.value = 1
  }
  updateCartTotal()
}

function updateCartTotal() {
  var cartItemContainer = document.getElementsByClassName('cart-items')[0]
  var cartRows = cartItemContainer.getElementsByClassName('cart-row')
  var subTotal = 0;
  for (var i = 0; i < cartRows.length; i++) {
      var cartRow = cartRows[i]
      var priceElement = cartRow.getElementsByClassName('cart-price')[0]
      var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0]
      var price = parseFloat(priceElement.innerHTML.replace('$', ''));
      var quantity = quantityElement.value;
      subTotal = subTotal + (price * quantity);
  }
  subTotal = Math.round(subTotal * 100) / 100
  var taxesQST = Math.round(subTotal*0.09975 * 100) / 100;
  var taxesGST = Math.round(subTotal*0.05 * 100) / 100;
  var shipping;
  if (subTotal==0)
      shipping = 0;
  else
      shipping = 4.75;
  var total = Math.round((subTotal + taxesQST + taxesGST + shipping) * 100) / 100;
  window.sessionStorage.setItem("subtotal",subTotal.toFixed(2));
  window.sessionStorage.setItem("taxesQST",taxesQST .toFixed(2));
  window.sessionStorage.setItem("taxesGST",taxesGST.toFixed(2));
  window.sessionStorage.setItem("shipping",shipping.toFixed(2));
  window.sessionStorage.setItem("total",total.toFixed(2));

 document.getElementsByClassName('cart-subtotal-price')[0].innerHTML = '$' + window.sessionStorage.getItem("subtotal");
  document.getElementsByClassName('cart-taxesQST-price')[0].innerHTML = '$' + window.sessionStorage.getItem("taxesQST");
  document.getElementsByClassName('cart-taxesGST-price')[0].innerHTML = '$' + window.sessionStorage.getItem("taxesGST");
  document.getElementsByClassName('cart-shipping-price')[0].innerHTML = '$' + window.sessionStorage.getItem("shipping");
  document.getElementsByClassName('cart-total-price')[0].innerHTML = '$' + window.sessionStorage.getItem("total");
 
  console.log(sessionStorage);

}

document.getElementsByClassName('btn-purchase')[0].addEventListener('click', purchaseClicked)   
function purchaseClicked() {
        alert('Purchase completed')
        var cartItems = document.getElementsByClassName('cart-items')[0]
        while (cartItems.hasChildNodes()) {
            cartItems.removeChild(cartItems.firstChild)
        }

        for (var i = 0; i < cartArray.length; i++) {
               cartArray.splice(i, cartArray.length);
           }
           saveCart();
        updateCartTotal()
    }


