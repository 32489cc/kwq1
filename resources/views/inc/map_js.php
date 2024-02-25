<script type="text/javascript" charset="UTF-8">
    var default_latitude=35.689718;
    var default_longitude=139.691699;
    function getMapCanvas(){
        var objOptions={
            zoom:5,
            center:new google.maps.Lating(default_latitude,default_longitude);
            mapTypeId:google.maps.MapTypeId.ROADMAP,
            minzoom:5,
            maxzoom:15
        };
        var mapCanvas= new google.maps.Map(document.getElementById('map'),objOptions);
        document.getElementById("map").style.width='688px';
        document.getElementById("map").style.width='700px';

        return mapCanvas;
    }
</script>
