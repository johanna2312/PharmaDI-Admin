<!DOCTYPE html>
<html lang="en">
<?php
require_once "pdo.php";
$product = new Product();
$prod = $product->prodDetail($_GET['prodId']);
$brand = new Brand();
$brands = $brand->getData();
$tag = new Tag();
$tags = $tag->getData();
$cate = new Category();
$cates = $cate->getData();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Roboto&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../asset/image/logo-shortcut.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Chi tiết sản phẩm</title>
    <style>
        body {
            font-family: "Inter";
            height: 100vh;
            min-height: 100vh;
        }
    </style>
</head>

<body>
    <div class="flex justify-between">
        <div class="menu bg-[#0071AF] w-[13%] max-h"></div>
        <form class="w-[87%]" method="POST" action="action-create.php">
            <!-- Menu -->
            <div
                class="flex justify-between items-center w-full border-solid border-[#d8d8d8] border pb-2.5 pt-2 shadow-md">
                <svg class="mx-[40px]" width="30" height="31" viewBox="0 0 30 31" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M25.9375 9.25C25.9375 9.76777 25.5178 10.1875 25 10.1875L5 10.1875C4.48223 10.1875 4.0625 9.76777 4.0625 9.25C4.0625 8.73223 4.48223 8.3125 5 8.3125L25 8.3125C25.5178 8.3125 25.9375 8.73223 25.9375 9.25Z"
                        fill="#0071AF" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M25.9375 15.5C25.9375 16.0178 25.5178 16.4375 25 16.4375L5 16.4375C4.48223 16.4375 4.0625 16.0178 4.0625 15.5C4.0625 14.9822 4.48223 14.5625 5 14.5625L25 14.5625C25.5178 14.5625 25.9375 14.9822 25.9375 15.5Z"
                        fill="#0071AF" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M25.9375 21.75C25.9375 22.2678 25.5178 22.6875 25 22.6875L5 22.6875C4.48223 22.6875 4.0625 22.2678 4.0625 21.75C4.0625 21.2322 4.48223 20.8125 5 20.8125L25 20.8125C25.5178 20.8125 25.9375 21.2322 25.9375 21.75Z"
                        fill="#0071AF" />
                </svg>
                <div class="flex justify-between items-center p-[5px] mx-[40px] ">
                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.25 9.5C8.25 7.42893 9.92893 5.75 12 5.75C14.0711 5.75 15.75 7.42893 15.75 9.5C15.75 11.5711 14.0711 13.25 12 13.25C9.92893 13.25 8.25 11.5711 8.25 9.5ZM12 7.25C10.7574 7.25 9.75 8.25736 9.75 9.5C9.75 10.7426 10.7574 11.75 12 11.75C13.2426 11.75 14.25 10.7426 14.25 9.5C14.25 8.25736 13.2426 7.25 12 7.25Z"
                            fill="#505050" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M1.25 12.5C1.25 6.56294 6.06294 1.75 12 1.75C17.9371 1.75 22.75 6.56294 22.75 12.5C22.75 18.4371 17.9371 23.25 12 23.25C6.06294 23.25 1.25 18.4371 1.25 12.5ZM12 3.25C6.89137 3.25 2.75 7.39137 2.75 12.5C2.75 15.0456 3.77827 17.351 5.4421 19.0235C5.6225 18.0504 5.97694 17.1329 6.68837 16.3951C7.75252 15.2915 9.45416 14.75 12 14.75C14.5457 14.75 16.2474 15.2915 17.3115 16.3951C18.023 17.1329 18.3774 18.0505 18.5578 19.0236C20.2217 17.3511 21.25 15.0456 21.25 12.5C21.25 7.39137 17.1086 3.25 12 3.25ZM17.1937 20.1554C17.0918 18.9435 16.8286 18.0553 16.2318 17.4363C15.5823 16.7628 14.3789 16.25 12 16.25C9.62099 16.25 8.41761 16.7628 7.76815 17.4363C7.17127 18.0553 6.90811 18.9434 6.80622 20.1553C8.28684 21.1618 10.0747 21.75 12 21.75C13.9252 21.75 15.7131 21.1618 17.1937 20.1554Z"
                            fill="#505050" />
                    </svg>
                    <span style="padding: 0 5px; font-size: 14px">huyenmy</span>
                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M16.3079 7.59327C16.5325 7.85535 16.5022 8.24991 16.2401 8.47455L10.4067 13.4745C10.1727 13.6752 9.82731 13.6752 9.59325 13.4745L3.75992 8.47455C3.49784 8.24991 3.46749 7.85534 3.69213 7.59327C3.91677 7.33119 4.31133 7.30084 4.57341 7.52548L10 12.1768L15.4266 7.52548C15.6887 7.30084 16.0832 7.33119 16.3079 7.59327Z"
                            fill="#505050" />
                    </svg>
                </div>
            </div>
            <!-- Content -->
            <div class="flex flex-col px-[40px] py-[20px] text-[#505050]">
                <!-- Breadscumb -->
                <div class="flex items-center text-[14px]">
                    <span class="px-1 cursor-pointer"
                        onclick="window.location.href='http://localhost/PharmaDI-Admin/product/product-list.php'">Danh
                        sách sản phẩm</span>
                    <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M1.09327 0.692102C1.35535 0.467463 1.74991 0.497814 1.97455 0.759893L6.97455 6.59323C7.17517 6.82728 7.17517 7.17266 6.97455 7.40672L1.97455 13.24C1.74991 13.5021 1.35535 13.5325 1.09327 13.3078C0.831188 13.0832 0.800837 12.6886 1.02548 12.4266L5.67684 6.99997L1.02548 1.57338C0.800837 1.3113 0.831188 0.916741 1.09327 0.692102Z"
                            fill="#0071AF" />
                    </svg>
                    <span class="text-[#0071AF] px-1 font-[600]">Chi tiết sản phẩm</span>
                </div>
                <!-- Title -->
                <div class="flex justify-between items-center py-[25px]">
                    <span class="text-[#0071AF] font-[600]">CHI TIẾT SẢN PHẨM</span>
                    <button type="button" onclick="window.location.href='http://localhost/PharmaDI-Admin/product/product-edit.php'"
                        class="border-[#15A5E3] border border-solid px-[12px] py-[5px] text-[13px] rounded-[8px] text-[#0071AF]">Chỉnh sửa</button>
                </div>
                <!-- Textbox -->
                <div class="flex justify-between mt-1">
                    <div class="relative">
                        <span class="text-[13px] absolute px-[5px] bg-white -top-[10px] left-[15px]">Mã sản phẩm</span>
                        <input readonly type="text" value="<?= $prod['SKU']?>" name="prodId" class="px-2.5 pl-[20px] py-[8px] w-[280px] border border-solid border-[#d8d8d8] rounded-[6px] outline-0 text-[13px]">
                    </div>
                    <div class="relative">
                        <span class="text-[13px] absolute px-[5px] bg-white -top-[10px] left-[15px]">Trạng thái</span>
                        <input type="text" name="prodStatus" value="<?= $prod['prodStatus'] == 0 ? "Chờ duyệt" : ($prod['prodStatus'] == 1 ? "Đã duyệt" :"Không duyệt") ?>"
                            class="px-2.5 pl-[20px] py-[8px] w-[280px] border border-solid border-[#d8d8d8] rounded-[6px] outline-0 text-[13px]"
                            value="Chờ duyệt" readonly>
                        </svg>
                    </div>
                    <div class="relative">
                        <span class="text-[13px] absolute px-[5px] bg-white -top-[10px] left-[15px]">Danh mục</span>
                        <input type="text" value="<?php
                            foreach($cates as $cate)
                                if($prod['cateId'] == $cate['cateId']) echo $cate['cateName'];
                            ?>"
                            class="px-2.5 pl-[20px] py-[8px] w-[280px] border border-solid border-[#d8d8d8] rounded-[6px]  outline-0 text-[13px]"
                            readonly>
                    </div>
                    <div class="relative">
                        <span class="text-[13px] absolute px-[5px] bg-white -top-[10px] left-[15px]">Tag</span>
                        <input type="text" readonly value="<?php
                            foreach($tags as $tag)
                                if($prod['tagId'] == $tag['tagId']) echo $tag['tagName'];
                            ?>"
                            class="px-2.5 pl-[20px] py-[8px] w-[280px] border border-solid border-[#d8d8d8] rounded-[6px]  outline-0 text-[13px]">
                    </div>
                </div>
                <div class="relative flex justify-between mt-5 w-full">
                    <span class="text-[13px] absolute px-[5px] bg-white -top-[10px] left-[15px]">Tên sản phẩm</span>
                    <input type="text" name = "prodName" value="<?= $prod['prodName']?>"
                        class="px-2.5 pl-[20px] py-[8px] w-[100%] border border-solid border-[#d8d8d8] rounded-[6px]  outline-0 text-[13px]">
                </div>
                <div class="flex justify-between mt-5">
                    <div class="relative" onclick="showDroplist('brand-droplist')" id="product-brand">
                        <span
                            class="text-[13px] absolute px-[5px] bg-white -top-[10px] left-[15px]">Thương
                            hiệu</span>
                        <input type="text" readonly value="<?php
                            foreach($brands as $brand)
                                if($prod['brandId'] == $brand['brandId']) echo $brand['brandName'];
                            ?>"
                            class="px-2.5 pl-[20px] py-[8px] w-[280px] border border-solid border-[#d8d8d8] rounded-[6px]  outline-0 text-[13px]">
                    </div>
                    <div class="relative">
                        <span class="text-[13px] absolute px-[5px] bg-white -top-[10px] left-[15px]">Quốc gia</span>
                        <input type="text" readonly name="prodCountry" value="<?= $prod['prodCountry']?>"
                            class="px-2.5 pl-[20px] py-[8px] w-[280px] border border-solid border-[#d8d8d8] rounded-[6px]  outline-0 text-[13px]">
                    </div>
                    <div class="relative">
                        <span class="text-[13px] absolute px-[5px] bg-white -top-[10px] left-[15px]">Đơn vị</span>
                        <input value="<?= $prod['prodUnit']?>" type="text" name="prodUnit" class="px-2.5 pl-[20px] py-[8px] w-[280px] border border-solid border-[#d8d8d8] rounded-[6px]  outline-0 text-[13px]">
                    </div>
                    <div class="relative">
                        <span class="text-[13px] absolute px-[5px] bg-white -top-[10px] left-[15px]">Đã bán</span>
                        <input type="text" value="<?= $prod['prodSellNumber']?>" name="prodSellNumber"
                            class="px-2.5 pl-[20px] py-[8px] w-[280px] border border-solid border-[#d8d8d8] rounded-[6px] outline-0 text-[13px]"
                            readonly>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <div class="relative flex mt-5">
                        <span class="text-[13px] absolute px-[5px] bg-white -top-[10px] left-[15px]">Giá gốc</span>
                        <input value="<?= $prod['prodPrice']?>" type="text" name="prodPrice" class="px-2.5 pl-[20px] py-[8px] w-[605px] border border-solid border-[#d8d8d8] rounded-[6px]  outline-0 text-[13px]">                
                    </div>
                    <div class="relative flex mt-5">
                        <span class="text-[13px] absolute px-[5px] bg-white -top-[10px] left-[15px]">Giá khuyến mãi</span>
                        <input value="<?= $prod['prodPriceSale']?>" type="text" name="prodPriceSale" class="px-2.5 pl-[20px] py-[8px] w-[605px] border border-solid border-[#d8d8d8] rounded-[6px]  outline-0 text-[13px]">                
                    </div>
                </div>
                <div class="relative flex justify-between mt-5 w-full">
                    <span class="text-[13px] absolute px-[5px] bg-white -top-[10px] left-[15px]">Thành phần</span>
                    <textarea readonly name="prodIngredient" value="<?= $prod['prodIngredient']?>"
                        class="h-max min-h-[60px] px-2.5 pl-[20px] py-[8px] w-[100%] border border-solid border-[#d8d8d8] rounded-[6px]  outline-0 text-[13px] resize-none"><?= $prod['prodIngredient']?></textarea readonly>
                </div>
                <div class="relative flex justify-between mt-5 w-full">
                    <span class="text-[13px] absolute px-[5px] bg-white -top-[10px] left-[15px]">Dạng bào chế</span>
                    <textarea readonly name="prodDosageForms" value="<?= $prod['prodDosageForms']?>"
                        class="h-max min-h-[60px] px-2.5 pl-[20px] py-[8px] w-[100%] border border-solid border-[#d8d8d8] rounded-[6px]  outline-0 text-[13px] resize-none"><?= $prod['prodDosageForms']?></textarea readonly>
                </div>
                <div class="relative flex justify-between mt-5 w-full">
                    <span class="text-[13px] absolute px-[5px] bg-white -top-[10px] left-[15px]">Liều dùng</span>
                    <textarea readonly name="prodDosage" value="<?= $prod['prodDosage']?>"
                        class="h-max min-h-[60px] px-2.5 pl-[20px] py-[8px] w-[100%] border border-solid border-[#d8d8d8] rounded-[6px]  outline-0 text-[13px] resize-none"><?= $prod['prodDosage']?></textarea readonly>
                </div>
                <div class="relative flex justify-between mt-5 w-full">
                    <span class="text-[13px] absolute px-[5px] bg-white -top-[10px] left-[15px]">Mô tả sản phẩm</span>
                    <textarea readonly name="prodDescript" value="<?= $prod['prodDescrip']?>"
                        class="h-max min-h-[100px] px-2.5 pl-[20px] py-[8px] w-[100%] border border-solid border-[#d8d8d8] rounded-[6px]  outline-0 text-[13px] resize-none"><?= $prod['prodDescrip']?></textarea>
                </div>
                <!-- Upload picture -->
                <div class="flex">
                    <div onclick="getImage()" id="img"
                        class="w-[120px] mr-5 h-[120px] border border-dashed border-[#d8d8d8] rounded-[8px] mt-5 flex flex-col justify-center items-center cursor-pointer">
                        <input type="file" name="fileUpload" id="image" style="display: none;" #inputUpload onchange="getImageInfo()">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.5535 2.49392C12.4114 2.33852 12.2106 2.25 12 2.25C11.7894 2.25 11.5886 2.33852 11.4465 2.49392L7.44648 6.86892C7.16698 7.17462 7.18822 7.64902 7.49392 7.92852C7.79963 8.20802 8.27402 8.18678 8.55352 7.88108L11.25 4.9318V16C11.25 16.4142 11.5858 16.75 12 16.75C12.4142 16.75 12.75 16.4142 12.75 16V4.9318L15.4465 7.88108C15.726 8.18678 16.2004 8.20802 16.5061 7.92852C16.8118 7.64902 16.833 7.17462 16.5535 6.86892L12.5535 2.49392Z"
                                fill="#505050" />
                            <path
                                d="M3.75 15C3.75 14.5858 3.41422 14.25 3 14.25C2.58579 14.25 2.25 14.5858 2.25 15V15.0549C2.24998 16.4225 2.24996 17.5248 2.36652 18.3918C2.48754 19.2919 2.74643 20.0497 3.34835 20.6516C3.95027 21.2536 4.70814 21.5125 5.60825 21.6335C6.47522 21.75 7.57754 21.75 8.94513 21.75H15.0549C16.4225 21.75 17.5248 21.75 18.3918 21.6335C19.2919 21.5125 20.0497 21.2536 20.6517 20.6516C21.2536 20.0497 21.5125 19.2919 21.6335 18.3918C21.75 17.5248 21.75 16.4225 21.75 15.0549V15C21.75 14.5858 21.4142 14.25 21 14.25C20.5858 14.25 20.25 14.5858 20.25 15C20.25 16.4354 20.2484 17.4365 20.1469 18.1919C20.0482 18.9257 19.8678 19.3142 19.591 19.591C19.3142 19.8678 18.9257 20.0482 18.1919 20.1469C17.4365 20.2484 16.4354 20.25 15 20.25H9C7.56459 20.25 6.56347 20.2484 5.80812 20.1469C5.07435 20.0482 4.68577 19.8678 4.40901 19.591C4.13225 19.3142 3.9518 18.9257 3.85315 18.1919C3.75159 17.4365 3.75 16.4354 3.75 15Z"
                                fill="#505050" />
                        </svg>
                        <span class="text-[13px]">Tải ảnh</span>
                    </div>
                    <div id='imgContainer' class="w-[120px] mr-5 h-[120px] border border-dashed border-[#d8d8d8] rounded-[8px] mt-5 flex flex-col justify-center items-center hidden"></div>

                </div>
                <!-- System detail -->
                <!-- <div class="relative flex justify-between mt-5 w-full">
                    <span class="text-[13px] absolute px-[5px] bg-white -top-[10px] left-[15px]">Chung</span>
                    <textarea name="" id="" cols="30"
                        class="h-[95px] overflow-hidden px-2.5 pl-[20px] py-[8px] w-[100%] border border-solid border-[#d8d8d8] rounded-[6px] outline-0 text-[13px] resize-none"
                        readonly>Ngày tạo: 22/11/2022
Ngày sửa: 22/11/2022
Người tạo: Phạm Huyền My
Người sửa: Phạm Huyền My
                    </textarea> 
                </div> -->
                <!-- Button -->
                <div class="justify-end flex mt-5">
                    <button type="submit" class="text-[12px] bg-[#15A5E3] text-white rounded-[6px] px-[14px] py-[7px]">Thêm mới</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
<script>
    function showDroplist(id) {
        var dropList = document.getElementById(id);
        dropList.classList.toggle('hidden');
        console.log(dropList.getElementsByTagName('span'))
    }

    function select(id, value, label) {
        var dom = document.getElementById(id);
        dom.getElementsByTagName('input')[0].value = value;
        dom.getElementsByTagName('input')[1].value = label;
    }

    var file = document.getElementById('image');

    function getImage(){
        file.click();
    }

    function getImageInfo(){
        document.getElementById('imgName').innerHTML = file.files[0].name;
        let fileReader = new FileReader();
        fileReader.readAsDataURL(file.files[0])
        fileReader.onload = (e) => {
            console.log(e)
            var img = document.createElement('img');
            img.src = e.target.result
            img.style.objectFit = 'cover'
            img.style.maxWidth = '100%'
            document.getElementById('imgContainer').appendChild(img)
            document.getElementById('imgContainer').classList.toggle('hidden')
            document.getElementById('img').classList.toggle('hidden')
        }
    }
</script>