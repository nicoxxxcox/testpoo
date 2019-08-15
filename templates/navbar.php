<!-- Modal -->
<div class="modal fade" id="connexionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="post" class="form">
            <div class="modal-body">
                    <div class="form-group">
                        <label for="email_login">Votre email</label>
                        <input type="email_login" name="email_login" id="email_login" class="form-control" placeholder="Votre email">
                    </div>
                    <div class="form-group">
                        <label for="password">Votre mot de passe</label>
                        <input type="password" name="password_login" id="password_login" class="form-control" placeholder="Votre mot de passe">

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-success my-2 my-sm-0" type="submit">Connexion</button>
            </div>
            </form>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
        </ul>

        <?php if(!empty($_SESSION['user'])){ ?>


            <form action="" method="post">
                <input class="btn btn-warning" name="logout" type="submit" value="Se déconnecter">
            </form>

        <?php } else {  ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#connexionModal">
            Se connecter
        </button>

        <?php } ;?>

    </div>
</nav>