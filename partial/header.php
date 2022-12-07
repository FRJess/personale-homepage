<?php
// var_dump($_SERVER);
if ($_SERVER ['HTTP_HOST'] == 'localhost:8888'){
  $folder = 'personale-homepage/';
}else{
  $folder = '';
};
$userLogged = false;
if(isset($_SESSION['userLogged'])){
  $userLogged = true;
}

$baseUrl = $_SERVER['REQUEST_SCHEME' ].'://'. $_SERVER ['HTTP_HOST'].'/'.$folder;
// echo $baseUrl;

$string = file_get_contents('./db/routes.json');
$menu = json_decode($string, true);
// var_dump($menu);
?>
<header>
  
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <?php foreach ($menu as $link) :  ?>
              <?php if ($link['public'] || (!$link['public'] && $userLogged)) : ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo $baseUrl ?><?php echo $link['href'] ?>"><?php echo $link['name']?></a>
                </li>
              <?php endif; ?>
            <?php endforeach; ?>
            <?php if (!$userLogged) : ?>
              <li class="nav-item">
                  <a class="nav-link" href="<?php echo $baseUrl ?>login.php">Login</a>
                </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>
    
  </header>