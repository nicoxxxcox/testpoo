<?php

    use App\Message\Message;
    use App\Message\MessageManager;

    $page_title = "Les messages";

    $message = new Message();
    $message_man = new MessageManager();

    require ROOTPATH.'/templates/header.php';
    require ROOTPATH.'/templates/navbar.php';

    $a = null;

    foreach ($message->getManager()->findAll() as $item) {

        $a .= "<span style='padding: .5rem;'><a href='message/" . $item['id'] . "'>" . $item['id'] . "</a></span>";
    }

?>

<div class="container">
    <div class="row">
        <div class="col">

            <a href=".">< Retour </a>
        </div>
    </div>

    <?= $a; ?>

    <div class="row">
        <div class="col">
            <?php
                foreach ($message_man->findAll() as $item) {
                    echo '<div class="card m-3" style="width: 50vw; ">
          <div class="card-body">
            <h5 class="card-title"><a href="message/'.$item['id'].'">' . $item["title"] . '</a></h5>
            <h6 class="card-subtitle mb-2 text-muted">Envoyé le : ' . $item["send_date"] . '</h6>
            <p class="card-text">' . $item["content"] . "</p>
            
            <form action='messages' method='post'>
                <input type='text' name='del' hidden id=''>
                <input type='text' name='id' hidden value='" . $item['id'] . "' id=''>
                <input type='submit' class='btn btn-danger' value='&#xd7;'>
            </form>
          </div>
        </div>";
                }

            ?>

        </div>
    </div>

    <div class="row">
        <form action="messages" method="post">
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Le Titre du message">
            </div>
            <div class="form-group">
                <label for="content">Contenu</label>
                <input type="text" name="content" class="form-control" id="content" placeholder="Le contenu du message">
            </div>

            <button type="submit" class="btn btn-primary">Nouveau message</button>
        </form>

    </div>

</div>

<?php require ROOTPATH . '/templates/footer.php'; ?>


