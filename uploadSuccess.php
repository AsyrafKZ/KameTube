<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>KameTube - Upload Success</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>

	<body id="top">
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="index.php">
				<img src="images/kameTubeLogo.png" width="55" height="55" alt="">
			</a>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<div class="navbar-nav mr-auto">
						<a class="nav-item nav-link" href="login.php">
							<button class="btn btn-outline-success my-2 my-sm-0">ログイン</button>
						</a>
						<a class="nav-item nav-link" href="createAccount.php">
							<button class="btn btn-outline-success my-2 my-sm-0">アカウント登録</button>
						</a>
						<a class="nav-item nav-link" href="uploadPage.php">
							<button class="btn btn-outline-success my-2 my-sm-0">動画投稿</button>
						</a>
						<a class="nav-item nav-link" href="live.php">
							<button class="btn btn-outline-success my-2 my-sm-0">配信</button>
						</a>
				</div>
				<form class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2 bg-secondary" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">探索</button>
				</form>
			</div>
		</nav>

	<body id="top">
		<div id="main">
			<div class="inner">
				<div class="box">
                    <h1><a href="index.php">Homepage</a></h1>
					<div class="align-center">
                        <h2>動画投稿完了！</h2><hr/>
                        <div class="inner">
                            <?php
                                echo "<h3>".$_SESSION['fileUploaded']."は</h3><br/>";
								echo "<h3>".$_SESSION['titleUploaded']."として投稿されました!</h3><br/>";
								echo "<h2>削除キーは ".$_SESSION['deleteKey']."</h2><br/><hr/>";
								echo "<h3>投稿した動画を削除したい場合はこのキーが必要。</h3>";
                            ?>
                        </div>
                    </div>		
				</div>
			</div>
		</div>

		<?php
			// remove all session variables
			session_unset();

			// destroy the session
			session_destroy();
		?>	

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
	</body>
</html>
