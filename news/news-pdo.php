<?php
require_once "../connect-db.php";
class News extends Connection
{
    public function createNews($data){
        $sql = "INSERT INTO news(newsTitle, newsImage, newsImgTitle, newsContent) VALUES (:newsTitle, :newsData, :newsImgTitle, :newsContent)";
        $create = $this->prepareSQL($sql);
        $create->execute($data);
    }
    public function getData($title){
        $sql = "SELECT * FROM news " . ($title != null ? "WHERE newsTitle LIKE '%{$title}%'" : ' ');
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
    public function newsDetail($id){
        $sql = "SELECT * FROM news WHERE newsId = '$id'";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll()[0];
    }
}