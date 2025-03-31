document.addEventListener("DOMContentLoaded", function () {
    const decreaseBtn = document.querySelector(
        ".product-detail__quantity-btn--decrease"
    );
    const increaseBtn = document.querySelector(
        ".product-detail__quantity-btn--increase"
    );
    const quantityInput = document.querySelector(
        ".product-detail__quantity-input"
    );

    decreaseBtn.addEventListener("click", function () {
        let value = parseInt(quantityInput.value);
        if (value > 1) {
            quantityInput.value = value - 1;
        }
    });

    increaseBtn.addEventListener("click", function () {
        let value = parseInt(quantityInput.value);
        quantityInput.value = value + 1;
    });
});
