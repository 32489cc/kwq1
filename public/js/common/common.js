window.KWJ={};
(function (){
    class MediaQuery{
        constructor() {
            this.media={};
            this.setMedia('pc','(min-width:768px)');
            this.setMedia('sp','(max-width:767px)');
        }
        setMedia(name,query){
            this.media[name]=window.matchMedia(query);

        }
        is(name){
            return this.media[name].matches;
        }
        on(name,fn){
            window.addEventListener('resize',e=>this.is(name)?fn(e):false);
        }
        once(name,fn){
            this.media[name].addEventListener('resize',mqle =>this.is(name)?fn(mqle):false);
        }
    }
    KWJ.mq= new MediaQuery();
})();
(()=>{
    const $nav=$('.navbar-expand');
    const $hamburger=$('.hamburger');
    const  isPC=()=>KWJ.mq.is('pc');
    const isSP=()=>KWJ.mq.is('sp');

    function init(){
        if(isPC()){
         $hamburger.addClass('hamburger');
         $nav.removeClass('is-active');
         $nav.show();
        }

        if(isSP()){

            $hamburger.removeClass('hamburger');
            $nav.removeClass('is-active');
            $nav.hide();
        }
    }
    function active(){

    }
    KWJ.mq.on('pc',init);
    KWJ.mq.on('sp',init);
})();
/**
 * ヘッダーの季節背景
 */
(()=>{
const SPRING=[3,4,5];
const WINTER=[12,1,2];
const month=new Date().getMonth()+1;
const getSeasonImage= images=>{
    if(SPRING.some(item=>item===month)){
        return images.spring;

    }
    if(WINTER.some(item=>item===month)){
        return images.winter;
    }
}
$('[data-bg-season]').each(function (){
    const $this=$(this);
    const seasonImage=getSeasonImage({
        spring:'../../images/season/spring.jpeg',
        winter:'../../images/season/winter.png',
    });
console.log(seasonImage)
    function setBg(){
        $this.css({background:`url(${seasonImage}) no-repeat left center`});

    }
    function clearBg(){
        $this.css({background: ``});
    }
    const img=new Image();
    img.src=seasonImage;
    img.onload=function (){
        KWJ.mq.is('pc') ? setBg():clearBg();
    }

    KWJ.mq.on('pc',setBg);
})
})();
