<html>
<head>
<title> Live poll system in php mysql using ajax.</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  
</head>
<body>
<div class="container"><br / >
	<h2 align="center">Live poll system in php mysql using ajax.</h2>
	<br />
	<br />
	<div class="row">
		<div class="col-md-6">
			<form method="POST" id="poll_form">
			<h3>Which is best php framework in 2020? </h3>
			<br />
			<div class="radio">
				<label><h4><input type="radio" name="poll_option" class="poll_option" value="Laravel"/>Laravel</h4></label>
			</div>
			<div class="radio">
				<label><h4><input type="radio" name="poll_option" class="poll_option" value="CodeIgniter"/>CodeIgniter</h4></label>
			</div>
			<div class="radio">
				<label><h4><input type="radio" name="poll_option" class="poll_option" value="CakePHP"/>CakePHP</h4></label>
			</div>
			<div class="radio">
				<label><h4><input type="radio" name="poll_option" class="poll_option" value="Symfony"/>Symfony</h4></label>
			</div>
			<div class="radio">
				<label><h4><input type="radio" name="poll_option" class="poll_option" value="Phalcon"/>Phalcon</h4></label>
			</div>
			<br />
			<input type="submit" name="poll_button" id="poll_button" class="btn btn-info"/>
			</form>
			<br />
		</div>
		<div class="col-md-6">
			<br />
			<br />
			<br />
			<h4>Live Poll Result</h4>
			<div class="poll_result">
			</div>
		</div>
	</div>
	<br />
	<br />
	<br />
</div>
</body>
</html>
<script>
$(document).ready(function(){
	fetch_poll_data();
	function fetch_poll_data()
	{
		$.ajax({
			url:"<?php echo base_url() ?>poll/fetch_poll_data",
			method:"POST",
			success:function(data)
			{
				//alert(data);
				$('.poll_result').html(data);
			}
		})
	}
	$('#poll_form').on('submit',function(event)
	{
		event.preventDefault();
		var poll_option = '';
		$('.poll_option').each(function(){
			if($(this).prop("checked"))
			{
				poll_option = $(this).val();
			}
		});
		if(poll_option != '')
		{
			$('#poll_button').attr("disabled","disabled");
			var form_data = $(this).serialize();
			$.ajax({
				url:"<?php echo base_url() ?>poll/poll_insert",
				method:"POST",
				data:form_data,
				success:function(data)
				{
					//alert(data);
					$('#poll_form')[0].reset();
					$('#poll_button').attr('disabled', false);
					fetch_poll_data();
					alert("Poll Submitted successfully..");
				}
			});
		}
		else
		{
			alert("Please select option");
		}
	});
});
</script>