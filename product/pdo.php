<?php
require_once "../connect-db.php";
class Product extends Connection{
    public function getData($name, $status){
        $sql = "SELECT * FROM product " . ($name != null ? "WHERE prodName LIKE '%{$name}%'" . ($status != null ? " AND prodStatus = '$status'" : ' ')
            : ($status != null ? "WHERE prodStatus = $status" : ' '));
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
}