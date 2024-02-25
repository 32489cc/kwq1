<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>学部数据表</title>
    <link href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-container {
            margin-bottom: 20px;
        }
        .table-title {
            background-color: #007bff;
            color: white;
            padding: 10px;
        }
        .table-title h5 {
            margin: 0;
        }
        .target{
            display: none;
        }
        .target.-active{
            display: block;
        }
    </style>
</head>
<body>
<div>
    <h1>早稲田大学</h1>
</div>
{!!$viewdata['breadcrumb']!!}
<div class="container js-accordion">
    <!-- 学部容器开始 -->
    @for($i=0;$i<count($viewdata['border_info_list']);$i++)
        @if($i==0 or $viewdata['border_info_list'][$i]['dep_name']!==$viewdata['border_info_list'][$i-1]['dep_name'])
    <div class="table-container">
        <div class="table-title trigger">
            <h5>{{$viewdata['border_info_list'][$i]['dep_name']}}</h5>
        </div>
        <dt class="target ">
        <table class="table table-bordered ">
            <thead>
            <tr>
                <th>学科</th>
                <th>考试方式</th>
                <th>偏差值</th>
                <th>合格率</th>
            </tr>
            </thead>
            <tbody>
            @endif
            <tr>
                <td>{{$viewdata['border_info_list'][$i]['sub_name']}}</td>
                <td>{{$viewdata['border_info_list'][$i]['wk_sch_method_title']}}</td>
                <td>{{$viewdata['border_info_list'][$i]['wk_rank_ss']}}</td>
                <td>{{$viewdata['border_info_list'][$i]['wk_border_sc_rate']}}</td>
            </tr>
            @if($i==count($viewdata['border_info_list'])-1 or $viewdata['border_info_list'][$i]['dep_name']!==$viewdata['border_info_list'][$i+1]['dep_name'])
            <!-- 更多学科数据 -->
            </tbody>
        </table>

        @endif
        </dt>
    </div>

    @endfor

    <!-- 更多学部容器 -->
</div>

<script src="https://cdn.staticfile.org/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="{{'/js/general/kn-common.js'}}"></script>
</body>
</html>

