<?php require_once _TEMPLATEPATH_ . '/header.php'; ?>


<h1>Article</h1>

  <div>  
    <h2><?= $article->getTitle();?></h2>
    <p><?= $article->getDescription();?></p>
    <div>
      <?php foreach ($comments as $comment) { ?>
        <div>
          <p>User : <?= $comment->getId();?></p>
          <p><?= $comment->getComment();?></p>
        </div>
      <?php } ?>
    </div>
    
    <?php foreach ($errors as $error) { ?>
    <div class="alert alert-danger" role="alert">
        <?= $error; ?>
    </div>
    <?php } ?>

    <form method="POST">
      <div class="mb-3">
          <div class="mb-3">
              <label for="comment" class="form-label">Ajouter un commentaire :</label>
              <textarea class="form-control" id="comment" name="comment" rows="5" cols="33"></textarea>
          </div>
          <input type="submit" name="newComment" class="btn btn-primary" value="Ajouter un commentaire">
    </form>
  </div>



<?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>