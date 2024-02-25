$(document).ready(function (){
    $('[data-all-checked-area]').each(function () {
        const $this=$(this);
        const isTextChange=$this.attr('data-all-checked-area-is-text-change')!=='false';
        const $allChecked=$this.find('[data-all-checked-area-checkbox]');
        const $allCheckedLabel=$allChecked.next();
        const  $checkbox=$this.find('input[type="checkbox"]').not($allChecked);

        function CheckAll(){
            console.log($checkbox)
            $checkbox.prop('checked',true);
        }
        function unCheckAll(){
            $checkbox.prop('checked',false);
        }
        function getChecked(){
            const  checked=[];
            $checkbox.each(function (){
                checked.push($(this).prop('checked'));
            })
            return checked;
        }

        function isUnChecked(){
            const checked=getChecked();
            return checked.includes(false);
        }
        function  isAllChecked(){
            const checked=getChecked();
            return checked.every(isCheck=>isCheck===true);

        }
        $allChecked.on('change',function (){
            const isChecked=$(this).prop('checked');
            console.log($(this))
            if(!isChecked){
                if(isTextChange){
                    $allCheckedLabel.text('全て選択');
                }
                unCheckAll();
                return;
            }
            if(isChecked){
                if(isTextChange){
                    $allCheckedLabel.text('全て解除');
                }
                CheckAll();
                return;
            }
        });
        $checkbox.on('change',function (){
            if(isAllChecked()){
                if(isTextChange){
                    $allCheckedLabel.text('全て解除');
                }
                $allChecked.prop('checked',true);
                return;
            }

            if(isUnChecked()){
                if(isTextChange){
                    $allCheckedLabel.text('全て選択');
                }
                $allChecked.prop('checked',false);
                return;
            }
        })
    });
})
