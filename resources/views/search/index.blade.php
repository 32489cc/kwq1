<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>大学学科搜索</title>

    <link href="{{ asset('css/search/index.css') }}" rel="stylesheet">

</head>
<body>
<div class="search-container">
    <h1>大学学科搜索</h1>
    <form action="#" method="get">
        <div class="form-section">
            <label>学科选择</label>
            <div class="checkbox-group">
                <label class="main-checkbox">
                    <input type="checkbox" id="liberal-arts" name="field" class="all-selector" > 文科

                </label>
                <span class="toggle-sub-checkboxes" data-toggle-btn>&#9660;</span>
                <div class="sub-checkbox-group " id="liberal-arts-sub">
                    <div class="sub-checkbox-group" data-all-checked-area>
                       <input type="checkbox" id="liberal-arts" name="field" class="all-selector" data-all-checked-area-checkbox> <label> 全て選択</label>
                        <label><input type="checkbox" name="history"> 历史</label>
                        <label><input type="checkbox" name="geography"> 地理</label>
                        <label><input type="checkbox" name="politics"> 政治</label>
                        <label><input type="checkbox" name="chinese"> 语文</label>
                        <label><input type="checkbox" name="economics"> 经济</label>

                    </div>
                </div>
            </div>
                <div class="checkbox-group">
                <label class="main-checkbox">
                    <input type="checkbox" id="science" name="field" class="all-selector"> 理科

                </label>
                    <span class="toggle-sub-checkboxes" data-toggle-btn>&#9660;</span>
                <div class="sub-checkbox-group " id="science-sub">
                    <div class="sub-checkbox-group" data-all-checked-area>
                        <input type="checkbox" id="liberal-arts" name="field" class="all-selector"> 全选
                        <label><input type="checkbox" name="computer"> 计算机</label>
                        <label><input type="checkbox" name="physics"> 物理</label>
                        <label><input type="checkbox" name="chemistry"> 化学</label>
                        <label><input type="checkbox" name="biology"> 生物</label>
                        <input type="checkbox" id="liberal-arts" name="field" class="all-selector"> 清空
                    </div>
                </div>
                </div>

        </div>
        <button type="submit" class="search-button">搜索</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{'/js/search/open_campus.js'}}"></script>
<script>
    $('[data-toggle-btn]').each(function (){
        const $this = $(this);
        let chk_group=$this.parents('.checkbox-group');
        let sub_chk=chk_group.find('.sub-checkbox-group');
       $this.click(()=>{
           if(sub_chk.css('display')==='none'){
               sub_chk.show();
           }else{
               sub_chk.hide();
           }

       })

    })



</script>
</body>
</html>
