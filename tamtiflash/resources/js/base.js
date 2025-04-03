// path: index
const menuToggle = document.getElementById("menuToggle");
const modalMenu = document.getElementById("modalMenu");
const searchToggle = document.getElementById("searchToggle");
const modalSearch = document.getElementById("modalSearch");
const overlay = document.getElementById("overlay");

menuToggle.addEventListener("click", () => {
    modalMenu.classList.add("active");
    overlay.classList.add("active");
});

searchToggle.addEventListener("click", () => {
    modalSearch.classList.add("active");
    overlay.classList.add("active");
});

overlay.addEventListener("click", () => {
    modalMenu.classList.remove("active");
    modalSearch.classList.remove("active");
    overlay.classList.remove("active");
});

// Thêm vào giỏ hàng
document.addEventListener("click", function (event) {
    const target = event.target.closest(".cart-btn");
    if (!target) return; // Nếu không phải button, thoát khỏi hàm

    const id = target.getAttribute("data-product-id");

    fetch("/cart/add", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
        body: JSON.stringify({ id, id_variant: null, quantity: 1 }),
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

