document.addEventListener("DOMContentLoaded", function () {
    const increaseButtons = document.querySelectorAll('.btn-increase');
    const reduceButtons = document.querySelectorAll('.btn-reduce');

    increaseButtons.forEach(button => {
        button.addEventListener('click', function () {
            const input = this.previousElementSibling;
            const newValue = parseInt(input.value, 10) + 1;
            updateQuantity(input, newValue);
        });
    });

    reduceButtons.forEach(button => {
        button.addEventListener('click', function () {
            const input = this.closest('.quantity-input').querySelector('.qty-input');
            const newValue = Math.max(1, parseInt(input.value, 10) - 1);
            updateQuantity(input, newValue);
        });
    });

    function updateQuantity(input, newValue) {
        const cartId = input.dataset.cartId;

        axios.post('/update-quantity', {
            cartId: cartId,
            quantity: newValue,
        })
        .then(response => {
            input.value = newValue;
            updateSubtotal(cartId, newValue);
            calculateTotal();
        })
        .catch(error => {
            console.error('Error updating quantity:', error);
        });
    }

    function updateSubtotal(cartId, quantity) {
        const discountedPrice = parseFloat(document.querySelector(`[data-cart-id="${cartId}"] .produtc-price .price`).innerText.replace('$', ''));
        const newSubtotal = discountedPrice * quantity;

        document.querySelector(`[data-cart-id="${cartId}"] .sub-total .subttl`).innerText = `$${newSubtotal}`;
    }

    function calculateTotal() {
        let totalPrice = 0;

        document.querySelectorAll('.pr-cart-item').forEach(item => {
            const quantity = parseInt(item.querySelector('.quantity-input input').value, 10);
            const discountedPrice = parseFloat(item.querySelector('.produtc-price .price').innerText.replace('$', ''));
            const subtotal = discountedPrice * quantity;
            totalPrice += subtotal;
        });

        document.getElementById('subtotal').innerText = `$${totalPrice.toFixed(2)}`;
        document.getElementById('total').innerText = `$${totalPrice.toFixed(2)}`;
    }
});
