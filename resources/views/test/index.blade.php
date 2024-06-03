<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>牙科预约表单</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="datetime-local"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group textarea {
            height: 100px;
            resize: vertical;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #5cb85c;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #4cae4c;
        }

    </style>
</head>
<body>

<div class="container">ss
    @if(isset($errors))
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h2>牙科预约</h2>
    <form action="{{route('register')}}" method="post">
        <div class="form-group">
            <label for="username">用户名:</label>
            <input type="text" id="username" name="username" >
        </div>
        <div class="form-group">
            <label for="email">邮箱:</label>
            <input type="email" id="email" name="email" >
        </div>
        <div class="form-group">
            <label for="appointment-time">预约时间:</label>
            <input type="datetime-local" id="appointment-time" name="appointment_time" required>
        </div>
        <div class="notes">
            <label for="appointment-time">注意事项:</label>
            <textarea class="form-control" id="content" name="comment" rows="3" placeholder="本文"></textarea>
            <p>请确保您的联系信息准确无误，我们将通过邮件确认您的预约时间。</p>
        </div>
        <button type="submit">提交预约</button>
    </form>
</div>
</body>
</html>

