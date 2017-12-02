<!DOCTYPE html>
<html>
<head>
	<title>Laravel Test</title>

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>

	@yield('content')

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script type="text/javascript">
		$(document).ready(function(e){

			$('#create-product').submit(function(e){
				
				e.preventDefault();
				
				
				
				$.ajax({

					url:'http://localhost:8000/product',
					method:'post',
					data:$('#create-product').serialize(),
					success:function(response){
						$("#product-list").append(`
							<tr>
							    <td>`+response.details.product.product_name+`</td>
							    <td>`+response.details.product.quantity_in_stock+`</td>
							    <td>`+response.details.product.price_per_item+`</td>
							    <td>`+response.details.product.datetime_submited+`</td>
							    <td>`+(response.details.product.quantity_in_stock * response.details.product.price_per_item)+`</td>
							 </tr>
						`);
						document.getElementById('create-product').reset();
					}

				});
			});
		});
	</script>

</body>
</html>