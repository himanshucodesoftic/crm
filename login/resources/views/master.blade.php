<!-- master.blade.php -->
<!-- <iframe src="{{URL::to('/')}}/your file path here" width="100%" height="600"> -->


<!doctype html>
<html lang="en">
  <head>
    <title> User Custom Registration and Login with Session </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    @yield('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
$(document).ready(function(){

	$('#txt_username').blur(function(){
		var error_email = '';
		var username = $('#txt_username').val();
		var _token = $('input[name="_token"]').val();
		//var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if($.trim(username).length > 0)
		{
			/*if(!filter.test(username))
			{				
				$('#error_email').html('<label class="text-danger">Invalid Username</label>');
				$('#txt_username').addClass('has-error');
				$('#register').attr('disabled', 'disabled');
			}*/
			/*else
			{*/
				$.ajax({
					url:"{{ route('registration.check') }}",
					method:"POST",
					data:{username:username, _token:_token},
					success:function(result)
					{
						if(result == 'unique')
						{
							$('#error_email').html('<label class="text-success">Username Available</label>');
							$('#txt_username').removeClass('has-error');
							$('#register').attr('disabled', false);
						}
						else
						{
							$('#error_email').html('<label class="text-danger">Username not Available</label>');
							$('#txt_username').addClass('has-error');
							$('#register').attr('disabled', 'disabled');
						}
					}
				})
			/*}*/
		}
		else
		{
			$('#error_email').html('<label class="text-danger">Username is required</label>');
			$('#txt_username').addClass('has-error');
			$('#register').attr('disabled', 'disabled');
		}
	});
	
});
</script>
    <style type="text/css">
			.box{
				width:600px;
				margin:0 auto;
				border:1px solid #ccc;
			}
			.has-error
			{
				border-color:#cc0000;
				background-color:#ffff99;
			}
		</style>
  </body>
</html>
<!-- </iframe> -->