<!doctype html>
<html>
<head>
<title>Thêm thể loại</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="../../css/style_form_them.css" rel="stylesheet">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
	<div id="them" class="container-fluid">
		<br>
		<div class="row justify-content-center">
			<div id="them1" class="col-md-3 col-sm-6 col-xs-12 row-container">
				<form method="post" action="?action=them_the_loai">
					<h2>Thêm thể loại</h2>
					<div class="form-group">
						<label>Tên thể loại</label>
                        <input name="ten_the_loai" class="form-control" id="email" placeholder="Tên thể loại">
					</div>
					
					<input type="submit" name="them" value="Them" class="btn btn-success btn-block my-3">
				</form>
			</div>	
		</div>
	</div>
</body>
</html>
