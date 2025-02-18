<?php

namespace App\Repository;

use App\Entity\Comment;

class CommentRepository extends Repository
{
  public function findAllbyArticle(int $article_id)
  {
      $query = $this->pdo->prepare("SELECT * FROM comment WHERE article_id = :article_id");
      $query->bindParam(':article_id', $article_id, $this->pdo::PARAM_STR);
      $query->execute();
      $comments = $query->fetchAll($this->pdo::FETCH_ASSOC);
      $commentsObjects = [];
      foreach($comments as $comment) {
          $commentsObjects[] = Comment::createAndHydrate($comment);
      }
      return $commentsObjects;
  }

  public function createOrUpdateOne(Comment $comment)
  {
    
    if ($comment->getId() !== null) {
      $query = $this->pdo->prepare('UPDATE comment SET comment = :comment,  
      user_id = :user_id, article_id = :article_id WHERE id = :id'
      );
      $query->bindValue(':id', $comment->getId(), $this->pdo::PARAM_INT);
    } else {
      $query = $this->pdo->prepare('INSERT INTO comment (comment, user_id, article_id) 
                                          VALUES (:comment, :user_id, :article_id)'
    );}

    $query->bindValue(':comment', $comment->getComment(), $this->pdo::PARAM_STR);
    $query->bindValue(':user_id', $comment->getUserId(), $this->pdo::PARAM_STR);
    $query->bindValue(':article_id', $comment->getArticleId(), $this->pdo::PARAM_STR);

    return $query->execute();
  }
}