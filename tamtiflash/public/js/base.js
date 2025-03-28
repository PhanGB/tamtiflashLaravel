// path: index
const menuToggle = document.getElementById('menuToggle');
const modalMenu = document.getElementById('modalMenu');
const searchToggle = document.getElementById('searchToggle');
const modalSearch = document.getElementById('modalSearch');
const overlay = document.getElementById('overlay');

menuToggle.addEventListener('click', () => {
    modalMenu.classList.add('active');
    overlay.classList.add('active');
});

searchToggle.addEventListener('click', () => {
    modalSearch.classList.add('active');
    overlay.classList.add('active');
});

overlay.addEventListener('click', () => {
    modalMenu.classList.remove('active');
    modalSearch.classList.remove('active');
    overlay.classList.remove('active');
});



// path: products
let cart = [];

function renderCart() {
    let cartItems = $('#cart-items');
    cartItems.empty();
    let total = 0;

    if (cart.length === 0) {
        cartItems.html('<li class="list-group-item text-center" style="width: 100%; font-size:15px;">Giỏ hàng đang trống!</li>');
        $('#total-price').text('0');
    } else {
        cart.forEach(item => {
            total += item.price * item.quantity;
            cartItems.append(`
                <li class="list-group-item d-flex justify-content-between align-items-center" style="width:400px;">
                    <img src="${item.image || 'default.jpg'}" alt="" style="width: 40px; height: 40px;">
                    <span>${item.name} - <strong>${(item.price * item.quantity).toLocaleString()}đ</strong></span>
                    <input type="number" class="form-control quantity-input" 
                           data-id="${item.id}" value="${item.quantity}" 
                           min="1" max="10" style="width: 60px; font-size: 14px;">
                    <button class="btn btn-danger btn-sm remove-from-cart" data-id="${item.id}" style="font-size:12px">Xóa</button>
                </li>
            `);
        });
        $('#total-price').text(total.toLocaleString());
    }
}

$(document).ready(function () {
    // Khởi tạo giỏ hàng
    renderCart();

    // Xử lý thêm vào giỏ hàng
    $(document).on('click', '.add-to-cart', function () {
        let productDiv = $(this).closest('.product');
        let id = productDiv.data('id');
        let name = productDiv.data('name');
        let price = parseInt(productDiv.data('price')); // Chuyển thành số
        let image = productDiv.data('image') || 'default.jpg'; // Thêm fallback cho ảnh

        let existingItem = cart.find(item => item.id === id);

        if (existingItem) {
            existingItem.quantity++;
        } else {
            cart.push({ id, name, price, image, quantity: 1 });
        }
        renderCart();
    });

    // Xử lý thay đổi số lượng
    $(document).on('change', '.quantity-input', function () {
        let id = $(this).data('id');
        let newQuantity = parseInt($(this).val());

        if (newQuantity >= 1 && newQuantity <= 10) {
            let item = cart.find(i => i.id === id);
            if (item) {
                item.quantity = newQuantity;
                renderCart();
            }
        } else {
            $(this).val(1);
        }
    });

    // Xử lý xóa sản phẩm
    $(document).on('click', '.remove-from-cart', function () {
        let id = $(this).data('id');
        cart = cart.filter(i => i.id !== id);
        renderCart();
    });
});