(()=>{
    $('[data-select]').each(function (){
        const  $this=$(this);
        const $select=$this.find('select');

        const isSelected=()=>$select.val()!=='';
        const isDisabled=()=>$select.prop('disabled');

        const update=()=>{
            isSelected()? $this.addClass('is-selected'):$this.removeClass('is-selected');
            isDisabled()?$this.addClass('is-disabled'):$this.removeClass('is-disabled');
        }
        update();
        $select.on('change',()=>update())
    })
})();


$(document).ready(function (){
    $('#pul_s_gohi_dep').change(()=>{
        change_pul_s_gohi_dep();
    })
})

function change_pul_s_gohi_dep(){

    var dep=document.getElementById("pul_s_gohi_dep");
    var sub=document.getElementById("pul_s_gohi_sub");
    var dep_val=dep.options[dep.selectedIndex].value;

    sub.length=0;
    if(dep_val===" "){
        sub.disabled=true;

    }else{
        console.log(dep_val)
        sub.disabled=false;
        console.log(list)
        for(var i=0;i<list.length;i++){
            if(i % 2 == 1){

                if (dep_val==list[i-1]){
                    console.log(list[i-1])
                    for (var j=0;j<list[i].length;j++){
                        if(j%2==0){
                            sub.length++;
                            sub.options[sub.length-1].value=list[i][j];
                            sub.options[sub.length-1].text=list[i][j+1];
                        }
                    }
                }
            }
        }
if(sub.length==2){
    sub.selectedIndex=1;
    change_pul_s_gohi_sub();
}
    }
}
$("#pul_s_gohi_sub").change(()=>{

    change_pul_s_gohi_sub();
})
function  init_disp_area(div_id,table_id){
    // $("#"+div_id).hide();
$("#"+table_id+" tbody tr ").remove();
$("#"+table_id+" thead tr").remove();
}
function  change_pul_s_gohi_sub(){
    var sub=document.getElementById("pul_s_gohi_sub");
    var dep=document.getElementById("pul_s_gohi_dep");
    var sub_val=sub.options[sub.selectedIndex].value;
    var dep_val=dep.options[dep.selectedIndex].value;

    if(sub_val =="0"){
        init_disp_area("exam_result","exam_result_table");
        return false;
    }else{
        $.ajax({
            type:'POST',
            url:'/general/exam_result/exam_dep_sub_result',
            timeout:10000,
            dataType:'json',
            data:"univ_cd4="+univ_cd4+"&dep_val="+dep_val+"&sub_val="+sub_val,
            cache:false,
            success:function (result){
                console.log(result.is_data=true)
                init_disp_area("exam_result","exam_result_table");
                if(result.is_data=true){
                    console.log(result.html_data2)
                    $("#exam_result_table thead").append(result.html_data2);
                    $("#exam_result_table tbody").append(result.html_data);
                }else{
                    $("exam_result").append(result.html_data);
                }
            },
            error:function (msg){
                alert();

            }

        });
    }
//     ajax

}
