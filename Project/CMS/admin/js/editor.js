   $(document).ready(function () {

    ClassicEditor
    .create( document.querySelector( '#body' ) )
    .catch( error => {
        console.error( error );
    } );

   });
  
$(document).ready(function () {
    $('#selectcheckbox').click(function () {
       if(this.checked){
           $('.checkboxes').each(function () {
               this.checked = true;
           });
       }else{
        $('.checkboxes').each(function () {
            this.checked = false;
        });

       }
    });

    // $('#loadscreen').delay(700).fadeout(600, function () {
    // $(this).remove();
    // });
 
});
    function loaduseronline() {
        $.get("include/function.php?onlineuser=result", function(data) {
            $(".onlineuser").text(data);
        });
    }
    setInterval(function() {
        loaduseronline();
    },100);
