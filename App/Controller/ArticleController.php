<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Entity\Article;
use App\Repository\CommentRepository;

class ArticleController extends Controller
{
  public function route(): void
  {
      try {
          if (isset($_GET['action'])) {
              switch ($_GET['action']) {
                  case 'list':
                      $this->list();
                      break;
                  case 'show':
                      $this->show();
                      break;
                  default:
                      throw new \Exception("Cette action n'existe pas : " . $_GET['action']);
                      break;
              }
          } else {
              throw new \Exception("Aucune action détectée");
          }
      } catch (\Exception $e) {
          $this->render('errors/default', [
              'error' => $e->getMessage()
          ]);
      }
  }

  protected function list()
  {
      try {
          $errors = [];

          $articleRepository = new ArticleRepository();
          $articles = $articleRepository->findAll();

          if ($articles) {
          } else {
            $errors[] = 'Articles non disponible';
          }

          $this->render('article/list', [
              'articles' => $articles,
              'pageTitle' => 'Articles',
              'errors' => $errors
          ]);

      } catch (\Exception $e) {
          $this->render('errors/default', [
              'error' => $e->getMessage()
          ]);
      } 

  }

  protected function show()
  {
      try {
          $errors = [];

          $articleRepository = new ArticleRepository();
          $article = $articleRepository->findOneById($_GET['id']);
          $commentRepository = new CommentRepository();
          $comment = $commentRepository->findAllbyArticle($_GET['id']);

          if ($article) {
          } else {
            $errors[] = 'Article non disponible';
          }

          if ($comment) {
          } else {
            $errors[] = 'Commentaires non disponible';
          }


          $this->render('article/show', [
              'article' => $article,
              'comments' => $comment,
              'pageTitle' => 'Article',
              'errors' => $errors
          ]);

      } catch (\Exception $e) {
          $this->render('errors/default', [
              'error' => $e->getMessage()
          ]);
      } 

  }

}