var ComingSoon=function(){return{init:function(){var e=new Date;e=new Date("December 31, 2016 23:59:59"),$("#defaultCountdown").countdown({until:e}),$("#year").text(e.getFullYear()),$.backstretch(["../assets/pages/media/bg/1.jpg","../assets/pages/media/bg/2.jpg","../assets/pages/media/bg/3.jpg","../assets/pages/media/bg/4.jpg"],{fade:1e3,duration:1e4})}}}();jQuery(document).ready(function(){ComingSoon.init()});