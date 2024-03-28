<?php
class Pagination {
    private $config = [
        'total' => 0,
        'limit' => 0,
        'full' => true,
        'querystring' =>'page'
    ];
    
    public function __construct($config = []) {
        $condition1 = isset($config['limit']) && $config['limit'] < 0;
        $condition2 = isset($config['total']) && $config['total'] < 0;
        
        if ($condition1 || $condition2) {
            die('limit và total không được < 0');
        }
        
        if (!isset($config['querystring'])) {
            $config['querystring'] = 'page';
        }
        
        $this->config = $config;
    }
    
    private function getTotalPage() {
        $total = $this->config['total'];
        $limit = $this->config['limit'];
        return ceil($total / $limit);
    }
    
    public function getCurrentPage() {
        if (isset($_GET[$this->config['querystring']]) && (int)$_GET[$this->config['querystring']] >= 1) {
            $t = (int)$_GET[$this->config['querystring']];
            if ($t > $this->getTotalPage()) {
                return (int)$this->getTotalPage();
            } else {
                return $t;
            }
        } else {
            return 1;
        }
    }
    
    private function getPrePage() {
        if ($this->getCurrentPage() === 1) {
            return '';
        } else {
            return '<li class="item"><a class="text" href="' .
            $_SERVER['PHP_SELF'] . '?' .
            $this->config['querystring'] . '=' .
            ($this->getCurrentPage() - 1) . '">Previous</a></li>';
        }
    }
    
    private function getNextPage() {
        if ($this->getCurrentPage() >= $this->getTotalPage()) {
            return '';
        } else {
            return '<li class="item"><a class="text" href="' .
            $_SERVER['PHP_SELF'] . '?' .
            $this->config['querystring'] . '=' .
            ($this->getCurrentPage() + 1) . '">NEXT</a></li>';
        }
    }
    
    public function getPagination() {
        $data = ''; // Không cần thiết vì danh sách sản phẩm không được xây dựng trong class này

        $totalPages = $this->getTotalPage();
        $currentPage = $this->getCurrentPage();

        // Tính toán chỉ mục bắt đầu và kết thúc của phạm vi nút hiển thị
        $start = max(1, min($currentPage - 5, $totalPages - 9));
        $end = min($totalPages, $start + 9);

        // Hiển thị nút phân trang trong phạm vi đã tính toán
        $paginationHTML = '<ul class="main-nav">';
        $paginationHTML .= $this->getPrePage();
        for ($i = $start; $i <= $end; $i++) {
            if ($i === $currentPage) {
                $paginationHTML .= '<li class="item active"><a href="#" class="text">' . $i . '</a></li>';
            } else {
                $paginationHTML .= '<li class="item"><a class="text" href="' .
                    $_SERVER['PHP_SELF'] . '?' . $this->config['querystring'] . '=' .
                    $i . '">' . $i . '</a></li>';
            }
        }
        $paginationHTML .= $this->getNextPage();
        $paginationHTML .= '</ul>';

        // Generate HTML for the pagination controls
        $html = '<div class="product-pagination-container">' . $paginationHTML  .'</div>';

        // Return the combined HTML
        return $html;
    }
}
?>
