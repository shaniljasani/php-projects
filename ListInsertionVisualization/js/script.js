$(document).ready(function(){
    $("#addBtn").click(function(){
     var txt = $("#inputTxt").val();
     if(txt){
       var listsize = $("#list").children().length;
       alert(listsize%3);
       if(listsize%3==0){
         $("#list").append("<li class='red'>"+txt+"</li>");
       }else{
         $("#list").append("<li>"+txt+"</li>");
       }
     }
   }); 
});