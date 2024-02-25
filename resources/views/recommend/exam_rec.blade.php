<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>大学考试分类结构</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('css/common/common.css')}}">
    <style>

        .faculty-container {
            background-color: #e7f3ff;
            font-weight: bold;
            margin-bottom: 5px;
            cursor: pointer;
        }

        .subject-container {
            background-color: #e7f3ff;
            font-weight: bold;
            margin-left: 20px; /* 增加左侧内边距来创建二级菜单效果 */
            margin-bottom: 5px;
            cursor: pointer;
        }

        .exam-category-container {
            margin-top: 5px;
            padding-left: 20px; /* 对于考试分类，也可以添加一些内边距 */
        }

        .custom-table .table {
            margin-top: 5px;
        }
        .download-button-container {
            text-align: right; /* 将按钮对齐到右边 */
            padding: 10px;
        }
        .title-container {
            text-align: left;
            margin-bottom: 20px;

        }
        .hamburger{
            display: none;
        }
    </style>
</head>
<body>

@include('inc/header/header')


<div class="container mt-3">
    <div class="title-container">
        <h1 class="text-dark fw-bold">大学名称</h1>
        <h2 class="text-dark fw-bold">大学名称</h2>
    </div>
    <div class="download-button-container">
        <button class="btn btn-success btn-sm" onclick="download_excel({{$viewdata['univ_cd4']}})">データダウンロード</button>
    </div>

    <div id="faculty-accordion">
        <!-- 学部容器 -->
        <div class="faculty-container" data-bs-toggle="collapse" data-bs-target="#subjects-1">
            学部名称
        </div>
        <div id="subjects-1" class="collapse">
            <!-- 学科容器 -->
            <div class="subject-container" data-bs-toggle="collapse" data-bs-target="#exams-1-1">
                学科名称
            </div>
            <div id="exams-1-1" class="collapse exam-category-container">
                <!-- 考试分类的容器，包含表格 -->
                <table class="table">
                    <thead>
                    <tr>
                        <th>学科条件</th>
                        <th>地区条件</th>
                        <th>年龄条件</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>条件A</td>
                        <td>条件B</td>
                        <td>条件C</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- 可以继续添加更多学科和考试分类 -->
        </div>
        <!-- 可以继续添加更多学部 -->
    </div>
</div>
<script src="https://cdn.staticfile.org/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{'/js/recommend/recommend.js'}}"></script>
<script src="{{'/js/common/common.js'}}"></script>
</body>
</html>
