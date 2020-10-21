<?php
namespace Model;
 
use \Entity\Comment;
 
class CommentsManagerPDO extends CommentsManager
{
  protected function add(Comment $comment)
  {
    $q = $this->dao->prepare('INSERT INTO comments SET news = :news, auteur = :auteur, contenu = :contenu, report = :report, date = NOW()');
 
    $q->bindValue(':news', $comment->news(), \PDO::PARAM_INT);
    $q->bindValue(':auteur', $comment->auteur());
    $q->bindValue(':contenu', $comment->contenu());
    $q->bindValue(':report', 0);
 
    $q->execute();
 
    $comment->setId($this->dao->lastInsertId());
  }
 
  public function delete($id)
  {
    $q = $this->dao->prepare('DELETE FROM comments WHERE id = :id');

    $q->bindValue(':id', (int) $id);
    $q->execute();
    
  }
 
  public function deleteFromNews($news)
  {
    $q = $this->dao->prepare('DELETE FROM comments WHERE news = :news');

    $q->bindValue(':news', (int) $news);
    $q->execute();
  }

  public function reportComment($id)
  {
    $q = $this->dao->prepare('UPDATE comments SET report = :report WHERE id = :id');

    $q->bindValue(':report', 1);
    $q->bindValue(':id', (int) $id);
    $q->execute();

  }

  public function countReport()
  {
    $q = $this->dao->query('SELECT news FROM comments WHERE report >= 1');
    $comments = $q->fetchAll();
    $newsReport = array_column($comments, 'news', 'id');
    
    return $newsReport;
  }

  public function getListOf($news)
  {
    if (!ctype_digit($news))
    {
      throw new \InvalidArgumentException('L\'identifiant de la news passé doit être un nombre entier valide');
    }
 
    $q = $this->dao->prepare('SELECT id, news, auteur, contenu, date, report FROM comments WHERE news = :news');
    $q->bindValue(':news', $news, \PDO::PARAM_INT);
    $q->execute();
 
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
 
    $comments = $q->fetchAll();
 
    foreach ($comments as $comment)
    {
      $comment->setDate(new \DateTime($comment->date()));
    }
 
    return $comments;
  }
 
  protected function modify(Comment $comment)
  {
    $q = $this->dao->prepare('UPDATE comments SET auteur = :auteur, contenu = :contenu, report = :report WHERE id = :id');
 
    $q->bindValue(':auteur', $comment->auteur());
    $q->bindValue(':contenu', strip_tags($comment->contenu()));
    $q->bindValue(':report', 0);
    $q->bindValue(':id', $comment->id(), \PDO::PARAM_INT);
 
    $q->execute();
  }
 
  public function get($id)
  {
    $q = $this->dao->prepare('SELECT id, news, auteur, contenu, report FROM comments WHERE id = :id');
    $q->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $q->execute();
 
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
 
    return $q->fetch();
  }
}