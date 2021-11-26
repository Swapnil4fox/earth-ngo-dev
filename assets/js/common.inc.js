var _URL = window.URL || window.webkitURL;

   $("#eventdetailImage").change(function(){

      var file = this.files[0];
      var size = $('#eventdetailImage')[0].files[0].size;
      var file_size_in_MB = size / Math.pow(1024,2);
      var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
      $("#image_name_lable").text(file);
      var ext = $('#eventdetailImage').val().split('.').pop().toLowerCase()
      if($.inArray(ext, ['jpg','jpeg','png']) == -1)
      {

          $("#eventdetailImage_validate").html('Please select valid file. Only JPG, PNG and JPEG are allowed.');
          $('#eventdetailImage').val('');

      }
     else if(file_size_in_MB>2)
      {

          $("#eventdetailImage_validate").html('Please select file of size less than 2MB.');
          $('#eventdetailImage').val('');

      }
      else{

          var img = new Image();

          img.onload = function() {
              if (this.width == 400 && this.height==366)
              {
                 $("#eventdetailImage_validate").html('');

              }else{
                   $("#eventdetailImage_validate").html('Image Dimension 400 × 366 px.');

                   $('#eventdetailImage').val('');
              }

          };

            img.src = _URL.createObjectURL(file);

      }

   });
    $("#eventThumbImage").change(function(){

      var file = this.files[0];
      var size = $('#eventThumbImage')[0].files[0].size;
      var file_size_in_MB = size / Math.pow(1024,2);
      var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
      $("#image_name_lable").text(file);
      var ext = $('#eventThumbImage').val().split('.').pop().toLowerCase()
      if($.inArray(ext, ['jpg','jpeg','png']) == -1)
      {

          $("#eventThumbImage_validate").html('Please select valid file. Only JPG, PNG and JPEG are allowed.');
          $('#eventThumbImage').val('');

      }
     else if(file_size_in_MB>2)
      {

          $("#eventThumbImage_validate").html('Please select file of size less than 2MB.');
          $('#eventThumbImage').val('');

      }
      else{

          var img = new Image();

          img.onload = function() {
              if (this.width == 2000 && this.height==1333)
              {
                 $("#eventThumbImage_validate").html('');

              }else{
                   $("#eventThumbImage_validate").html('Image Dimension 2000 × 1333 px.');

                   $('#eventThumbImage').val('');
              }

          };

            img.src = _URL.createObjectURL(file);

      }

   });
   $("#teamThumbImage").change(function(){

      var file = this.files[0];
      var size = $('#teamThumbImage')[0].files[0].size;
      var file_size_in_MB = size / Math.pow(1024,2);
      var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
      $("#image_name_lable").text(file);
      var ext = $('#teamThumbImage').val().split('.').pop().toLowerCase()
      if($.inArray(ext, ['jpg','jpeg','png']) == -1)
      {

          $("#teamThumbImage_validate").html('Please select valid file. Only JPG, PNG and JPEG are allowed.');
          $('#teamThumbImage').val('');

      }
     else if(file_size_in_MB>2)
      {

          $("#teamThumbImage_validate").html('Please select file of size less than 2MB.');
          $('#teamThumbImage').val('');

      }
      else{

          var img = new Image();

          img.onload = function() {
              if (this.width == 755 && this.height==755)
              {
                 $("#teamThumbImage_validate").html('');

              }else{
                   $("#teamThumbImage_validate").html('Image Dimension 755 × 755 px.');

                   $('#teamThumbImage').val('');
              }

          };

            img.src = _URL.createObjectURL(file);

      }

   });
   $("#bannerMobImage").change(function(){

      var file = this.files[0];
      var size = $('#bannerMobImage')[0].files[0].size;
      var file_size_in_MB = size / Math.pow(1024,2);
      var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
      $("#image_name_lable").text(file);
      var ext = $('#bannerMobImage').val().split('.').pop().toLowerCase()
      if($.inArray(ext, ['jpg','jpeg','png']) == -1)
      {

          $("#bannerMobImage_validate").html('Please select valid file. Only JPG, PNG and JPEG are allowed.');
          $('#bannerMobImage').val('');

      }
     else if(file_size_in_MB>2)
      {
          $("#bannerMobImage_validate").html('Please select file of size less than 2MB.');
          $('#bannerMobImage').val('');
      }
      else{

          var img = new Image();
          img.onload = function() {
              if (this.width == 768 && this.height==1300)
              {
                 $("#bannerMobImage_validate").html('');
              }else{
                   $("#bannerMobImage_validate").html('Mobile Image Dimension 768 × 1300 px.');
                   $('#bannerMobImage').val('');
              }
          };
            img.src = _URL.createObjectURL(file);
      }

   });
   $("#bannerDeskImage").change(function(){

      var file = this.files[0];
      var size = $('#bannerDeskImage')[0].files[0].size;
      var file_size_in_MB = size / Math.pow(1024,2);
      var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
      $("#image_name_lable").text(file);
      var ext = $('#bannerDeskImage').val().split('.').pop().toLowerCase()
      if($.inArray(ext, ['jpg','jpeg','png']) == -1)
      {

          $("#bannerDeskImage_validate").html('Please select valid file. Only JPG, PNG and JPEG are allowed.');
          $('#bannerDeskImage').val('');

      }
     else if(file_size_in_MB>2)
      {
          $("#bannerDeskImage_validate").html('Please select file of size less than 2MB.');
          $('#bannerDeskImage').val('');
      }
      else{

          var img = new Image();
          img.onload = function() {
              if (this.width == 1920 && this.height==720)
              {
                 $("#bannerDeskImage_validate").html('');
              }else{
                   $("#bannerDeskImage_validate").html('Desktop Image Dimension 1920 × 720 px.');
                   $('#bannerDeskImage').val('');
              }
          };
            img.src = _URL.createObjectURL(file);
      }

   });

   $("#volThumbImage").change(function(){

      var file = this.files[0];
      var size = $('#volThumbImage')[0].files[0].size;
      var file_size_in_MB = size / Math.pow(1024,2);
      var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
      $("#image_name_lable").text(file);
      var ext = $('#volThumbImage').val().split('.').pop().toLowerCase()
      if($.inArray(ext, ['jpg','jpeg','png']) == -1)
      {

          $("#volThumbImage_validate").html('Please select valid file. Only JPG, PNG and JPEG are allowed.');
          $('#volThumbImage').val('');

      }
     else if(file_size_in_MB>2)
      {
          $("#volThumbImage_validate").html('Please select file of size less than 2MB.');
          $('#volThumbImage').val('');
      }
      else{

          var img = new Image();
          img.onload = function() {
              if (this.width == 900 && this.height==1000)
              {
                 $("#volThumbImage_validate").html('');
              }else{
                   $("#volThumbImage_validate").html('Image Dimension 900 × 1000 px.');
                   $('#volThumbImage').val('');
              }
          };
            img.src = _URL.createObjectURL(file);
      }

   });

   $("#aboutMissionImg").change(function(){

      var file = this.files[0];
      var size = $('#aboutMissionImg')[0].files[0].size;
      var file_size_in_MB = size / Math.pow(1024,2);
      var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
      $("#image_name_lable").text(file);
      var ext = $('#aboutMissionImg').val().split('.').pop().toLowerCase()
      if($.inArray(ext, ['jpg','jpeg','png']) == -1)
      {

          $("#aboutMissionImg_validate").html('Please select valid file. Only JPG, PNG and JPEG are allowed.');
          $('#aboutMissionImg').val('');

      }
     else if(file_size_in_MB>2)
      {
          $("#aboutMissionImg_validate").html('Please select file of size less than 2MB.');
          $('#aboutMissionImg').val('');
      }
      else{

          var img = new Image();
          img.onload = function() {
              if (this.width == 768 && this.height==448)
              {
                 $("#aboutMissionImg_validate").html('');
              }else{
                   $("#aboutMissionImg_validate").html('Image Dimension 768 × 448 px.');
                   $('#aboutMissionImg').val('');
              }
          };
            img.src = _URL.createObjectURL(file);
      }

   });

   $("#aboutVisionImg").change(function(){

      var file = this.files[0];
      var size = $('#aboutVisionImg')[0].files[0].size;
      var file_size_in_MB = size / Math.pow(1024,2);
      var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
      $("#image_name_lable").text(file);
      var ext = $('#aboutVisionImg').val().split('.').pop().toLowerCase()
      if($.inArray(ext, ['jpg','jpeg','png']) == -1)
      {

          $("#aboutVisionImg_validate").html('Please select valid file. Only JPG, PNG and JPEG are allowed.');
          $('#aboutVisionImg').val('');

      }
     else if(file_size_in_MB>2)
      {
          $("#aboutVisionImg_validate").html('Please select file of size less than 2MB.');
          $('#aboutVisionImg').val('');
      }
      else{

          var img = new Image();
          img.onload = function() {
              if (this.width == 768 && this.height==448)
              {
                 $("#aboutVisionImg_validate").html('');
              }else{
                   $("#aboutVisionImg_validate").html('Vision Image Dimension 768 × 448 px.');
                   $('#aboutVisionImg').val('');
              }
          };
            img.src = _URL.createObjectURL(file);
      }

   });
   $("#icon1Image").change(function(){

      var file = this.files[0];
      var size = $('#icon1Image')[0].files[0].size;
      var file_size_in_MB = size / Math.pow(1024,2);
      var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
      $("#image_name_lable").text(file);
      var ext = $('#icon1Image').val().split('.').pop().toLowerCase()
      if($.inArray(ext, ['jpg','jpeg','png']) == -1)
      {
          $("#icon1Image_validate").html('Please select valid file. Only JPG, PNG and JPEG are allowed.');
          $('#icon1Image').val('');
      }
     else if(file_size_in_MB>2)
      {
          $("#icon1Image_validate").html('Please select file of size less than 2MB.');
          $('#icon1Image').val('');
      }
      else{

          var img = new Image();
          img.onload = function() {
              if (this.width == 64 && this.height==64)
              {
                 $("#icon1Image_validate").html('');
              }else{
                   $("#icon1Image_validate").html('Icon 1 Image Dimension  64 × 64 px.');
                   $('#icon1Image').val('');
              }
          };
            img.src = _URL.createObjectURL(file);
      }

   });
   $("#icon2Image").change(function(){

      var file = this.files[0];
      var size = $('#icon2Image')[0].files[0].size;
      var file_size_in_MB = size / Math.pow(1024,2);
      var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
      $("#image_name_lable").text(file);
      var ext = $('#icon2Image').val().split('.').pop().toLowerCase()
      if($.inArray(ext, ['jpg','jpeg','png']) == -1)
      {
          $("#icon2Image_validate").html('Please select valid file. Only JPG, PNG and JPEG are allowed.');
          $('#icon2Image').val('');
      }
     else if(file_size_in_MB>2)
      {
          $("#icon2Image_validate").html('Please select file of size less than 2MB.');
          $('#icon2Image').val('');
      }
      else{

          var img = new Image();
          img.onload = function() {
              if (this.width == 64 && this.height==64)
              {
                 $("#icon2Image_validate").html('');
              }else{
                   $("#icon2Image_validate").html('Icon 2 Image Dimension  64 × 64 px.');
                   $('#icon2Image').val('');
              }
          };
            img.src = _URL.createObjectURL(file);
      }

   });
   $("#icon3Image").change(function(){

      var file = this.files[0];
      var size = $('#icon3Image')[0].files[0].size;
      var file_size_in_MB = size / Math.pow(1024,2);
      var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
      $("#image_name_lable").text(file);
      var ext = $('#icon3Image').val().split('.').pop().toLowerCase()
      if($.inArray(ext, ['jpg','jpeg','png']) == -1)
      {
          $("#icon3Image_validate").html('Please select valid file. Only JPG, PNG and JPEG are allowed.');
          $('#icon3Image').val('');
      }
     else if(file_size_in_MB>2)
      {
          $("#icon3Image_validate").html('Please select file of size less than 2MB.');
          $('#icon3Image').val('');
      }
      else{

          var img = new Image();
          img.onload = function() {
              if (this.width == 64 && this.height==64)
              {
                 $("#icon3Image_validate").html('');
              }else{
                   $("#icon3Image_validate").html('Icon 3 Image Dimension  64 × 64 px.');
                   $('#icon3Image').val('');
              }
          };
            img.src = _URL.createObjectURL(file);
      }

   });
   $("#section2Image").change(function(){

      var file = this.files[0];
      var size = $('#section2Image')[0].files[0].size;
      var file_size_in_MB = size / Math.pow(1024,2);
      var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
      $("#image_name_lable").text(file);
      var ext = $('#section2Image').val().split('.').pop().toLowerCase()
      if($.inArray(ext, ['jpg','jpeg','png']) == -1)
      {
          $("#section2Image_validate").html('Please select valid file. Only JPG, PNG and JPEG are allowed.');
          $('#section2Image').val('');
      }
     else if(file_size_in_MB>2)
      {
          $("#section2Image_validate").html('Please select file of size less than 2MB.');
          $('#section2Image').val('');
      }
      else{

          var img = new Image();
          img.onload = function() {
              if (this.width == 1335 && this.height==1610)
              {
                 $("#section2Image_validate").html('');
              }else{
                   $("#section2Image_validate").html('Image Dimension  1335 × 1610 px');
                   $('#section2Image').val('');
              }
          };
            img.src = _URL.createObjectURL(file);
      }

   });
   $("#galleryImg").change(function(){

      var file = this.files[0];
      var size = $('#galleryImg')[0].files[0].size;
      var file_size_in_MB = size / Math.pow(1024,2);
      var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
      $("#image_name_lable").text(file);
      var ext = $('#galleryImg').val().split('.').pop().toLowerCase()
      if($.inArray(ext, ['jpg','jpeg','png']) == -1)
      {
          $("#galleryImg_validate").html('Please select valid file. Only JPG, PNG and JPEG are allowed.');
          $('#galleryImg').val('');
      }
     else if(file_size_in_MB>2)
      {
          $("#galleryImg_validate").html('Please select file of size less than 2MB.');
          $('#galleryImg').val('');
      }
      else{

          var img = new Image();
          img.onload = function() {
              if (this.width == 2000 && this.height==1335)
              {
                 $("#galleryImg_validate").html('');
              }else{
                   $("#galleryImg_validate").html('Image Dimension 2000 × 1335 px');
                   $('#galleryImg').val('');
              }
          };
            img.src = _URL.createObjectURL(file);
      }

   });

    $( '.numberOnly' ).keypress( function ( e ) {//alert($(this).val().length);
   var unicode = e.charCode ? e.charCode : e.keyCode

   if ( unicode != 8 ) { 
     if ( unicode < 48 || unicode > 57 ){ 
         return false 
     }
   }


   });

    $("#propertyImg").change(function()
   {

        for(var i = 0; i < this.files.length; i++) {
            var file = this.files[i];
            var size = this.files[i].size;
            var file_size_in_MB = size / Math.pow(1024,2);
            var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
            $("#image_name_lable").text(file);
            var ext = $('#propertyImg').val().split('.').pop().toLowerCase();

            if($.inArray(ext, ['jpg','jpeg','png']) == -1)
            {
                $("#campaignFile_validate_gallery").html('Please select valid file. Only JPG, PNG and JPEG are allowed.');
                $('#propertyImg').val('');
            }
           else if(file_size_in_MB>2)
            {
                $("#campaignFile_validate_gallery").html('Please select file of size less than 2MB.');
                $('#propertyImg').val('');
            }
            else{
                 var img = new Image();
                 img.onload = function() {

                     if (this.width == 861 && this.height==1290)
                     {
                        $("#campaignFile_validate_gallery").html('');
                     }else{
                          $("#campaignFile_validate_gallery").html('Image Dimension 861 × 1290 px.');
                          $('#propertyImg').val('');
                     }

                 };
                   img.src = _URL.createObjectURL(file);
             }
          }

    });
    
