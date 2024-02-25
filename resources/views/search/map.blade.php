<!DOCTYPE html>
<html>
<head>
    <title>校园地图导航</title>
    <style>
        #category-selection {
            border: 1px solid red; /* 红色边框 */
            padding: 10px;
            margin-bottom: 10px;
        }
        /* 在这里添加CSS样式 */
        #map {
            height: 400px;  /* or 100% */
            width: 100%;    /* Adjust sizes as needed */
        }
        #school-list {
            height: 400px; /* 与地图高度一致 */
            width: calc(30% - 20px); /* 减去margin的宽度 */
            float: right; /* 让地图和列表并排显示 */
            margin: 10px;
            overflow-y: scroll; /* 如果内容过多，允许滚动 */
        }

        /* 清除浮动 */
        .clear {
            clear: both;
        }

        /* 其他样式 */
    </style>
    <link href="{{ asset('css/Map/popup-bubble.css') }}" rel="stylesheet">
<script
{{--src="https://maps.googleapis.com/maps/api/js?key={{config('constants.GOOGLE_KEY')}}&libraries=places"></script>--}}
    <script src="{{'/js/pref_def.js'}}"></script>
</head>
<body>
<script>
     var addresslist_all=JSON.parse(@json($viewdata['univ_list']));

</script>

    <div id="category-selection">
        <label><input type="checkbox" id="national" name="checkbox[]" value="2" checked> 公立</label>
        <label><input type="checkbox" id="private" name="checkbox[]" value="3" checked> 私立</label>
        <label><input type="checkbox" id="public" name="checkbox[]" value="1" checked> 国立</label>

        <!-- 其他控制元素 -->
    </div>
    <select id="region" onchange="change(this);">
        <!-- 地区选项 -->
    </select>
    <!-- 其他控制元素 -->


<div id="map"></div>

<div id="school-list">
    <!-- 学校列表 -->
</div>


<script src="https://cdn.staticfile.org/jquery/3.3.1/jquery.min.js"></script>
<script src="{{'/js/map/map.js'}}"></script>
<script>
    // 在这里添加JavaScript代码和Google Maps API的初始化
    var mapCanvas=getMapCanvas();
    google.maps.event.addListenerOnce(mapCanvas,"idle",function (){
        marker_list=new google.maps.MVCArray();
        intialize();
    })
</script>
<script>
    google.maps.event.addDomListener(window,'load',prefSelect);
    google.maps.event.addDomListener(mapCanvas,'zoom_changed',function (){
        intialize();
    });
    google.maps.event.addDomListener(mapCanvas,'dragged',function (){
        intialize();
    });
</script>
</body>
</html>

