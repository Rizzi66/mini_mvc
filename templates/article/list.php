<?php require_once _TEMPLATEPATH_ . '/header.php'; ?>


<h1>Articles</h1>

<?php foreach ($errors as $error) { ?>
    <div class="alert alert-danger" role="alert">
        <?= $error; ?>
    </div>
<?php } ?>

<?php foreach ($articles as $article) { ?>

  <div>  
    <h2><?= $article->getTitle();?></h2>
    <a href="index.php?controller=article&action=show&id=<?=$article->getId();?>">Lire plus...</a>
  </div>


<?php } ?>




<?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>