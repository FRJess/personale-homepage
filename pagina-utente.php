<?php
  session_start();
  if (!isset($_SESSION['userLogged'])){
    header('Location: login.php');
  }
  include_once './partial/head.php';
?>

<!-- Inizio Body -->
<body>

  <?php
    include_once './partial/header.php';
  ?>

  <main>

    <div class="container">
      <h1>Ciao <?php echo $_SESSION['userLogged']['name'] ?></h1>
      <h4>Indirizzo: <?php echo $_SESSION['userLogged']['indirizzo']?></h4>
    </div>

  </main>

  <?php
    include_once './partial/footer.php';
  ?>

</body>
<!-- Fine Body -->

</html>