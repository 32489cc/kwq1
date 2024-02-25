<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>分段信息表格</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .highlight {
            background-color: #FFD700; /* 金色背景 */
        }
        .table-part {
            margin-bottom: 0; /* 移除表格间距离 */
        }
        .table-part + .collapse {
            margin-top: -1px; /* 让两个表格看起来像一个表格 */
        }
        /*.is-active{*/
        /*    display: block;*/
        /*}*/
    </style>
</head>
<body>
<div class="container mt-4">
    <!-- 显示部分的表格 -->
    <table class="table table-part">
        <tbody>
        <tr>
            <td class="highlight">学部</td>
            <td>文学部</td>
        </tr>
        <tr>
            <td class="highlight">实施日</td>
            <td>8/5(土) 8/6(日)</td>
        </tr>
        <tr>
            <td class="highlight">会场</td>
            <td>户外体育场</td>
        </tr>
        </tbody>
    </table>
    <!-- 隐藏部分的表格 -->
    <div data-more-accordion data-more-accordion-open="詳細表示" data-more-accordion-close="詳細非表示" data-more-accordion-is-remove="false">
        <div data-more-accordion-contents>
        <table class="table table-part">
            <tbody>
            <tr>
                <td class="highlight">お問い合わせ先</td>
                <td>03-3203-4331</td>
            </tr>
            <tr>
                <td class="highlight">备注</td>
                <td>户外活动请穿着便装</td>
            </tr>
            </tbody>
        </table>
        </div>
        <p>
            <button class="btn btn-primary" type="button" data-more-accordion-trigger>
                <span data-more-accordion-label>显示详细</span>
            </button>
        </p>
    </div>
    <!-- 切换按钮 -->

</div>
<div class="container mt-4">
    <!-- 显示部分的表格 -->
    <table class="table table-part">
        <tbody>
        <tr>
            <td class="highlight">学部</td>
            <td>文学部</td>
        </tr>
        <tr>
            <td class="highlight">实施日</td>
            <td>8/5(土) 8/6(日)</td>
        </tr>
        <tr>
            <td class="highlight">会场</td>
            <td>户外体育场</td>
        </tr>
        </tbody>
    </table>
    <!-- 隐藏部分的表格 -->
    <div data-more-accordion data-more-accordion-open="詳細表示" data-more-accordion-close="詳細非表示" data-more-accordion-is-remove="false">
    <div data-more-accordion-contents>
    <table class="table table-part">
            <tbody>
            <tr>
                <td class="highlight">お問い合わせ先</td>
                <td>03-3203-4331</td>
            </tr>
            <tr>
                <td class="highlight">备注</td>
                <td>户外活动请穿着便装</td>
            </tr>
            </tbody>
        </table>
    </div>
    <p>
        <button class="btn btn-primary" type="button" data-more-accordion-trigger>
            <span data-more-accordion-label>显示详细</span>
        </button>
    </p>
    </div>
    <!-- 切换按钮 -->

</div>
<div class="container mt-4">
    <!-- 显示部分的表格 -->
    <table class="table table-part">
        <tbody>
        <tr>
            <td class="highlight">学部</td>
            <td>文学部</td>
        </tr>
        <tr>
            <td class="highlight">实施日</td>
            <td>8/5(土) 8/6(日)</td>
        </tr>
        <tr>
            <td class="highlight">会场</td>
            <td>户外体育场</td>
        </tr>
        </tbody>
    </table>
    <!-- 隐藏部分的表格 -->
    <div  data-more-accordion data-more-accordion-open="詳細表示" data-more-accordion-close="詳細非表示" data-more-accordion-is-remove="false">
        <div data-more-accordion-contents>
        <table class="table table-part">
            <tbody>
            <tr>
                <td class="highlight">お問い合わせ先</td>
                <td>03-3203-4331</td>
            </tr>
            <tr>
                <td class="highlight">备注</td>
                <td>户外活动请穿着便装</td>
            </tr>
            </tbody>
        </table>
        </div>
        <p>
            <button class="btn btn-primary" type="button" data-more-accordion-trigger>
                <span data-more-accordion-label>显示详细</span>
            </button>
        </p>
    </div>
    <!-- 切换按钮 -->

</div>
<script src="https://cdn.staticfile.org/jquery/3.3.1/jquery.min.js"></script>
<script src="{{'/js/general/open_campus.js'}}"></script>
{{--<script src="https://cdn.staticfile.org/popper.js/1.14.7/umd/popper.min.js"></script>--}}
{{--<script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>--}}
</body>
</html>

