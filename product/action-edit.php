<?php
    require_once 'product-pdo.php';
    $product = new Product();
    $data = [
        'prodId' => $_POST['prodId'],
        'prodTagId' => $_POST['prodTagId'], 
        'prodBrandId' => $_POST['prodBrandId'],
        'prodCateId'=> $_POST['prodCateId'],
        'prodName' => $_POST['prodName'],
        'prodCountry' => $_POST['prodCountry'],
        'prodStatus'=> $_POST['prodStatus'],
        'prodIngredient' => $_POST['prodIngredient'],
        'prodDosageForms' => $_POST['prodDosageForms'],
        'prodUnit' => $_POST['prodUnit'],
        'prodDescript' => $_POST['prodDescript'],
        'prodDosage' => $_POST['prodDosage'],
        'prodPrice' => $_POST['prodPrice'],
        'prodPriceSale'	=> $_POST['prodPriceSale'],
        'prodSellNumber' => $_POST['prodSellNumber']
    ];
    $listImg = json_decode($_POST['prodImg'])->{'a'};
    $listDeleteImg = json_decode($_POST['prodDeleteImg'])->{'delete'};
    print_r($listDeleteImg);
    // $product->createNewProduct($data);
    // $product->insertImg($listImg, $data['prodId']);
    // header("Location: http://localhost/PharmaDI-Admin/product/product-list.php");
?>