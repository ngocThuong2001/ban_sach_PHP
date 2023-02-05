




<body>
	<div id="them" class="container-fluid">
		<br>
		<div class="row justify-content-center">
			<div id="them1" class="col-md-3 col-sm-6 col-xs-12 row-container">
				<form action="?action=them_sach" method="post" enctype="multipart/form-data" >
                                        <h2>Thêm sách</h2>

                                        <br>

                                        <br>
                                        
                                        <div class="form-group">
                                        Thể loại
                                        <select name="id_the_loai" id="chon_the_loai">
<?php 
    foreach($objs_the_loai as $value)
        {
?>
        <option value="<?php echo $value->getID_the_loai();?>">
            <?php echo $value->getTen_the_loai(); ?>
        </option>

<?php
        }

?>
</select>
</div>

<div class="form-group">
Tác Giả
<select name="id_tac_gia" id="chon_tac_gia">
<?php 
    foreach($objs_tac_gia as $value)
        {
?>
        <option value="<?php echo $value->getID_tac_gia();?>">
            <?php echo $value->getTen_tac_gia(); ?>
        </option>

<?php
        }

?>
</select>

</div>

					<div class="form-group">
						<label>Tên sách</label>
                        <input name="them_ten_sach" class="form-control" id="email" placeholder="Tên sách">
					</div>
                    
                    <div class="form-group">
						<label>Giá Sách</label>
                        <input name="them_gia_sach" class="form-control" id="email" placeholder="Giá Sách">
                    </div>
                    
                    
                    <div class="form-group">
						<label>Nội dung đọc thử</label>
                        <textarea name="noi_dung" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                    
                    <div class="form-group">
						<label>Ảnh đại diện</label>
                        <input type="file" name="file_anh">
					</div>
					<input type="submit" name="them" value="Them" class="btn btn-success btn-block my-3">
				</form>
			</div>	
		</div>
	</div>
</body>
</html>


