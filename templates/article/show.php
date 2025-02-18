<?php require_once _TEMPLATEPATH_ . '/header.php'; ?>


<h1>Article</h1>

<?php foreach ($errors as $error) { ?>
    <div class="alert alert-danger" role="alert">
        <?= $error; ?>
    </div>
<?php } ?>

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
  </div>






<?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>