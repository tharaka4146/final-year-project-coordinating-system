<html>

    <head>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    </head>

    <body>  
           
			<div class="table-responsive">  

				<span id="result"></span>
				<div id="live_data"></div>  
                               
			</div>  

    </body>

</html>  

<script>  

$(document).ready(function(){  

    function fetch_data() {  
        $.ajax({  
            url:"select.php",  
            method:"POST",  
            success:function(data){  
				$('#live_data').html(data);  
            }  
        });  
    }

    fetch_data();  

	function edit_data(id, text, column_name){  
        $.ajax({  
            url:"edit.php",  
            method:"POST",  
            data:{id:id, text:text, column_name:column_name},  
            dataType:"text",  
            success:function(data){  
                //alert(data);
				$('#result').html("<div class='alert alert-success'>"+data+"</div>");
            }  
        });  
    }  
    
    $(document).on('blur', '.kduEmail', function(){  
        var id = $(this).data("id1");  
        var kduEmail = $(this).text();  
        edit_data(id, kduEmail, "kduEmail");  
    });  
    $(document).on('blur', '.password', function(){  
        var id = $(this).data("id2");  
        var password = $(this).text();  
        edit_data(id,password, "password");  
    });  
   
});  

</script>