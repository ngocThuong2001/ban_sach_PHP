

<body>
	<div id="them" class="container-fluid">
		<br>
		<div class="row justify-content-center">
			<div id="them1" class="col-md-3 col-sm-6 col-xs-12 row-container">
				<form action="?action=them_tac_gia" method="post" enctype="multipart/form-data" >
					<h2>Thêm tác giả</h2>
					<div class="form-group">
						<label>Tên tác giả</label>
                        <input name="ten_tac_gia" class="form-control" id="email" placeholder="Tên tác giả">
					</div>
                    
                    <div class="form-group">
						<label>Bút danh</label>
                        <input name="but_danh" class="form-control" id="email" placeholder="Bút Danh">
                    </div>
                    
                    <div class="form-group">
						<label>Ngày Sinh</label>
                        <input type="date" name="ngay_sinh">
                    </div>
                    
                    <div class="form-group">
						<label>Quê Quán</label>
                        <input name="que_quan" class="form-control" id="email" placeholder="Quê Quán">
                    </div>
                    
                    <div class="form-group">
						<label>Ảnh Tác giả</label>
                        <input type="file" name="file_anh">
					</div>
					<input type="submit" name="them" value="Them" class="btn btn-success btn-block my-3">
				</form>
			</div>	
		</div>
	</div>
</body>
</html>
