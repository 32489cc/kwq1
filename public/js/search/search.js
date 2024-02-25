
$(document).ready(function() {

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
                const univlist = '<div class="university-search-result search__domain mt-4" ><ul class="list list-inline search__domain--pricing mb-0"></ul></div>';
                $('.search').append(ƒunivlist);
            });

    }
console.log(univSearchObj.data)
    $('[data-university-search-suggest] [type=text]').on('keyup compositionend', function (e) {
        console.log(univSearchObj.data)
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
        let $list = $('.university-search-result > .list');
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
                $list.append('<li><a href="#" class="ui" tabindex="-1">' + this.univ_name + '</a></li>');
            });

        } else {
            univSearchObj.searchTimer = setTimeout(function () {
                $list.empty().append('<li><span class="noresult">none</span>');
            }, 1000);
        }
        $listContainer.remove('_hidden');
    });

})
