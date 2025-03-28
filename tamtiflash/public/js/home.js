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
