<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Курс доллора</title>
  <link rel="stylesheet" href="./css/main.min.css">
</head>
<body>

<section class="dollor_set_page">
   <div class="message">
   <?php
   $file = 'dollor.txt';
   // Открываем файл для получения существующего содержимого
   if ( isset($_POST['dollor']) ) {
      if ( $_POST['dollor'] > 0 ) {
         $fh = fopen($file, 'w');
         fclose($fh);
         $set = file_get_contents($file);
         $set .= $_POST['dollor'];
         // Пишем содержимое обратно в файл
         file_put_contents($file, $set, LOCK_EX);
         echo '<div class="success">Успешно</div>';
      } else {
         echo '<div class="error">Неверное значение</div>';
      }
   }
   ?>
   </div>
   <form action="" method="post">
      <input type="tel" name="dollor" placeholder="Курс доллара в рублях" value="<?php echo $_POST['dollor']; ?>" required>
      <button type="submit">Отправить</button>
   </form>

</section>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
</body>
</html>