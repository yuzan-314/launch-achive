<!DOCTYPE html>
<html lang="ko">
<head>
<?php
    include "db_conn.php";

    // 데이터 가져오기
    $query = "SELECT name, date, meal, review FROM launch";
    $result = mysqli_query($conn, $query);

    // 쿼리 실패 시 오류 메시지 출력
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>성공을 위한 다목적 런치 아카이브</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>성공을 위한 다목적 런치 아카이브</h1>
        <form id="mealForm" action="db.php" method="post">
            <label for="name">이름:</label>
            <select id="name" name="name" required>
                <option value="김건우">김건우</option>
                <option value="민유진">민유진</option>
                <option value="변서윤">변서윤</option>
                <option value="조승우">조승우</option>
                <option value="정태수">정태수</option>
                <option value="김지운">김지운</option>
            </select>
            <label for="date">날짜:</label>
            <input type="date" id="date" name="date" required>
            <label for="meal">점심 메뉴:</label>
            <input type="text" id="meal" name="meal" required>
            <label for="review">한줄평:</label>
            <input type="text" id="review" name="review"required>
        
            <button type="submit">추가</button>
        </form>
        <from id="del" action="dp.php" method="post">
            <button id="deleteButton" name="deleteButton">모든 데이터 삭제</button>
        </from>
        <table id="mealTable">
            <thead>
                <tr>
                    <th>이름</th>
                    <th>날짜</th>
                    <th>점심 메뉴</th>
                    <th>한줄평</th>
                    <th>삭제</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    $name = $row['name'];
                    $date = $row['date'];
                    $meal = $row['meal'];
                    $review = $row['review'];

                ?>
                    <tr>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $date; ?></td>
                        <td><?php echo $meal; ?></td>
                        <td><?php echo $review; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- <script src="script.js"></script> 안쓸거임-->
</body>
</html>
