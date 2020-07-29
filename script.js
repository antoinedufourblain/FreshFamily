
var removeItemButtons = document.getElementsByClassName('btn-danger')
    for (var i = 0; i < removeItemButtons.length; i++) {
        var button = removeItemButtons[i]
        button.addEventListener('click', removeItem)
    }

document.getElementsByClassName('btn-purchase')[0].addEventListener('click', purchaseClicked)   
function purchaseClicked() {
        alert('Purchase completed')
        var cartItems = document.getElementsByClassName('cart-items')[0]
        while (cartItems.hasChildNodes()) {
            cartItems.removeChild(cartItems.firstChild)
        }
        updateCartTotal()
    }

function removeItem(event) {
    var buttonClicked = event.target
    buttonClicked.parentElement.parentElement.remove()
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
    updateCartTotal()
  
  });

  $('.plus-btn').on("click", function() {

    var $button = $(this);
    var oldValue = $button.parent().find('input').val();
  
        var newVal = parseFloat(oldValue) + 1;
    
    $button.parent().find('input').val(newVal);
    updateCartTotal()
  
  });

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
    var subTotal = 0
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
    
    document.getElementsByClassName('cart-subtotal-price')[0].innerHTML = '$' + subTotal.toFixed(2);
    document.getElementsByClassName('cart-taxesQST-price')[0].innerHTML = '$' + taxesQST.toFixed(2);
    document.getElementsByClassName('cart-taxesGST-price')[0].innerHTML = '$' + taxesGST.toFixed(2);
    document.getElementsByClassName('cart-shipping-price')[0].innerHTML = '$' + shipping.toFixed(2);
    document.getElementsByClassName('cart-total-price')[0].innerHTML = '$' + total.toFixed(2);
    console.log(sessionStorage(total))
}