<?php
    require_once 'product-pdo.php';
    $product = new Product();
    $data = [
        'prodId' => $_POST['prodId'],
        'prodTagId' => $_POST['prodTagId'], 
        'prodBrandId' => 'j',
        'prodCateId'=> $_POST['prodCateId'],
        'prodName' => $_POST['prodName'],
        'prodCountry' => $_POST['prodCountry'],
        'prodStatus'=> $_POST['prodStatus'],
        'prodCreatedDate' => '2023-08-01',
        'prodLastUpdate' => '2023-08-01',
        'prodCreatedUser' => 'Hi',
        'prodLastUpdateUser' => 'Hi',
        'prodIngredient' => $_POST['prodIngredient'],
        'prodDosageForms' => $_POST['prodDosageForms'],
        'prodUnit' => $_POST['prodUnit'],
        'prodDescript' => $_POST['prodDescript'],
        'prodDosage' => $_POST['prodDosage'],
        'prodPrice' => $_POST['prodPrice'],
        'prodPriceSale'	=> $_POST['prodPriceSale']
    ];
    $product->createNewProduct($data);
    header("Location: http://localhost/PharmaDI-Admin/product/product-list.php");
?>