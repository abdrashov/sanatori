<?php



	require "blocks/header.php";



?>















	<div class="container">



		<main>







			



			<section id="slideshow">



				<div class="slideshow">



					<?php



						$query = mysqli_query($connection, "SELECT * FROM `slider`");







						$sums = 0;



						while ( $sanatory = mysqli_fetch_assoc($query) ) 



						{



						$sums++;



					?>



						<div class="mySlide">



							<img src="img/bg<?php echo $sums?>.jpg" alt="">



							<div class="slide_text">



								<p>



									<?php echo $sanatory['title']?>



								</p>



								<span>



									<?php echo $sanatory['text']?>



								</span>



							</div>



						</div>



					<?php



						}



					?>



				







				<div class="prev_next">



					<a class="prev" onclick="plusSlide(-1)"><i class="fas fa-chevron-circle-left"></i></a>



					<a class="next" onclick="plusSlide(1)"><i class="fas fa-chevron-circle-right"></i></a>



				</div>



				<div class="dots">



					<?php



						$querys = mysqli_query($connection, "SELECT * FROM `slider`");



						while ( $sanatory = mysqli_fetch_assoc($querys) ) 



						{



					?>



					<span class="dot" onclick="currentSlide('<?php echo $sanatory['id']?>')"></span>







					<?php



						}	



					?>



				</div>







			</div>







			</section>



			<section>



				<div class="content_top">



					<p>



						<i class="fas fa-fire-alt" style="margin-right: 5px; color: red; margin-bottom: 2%;"></i>



						Популярные курорты



					</p>



				</div>







				<div class="sanatory">











				<?php



 



				$query = mysqli_query($connection, "SELECT * FROM `sanatorys` ORDER BY `view` DESC LIMIT 6");







						



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



				<div class="content_bottom">



					<a href="content.php">	



						<p style="">



							Смотреть больше<i class="fas fa-chevron-down" style="margin: 5px; font-size: 20px;"></i>



						</p>



					</a>				



				</div>







			</section>



		</main>



	</div>	











<?php



	require "blocks/footer.php";



?>