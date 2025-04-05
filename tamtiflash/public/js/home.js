// Chọn tất cả tiêu đề tab và nội dung tab
const tabTitles = document.querySelectorAll('.filter-btn');
const tabContents = document.querySelectorAll('.products-box');

// Hàm xóa class 'active' khỏi tất cả tiêu đề và nội dung
function clearActiveClasses() {
    tabTitles.forEach(title => title.classList.remove('active'));
    tabContents.forEach(content => content.classList.remove('active'));
}

// Thêm sự kiện click cho từng tiêu đề tab
tabTitles.forEach((title, index) => {
    title.addEventListener('click', () => {
        // Xóa class 'active' trước đó
        clearActiveClasses();

        // Thêm class 'active' cho tab tiêu đề và nội dung hiện tại
        title.classList.add('active');
        tabContents[index].classList.add('active');
    });
});
// Lắng nghe sự kiện nhấp vào nút "Thức ăn"
document.querySelector('.filter-btn.active').addEventListener('click', function() {
    showFoodProducts();
});

// Lắng nghe sự kiện nhấp vào nút "Nước uống"
document.querySelector('.filter-btn:nth-child(2)').addEventListener('click', function() {
    showDrinkProducts();
});

function showFoodProducts() {
    // Hiển thị sản phẩm thức ăn và ẩn sản phẩm nước uống
    document.getElementById('food').classList.add('active');
    document.getElementById('drink').classList.remove('active');

    // Thay đổi trạng thái của các nút
    document.querySelector('.filter-btn.active').classList.remove('active');
    document.querySelector('.filter-btn:nth-child(2)').classList.add('active');
}

function showDrinkProducts() {
    // Hiển thị sản phẩm nước uống và ẩn sản phẩm thức ăn
    document.getElementById('food').classList.remove('active');
    document.getElementById('drink').classList.add('active');

    // Thay đổi trạng thái của các nút
    document.querySelector('.filter-btn.active').classList.remove('active');
    document.querySelector('.filter-btn:nth-child(1)').classList.add('active');
}
