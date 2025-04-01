<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('address', function (Blueprint $table) {
            $table->string('coordinates')->nullable()->comment('Tọa độ vị trí')->after('address');
        });
    }

    public function down()
    {
        Schema::table('address', function (Blueprint $table) {
            $table->dropColumn('coordinates');
        });
    }
};
// Để chạy migration này, bạn có thể sử dụng lệnh sau trong terminal:
// php artisan migrate
// Nếu bạn muốn quay lại migration này, bạn có thể sử dụng lệnh sau:
// php artisan migrate:rollback
// Lưu ý: Đảm bảo rằng bạn đã tạo bảng 'address' trước khi chạy migration này.
// Nếu bạn muốn thêm cột 'coordinates' vào một bảng khác, hãy thay đổi tên bảng và tên cột trong đoạn mã trên.
// Bạn cũng có thể thay đổi kiểu dữ liệu của cột 'coordinates' nếu cần thiết.
// Nếu bạn muốn thêm nhiều cột cùng một lúc, bạn có thể sử dụng phương thức 'addColumn' nhiều lần trong phương thức 'up'.
// Ví dụ:
// $table->string('new_column_1')->nullable();
// $table->integer('new_column_2')->default(0);
// $table->boolean('new_column_3')->default(false);
// Bạn cũng có thể thêm các ràng buộc khác như 'unique', 'index', 'foreign key' nếu cần thiết.
// Để đảm bảo rằng migration này hoạt động đúng, hãy kiểm tra lại cấu trúc bảng 'address' trong cơ sở dữ liệu của bạn.
// Bạn có thể sử dụng các công cụ quản lý cơ sở dữ liệu như phpMyAdmin hoặc DBeaver để kiểm tra cấu trúc bảng.
// Nếu bạn gặp bất kỳ lỗi nào khi chạy migration này, hãy kiểm tra lại cú pháp và đảm bảo rằng bạn đã kết nối đúng với cơ sở dữ liệu.
// Nếu bạn cần thêm thông tin về cách sử dụng migration trong Laravel, hãy tham khảo tài liệu chính thức của Laravel tại:
// https://laravel.com/docs/8.x/migrations
// Bạn cũng có thể tìm hiểu thêm về các phương thức khác của Blueprint trong tài liệu để tùy chỉnh migration theo nhu cầu của bạn.
// Nếu bạn muốn thêm các chỉ mục hoặc ràng buộc khác cho cột 'coordinates', bạn có thể làm như sau:
// $table->string('coordinates')->nullable()->index(); // Thêm chỉ mục cho cột 'coordinates'
// $table->string('coordinates')->nullable()->unique(); // Đảm bảo giá trị trong cột 'coordinates' là duy nhất
// $table->string('coordinates')->nullable()->default('0,0'); // Đặt giá trị mặc định cho cột 'coordinates'
// Bạn cũng có thể sử dụng các phương thức khác như 'after', 'before', 'first' để xác định vị trí của cột mới trong bảng.
// Ví dụ:
// $table->string('coordinates')->nullable()->after('existing_column'); // Thêm cột 'coordinates' sau cột 'existing_column'
// $table->string('coordinates')->nullable()->before('existing_column'); // Thêm cột 'coordinates' trước cột 'existing_column'
// $table->string('coordinates')->nullable()->first(); // Thêm cột 'coordinates' ở đầu bảng
// Nếu bạn muốn thêm cột 'coordinates' vào một bảng khác, hãy thay đổi tên bảng và tên cột trong đoạn mã trên.
// Bạn cũng có thể thay đổi kiểu dữ liệu của cột 'coordinates' nếu cần thiết.
// Nếu bạn muốn thêm nhiều cột cùng một lúc, bạn có thể sử dụng phương thức 'addColumn' nhiều lần trong phương thức 'up'.
// Ví dụ:
// $table->string('new_column_1')->nullable();
// $table->integer('new_column_2')->default(0);
// $table->boolean('new_column_3')->default(false);
// Bạn cũng có thể thêm các ràng buộc khác như 'unique', 'index', 'foreign key' nếu cần thiết.
// Để đảm bảo rằng migration này hoạt động đúng, hãy kiểm tra lại cấu trúc bảng 'address' trong cơ sở dữ liệu của bạn.
// Bạn có thể sử dụng các công cụ quản lý cơ sở dữ liệu như phpMyAdmin hoặc DBeaver để kiểm tra cấu trúc bảng.
// Nếu bạn gặp bất kỳ lỗi nào khi chạy migration này, hãy kiểm tra lại cú pháp và đảm bảo rằng bạn đã kết nối đúng với cơ sở dữ liệu.
// Nếu bạn cần thêm thông tin về cách sử dụng migration trong Laravel, hãy tham khảo tài liệu chính thức của Laravel tại:
// https://laravel.com/docs/8.x/migrations
// Bạn cũng có thể tìm hiểu thêm về các phương thức khác của Blueprint trong tài liệu để tùy chỉnh migration theo nhu cầu của bạn.
