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
    public function createNewProduct($data){
        $sql = "INSERT INTO product VALUES (:prodId, :prodTagId, :prodBrandId, :prodCateId, :prodName, :prodCountry, :prodStatus, null, null, :prodIngredient, :prodDosageForms, :prodUnit, :prodDescript, :prodDosage, :prodPrice, :prodPriceSale);";
        $create = $this->prepareSQL($sql);
        $create->execute($data);
    }
    public function prodDetail($id){
        $sql = "SELECT * FROM product WHERE SKU = '$id'";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll()[0];
    }
}

class Brand extends Connection{
    public function getData(){
        $sql = "SELECT * FROM brand";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
}
class Tag extends Connection{
    public function getData(){
        $sql = "SELECT * FROM tag";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
}
class Category extends Connection{
    public function getData(){
        $sql = "SELECT * FROM category";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
}