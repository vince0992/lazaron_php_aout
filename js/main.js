$(document).ready(function(){
            $(".photo").click(function(){
            $(this).toggleClass("photo_open");
            $(".pic").toggleClass("pic_open");
            $(".rien").toggleClass("hide");
            $(".form2").toggleClass("show");
            }); 
        });