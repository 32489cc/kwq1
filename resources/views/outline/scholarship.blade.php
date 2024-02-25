<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
<meta charset="utf-8">
<link rel="canonical" href="//">
    <meta name="viewport" content="width=device-width">
<title>学金制度</title>

<link href="{{ asset('css/common/kn-style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/common/common.css') }}" rel="stylesheet">
    </head>
<body>
<div class="l-university-detail">
    <div class="l-university-detail_header">
        <div class="c-university-detail-header c-university-detail-header--national">
            <div class="c-university-detail-header_details">
                <div class="c-university-detail-header_head">
                    <div class="c-university-detail-header_label">
                        <i class="kn-label -bg -blue">国立</i>
                    </div>
                    <div class="c-university-detail-header_heading">
                    <p class="c-university-detail-header_hiragana">なごや</p>

                    <h1 class="c-university-detail-header_title">{{$viewdata['univ_name']}}</h1>
                </div>
            </div>
            <p class="c-university-detail-header_lead">大学に関するリード文がこちらに入ります。大学に関するリード文がこちらに入ります。</p>
            <div class="c-university-detail-header_favorite-button">
                <label class="c-favorite-button">
                <input type="checkbox" data-favorite-button="DUMMY">
                <span class="c-favorite-button_text">
                    <span class="c-favorite-button_text-default">お気に入り登録</span>
                    <span class="c-favorite-button_text-checked">お気に入り登録済</span>
                    <span class="c-favorite-button_text-sp">お気に入り</span>
                </span>
                </label>
            </div>
        </div>
        <ul class="c-university-detail-header_menus">
            <li class="c-university-detail-header_menu-item">
                <a href="DUMMY" target="_blank" class="kn-btn -decoration kno-doc-button">
                <img src="{{asset('images/icons/ico_doc_01.svg')}}" alt="">
                <b>河合塾グループで</b>
                <b>大学資料を請求</b>
                </a>
                <a href="DUMMY" target="_blank" class="kn-btn -decoration kno-app-button">
                    <img åsrc="{{asset('images/icons/ico_web_01.svg')}}" alt="">
                    <b>インターネット</b>
                </a>
            </li>
            <li class="c-university-detail-header_menu-item">
                <button type="button" data-micromadal-trigger="university-modal" class="c-university-detail-header_menu-button">大学情報</button>
            </li>
        </ul>
        </div>
    </div>
</div>
<div class="l-university-detail_column">
    <main class="l-university-detail_main" id="main">
        <section>
            <h1 class="kn-ttl -h1 _mr-0 _ml-0 -blue"><b class="subtitle">{{$viewdata['univ_name']}}</b>制度</h1>
            <p class="kn-txt">34efd</p>
        </section>
    </main>
</div>
</body>
    </html>
