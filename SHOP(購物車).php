<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>豪華賣東西網頁</title>
    <style>
        /* CSS 样式已省略 */
    </style>
</head>
<body>
    <header>
        <!-- 網站標題和導航等 -->
    </header>
    
    <h1>購物車</h1>
    
    <div class="container">
        <?php
            session_start();
            
            // 初始化購物車
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }
            
            // 添加商品到購物車
            if (isset($_POST['add_to_cart'])) {
                $product_id = $_POST['product_id'];
                if (!isset($_SESSION['cart'][$product_id])) {
                    $_SESSION['cart'][$product_id] = 1;
                } else {
                    $_SESSION['cart'][$product_id]++;
                }
            }
            
            // 移除商品從購物車
            if (isset($_GET['remove_from_cart'])) {
                $product_id = $_GET['remove_from_cart'];
                if (isset($_SESSION['cart'][$product_id])) {
                    unset($_SESSION['cart'][$product_id]);
                }
            }
            
            // 顯示購物車內容
            if (count($_SESSION['cart']) > 0) {
                foreach ($_SESSION['cart'] as $product_id => $quantity) {
                    // 在這裡從資料庫中獲取產品資訊，這裡使用示例資料
                    $product_name = "產品 {$product_id}";
                    $product_price = rand(10, 100);
                    
                    echo "<div class='product'>";
                    echo "<h2>{$product_name}</h2>";
                    echo "<p>價格: $ {$product_price}</p>";
                    echo "<p>數量: {$quantity}</p>";
                    echo "<a href='index.php?remove_from_cart={$product_id}'>移除</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>購物車是空的</p>";
            }
        ?>
    </div>
    
    <footer>
        <!-- 頁面底部內容 -->
    </footer>
</body>
</html>
