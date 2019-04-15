<header class="main-header" id="header">
		<nav class="navbar">
			<a class="btn btn-secondary nav-link" href="/home.php"><i class="fas fa-home"></i> <span class="d-none d-md-inline-block">Главная</span></a>
			<?php if ($_SESSION['role'] == '' or $_SESSION['role'] == 'guest') {} else { ?><a class="btn btn-secondary nav-link" href="/company_add.php"><i class="fas fa-plus-circle"></i> <span class="d-none d-md-inline-block">Добавить</span></a><?php } ?>
			<?php if ($_SERVER['PHP_SELF'] == '/home.php') { ?><button class="show_filter btn btn-success nav-link" type="button" data-toggle="collapse" data-target="#filter"
				aria-expanded="false" aria-controls="filter" /><i class="fas fa-search d-none d-md-inline-block"></i> Ф<span class="d-none d-md-inline-block">ильтр</span> <i
				class="fas fa-caret-up"></i></button><?php } ?>

			<?php if ($_SERVER['PHP_SELF'] == '/home.php') { ?><input type="search" id="search" class="form-control ml-auto" placeholder="Быстрый поиск" autocomplete="off"><?php } ?>
			<?php $manager = $db->getRow('SELECT * FROM `manager` WHERE login = ?s', $_SESSION['login']); ?>
			<!-- User Account -->
			<ul class="user-menu ml-auto">
				<li class="dropdown">
					<button href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
						aria-expanded="false">
						<img src="img/manager/<?php if($manager['img']) { echo $manager['img']; } else { echo 'manager.svg'; } ?>" alt="" />
						<span class="d-none d-lg-inline-block"><?php echo $manager['name']; ?></span>
					</button>
					<ul class="dropdown-menu dropdown-menu-right">
						<?php if ($_SESSION['role'] == '' or $_SESSION['role'] == 'guest') {} else { ?>
						<li>
							<a href="/manager.php?id=<?php echo $manager['id']; ?>">
								<i class="mdi mdi-account"></i> Мой профиль
							</a>
						</li>
						<?php } ?>
						<li class="dropdown-footer">
							<a href="/inc/logout.php"> <i class="mdi mdi-logout"></i> Выход </a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
	</header>