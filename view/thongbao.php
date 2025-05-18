<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Báo - Nhân Viên Gym CR7</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }

        header {
            background-color: #1e88e5;
            color: #fff;
            padding: 1rem;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .search-container {
            margin-bottom: 20px;
        }

        .search-container input[type="text"] {
            width: calc(100% - 100px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search-container button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            margin-left: 10px;
        }

        .search-container button:hover {
            background-color: #0056b3;
        }

        .notification {
            background: #e7f3fe;
            border-left: 5px solid #2196F3;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }

        .notification h3 {
            margin-bottom: 5px;
        }

        .notification p {
            margin: 5px 0 0;
        }

        .add-notification {
            margin-top: 20px;
        }

        .add-notification input[type="text"] {
            width: calc(100% - 100px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .add-notification button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #28a745;
            color: white;
            cursor: pointer;
            margin-left: 10px;
        }

        .add-notification button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<header>
    <h1>Thông Báo Nhân Viên</h1>
</header>

<div class="container">
    <div class="search-container">
        <input type="text" placeholder="Tìm kiếm thông báo...">
        <button>Tìm kiếm</button>
    </div>

    <div class="notifications">
        <div class="notification">
            <h3>Thông báo 1</h3>
            <p>Họp mặt nhân viên vào lúc 10h sáng thứ Hai.</p>
        </div>
        <div class="notification">
            <h3>Thông báo 2</h3>
            <p>Nhắc nhở: Thời gian làm việc tháng này sẽ thay đổi.</p>
        </div>
        <div class="notification">
            <h3>Thông báo 3</h3>
            <p>Đào tạo kỹ năng mới vào thứ Tư tuần này.</p>
        </div>
    </div>

    
</div>

</body>
</html>