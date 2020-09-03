<?php require "add.php"?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8"/>
  	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo $index[1]?></title>
	<link href="img/logo.png" rel="icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
	<link href="css/font/css/all.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="script.js"></script>
</head>
<body>
	<?php 
		require "datebase.php"
	?>
	<header>
		<div class="container">
			<a href="" id="nomer">
				<?php echo $index[2]?>
			</a>
		</div>
	</header>
	<?php
					if (isset($_POST['username']) && isset($_POST['email']))
					{
						$username = $_POST['username'];
						$email = $_POST['email'];
						$pword = $_POST['pword'];
						$spword = $_POST['pwords'];
						$link = "INSERT INTO `login`(`id_man`, `email`, `name`, `password`, `passwords`) VALUES ( '', '$username', '$email', '$pword', '$spword')";
						$res = mysqli_query($connection, $link);
						if ($res){
							$lsms = "Регистрация прошло успешно";
						}else {
							$lsms = "Регистрация прошло неуспешно";
						}
		    		}



		    		if (isset($_POST['ln']) && isset($_POST['lpw']))
		    		{
						$lname = $_POST['ln'];
						$lpword = $_POST['lpw'];

						$login = "SELECT * FROM `login` WHERE `email` LIKE " . $lname;
						$lres = mysqli_query($connection, $login);
						if ($lres) {
							$logi = "SELECT * FROM `login` WHERE `name`";
							$logins = "Привет" . $_GET['name'];
						}
		    		}
		    	?>
	<div class="container">
		<div class="header">
			<div style="display: flex; justify-content: space-between; align-items: center;">
				<h1 id="header-icon">
					<?php echo $index[0]?>
				</h1>
				<div class="menu">
				    <div class="menu__icon">
				      <i class="open fas fa-bars"></i>
				      <i class="close"></i>
				    </div>
				    <div class="menu__links">
				    	<div href="" class="user">
				    		<span style="display: none">
				    			Привет, <p id="ccomee" style="color: #0c00ff; display: inline;">присоединяйся</p>
				    			<?php echo $logins; ?>
				    		</span>
				    	</div>
                      <form class="search_box_nav" method="POST" action="search">
                          <input class="search_txt" type="search" name="search" placeholder="Поиск">
                          <a class="search_btn" href="" id="menu">
                              <i class="fas fa-search"></i> 
                          </a>
                      </form>             
						<span>МЕНЮ</span>
				    	<nav>
				    		<ul>
				    			<li>
				    				<a class="menu__links-item" href="/">
				    					<i class="fas fa-couch"></i>
				    					Главный
				    					<i class="fas fa-chevron-left"></i>
				    				</a>
				    			</li>
				    			<li class="navvv"> 
				    				<a class="menu__links-item" href="content">
				    					<i class="fas fa-hotel"></i>
				    						Курорты
				    					<i class="fas fa-chevron-left"></i>
				    				</a>
				    			</li>
				    			<li class="navvv">
				    				<a class="menu__links-item" href="contact">
				    					<i class="far fa-address-book"></i>
				    						Контакты
				    					<i class="fas fa-chevron-left"></i>
				    				</a>
				    			</li>
				    		</ul>
				    	</nav>
				    	<span style="margin-top: 20px;">КОНТАКТЫ</span>
				    	<div class="menu_nomer">
				    		<p>
				    			<?php echo $index[2]?>
				    		</p>
				    		<p>
				    			<?php echo $index[3]?>
				    		</p>
				    		<p>
				    			<?php echo $index[5]?>
				    		</p>
				    	</div> 
				    	<span style="margin-top: 20px;">САНАТОРИЙ</span>
				    	<div class="menu_nomer">
		    			<?php

						$query = mysqli_query($connection, "SELECT * FROM `sanatorys` ORDER BY `title`");
						while ( $sanatory = mysqli_fetch_assoc($query) ) {
						?>
				    		<a href="sanatori.php?id=<?php echo $sanatory['id'];?>">
				    			<?php echo $sanatory['title'];?>
				    		</a>
				    	<?php }
				    	?>
				    	</div> 
				    	<div class="header_info">
				    		Использование материалов возможно только с предварительного согласия правообладателей. Все права на изображения и тексты принадлежат их авторам.
				    	</div>
				    </div>
				</div>
			</div>
			<div class="forms">
				<form class="search_box" method="POST" action="search" style="width: 100%;">
					<input class="search_txt" type="search" name="search" placeholder="Поиск">
					<a class="search_btn" href="" id="menu">
						<i class="fas fa-search"></i> 
					</a>
				</form>
					<button style="display: none" class="come" id="ccome">Регистрация/Воити</button>
			</div>
		</div>
	</div>

	<div class="register_open" id="my_register">
		<div class="register_window_reg">
			<div class="reg_log_s">
				<button id="regs">Регистрация</button>
				<button id="logs">Войти</button>
			</div>
				
					




			<form id="regWindow" method="POST" action="index.php">
				<span>Введите имя</span>
				<input name="username" type="login">
				<span>Введите почту</span>
				<input name="email" type="email">
				<span>Введите пароль</span>
				<input name="pword" type="password">
				<span>Повтарите пароль</span>
				<input name="pwords" type="password">
				<button>Регистрация</button>
			</form>
			<form id="logWindow" method="POST" action="index.php">
				<span>Введите почту</span>
				<input name="ln" type="email">
				<span>Введите пароль</span>
				<input name="lpw" type="password">
				<button>Воити</button>
			</form>
		</div>
	</div>