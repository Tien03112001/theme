function openProduct(evt,productName){var i,tabcontent,tablinks;tabcontent=document.getElementsByClassName("tabcontent");for (i=0;i < tabcontent.length;i++){tabcontent[i].style.display="none"}tablinks=document.getElementsByClassName("tablinks");for (i=0;i < tablinks.length;i++){tablinks[i].className=tablinks[i].className.replace(" active","")}document.getElementById(productName).style.display="block";evt.currentTarget.className+=" active"}document.getElementById("defaultOpen").click();function promotionCountdown(){var time=document.getElementById("expired_date").value;var countDownDate=new Date(time).getTime();var x=setInterval(function (){var now=new Date().getTime();var distance=countDownDate - now;var days=Math.floor(distance / (1000 * 60 * 60 * 24));var hours=Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));var minutes=Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));var seconds=Math.floor((distance % (1000 * 60)) / 1000);document.getElementById("fs_day").innerHTML=days;document.getElementById("fs_hour").innerHTML=hours;document.getElementById("fs_minute").innerHTML=minutes;document.getElementById("fs_second").innerHTML=seconds;if (distance < 0){clearInterval(x);document.getElementById("fs_day").innerHTML="0";document.getElementById("fs_hour").innerHTML="0";document.getElementById("fs_minute").innerHTML="0";document.getElementById("fs_second").innerHTML="0";document.getElementById("btn-promotion").style.display="none"}},1000)}promotionCountdown();document.addEventListener("DOMContentLoaded",()=>{$(document).ready(function (){$(".owl-carousel").owlCarousel()});$(".owl-carousel").owlCarousel({loop:true,margin:10,nav:true,responsive:{0:{items:1,},600:{items:3,},1000:{items:5,},},})});