<div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
        				<div class="shop__sidebar">
        					<aside class="wedget__categories poroduct--cat">
        						<h3 class="wedget__title">Thể Loại</h3>
        						<ul>
								<?php foreach($objs_the_loai as $value){ ?>
                           	<li><a  href="?id_the_loai=<?php echo $value->getID_the_loai();?>" ><?php echo $value->getTen_the_loai(); ?></a></li> 
							<?php
							}
							?>
        						</ul>
							</aside>
							
        				</div>
        			</div>