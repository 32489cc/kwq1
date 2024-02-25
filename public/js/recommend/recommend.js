function download_excel(univ_cd4)
{
    var  url=location.href;
    var target_url="";
    var download_url="";
   // if(url.indexOf("exam_rec")>-1){
     //   target_url="/"+univ_cd4+"/recommend/exam_rec/download_xml_print";
      //  download_url="/recommend/exam_rec/execute_download_xmlss_print?uid=";
   // }else{
        target_url="/"+univ_cd4+"/recommend/exam_rec/download_xml_print";
        download_url="/recommend/exam_rec/execute_download_xmlss_print?uid=";
   // }

    $.ajax({
        type:"GET",
        timeout:300000,
        async:true,
        cache:false,
        url:target_url,
        dataType:"json",
        success:function (data,text_status,xhr){

            redirect_url=download_url+data.uid;
            location.href=redirect_url;
        },
        error:function (){
            alert('error');
        }
    })
}
