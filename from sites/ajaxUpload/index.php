<!DOCTYPE html>
<html lang="en">
<head>
    <script src="jquery-3.3.1.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function(){

            $("#but_upload").click(function(){

                var fd = new FormData();

                var files = $('#file')[0].files[0];

                fd.append('file',files);

                $.ajax({
                    url:'upload.php',
                    type:'post',
                    data:fd,
                    contentType: false,
                    processData: false,
                    success:function(response){
                        if(response != 0){
                            $("#img").attr("src",response);
                            $('.preview img').show();
                        }else{
                            alert('File not uploaded');
                        }
                    }
                });
            });
        });


    </script>

</head>
<body>
    <div class="container">
        <form method="post" action="" enctype="multipart/form-data" id="myform">
          
            <div >
                <input type="file" id="file" name="file" />
                <input type="button" class="button" value="Upload" id="but_upload">
            </div>
        </form>
    </div>
</body>
</html>