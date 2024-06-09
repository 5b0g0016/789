<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <!-- head 標籤內容已省略 -->
</head>
<body>
    <header>
        <!-- 網站標題和導航等 -->
    </header>
    
    <h1>商品列表</h1>
    
    <div class="container">
        <div class="product">
            <h2>產品 1</h2>
            <p>價格: $20</p>
            <form action="index.php" method="post">
                <input type="hidden" name="product_id" value="1">
                <button type="submit" name="add_to_cart">加入購物車</button>
            </form>
        </div>
        
        <div class="product">
            <h2>產品 2</h2>
            <p>價格: $30</p>
            <form action="index.php" method="post">
                <input type="hidden" name="product_id" value="2">
                <button type="submit" name="add_to_cart">加入購物車</button>
            </form>
        </div>
        
        <!-- 其他產品 -->
    </div>
    
    <footer>
        <!-- 頁面底部內容 -->
    </footer>
</body>
</html>
