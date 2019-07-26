<nav class="navbar navbar-expand-lg" >
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php  if(!empty($_SESSION['user']) ){ ?>
      <span class="navbar-brand mb-0 h1">Bonjour <?php $_SESSION['user']['pseudo']?></span>
      <a href="/user/off" class="btn btn-outline-warning my-2 my-sm-0" >Déconnecter</a>      
   <?php }?>

      
      

  </div>
</nav>