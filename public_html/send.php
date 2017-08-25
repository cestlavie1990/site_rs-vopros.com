<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  //Принимаем отправленные данные
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $comments = $_POST['comments'];
  
  function filterString($value){
    return trim(htmlspecialchars($value, ENT_QUOTES, 'UTF-8'));
  }
  
  $name = filterString($name);
  $phone = filterString($phone);
  $comments = filterString($comments);
  
  $to = 'rsvopros@gmail.com'; 
  $subject = 'Заявка с сайта'; 
  $message = 'Имя:' .$name. ' Телефон: ' .$phone. ' Комментарий: ' .$comments; 
  if(mail($to, $subject, $message)) {
  echo "<html><head><meta http-equiv='Refresh' content='5; URL=index.html?id=".$_SESSION['id']."'></head><body>Заявка успешно отправлена! 
  В ближайшее время наш специалист свяжется с Вами.
  Вы будете перемещены через 5 сек.   Если не хотите ждать, то <a href='index.html?id=".$_SESSION['id']."'>нажмите сюда.</a></body></html>";
  } else {
     echo 'Произошла неизвестная ошибка. Пожалуйста, свяжитесь с нами по телефону 8(812)960-28-80';
  }
}
?>