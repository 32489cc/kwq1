//大学が指定件数未満になったら表示
    var univ_search_num=50;
    var default_latitude=35.689718;
    var default_longitude=139.691699;

    //マーカー色
    var pin_color_map=[];
    pin_color_map[1]='../../images/icons/ico_map_national.svg' //国立
    pin_color_map[2]='../../public/images/icons/ico_map_public.svg' //国立
    pin_color_map[3]='../../images/icons/ico_map_private.svg' //国立

    //全大学リスト
    var addrelist=addresslist_all;
    var gmakers=[];
    var currentInfoWindow=null;
    function getMapCanvas(){
    var objOptions={
    zoom:5,
    center:new google.maps.LatLng(default_latitude,default_longitude),
    mapTypeId:google.maps.MapTypeId.ROADMAP,
    minzoom:5,
    maxzoom:15,
};
    var mapCanvas= new google.maps.Map(document.getElementById('map'),objOptions);
    document.getElementById("map").style.width='688px';
    document.getElementById("map").style.width='700px';

    return mapCanvas;
}
//マーカー設定
function attachMessage(marker,msg,target){
        var infoWnd=new google.maps.InfoWindow({
            content:msg,
            maxWidth:400,
            disableAutoPan:false
        });
        google.maps.event.addDomListener(marker,'click',function (event){
            if(currentInfoWindow){
                currentInfoWindow.close();
            }
            infoWnd.open(marker.getMap(),marker);
            currentInfoWindow=infoWnd;
        })
}
//マップ描く
    function intialize(){
        for (i=0;i<gmakers.length;i++){
            gmakers[i].setMap(null);
        }
        gmakers=[];
        //中心に十字マークを設定
        var map_cursor= new google.maps.MarkerImage('../../images/search/map/gmap_cross.gif');
        map_cursor.size=new google.maps.Size(50,50);
        map_cursor.origin=new google.maps.Point(0,0);
        map_cursor.ancor=new google.maps.Point(120,10);

        var marker=new google.maps.Marker({
            map:mapCanvas,
            icon:new google.maps.MarkerImage(
                '/../../images/search/map/gmap_cross.gif',
                new google.maps.Size(48,48),
                new google.maps.Point(0,0),
                new google.maps.Point(24,24)
            )
        });

        marker.bindTo('position',mapCanvas,'center');
        var adlat;
        var adlng;
        var count=0;
        var kyori;
        var campuslist="";
        var bounds= mapCanvas.getBounds();

        var swPoint=bounds.getSouthWest();
        var nePoint=bounds.getNorthEast();

        var swLat= swPoint.lat();
        var swLng= swPoint.lng();
        var neLat= nePoint.lat();
        var neLng=nePoint.lng();

        var center=mapCanvas.getCenter();

        var target=[];
        var disp_str=[];

        for(i=0;i<addrelist.length;i++){
            adlat=addrelist[i].latitude;
            adlng=addrelist[i].longitude;
console.log(addrelist[i])
            if(adlat<neLat && adlat>swLat && adlng< neLng && adlng> swLng){
                target.push(addrelist[i]);
                count++;
            }
        }

        if(count<univ_search_num && count>0){
            var mapInfo={};
            mapInfo.latitude=mapCanvas.getCenter().lat();
            mapInfo.longitude=mapCanvas.getCenter().lng();
            mapInfo.zoom=mapCanvas.getZoom();
            mapInfo.univ_typ="";
            var $checked=$('input[name="checkbox[]"]:checked');
            var valList=$checked.map(function (index,el){return $(this).val();});
            for(j=0;j<valList.length;j++){
                mapInfo.univ_typ += valList[j]+',';
            }
            mapInfo.univ_typ=mapInfo.univ_typ.replace(/,$/,"");
            for(i=0;i<target.length;i++){
            target[i].univ_atena=nl2br(target[i].univ_atena);

                kyori=getDistance(center,target[i].latitude,target[i].longitude);
                icon_url=pin_color_map[target[i].univ_typ];

                var mapMaker=new google.maps.Marker({
                    position:new google.maps.LatLng(target[i].latitude,target[i].longitude),
                    map: mapCanvas,
                    icon: {
                        url:icon_url,
                        scaledSize:new google.maps.Size(19,25)
                    }
                });

                //個別大学情報リンク
                var j=JSON.stringify(mapInfo);
                var base_url=location.href.replace(/#.*/,"");
                var link=base_url+'department/'+target[i].univ_cd4+'/'+escape(j);

                at_msg='<div class="popup-container">';
                at_msg+='<div class="popup-bubble-anchor"><div id="content" class="popup-bubble"><div class="popup-bubble_inner"><div class="popup-bubble_body">';
                at_msg+='<dl>';
                at_msg+='<dt class="popup-bubble_ttl">'+target[i].univ_atena+'</dt>';
                at_msg+='<dd class="popup-bubble_contents"><ul>';
                if(target[i].campus_name){
                    at_msg+='<li>'+target[i].campus_name+'</li>';
                }
                if(target[i].belong_dep){
                    at_msg+='<li>'+target[i].belong_dep+'</li>';
                }
                if(target[i].mapping_address){
                    at_msg+='<li>'+target[i].mapping_address+'</li>';
                }
                at_msg+='</dd></dl></div>';
                at_msg+='<div class="popup-bubble_footer">';

                //該当キャンパスー領域
                var clist="";
                clist+='<p class="item-name">'+target[i].univ_atena;
                if(target[i].campus_name){
                    clist+='<br><span>'+target[i].campus_name;
                }
                clist+='<span></br>';

                target[i].clist=clist;
                target[i].at_msg=at_msg;
                target[i].map_marker=mapMaker;
                target[i].kyori=kyori;


            }
            target.sort(function (a,b){
                var x=a.kyori;
                var y=b.kyori;
                if(x>y) return 1;
                if(x<y) return  -1;
                return  0;
            })
            for(i=0;i<target.length;i++){
                var content=target[i].at_msg;
                attachMessage(target[i].map_marker,content,i);
                gmakers.push(target[i].map_marker);
            }
        }
    }
function prefSelect(){
        var option=document.createElement('option');
        option.value='default';
        option.appendChild(document.createTextNode('選択してください'));
        var select=document.getElementById('region');
        select.appendChild(option);

        for(var i=0;i<Japan.arr.length;i++){
            var pref=Japan.arr[i];
            var option=document.createElement('option');
            option.value=pref.g;
            option.appendChild(document.createTextNode(pref.a));
            var select =document.getElementById('region');
            select.appendChild(option);
        }
}
function change(select){
    for(var i=0;i<Japan.arr.length;i++){
        var pref=Japan.arr[i];
        if(pref.g==select.value){
            mapCanvas.panTo(new google.maps.LatLng(pref.y,pref.x));
            mapCanvas.setZoom(pref.z);
            intialize();
            return;
        }
    }
}

//2点間の距離を求める
function getDistance(from , to_lat,to_lng){
        if(!from||!to_lat||!to_lng){
            return 0;
        }
        var R=6371;
        var dLat=(to_lat-from.lat())*Math.PI/180;
        var dLon=(to_lng-from.lng())*Math.PI/180;
        var a=Math.sin(dLat/2)*Math.sin(dLat/2)+
            Math.cos(from.lat()*Math.PI/180)*Math.cos(to_lat*Math.PI/180)*
            Math.sin(dLon/2)*Math.sin(dLon/2);
        var c=2*Math.atan2(Math.sqrt(a),Math.sqrt(1-a));
        var d=R*c;
        return  d;
}
function editAddressList(){
        var $checked=$('input[name="checkbox[]"]:checked');
        var valList= $checked.map(function (index,el){return $(this).val();});

        var tmp=[];
        for(i=0;i<addresslist_all.length;i++){
             for(j=0;j<valList.length;j++){
                 if(addresslist_all[i].univ_typ==valList[j]){
                     tmp.push(addresslist_all[i]);
                 }
             }
        }

        addrelist=tmp;
}
//改行コード
function nl2br(str){
        if(str != undefined){
            return str.replace(/\r\n|\r|\n/g,'<br />');
        }else{
            return '';
        }
}
$(function (){
    $("#category-selection input[type='checkbox']").click(()=>{
        if($(this).is(':checked')){
            $(this).addClass('active');
        }else{
            $(this).removeClass('active');
        }
        editAddressList();
        intialize();
    })
})
