<?php
// Đường dẫn tới thư mục chứa các file của Facebook SDK
$path = __DIR__ . '/Facebook/';

// Autoload các lớp bằng cách include file tương ứng dựa trên tên lớp
spl_autoload_register(function ($class) use ($path) {
    // Chuyển tên lớp sang đường dẫn file
    $file = $path . str_replace('\\', '/', $class) . '.php';

    // Nếu file tồn tại, thì include
    if (file_exists($file)) {
        include $file;
    }
});
?>
