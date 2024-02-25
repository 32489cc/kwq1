$(function (){

    const knObj={
        evtClick:'click',
        touchDisabled:false,
    }

    $(document).on(knObj.evtClick,'.table-container>.trigger',function (e){
        if(knObj.touchDisabled) return false;
        e.preventDefault();
        const $this=$(this);
        const $target=$this.parents('.table-container').find('.target');
        if($target.hasClass('-active')){
            $target.removeClass('-active');
        }else{
            $target.addClass('-active');
        }
        return false;
    })
    //tab切り替え
    $(document).on(knObj.evtClick,'.tablist>li> .tab',function (e){
        if(knObj.touchDisabled) return false;
        e.preventDefault();
        const  $this= $(this);
        const  stats=$this.hasClass('-current');
        const $target=$($this.attr('href'));
        const $container=$this.closest('.kn-tab-container');
        if(!stats){
            $container.find('.-current').removeClass('-current');
            $target.addClass('-current');
            $this.addClass('-current');
        }
        return  false;
    });
    $('.tablist>li>.tab.-current[href^="#"]').each(function (){
        const id=$(this).attr('href');
        $(id).addClass('-current');
    })
})
