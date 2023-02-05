<?php
include("link.php");
?>
<!-- Start Error Area -->
		<section class="page_error section-padding--lg bg--white">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="error__inner text-center">
							<div class="error__logo">
								<a href=""><img src="../images/others/404.png" alt="error images"></a>
							</div>
							<div class="error__content">
                                <h2>Lỗi</h2>
                                <?php foreach($error as $value)
                                {
                                ?>
								<p><?php echo $value; ?></p>
                                <?php 
                                }
                                ?>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Error Area -->