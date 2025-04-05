let updateCartTimeout;
document.addEventListener("click", function (event) {
    let button = event.target.closest(".quantity-btn");
    if (!button) return;

    const delta = button.classList.contains("quantity-plus") ? 1 : -1;
    const form = button.closest(".quantity-form");
    const quantityInput = form.querySelector(".quantity");
    const quantityValue = parseInt(quantityInput.value) + delta;
    const index = form.querySelector('input[name="index"]').value;

    if (quantityValue > 0) {
        quantityInput.value = quantityValue;

        clearTimeout(updateCartTimeout);
        updateCartTimeout = setTimeout(() => {
            fetch("/cart/update", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                body: JSON.stringify({ index, quantity: quantityValue }),
            })
                .then((response) => response.json())
                .then((data) => {
                    document.querySelector(
                        `.line-item-total[data-index="${index}"]`
                    ).textContent =
                        parseFloat(data.lineTotal)
                            .toFixed(0)
                            .replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "₫";
                    document.querySelector(".total-price").textContent =
                        parseFloat(data.grandTotal)
                            .toFixed(0)
                            .replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "₫";
                })
                .catch((error) => console.error("Error updating cart:", error));
        }, 500); // Chỉ gửi request sau 500ms nếu không có thay đổi tiếp theo
    }
});

// Xóa sản phẩm khỏi giỏ hàng
function deleteProduct(index) {
    const isConfirmed = confirm("Bạn có chắc chắn muốn xóa không?");
    if (isConfirmed) {
        window.location.href = `/cart/remove/${index}`;
    }
}
