<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/static/css/style.css">
  <link rel="icon" type="image/png" href="/static/img/correct_logo.png">
  <title>CoMoWeb - Mes Projets</title>
</head>

<body>

  <nav> <!--A ajouter-->
          <a href=""><img src="/static/img/long_big.png"/></a>
          <ul>
            <li><a <?php if (isset($active_name)) { if ($active_name === 'home') {echo "id='nav-active'";}} ?> href="<?= $router->generate('home')?>">Home</a></li>
            <li><a <?php if (isset($active_name)) { if ($active_name === 'blog') {echo "id='nav-active'";}} ?> href="/page/blog">Blog</a></li>
            <li><a <?php if (isset($active_name)) { if ($active_name === 'projects') {echo "id='nav-active'";}} ?> href="<?= $router->generate('projects')?>">Projets</a></li>
            <li><a <?php if (isset($active_name)) { if ($active_name === 'contact') {echo "id='nav-active'";}} ?> href="<?= $router->generate('contact')?>">Contact</a></li>
          </ul>
      <div class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>
  </nav>
        <div class="menubar">
          <ul>
            <li><a <?php if (isset($active_name)) { if ($active_name === 'home') {echo "id='nav-active'";}} ?> href="<?= $router->generate('home')?>">Home</a></li>
            <li><a <?php if (isset($active_name)) { if ($active_name === 'blog') {echo "id='nav-active'";}} ?> href="/page/blog">Blog</a></li>
            <li><a <?php if (isset($active_name)) { if ($active_name === 'projects') {echo "id='nav-active'";}} ?> href="<?= $router->generate('projects')?>">Projets</a></li>
            <li><a <?php if (isset($active_name)) { if ($active_name === 'contact') {echo "id='nav-active'";}} ?> href="<?= $router->generate('contact')?>">Contact</a></li>
          </ul>
        </div> 

 
  <div id="main">
    <?= $content ?>
  </div>

  <footer>
		<a href="#"><img src="/static/img/long_big.png" alt="CoMoWeb Logo" class="footer-logo"></a>
		<div class="footer-links">
			<a href="<?= $router->generate('home')?>">Home</a>
			<a href="<?= $router->generate('download')?>">Download</a>
			<a href="#">Credits</a>
			<a href="#">Terms</a>
		</div>
		<h6>© 2024 CoMoWeb. No Rights Reserved.</h6>
	</footer>

	<span class="overlay"></span>
<script src="/static/js/script.js"></script>
</body>

</html>