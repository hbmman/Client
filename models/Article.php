<?php


namespace app\models;


use app\core\db\DbModel;
use app\core\Model;

class Article extends DbModel
{
    public int $id;
    public string $title = '';
    public string $imagelink = '';
    public string $content = '';
    public ?string $created_at = null;
    public int $author;

    public function save()
    {
        return parent::save();
    }

    public function findOneArticle($where)
    {
        $article = new Article();
        $article = parent::findOne($where);
        return $article;
    }

    public static function tableName(): string
    {
        return 'articles';
    }

    public static function attributes():array
    {
        return ['title', 'imagelink', 'content', 'created_at', 'author'];
    }

    public function labels():array
    {
        return [
            'title' => 'Titel',
            'imagelink' => 'Link zum Bild',
            'content' => 'Inhalt',
            'createdAt' => 'Erstellt am',
            'author' => 'Verfasser'
        ];
    }
}
