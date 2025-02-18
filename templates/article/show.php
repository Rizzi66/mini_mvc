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
  </div>






<?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>