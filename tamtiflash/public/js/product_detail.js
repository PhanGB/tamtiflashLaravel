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

// Thêm vào giỏ hàng
document.addEventListener("click", function (event) {
    const target = event.target.closest(".product-detail__add-to-cart-btn");
    if (!target) return; // Nếu không phải button, thoát khỏi hàm

    const id = target.getAttribute("data-product-id");

    const variantElement = document.querySelector(
        ".product-detail__topping-checkbox:checked"
    );
    let id_variant;
    if (variantElement) {
        id_variant = variantElement.value;
    } else {
        id_variant = null;
    }

    const quantity = document.querySelector(
        ".product-detail__quantity-input"
    ).value;

    fetch("/cart/add", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
        body: JSON.stringify({ id, id_variant, quantity }),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                if (data.success) {
                    document.querySelector(".cart-quantity").textContent =
                        data.cart_count;
                }
                alert("Thêm giỏ hàng thành công!");
            }
        })
        .catch((error) => console.error("Error:", error));
});
