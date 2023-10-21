document.addEventListener("DOMContentLoaded", function () {
    // Listen for changes in quantity when the quantity input field changes
    $('.qty-input').on('input', function() {
        updateSubtotal($(this));
    });

    // Listen for increase and reduce button clicks
    $('.btn-increase, .btn-reduce').click(function(e) {
        e.preventDefault();
        var cartId = $(this).data('cart-id');
        var quantityInput = $('.qty-input[data-cart-id="' + cartId + '"]');
        var newQuantity = parseInt(quantityInput.val());

        if ($(this).hasClass('btn-increase')) {
            newQuantity++;
        } else {
            if (newQuantity > 1) {
                newQuantity--;
            }
        }

        quantityInput.val(newQuantity);
        updateSubtotal(quantityInput);
    });


function updateSubtotal(quantityInput) {
    var cartId = quantityInput.data('cart-id');
    var eachPrice = parseFloat(quantityInput.closest('.pr-cart-item').find('.each-price').text().replace('$', ''));
    var newQuantity = parseInt(quantityInput.val());
    var subtotal = eachPrice * newQuantity;

    axios.post('/update-quantity', {
            cartId: cartId,
            quantity: quantityInput.val(),
        })
        .catch(error => {
            console.error('Error updating quantity:', error);
        });
    
    // Update the subtotal text and total value
    $('#subtotal-' + cartId).text('$' + subtotal.toFixed(2));

    // Calculate and update the total
    var total = 0;
    $('.qty-input').each(function() {
        var itemTotal = parseFloat($(this).closest('.pr-cart-item').find('.price.subttl').text().replace('$', ''));
        total += itemTotal;
    });
    $('#newsubtotal').text('$' + total.toFixed(2));
    $('#newtotal').text('$' + total.toFixed(2));
}
});
