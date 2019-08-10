<?php
    use App\Message\Message;

    $page_title = "Message - " . $id ;

    if(!$a){ ?>
        
            <div class="row m-5">
                <a href="../messages">< Retour aux messages</a>
            </div>
            <div class="alert alert-warning" role="alert">
              Ce message n'existe paaaaaaaasssssss ... Sorry 
            </div>
    <?php } else {
       ?>
            <div class="row m-5">
                <a href="<?= $back_to_messages  ?>">< Retour aux messages</a>
            </div>
            <div class="card m-5">
              <div class="card-body">
                <h5 class="card-title"><?= $a["title"] ?></h5>
                <h6 class="card-subtitle mb-2 text-muted">Envoyé le  : <?= $a["send_date"] ?></h6>
                <p class="card-text"><?= $a["content"] ?></p>
            </div>
            <?php
    }   ?>







