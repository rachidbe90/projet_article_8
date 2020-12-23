$(document).ready(function(){
 
var passUser = $('#passUser');progressUser = $('.progressUser'); barUser = $('.progressbarUser'); submitUser=$("#btnRecordUser");
 var pass = $('#pass');progress = $('.progress'); bar = $('.progressbar'); submit = $('#submit');
var passAdministration = $('#newUserPassword');progressAdministration = $('.progressAdministration');barAdministration=$('.progressbarAdministration'); submitAdministration = $('#btnRecordSetting');
 
 $(submit).attr('disabled','disabled');

 

 $(pass).keyup(function(){
  var size = $(this).val().length;
  set_level(size,progress,bar,submit,"yes");
 });
 $(passAdministration).keyup(function(){
  var size = $(this).val().length;
  set_level(size,progressAdministration,barAdministration,submitAdministration,"no");
 });
 $(passUser).keyup(function(){
  var size = $(this).val().length;
  set_level(size,progressUser,barUser,submitUser,"no");
 });
 
});


function set_level(size,progress,bar,submit,isForgetPasswordPage)
{
 if(size > 0 && size <= 4)
 {
  if(isForgetPasswordPage=="yes")
  	$(submit).attr('disabled','disabled');
  
  $(progress).css('display','block');
  $(bar).css({'width':'25%','background-color' : '#ff7575'}).text('sécurité faible');
 }
 else if(size > 4 && size <= 6){
  if(isForgetPasswordPage=="yes")
  	$(submit).attr('disabled','disabled');
  $(progress).css('display','block');
  $(bar).css({'width':'50%','background-color' : '#f5bd4e'}).text('sécurité moyenne');
 }
 else if(size > 6 && size <= 10){
  
	$(progress).css('display','block');
  $(bar).css({'width':'75%','background-color' : '#42bfee'}).text('sécurité bonne');
  $(submit).removeAttr('disabled');
 }
 else if(size > 10){
  $(progress).css('display','block');
  $(bar).css({'width':'100%','background-color' : '#9cdb5b'}).text('sécurité excellente');
  $(submit).removeAttr('disabled');
 }
 else
 {
  $(progress).css('display','none');
  $(bar).css('width','0').text('');
   if(isForgetPasswordPage=="yes"){
  	$(submit).attr('disabled','disabled');
  }
 }
}