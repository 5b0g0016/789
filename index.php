<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>豪華賣東西網頁</title>
</head>
<body>
    <header>
        <h1>歡迎來到我們的豪華網上商店</h1>
        <div class="search-container">
            <form action="search.php" method="GET">
                <input type="text" name="keyword" placeholder="搜尋產品...">
                <button type="submit">搜尋</button>
            </form>
        </div>
    </header>

    <div class="container">
        <?php
            // 連接到你的產品資料庫
            $dbHost = 'localhost';
            $dbUsername = 'username';
            $dbPassword = 'password';
            $dbName = 'database_name';

            $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

            // 檢查連接是否成功
            if ($conn->connect_error) {
                die("連接失敗: " . $conn->connect_error);
            }

            // 如果有搜索關鍵字，從資料庫中查找相關產品
            if(isset($_GET['keyword'])) {
                $keyword = $_GET['keyword'];
                $sql = "SELECT * FROM products WHERE name LIKE '%$keyword%' OR description LIKE '%$keyword%'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // 顯示搜尋結果
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='product'>";
                        echo "<h2>" . $row['name'] . "</h2>";
                        echo "<p>" . $row['description'] . "</p>";
                        echo "<p>價格: $" . $row['price'] . "</p>";
                        echo "<button>加入購物車</button>";
                        echo "</div>";
                    }
                } else {
                    echo "沒有找到相關產品";
                }
            }
        ?>
    </div>

</body>
</html>
