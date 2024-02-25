<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Submissions</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .search-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            padding-right: 15px; /* align with the padding of .container */
        }
        .search-and-submit {
            display: flex;
            align-items: center;
        }
        .search-and-submit > input {
            flex-grow: 1; /* input field takes up remaining space */
            margin-right: 10px;
        }
        .search-and-submit > button {
            white-space: nowrap; /* prevents wrapping of text */
            min-width: 90px; /* adjust as needed to fit the text */
            margin-right: 10px; /* spacing between buttons */
        }
        .pagination-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .submission-list {
            margin-bottom: 20px;
        }
        .table td, .table th {
            border: 1px solid #dee2e6;
        }
        .submit-link {
            min-width: 90px; /* 调整宽度以匹配搜索按钮 */
            text-align: center; /* 确保文本居中 */
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <!-- University Name -->
    <div class="text-center mb-4">
        <h1>University Name</h1>
    </div>

    <!-- Search and Submit -->


    <div class="search-bar">
        <form action="{{route('bbs_search',['univ_cd4'=>2293])}}" method="post">
        <div class="search-and-submit">
            <select class="form-control mr-2" name="pul_group">
                <option value="0" selected>全て</option>
                <option value="1">分类1</option>
                <option value="2">分类2</option>
                <option value="3">分类3</option>
                <!-- 在这里添加更多分类 -->
            </select>
        <input type="text" class="form-control" name="txt_keyword" placeholder="Search submissions...">
        <button type="submit" class="btn btn-primary">搜索</button>
        <a  href="{{route('article_entry',['univ_cd4'=>2293])}}" class="btn btn-primary submit-link">投稿</a>
        </div>
    </form>
    </div>


    <!-- Pagination Info -->
    <div class="pagination-bar">
        <span>{{$viewdata['bbs_info_count']}}件中{{ $viewdata['bbs_info_list']->firstItem() }}~{{ $viewdata['bbs_info_list']->lastItem() }}件目 </span>
{{--        <nav aria-label="Page navigation">--}}
{{--            <ul class="pagination">--}}
{{--                <li class="page-item"><a class="page-link" href="#">Previous</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">Next</a></li>--}}
{{--            </ul>--}}
{{--        </nav>--}}
        {{$viewdata['bbs_info_list']->links('page.index')}}
    </div>

    <!-- Submissions List -->
    <div class="submission-list">
        <table class="table">
            <thead>
            <tr class="table-border">
                <th scope="col">Category</th>
                <th scope="col">Title</th>
                <th scope="col">Date</th>
            </tr>
            </thead>
            <tbody>
            <!-- Repeat this row for each submission entry -->
            @foreach($viewdata['bbs_info_list'] as $bbs_info_list)
            <tr class="table-border" >
                <td></td>
                <td>{{$bbs_info_list['title']}}</td>
                <td>{{$bbs_info_list['create_date']}}</td>
            </tr>
            @endforeach
            <!-- ... other entries ... -->
            </tbody>
        </table>
    </div>
</div>

<!-- Include Bootstrap JS and its dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.5/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

