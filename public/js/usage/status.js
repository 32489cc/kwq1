$(document).ready(function () {
    $arr=[
        {'name':'小明','age':18,'gender':'男'},
        {'name':'小王','age':19,'gender':'女'},
        {'name':'小李','age':22,'gender':'男'},
        {'name':'小赵','age':34,'gender':'男'},
        {'name':'小孙','age':44,'gender':'男'},
        {'name':'梅西','age':56,'gender':'男'},
        {'name':'内马尔','age':41,'gender':'男'},
        {'name':'姆巴佩','age':31,'gender':'男'},
        {'name':'姆巴佩','age':33,'gender':'男'},
        {'name':'科比','age':10,'gender':'男'},
        {'name':'库里','age':29,'gender':'男'},


    ]
    const SPRING=[3,4,5];
    const WINTER=[12,1,2];
    const month=new Date().getMonth();
    const getSeasonImage= images=>{
        if(SPRING.some(item=>item===month)){
            return images.spring;

        }
        if(WINTER.some(item=>item===month)){
            return images.winter;
        }
    }
$('[name="insured_no"]').on('keyup compositionend' ,function () {
    const $this = $(this);
     let val = $this.val().trim();
     $result=getSeasonImage({
         spring:'../../images/season/spring.jpeg',
         winter:'../../images/season/winter.png',
     })
    console.log($result)
   //  $list=[];
   //  // $result=$arr.filter(function (item,index,array) {
   //  //     if(item.age>20){
   //  //         return true;
   //  //     }
   //  // }).filter((item,index,array)=>{
   //  //     if($list.includes(item.name)){
   //  //         return false;
   //  //     }else{
   //  //         $list.push(item.name)
   //  //         return  true;
   //  //     }
   //  // })
   // $result=$arr.map((item)=>{
   //     return { ...item, name: val };
   // })
   //  //console.log($list)
   //  console.log($result)

})

})


