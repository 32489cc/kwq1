<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>利用状況画面</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            width: 100%;
        }

        header {
            position: fixed;
            top: 0;
            left: 200px;
            width: calc(100% - 200px);
            display: flex;
            align-items: center;
            background-color: #fff;
            padding: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .input-box {
            margin-right: 10px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn {
            margin-left: 10px;
            padding: 5px 10px;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .sidebar {
            width: 200px;
            background-color: #333;
            color: #fff;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 50px;
            z-index: 1000;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #444;
        }

        main {
            margin-left: 200px;
            margin-top: 70px;
            padding: 20px;
            width: calc(100% - 200px);
        }

        h2 {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 4px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

    </style>
</head>
<body>

<div class="container">
    <?php
        1234567
    $str='<div>90</div>\n<html>100</html>\n<div>aaaaa300</h1>';
    sfsfsdfsdfsd
    dd()
        dd

        ddd
    preg_match_all('/<html>.*$/m',$str,$matches);
    dd($matches);
    ?>
{{--    <div class="sidebar">--}}
{{--        <ul>--}}
{{--            <li>メニュー項目1</li>--}}
{{--            <li>メニュー項目2</li>--}}
{{--            <li>メニュー項目3</li>--}}
{{--        </ul>--}}
{{--    </div>--}}

    @if(isset($errors))
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <header>


        <form action="{{route('post_insured_no')}}" method="post">
        <input type="text" class="input-box" placeholder="20201" name="insured_no" value="">
        <input type="text" class="input-box" placeholder="野村姓1 本人名 / 55歳">
        <input type="text" class="input-box" placeholder="1-1001">
        <input type="text" class="input-box" placeholder="野村證券株式会社 本社勤務">
        <button class="btn">F2: 検索</button>
        <button class="btn">F8: コピー</button>
        </form>
    </header>
    <main>
        <h2>資格状況</h2>
        <table>
            <thead>
            <tr>
                <th>氏名</th>
                <th>年齢</th>
                <th>性別</th>
                <th>続柄</th>
                <th>資格</th>
                <th>資格取得日</th>
                <th>資格失効日</th>
                <th>窓訪室数</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>野村姓1 本人名</td>
                <td>55</td>
                <td>男</td>
                <td>本人</td>
                <td>一般</td>
                <td>平成4年4月1日</td>
                <td></td>
                <td>4</td>
            </tr>
            <tr>
                <td>野村姓1 夫名</td>
                <td>55</td>
                <td>男</td>
                <td>夫</td>
                <td>一般</td>
                <td>平成4年4月1日</td>
                <td></td>
                <td>4</td>
            </tr>
            <!-- Add more rows as needed -->
            </tbody>
        </table>

        <h2>利用状況</h2>
        <table>
            <thead>
            <tr>
                <th>種区分</th>
                <th>首営保監所</th>
                <th>ハウパビレッジ</th>
                <th>会賓保監所</th>
                <th>契約保監所</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>世帯</td>
                <td>利用回数</td>
                <td>宿泊回数</td>
                <td>今年</td>
                <td>昨年</td>
            </tr>
            <tr>
                <td>本人</td>
                <td>利用回数</td>
                <td>宿泊回数</td>
                <td>今年</td>
                <td>昨年</td>
            </tr>
            <!-- Add more rows as needed -->
            </tbody>
        </table>
    </main>
</div>
</body>
<script src="https://cdn.staticfile.org/jquery/3.3.1/jquery.min.js"></script>
<script src="{{'/js/usage/status.js'}}">
</script>
</html>
