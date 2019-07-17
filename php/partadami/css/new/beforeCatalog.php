<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <link rel="stylesheet" href="<?php echo $templateURL; ?>bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $templateURL; ?>style.css">
  <style>
    .price {
      color: <?php echo $priceColor; ?>;
    }

    .product_title {
      color: <?php echo $titleColor; ?>;
    }

    .product_title a {
      color: <?php echo $titleColor; ?>;
    }

    .category_title > div > h1 {
      color: <?php echo $categoryTitleColor; ?>
    }
    .product {
      float: left;
      width: 33%;
      min-height: 600px;
    }
    .product:nth-child(3n) {
      width: 34%;
    }
    
    .sale_price {
      display: inline-block;
      background: #fdc100 !important;
      padding: 10px;
      margin: 10px auto;
      text-align: center;
    }
    .sale_price p {
      margin: 0;
      font-size: 20px;
      font-weight: bold;
    }
    .woocommerce-Price-amount {display: block; text-align: left; margin: 0 auto; font-size: 20px;}
    .woocommerce-Price-amount:before{content:'Опт: ';}
  </style>
</head>
<body>

<div class="catalog container-fluid">