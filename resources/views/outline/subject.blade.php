<?php
$dep_cd_count_i=0;
$dep_cd_count_j=0;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Subjects Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f0f0f0;
        }
        .university-name {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }
        .subjects-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .subjects-table th, .subjects-table td {
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }
        .subjects-table th {
            background-color: #007bff;
            color: white;
        }
        .subjects-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<div class="university-name">大学名</div>
<table class="subjects-table">
    <thead>
    <tr>
        <th>学部</th>
        <th>学科 (人数)</th>
    </tr>
    </thead>
    <tbody>
    @for($i=0;$i<count($viewdata['sub_list']);$i++)
        @if($i==0 or $viewdata['sub_list'][$i]['dep_cd_name']!==$viewdata['sub_list'][$i-1]['dep_cd_name'])
            <tr>
                <td>{{$viewdata['sub_list'][$i]['dep_cd_name']}}</td>
                <td>
        @endif

        {{$viewdata['sub_list'][$i]['sub_cd_name']}}
        @if($i!==count($viewdata['sub_list'])-1 and $viewdata['sub_list'][$i]['dep_cd_name']==$viewdata['sub_list'][$i+1]['dep_cd_name'])
            、
        @elseif($i==count($viewdata['sub_list'])-1 or $viewdata['sub_list'][$i]['dep_cd_name']==$viewdata['sub_list'][$i+1]['dep_cd_name'])
        </td>
        </tr>
        @endif
    @endfor
    </tbody>

    <!-- More table rows would be added here -->
</table>
</body>
</html>


