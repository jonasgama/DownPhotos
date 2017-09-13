  <script>
  ;(function($)
  {
    'use strict';
    $(document).ready(function()
    {
      var $fileupload = $('#fileupload');


    $fileupload.fileupload({
          url: "/upload",
          maxChunkSize: 1000000,
          acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
          method: "POST",
          sequentialUploads: true,
          formData: { _token: $fileupload.data('token'), userId: $fileupload.data('userId')},
          progressall: function(e, data) {
              var progress = parseInt(data.loaded / data.total * 100, 10);
             
              $('.progress-bar.progress-bar-info.progress-bar-striped.active').css(
                      'width',
                      progress + '%'
              );
              $('.progress-value').text(progress+"%");


              if(progress == 100){
                console.log("reload page");
                //window.location.reload();
                //location.href="envio";
              }
            
            }
          })
          .bind('fileuploadprocessalways', function (e, data) {
            var currentFile = data.files[data.index];
            
            if (data.files.error && currentFile.error) {
              // there was an error, do something about it
                //console.log('erro');
                console.log(data.files.error);//true if error
                console.log(data.files[0].error);//error message

                $('#mensagemErro').append("<p>"+data.files[0].error+"</p>");
                $('#mensagemErro').show();

              setTimeout(function() {
                  $('#mensagemErro').fadeOut('slow');
                  console.log("sumiu");
                  $('#mensagemErro > p').remove();
            }, 2000);
    
            }
          })
          .bind('fileuploadchunksend', function (e, data) {
              console.log("fileuploadchunksend");
              console.log("arquivo enviado "+data.files[0].name);
          })
          .bind('fileuploadchunkdone', function (e, data) {
              console.log("fileuploadchunkdone");
          })
          .bind('fileuploadchunkfail', function (e, data) {
              console.log("fileuploadchunkfail")
          })
          .bind('fileuploaddone', function (e, data) {
           $('#mensagem').append("<p> Está sendo enviado"+data.files[0].name+"</p>");
           $('#mensagem').show();
             
          })
          .bind('fileuploadprogressall', function (e, data) {
              setInterval(function(){ window.location.reload(); }, 3000);
              
          });
    
  });
})(window.jQuery);
</script>
<script>

$('#select_all').change(function() {
    var checkboxes = $(this).closest('form').find(':checkbox');
    if($(this).is(':checked')) {
        checkboxes.prop('checked', true);
    } else {
        checkboxes.prop('checked', false);
    }
});
</script>

<script>
$(document).ready(function () {
    $('.btn btn-xs btn-default').on('click',function(){
      alert("clicado");
      document.getElementsByClassName("btn btn-xs btn-default").value = $(this).attr('data-id');
      console.log($(this).attr('data-id'));
    });
  });
</script>