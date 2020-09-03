<?php
	require "blocks/header.php";
	

	$query = mysqli_query($connection, "SELECT * FROM `sanatorys` WHERE `id` = " . (int) $_GET['id']);





	if ( mysqli_num_rows($query) <= 0)
	{
	?>

	<div class="container">
		<main>
			<section id="slideshow">
				<div class="slideshow">
					<div class="mySlide">
						<img src=" " alt="">
						<div class="slide_text">
							<p>
								Запрашиваемая страница не существует
							</p>
						</div>
					</div>
				</div>
			</section>
		</main>
	</div>

<?php		
	} else{
 		$sanatory = mysqli_fetch_assoc($query);
		mysqli_query($connection, " UPDATE `sanatorys` SET `view`= `view` + 1 WHERE `id` = " . (int) $_GET['id'] );
?>	


<div class="bron_text" id="bron_text">
	<form method="POST" class="bronCin">
		<span style="text-align: right; font-size: 28px; display: block;">
			<i  id="bornClose" class="fas fa-times" style=" cursor: pointer;"></i>
		</span>
			<input type="hidden" name="project_name" value="Sanatori">
			<input type="hidden" name="admin_email" value="<?php echo $index[5] ?>">
			<input type="hidden" name="form_subject" value="Bron">
			<!-- END Hidden Required Fields -->
			<p>Введите ваш ФИО</p>
			<input type="text" name="Name" placeholder="Асыл Кенбай" required>
			<p>Введите ваш email</p>
			<input type="text" name="E-mail" placeholder="kenbaiasyl@gmail.com" required>
			<p>Введите ваш номер телефона</p>
			<input type="text" name="Phone" placeholder="7 707 199 99 19">
			<button>Отправить</button>
	</form>
</div>

	<div class="container">
	<main>


			<section id="slideshow">
				<div class="slideshow">
<?php
	$imgids = $_GET['id'];
	$dir = "img/sanatori/$imgids/";
	$files = scandir($dir);

	$k = 0; 
	for ($i = 0; $i < count($files); $i++) 
	{ 
	if (($files[$i] != ".") && ($files[$i] != "..")) 
	{ 
	$path = $dir.$files[$i]; 
?>
					<div class="mySlide">
						<?php echo "<img src='$path' alt='' width='100' />"; ?>
						<style>
							.mySlide:before {
								opacity: 0;
							}
						</style>
					</div>
<?php
	}
	}
?>			
					<div class="prev_next">
						<a class="prev" onclick="plusSlide(-1)"><i class="fas fa-chevron-circle-left"></i></a>
						<a class="next" onclick="plusSlide(1)"><i class="fas fa-chevron-circle-right"></i></a>
					</div>

					<div class="dots">
					<?php 
						for ($i = 1; $i < count($files); $i++)
						{
						if (($files[$i] != ".") && ($files[$i] != "..")) 
						{ 
						$path = $dir.$files[$i]; 
						
						echo "<span class='dot' onclick='currentSlide('$path')'></span>";}}
						?>
					</div>

				</div>
			</section>
	
	

		<section style="position: relative;">
			<div class="content_text row">
				<h2 style="display: inline; margin-right: 1%;">
					<i class="fas fa-fire-alt" style="margin-right: 5px; color: red; margin-bottom: 2%;"></i>
					<?php echo $sanatory['title']; ?>
				</h2>
				<span style="display: inline-grid;">
					от <?php echo $sanatory['value']; ?> тг
				</span>
				<button class="Brons" id="brons">
					Забронировать
				</button>

			</div>
			<div class="oicanie">
				<div style="width: 100%; text-align: center; font-weight: 600; font-size: 24px;">
					Описание
				</div>
				<p>
					<?php echo $sanatory['text']; ?>
				</p>


			</div>


			<table> 
				<caption style="line-height: 2; font-size: 24px; font-weight: 600">Услуги курорта</caption>
		
					<tr>
						<th>Вид номера</th>
						<th>Вид размещения</th>
						<th>Цена за сутки</th>
					</tr>
					<tr>
						<th rowspan="3">Стандар.</th>
						<td>Номер на 1 чел.</td>
						<td><?php echo $sanatory['humanOne']; ?> </td>
					</tr>
					<tr>
						<td>Номер на 2 чел.</td>
						<td><?php echo $sanatory['humanTwo']; ?> </td>
					</tr>
					<tr>
						<td>Доп. место (6-12 лет)</td>
						<td><?php echo $sanatory['baby']; ?> </td>
					</tr>
					<tr>
						<th rowspan="3">Люкс</th>
						<td>Номер на 1 чел.</td>
						<td><?php echo $sanatory['manOne']; ?> </td>
					</tr>
					<tr>
						<td>Номер на 2 чел.</td>
						<td><?php echo $sanatory['manTwo']; ?> </td>
					</tr>
					<tr>
						<td>Доп. место (6-12 лет)</td>
						<td><?php echo $sanatory['manMaby']; ?> </td>
					</tr>
				
			</table>


			
			<div style="text-align: center; font-weight: 600; font-size: 24px; margin: 20px 0 5px;">
				Лента отзывов
			</div>
			<div class="comments">

				<?php
				$couts = mysqli_query($connection, "SELECT * FROM `comments` WHERE `comment_id` LIKE " . (int) $_GET['id'] . " ORDER BY `comments_id` DESC" );

					if( mysqli_num_rows($couts) <= 0 )
					{?>
						<p style="text-decoration: underline; font-weight: 600; text-align: center; margin: 40px 0; width: 100%; color: #fff;">Отзыв не найдено!</p>
					<?php
					}
					else
					{
				   while ( $cout = mysqli_fetch_assoc($couts) ) 
				   {

				?>

					<span>ползователь: </span> 
					<p style="text-decoration: underline; font-weight: 600; color: #fff;"><?php echo $cout['name'];?></p>
					<br/>
					<span>коментарий: </span> 
					<p style="display: inline; color: #fff;"><?php echo $cout['comment'];?></p>
					<br/>
					<span class="comments_data"><?php echo $cout['date'];?></span>
						<br/>
				<?php }} mysqli_close($connection);?>
				</div>
				<br/><br/>
			<div style="text-align: center; font-weight: 600; font-size: 24px; margin: 20px 0 0;">
				Написать отзыв			
			</div>
				<form  method="POST" class="comments_cin">
				<?php
            $srav = mysqli_query($connection, "SELECT * FROM `comments` WHERE `name` LIKE " . $_POST['name_cin']);
				$row = mysqli_num_rows($srav);
				setlocale(LC_ALL, '');
				$date_cin = date("Y.m.d");

				if (isset($_POST['do_post']))
				{
    				if ( $row > 0 )
					{
						$sravv = '<p style="display: block; margin: 0 0 -10px; color: red; font-weight: 600; font-size: 14px;">Этот ползователь уже</p>';
						mysqli_close($connection);	
					}
               else
					{
						$errorss = array();
						if ($_POST['email_cin'] == '')
						{
							$errorss1 = '<p style="display: block; margin: 0 0 -10px; color: red; font-weight: 600; font-size: 14px;">Введите Email!</p>';
						}
						if ($_POST['name_cin'] == '')
						{
							$errorss2 = '<p style="display: block; margin: 0 0 -10px; color: red; font-weight: 600; font-size: 14px;">Введите имя!</p>';
						}
						if ($_POST['text_cin'] == '')
						{
							$errorss3 = '<p style="display: block; margin: 0 0 -10px; color: red; font-weight: 600; font-size: 14px;">Введите отзыв!</p>';
						}
						if ( empty($errorss1) and empty($errorss2) and empty($errorss3) )
						{
							$errors = '<p style="display: block; margin: 0 0 -10px; color: green; font-weight: 600; font-size: 14px;">Отзыв успешно доваленно!</p>';

							mysqli_query($connection, "INSERT INTO `comments`(`comments_id`, `comment_id`, `name`, `comment`, `email`, `date`) VALUES ( '', '".$_GET['id']."' , '".$_POST['name_cin']."' , '".$_POST['text_cin']."' , '".$_POST['email_cin']."' , '".$date_cin."') ");

					         unset($_POST['email_cin']);
					         unset($_POST['name_cin']);
					         unset($_POST['text_cin']);
					         
						}
						else
						{
							$email_cin = $_POST['email_cin'];
							$name_cin = $_POST['name_cin'];
							$text_cin = $_POST['text_cin'];
						}
					}
				}
				?>
					<?php echo $errorss1 . $errors . $sravv?>
					<input type="email" name="email_cin" style="margin:15px 0 10px;"  placeholder="Введите Email" value="<?php echo $email_cin?>">
					<?php echo $errorss2?>
					<input type="text" name="name_cin" style="margin:15px 0 10px;"  placeholder="Введите имя" value="<?php echo $name_cin?>">
					<?php echo $errorss3?>
					<textarea name="text_cin" id="" style="margin:15px 0 0px;"  placeholder="Введите текст отзыва" value="<?php echo $text_cin; mysqli_close($connection);?>"></textarea>
					<button name="do_post">Опубликовать</button>
				</form>
		</section>
		</main>
	</div>

<script type="text/javascript">

		let
			bronText = document.getElementById('bron_text'),
			brons = document.getElementById('brons');
			bornClose = document.getElementById('bornClose');

			brons.onclick = function() {
				bronText.style.display = "block";
			};
			bornClose.onclick = function() {
				bronText.style.display = "none";
			};

			window.onclick = function (ss) {
				if( ss.target == bronText) {
				bronText.style.display = "none";
				}
			};
			
</script>

<?php
	}
	require "blocks/footer.php";
?>