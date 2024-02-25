(()=>{
    const BLOCK_NAME=`data-more-accordion`;
    $(`[${BLOCK_NAME}]`).each(function (){
        const $this=$(this);

        const openText=$this.attr(`${BLOCK_NAME}-open`);
        const closeText=$this.attr(`${BLOCK_NAME}-close`);
        const isRemove=$this.attr(`${BLOCK_NAME}-is-remove`)==='true';

        const $trigger=$this.find(`[${BLOCK_NAME}-trigger]`);
        const $contents=$this.find(`[${BLOCK_NAME}-contents]`);
        const $label=$this.find(`[${BLOCK_NAME}-label]`);

        function init(){
            console.log(openText)
            $this.hasClass('is-active') ? $contents.css({display:'block'}): $contents.css({display:'none'});
            $this.addClass('is-init');
        }

        function  active(){
            $label.text(closeText);
            $this.addClass('is-active');
             $contents.slideDown('fast');

            if(isRemove){
                $trigger.remove();
            }
        }

        function  inactive(){
            $label.text(openText);
            $this.removeClass('is-active');
            $contents.slideUp('fast');
        }

        init();
        $trigger.on('click',()=>{
            console.log($this)
            $this.hasClass('is-active')?inactive():active();
        })
    })
})();
