<?php
	require "blocks/header.php";
?>



	<div class="container">
		<main>
  			<div class="sanatory">
<?php
    $search=$_POST['search'];
    $search = trim($search);
    $search = strip_tags($search);
    $q= mysqli_query($connection, "SELECT * FROM `sanatorys` WHERE `title` LIKE '%$search%' OR `text` LIKE '%$search%' ");
	
	if (mysqli_num_rows($q) > 0)
    {
    while ($itog = mysqli_fetch_assoc($q)) {
?>
<article>
						<div class="img_san">
							<a href="sanatori.php?id=<?php echo $itog['id']; ?>"></a>
						</div>
						<img src="img/sanatori/<?php echo $itog['id'];?>/1.jpg" alt="">
						<div class="sanatory_text">
							<h2>
								<?php
									echo $itog['title'];
			        			?>
							</h2>
							<div class="sanatory_v_c">

								<p> 
									от <?php echo $itog['value']; ?> тг
								</p>

									<div class="san_v_c">
										<div class="san_v_c">
											<i class="far fa-eye"></i>
											<p>
												<?php
													echo $itog['view'];
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
    }
else {
  echo "<p style=\"padding-top: 20px; font-size: 18px;\"> По вашему запросу ничего не найдено. </p>";
}
     mysqli_free_result($q);
     mysqli_close($connection);
 ?>




				</div>

			</main>
	</div>	



<?php
require "blocks/footer.php";
?>