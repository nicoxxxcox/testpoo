<?php 

    use App\User\User;

$user = new User();
$user_all = $user->findAll();

require ROOTPATH . '/templates/header.php';
require ROOTPATH .'/templates/navbar.php';

isset($messageInfo) ? $messageInfo : "";

?>

<?= $messageInfo ?>
<div class="jumbotron jumbotron-fluid my-5">
    <div class="container">

        <div class="row">
            <div class="col">
                <h1 class="display-4">Bienvenue</h1>
                <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                <a class="btn btn-primary btn-lg" href="messages" role="button">Voir le fil des messages</a>
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col-6">
                <form action="" method="post" class="form-group">
                <div class="form-group">
                    <label for="pseudo_new">Ou bien inscrivez vous</label>
                    <input type="text" class="form-control" placeholder="Choisissez un pseudo" name="pseudo_new" id="pseudo_new">
                    <div class="form-group">
                    
                </div>
                </div>
                <div class="form-group">
                    <label for="email_new">Une adresse email</label>
                    <input type="text" class="form-control" placeholder="Votre email" name="email_new" id="email_new">
                </div>
                    <div class="form-group">
                        <label for="password_new">Et un super mot de passe</label>
                        <input type="password" class="form-control" placeholder="Votre mot de passe" name="password_new" id="password_new">
                    </div>
                <div class="form-group">
                    <input type="submit" class="form-control btn btn-primary" value="Nouvel utilisateur">
                </div>
                </form>
            </div>
        </div>
        
        
    </div>
</div>

<?php require ROOTPATH . '/templates/footer.php'; ?>