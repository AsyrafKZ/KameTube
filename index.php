<?php
include ('db.php');
?>


<!DOCTYPE HTML>
<html>
	<head>
		<title>KameTube</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="https://video-react.github.io/assets/video-react.css"/>
	</head>

	<body id="top">
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand ml-5" href="#">
				<img src="images/kameTubeLogo.png" width="55" height="55" alt="">
			</a>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<div class="navbar-nav mr-auto">
						<a class="nav-item nav-link active" href="login.php">
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
					<button class="btn btn-outline-success my-2 my-sm-0 mr-5" type="submit">探索</button>
				</form>
			</div>
		</nav>

		<!-- Main -->
			<div id="main">
				<div class="inner">
				<!-- Boxes -->
					<div class="thumbnails">
                        <?php
                            $sql = "select * from videos";
                            $res = mysqli_query($con,$sql);

                            while ($row = mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $name = $row['fullname'];
                                $title = $row['title'];
                                $image = $row['image'];

                                echo "<div class='box'>";
                                    echo "<a href='watch.php?id=$id' class='image fit' data-poptrox='ignore'><img src='thumbnails/".$image."'/></a>";
                                    echo "<div class ='inner'>";
                                        echo "<h3>".$title."</h3>";
                                        echo "<a href='watch.php?id=$id' class='button fit' data-poptrox='ignore'>Watch</a>";
                                    echo "</div>";
                                echo "</div>";
                            }
                        ?>
                    </div>
                    <div class="thumbnails">
						<div class="box">
							<a href="https://youtu.be/Ipa9xAs_nTg" class="image fit"><img src="http://img.youtube.com/vi/Ipa9xAs_nTg/mqdefault.jpg" alt="" /></a>
							<div class="inner">
								<h3>How to upload image to MySQL database and display it using php</h3>
								<a href="https://youtu.be/Ipa9xAs_nTg" class="button style3 fit" data-poptrox="youtube,800x400">Watch</a>
							</div>
                        </div>
						<div class="box">
							<a href="https://youtu.be/5jKZ9KGtee0" class="image fit"><img src="http://img.youtube.com/vi/5jKZ9KGtee0/mqdefault.jpg" alt="" /></a>
							<div class="inner">
								<h3>SQUISH THAT CAT</h3>
								<a href="https://youtu.be/5jKZ9KGtee0" class="button style2 fit" data-poptrox="youtube,800x400">Watch</a>
							</div>
						</div>

						<div class="box">
							<a href="https://youtu.be/NQP89ish9t8" class="image fit"><img src="http://img.youtube.com/vi/NQP89ish9t8/mqdefault.jpg" alt="" /></a>
							<div class="inner">
								<h3>How to Put a Website Online: Template, Coding, Domain, Hosting, and DNS</h3>
								<a href="https://youtu.be/NQP89ish9t8" class="button style2 fit" data-poptrox="youtube,800x400">Watch</a>
							</div>
                        </div>
                        
                        <div class="box">
							<a href="https://youtu.be/0Haxy5PvCuk" class="image fit"><img src="http://img.youtube.com/vi/0Haxy5PvCuk/mqdefault.jpg" alt="" /></a>
							<div class="inner">
								<h3>Emperor Likes Me</h3>
								<a href="https://youtu.be/0Haxy5PvCuk" class="button style2 fit" data-poptrox="youtube,800x400">Watch</a>
							</div>
						</div>

						<div class="box">
							<a href="https://www.youtu.be/JaRq73y5MJk" class="image fit"><img src="http://img.youtube.com/vi/JaRq73y5MJk/mqdefault.jpg" alt="" /></a>
							<div class="inner">
								<h3>Upload Files and Images to Website in PHP | PHP Tutorial | Learn PHP Programming | Image Upload</h3>
								<a href="https://youtu.be/JaRq73y5MJk" class="button style3 fit" data-poptrox="youtube,800x400">Watch</a>
							</div>
						</div>

						<div class="box">
							<a href="https://youtu.be/bTS9XaoQ6mg" class="image fit"><img src="http://img.youtube.com/vi/bTS9XaoQ6mg/mqdefault.jpg" alt="" /></a>
							<div class="inner">
								<h3>chess king sacrifice</h3>
								<a href="https://youtu.be/bTS9XaoQ6mg" class="button style3 fit" data-poptrox="youtube,800x400">Watch</a>
							</div>
						</div>

						<div class="box">
							<a href="https://youtu.be/s6zR2T9vn2c" class="image fit"><img src="images/pic06.jpg" alt="" /></a>
							<div class="inner">
								<h3>Nascetur nunc varius commodo</h3>
								<a href="https://youtu.be/s6zR2T9vn2c" class="button fit" data-poptrox="youtube,800x400">Watch</a>
							</div>
						</div>
					</div>
				</div>
            </div>

        <!-- Pagination -->    
            <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center" bg-secondary>
                <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                <a class="page-link" href="#">Next</a>
                </li>
            </ul>
            </nav>

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="mailto:kisopbli6@gmail.com" class="icon fa-envelope"><span class="label">Email</span></a></li>
					</ul>
					<p class="copyright">&copy; 2020後期基礎PBLIの6班. Design: <a href="https://templated.co">TEMPLATED</a>. Images: <a href="https://unsplash.com/">Unsplash</a>. Videos: <a href="http://coverr.co/">Coverr</a>.</p>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

	</body>
</html>