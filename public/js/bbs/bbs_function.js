
$(document).ready(function() {
    (()=> {
        const univSearchObj = {
            xml: '/data/search.xml',
            data: [],
            dataReady: false,
            searchTimer: null,
            url: '/',
            isCompositionend: false
        };

        const exist = $('[data-university-search-suggest]').length > 0;
        if (!exist) {
            return;
        }

// 大学名をとる
        if ($('[data-university-search-suggest]').length) {
            $.get(univSearchObj.xml, function (xml) {
                $(xml).find('univ_data').each(function () {
                    const $this = $(this);
                    univSearchObj.data.push({
                        univ_cd: $this.find('univ_cd').text(),
                        univ_name: $this.find('univ_name').text(),
                        search_value: $this.find('search_value').text()
                    });
                });
            })
                .done(function () {
                    univSearchObj.dataReady = true;
                    const univlist = '<div class="university-search-result _hidden"><ul id="searchResults" class="list-group"></ul></div> ';
                    $('.col-10.right-container').append(univlist);
                });

        }
        /**
         * 大学検索
         * 入力時の処理
         */
        $('[data-university-search-suggest][type=text]').on('keyup compositionend', function (e) {
            console.log(1)
            if (!univSearchObj.dataReady) return false;
            if (e.type === 'compositionend') {
                univSearchObj.isCompositionend = true;
            } else if (e.type === 'keyup' && univSearchObj.isCompositionend) {
                univSearchObj.isCompositionend = false;
                return false;
            }
            const $this = $(this);
            const $parent = $this.parent();
            let $listContainer = $('.university-search-result ');
            let $list = $('.university-search-result > .list-group');
            let val = $this.val().trim();

            if (!val.length) {
                $list.empty();
                $listContainer.addClass('_hidden');
                return false;
            }

            //     大学リストから検索結果を取る
            let univCd = [];
            let result = univSearchObj.data.filter(function (item, index) {
                if (item.univ_name.indexOf(val) > -1 || item.search_value.indexOf(val) > -1) {
                    return true;
                }
            }).filter(function (item, index, obj) {
                if (univCd.indexOf(item.univ_cd) === -1) {
                    univCd.push(item.univ_cd);
                    return item;
                }
            });
            //     候補リスト生成
            $list.empty();
            clearTimeout(univSearchObj.searchTimer);
            if (result.length) {
                $.each(result, function () {
                    $list.append('<li class="list-group-item" data-univ-cd="' + this.univ_cd + '">' + this.univ_name + '</li>');
                });

            } else {
                univSearchObj.searchTimer = setTimeout(function () {
                    $list.empty().append('<li><span class="noresult">none</span>');
                }, 1000);
            }
            $listContainer.removeClass('_hidden').appendTo($parent);
        });
        /**
         * 大学検索＞候補リスト
         * 大学名をクリックする時の処理
         */
        $(document).on('click keyup focusin','.university-search-result>.list-group>li',function (e){
            if(e.type==='keyup' && e.keyCode!==13){
                return false;
            }
            const $this=$(this);
            const  $parent=$this.closest('.university-search-result');
            const $target=$this.closest('[type=text]');
            const univCd=$this.data('univ-cd');
            $this.attr('href','javascript:void(0);');
            $target.val($this.text());

            if(e.type==='focusin') return;
            update_publish_univ(univSearchObj.data,$this.text());
            $parent.addClass('_hidden');
        })
    })();
});


function  update_publish_univ(univ_list,$target){
    console.log($target)
    var $tmp_item=$target;
    for(var key=0;key<univ_list.length;key++){
        if(univ_list[key]['univ_name'] == $tmp_item){
            var univercity;
            var wk_id=univ_list[key]['univ_cd'];
            univercity='<input type="checkbox" id="uni1" name="uni1" />';
            univercity=univercity+' <label for="uni1">'+univ_list[key]['univ_name']+'</label><br />';
            $('.checkbox-container').append(univercity);

            break;
        }
    }
    $target='';
    return true;
}
