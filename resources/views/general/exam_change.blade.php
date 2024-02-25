
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>考试变更</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .tab-content {
            margin-top: 20px;
        }
.nav-item>.tab.-current{
    background-color: #5cb85c;
}
.tab-content>.container{
    display: none;
}
        .tab-content> .container.-current{
       display: block;
   }
        .table-change-log th,
        .table-change-log td {
            vertical-align: middle;
        }
        .table-change-log thead th {
            background-color: #f8f9fa;
        }
        .table-change-log th:first-child,
        .table-change-log td:first-child {
            background-color: #e9ecef;
        }
        .table-change-log th {
            text-align: center;
        }
        .table-change-log .year-header {
            writing-mode: vertical-lr;
            text-orientation: mixed;
        }
        .table-change-log col {
            width: 25%; /* 根据需要调整每列的百分比 */
        }

    </style>


</head>
<body>

<div class="container kn-tab-container">
    <h2 class="text-center my-4">考试变更</h2>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs tablist">
        <li class="nav-item">
            <a class="nav-link -current tab"  href="#year2023">2023年变更点</a>
        </li>
        <li class="nav-item">
            <a class="nav-link tab"  href="#year2024">2024年变更点</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        @for($the_year=$viewdata['max_the_year']-1;$the_year<$viewdata['max_the_year']+1;$the_year++)
            @php($disp_year=$the_year+1)
            @php($data_list=array())
            @if(isset($viewdata['main_list'][$the_year]))
                @php($data_list=$viewdata['main_list'][$the_year])
            @endif

        <div id="year{{$disp_year}}" class="container  {{$the_year===($viewdata['max_the_year']-1)?'-current':''}}"><br>
            @if(count($data_list)===0)
                <div>data none</div>
        </div>
            @endif
            @for($i=0;$i<count($data_list);$i++)
            <table class="table table-change-log">
                <colgroup>
                    <col class="">
                    <col class="">
                    <col class="">
                    <col class="">
                </colgroup>
                <tbody>
                <tr>
                    <th>学部</th>
                    <td colspan="3">{{$data_list[$i]['dep_names']}}</td>
                </tr>
                <tr>
                    <th>学科</th>
                    <td colspan="3">{{$data_list[$i]['sub_names']}}</td>
                </tr>
                <tr>
                    <th>日程 方式</th>
                    <td colspan="3">{{$data_list[$i]['sub_method_names']}}</td>
                </tr>
                <tr>
                    <th rowspan="3">変更内容</th>
                    <td rowspan="3">{{$data_list[$i]['item']}}</td>
                    <td>2022</td>
                    <td>{{$data_list[$i]['a_chg_item']}}</td>
                </tr>
                <tr>
                    <td >2023</td>
                    <td >{{$data_list[$i]['b_chg_item']}}</td>

                </tr>
                <tr>
                    <th >変更内容</th>
                    <td >{{$data_list[$i]['chg_item']}}</td>

                </tr>
                <!-- 更多行数据可以在这里添加 -->
                </tbody>
            </table>
            @endfor

        </div>
        @endfor
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{'/js/general/kn-common.js'}}"></script>
</body>

</html>


