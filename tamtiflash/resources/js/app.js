import './bootstrap';
// import '../css/bootstrap.min.css';


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$(document).ready(function() {
    // Load danh sách khách hàng và nhân viên khi mở Modal
    $.ajax({
        url: '/get-users-and-admins',
        method: 'GET',
        success: function(data) {
            // Load khách hàng vào dropdown
            data.users.forEach(function(user) {
                $('#id_user').append('<option value="'+ user.id +'">'+ user.name +'</option>');
            });
            // Load nhân viên vào dropdown
            data.admins.forEach(function(admin) {
                $('#id_driver').append('<option value="'+ admin.id +'">'+ admin.name +'</option>');
            });
        }
    });

    // AJAX tìm kiếm đơn hàng
    $('#searchForm').submit(function(e) {
        e.preventDefault();
        var query = $('#searchInput').val();
        $.ajax({
            url: '/search-orders',
            method: 'GET',
            data: { search: query },
            success: function(data) {
                $('#ordersTable tbody').html(data); // Cập nhật bảng đơn hàng
            }
        });
    });

    // AJAX lọc đơn hàng theo trạng thái
    $('#filterForm').submit(function(e) {
        e.preventDefault();
        var status = $('#statusFilter').val();
        $.ajax({
            url: '/filter-orders',
            method: 'GET',
            data: { status: status },
            success: function(data) {
                $('#ordersTable tbody').html(data); // Cập nhật bảng đơn hàng
            }
        });
    });

    // AJAX Thêm đơn hàng
    $('#addOrderForm').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: '/orders',
            method: 'POST',
            data: formData,
            success: function(response) {
                alert('Đơn hàng đã được thêm!');
                $('#addOrderModal').modal('hide');
                loadOrders(); // Reload danh sách đơn hàng
            },
            error: function(xhr, status, error) {
                alert('Lỗi khi thêm đơn hàng!');
            }
        });
    });

    // AJAX Xóa đơn hàng
    $(document).on('click', '.deleteOrder', function() {
        var orderId = $(this).data('id');
        if (confirm('Bạn chắc chắn muốn xóa đơn hàng này?')) {
            $.ajax({
                url: '/orders/' + orderId,
                method: 'DELETE',
                success: function(response) {
                    alert('Đơn hàng đã được xóa!');
                    loadOrders(); // Reload danh sách đơn hàng
                },
                error: function(xhr, status, error) {
                    alert('Lỗi khi xóa đơn hàng!');
                }
            });
        }
    });

    // Load đơn hàng
    function loadOrders() {
        $.ajax({
            url: '/orders',
            method: 'GET',
            success: function(data) {
                $('#ordersTable tbody').html(data); // Cập nhật bảng đơn hàng
            }
        });
    }

    // Initial load of orders
    loadOrders();
});