<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Example</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS */
        .custom-section {
            padding: 20px;
            background-color: #f8f9fa;
        }
        .custom-footer {
            background-color: #e9ecef;
            padding: 10px;
            text-align: center;
        }
        .dropdown-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .dropdown-section > div {
            flex-basis: 48%; /* Adjusts the width of the dropdowns to be close to half */
        }
        .c-select .is-selected .custom-select{
            color: #333;
        }
        .c-select .is-disabled .custom-select:disabled{
            background: #e4e4e4;
            cursor: not-allowed;
        }
        .label-select-group {
            display: flex;
            align-items: center;
        }

        .label-select-group .input-group-text {
            flex: 1; /* Label takes up 1 portion of the space */
            text-align: right;
            margin-right: 10px;
        }

        .label-select-group .custom-select {
            flex: 2; /* Select takes up 2 portions of the space */
        }

    </style>
    <script>

        @if(isset($viewdata['dep_sub_list']))

             var list=@json($viewdata['dep_sub_list']);
         @else
             var list=[];
        @endif
        console.log(list)
var univ_cd4={{$viewdata['univ_cd4']}}
    </script>
</head>
<body>

<div class="container">
    <!-- Main content section -->
    <div class="custom-section">
        <h2>入試結果</h2>
        <p>{{$viewdata['univ_name']}}</p>
        <!-- Button group for student years -->
        <div class="btn-group" role="group" aria-label="Student Year Buttons">
            <button type="button" class="btn btn-primary">高3生</button>
            <button type="button" class="btn btn-primary">高2生</button>
            <button type="button" class="btn btn-primary">高1生</button>
        </div>

        <h3>今年度の入試結果</h3>
        <!-- Dropdowns for faculty and department -->
        <div class="dropdown-section">
            <!-- Faculty Dropdown -->

            <div class="input-group mb-3">
                <div class="label-select-group">
                <label class="c-select input-group-text" data-select>学部
                <select class="custom-select " id="pul_s_gohi_dep" name="pul_s_gohi_dep">
                  @for($i=0;$i<count($viewdata['pul_s_gohi_dep_val']);$i++)
                      @if($viewdata['pul_s_gohi_dep']==$viewdata['pul_s_gohi_dep_val'][$i])
                        <option value="{{$viewdata['pul_s_gohi_dep_val'][$i]}}" selected>{{$viewdata['pul_s_gohi_dep_lbl'][$i]}}</option>
                        @else
                   <option value="{{$viewdata['pul_s_gohi_dep_val'][$i]}}">{{$viewdata['pul_s_gohi_dep_lbl'][$i]}}</option>
                        @endif
                  @endfor
                </select>

                </label>
                </div>
            </div>

            <!-- Department Dropdown -->
            <div class="input-group mb-3">
                <div class="label-select-group">
                @if(empty($viewdata['pul_s_gohi_dep']))
                    <label class="c-select input-group-text" data-select>学科
                    <select class="custom-select" id="pul_s_gohi_sub" disabled>
                        <option value=" " selected>学科を選択</option>
                    </select>
                    </label>
                @else
                    <label class="c-select input-group-text　is-disabled" data-select>学科
                <select class="custom-select" id="pul_s_gohi_sub">
                    @for($i=0;$i<count($viewdata['pul_s_gohi_sub_val']);$i++)
                        @if($viewdata['pul_s_gohi_sub']==$viewdata['pul_s_gohi_sub_val'][$i])
                            <option value="{{$viewdata['pul_s_gohi_sub_val'][$i]}}" selected>{{$viewdata['pul_s_gohi_sub_lbl'][$i]}}</option>
                        @else
                            <option value="{{$viewdata['pul_s_gohi_sub_val'][$i]}}" >{{$viewdata['pul_s_gohi_sub_lbl'][$i]}}</option>
                        @endif
                    @endfor

                </select>
                    </label>
                @endif
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive" id="exam_result">
       <table class="table table-bordered" id="exam_result_table">
           <thead>
{{--            <tr>--}}
{{--                <th>学校名</th>--}}
{{--                <th>学科</th>--}}
{{--                <th>学部</th>--}}
{{--                <th>成绩</th>--}}
{{--                <th>年份</th>--}}
{{--            </tr>--}}
         </thead>
           <tbody>
{{--            <!-- 表格数据填充的地方 -->--}}
{{--            <!-- 例如，可以用 Blade 语法动态填充或使用 JavaScript -->--}}
          </tbody>
   </table>
    </div>
    <!-- Footer -->
    <div class="custom-footer">
        <p>Contact info and other links</p>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="{{'/js/general/exam_result.js'}}"></script>
</body>
</html>

