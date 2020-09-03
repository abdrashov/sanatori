<?php
	require "blocks/header.php";
?>






	<div class="container">
	<main>

		<section>
			<div class="content_text">
				<h2>
					<i class="fas fa-fire-alt" style="margin-right: 5px; color: red; margin-bottom: 2%;"></i>
					Курорты Сарыагаш
				</h2>
			</div>
			<div class="sanatory">


				
					<?php
 
					$query = mysqli_query($connection, "SELECT * FROM `sanatorys` ORDER BY `view` DESC");

				    while ( $sanatory = mysqli_fetch_assoc($query) ) 
				    {
				?>
					<article>
						<div class="img_san">
							<a href="sanatori?id=<?php echo $sanatory['id']; ?>"></a>
						</div>
							<img src="img/sanatori/<?php echo $sanatory['id'];?>/1.jpg" alt="">
						<div class="sanatory_text">
							<h2>
								<?php
									echo $sanatory['title'];
			        			?>
							</h2>
							<div class="sanatory_v_c">

								<p>
									от <?php echo $sanatory['value']; ?> тг
								</p>

									<div class="san_v_c">
										<div class="san_v_c">
											<i class="far fa-eye"></i>
											<p>
												<?php
													echo $sanatory['view'];
							        			?>
											</p>
										</div>
										<div class="san_v_c">
											<i class="far fa-comment"></i> 
											<p>
												<?php
													$queryy = mysqli_query($connection, "SELECT `comment_id` FROM `comments` WHERE `comment_id` LIKE " . $sanatory['id'] );
											    	$sunn = 0;
											    	while ( $sanatoryy = mysqli_fetch_assoc($queryy) ) 
											    	{$sunn++;}
											    	echo $sunn;
							        			?>
											</p>
										</div>
									</div>

							</div>
						</div>
					</article>


				<?php
				    }
				    mysqli_free_result($query);
				?>
			</div>

		</section>
		</main>
	</div>


<?php
	require "blocks/footer.php";
?>