<?php
	require "blocks/header.php";
?>






	<div class="container">
	<main>
		<section id="contacts">
				<div class="contacts_div">
					<p style="line-height: 2.5; font-size: 16px; font-weight: 500;">
						Отправка сообшений
					</p>
					<form style="margin-bottom: 20px;" class="bronCin" method="POST">
						<input type="hidden" name="project_name" value="Sanatori">
						<input type="hidden" name="admin_email" value="<?php echo $index[5] ?>">
						<input type="hidden" name="form_subject" value="Sms">

						<input type="text" name="Name" placeholder="Введите ваши имя и фамилию" required>
						<input type="email" name="E-mail" placeholder="Введите вашу почту" required>
						<textarea type="text" name="Text" placeholder="Введите ваше сообшение" required></textarea>
						<button style="padding: 2px 7px; border-radius: 3px; ">Отправить</button>
					</form>
				</div>
				<div class="contacts_sos">
					<p style="font-weight: 500; font-size: 18px;">
						Мы в социальных сетях
					</p>
					<div class="contacts_sos_sot">
						<a target="_blank"  href="<?php echo $cons[0] ?>">  <i class="fab fa-vk" style="color: #0357fd;"></i> Vkontakte </a>
						<a target="_blank"  href="<?php echo $cons[3] ?>">  <i class="fab fa-instagram" style="color: #8a03fd;"></i> Instagram </a>
						<a target="_blank"  href="<?php echo $cons[4] ?>">  <i class="fab fa-facebook" style="color: #0051ff;"></i> Facebook </a>
						<a target="_blank"  href="<?php echo $cons[1] ?>">  <i class="fab fa-whatsapp" style="color: #29ff00;"></i> Whatsapp </a>
						<a target="_blank"  href="<?php echo $cons[2] ?>">  <i class="fab fa-youtube" style="color: #ff0000;"></i> YouTube </a>
					</div>
				</div>
		


		</section>

	</main>
	</div>

<?php
	require "blocks/footer.php";
?>