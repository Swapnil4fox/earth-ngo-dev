var registraion_flag= submission_flag=1;
var pattern              = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-])+\.([A-Za-z]{2,4})$/;
var password = /^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/;
var alpha_regrex         = /^[A-Za-z ]+$/;
var alpha_regrex2        = /^[a-zA-Z'-`’]+$/;


$(document).ready(function()
{
    $("#conFname").keyup(function()
    {
        var name =  $("#conFname").val();
        if(name == ""){
            $("#conFName_validate").html('Please Enter First Name.');
        }else{
          $("#conFName_validate").html('');
        }
    });
    $("#conLname").keyup(function()
    {
        var name =  $("#conLname").val();
        if(name == ""){
            $("#conLName_validate").html('Please Enter Last Name.');
        }else{
          $("#conLName_validate").html('');
        }
    });
    $("#conPhone").keyup(function()
    {
        var mobile_number = $("#conPhone").val();
        if(mobile_number == ""){
            $("#volPhone_validate").html('Please Enter Phone Number');
             registraion_flag=0;
        }else if(mobile_number.length !=10){
            $("#volPhone_validate").html('Please Enter Valid Phone Number.');
             registraion_flag=0;
        }else if(mobile_number !=""){
            $("#volPhone_validate").html('');
        }else{
            $("#conPhone_validate").html('');
        }

    });

    $("#conEmail").keyup(function()
    {
        var Email =  $("#conEmail").val();
        if(Email ==""){
            $("#conEmail_validate").html('Please Enter Email.');
        }else if(pattern.test(Email) == false){
            $("#conEmail_validate").html('Please Enter Valid Email Id.');
            registraion_flag=0;
        }else{
            $("#conEmail_validate").html('');
        }
    });
 
/*-------------------Volunteer form--------------------------*/
    $('#myDatePicker').change(function(){
        var name =  $("#myDatePicker").val();
        if(name == ""){
            $("#volbdate_validate").html('Please Select Birth Date.');
        }else{
          $("#volbdate_validate").html('');
        }
    });
     $("#volName").keyup(function()
    {
        var name =  $("#volName").val();
        if(name == ""){
            $("#volName_validate").html('Please Enter Name.');
        }else{
          $("#volName_validate").html('');
        }
    });
    $("#volAddress").keyup(function()
    {
        var name =  $("#volAddress").val();
        if(name == ""){
            $("#volAddress_validate").html('Please Enter Address.');
        }else{
          $("#volAddress_validate").html('');
        }
    });
    $("#volMessage").keyup(function()
    {
        var name =  $("#volMessage").val();
        if(name == ""){
            $("#volMessage_validate").html('Please Enter Message.');
        }else{
          $("#volMessage_validate").html('');
        }
    });
    $("#volNationality").keyup(function()
    {
        var name =  $("#volNationality").val();
        if(name == ""){
            $("#volNationality_validate").html('Please Enter Nationality.');
        }else{
          $("#volNationality_validate").html('');
        }
    });
    $("#volPhone").keyup(function()
    {
        var mobile_number = $("#volPhone").val();
        if(mobile_number == ""){
            $("#volPhone_validate").html('Please Enter Phone Number');
             registraion_flag=0;
        }else if(mobile_number.length !=10){
            $("#volPhone_validate").html('Please Enter Valid Phone Number.');
             registraion_flag=0;
        }else if(mobile_number !=""){
            $("#volPhone_validate").html('');
        }else{
            $("#volPhone_validate").html('');
        }

    });

    $("#volEmail").keyup(function()
    {
        var Email =  $("#volEmail").val();
        if(Email ==""){
            $("#volEmail_validate").html('Please Enter Email.');
        }else if(pattern.test(Email) == false){
            $("#volEmail_validate").html('Please Enter Valid Email Id.');
            registraion_flag=0;
        }else{
            $("#volEmail_validate").html('');
        }
    });

/*----------------------------------------------------------------------------------------------*/
 $( '.numberOnly' ).keypress( function ( e ) {//alert($(this).val().length);
   var unicode = e.charCode ? e.charCode : e.keyCode
   if ( unicode != 8 ) { 
     if ( unicode < 48 || unicode > 57 ){ 
         return false 
     }
   }
});
 $(document).on('keypress', '.SpaceNot', function(e) {
    if (e.keyCode == 32) return false;
});
   

});
 $(document).on('keyup blur','.textalpha',function()
  {
  var node = $(this);
  var varID = $(this).attr('id');
  $('#' + varID).val( $('#' + varID).val().replace(/[^A-Za-z_\s]/,''), function (str)
  {
  return ''; } );
  }); // (/[^a-z]/g,'' ); });

 


