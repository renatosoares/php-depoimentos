<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Guitar Wars - High Scores</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <h2>Depoimentos</h2>
 <a href="addscore.php">adicione o novo depoimento</a>.</p>
  <hr />




<?php
  require_once('appvars.php');
  require_once('connectvars.php');

  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

  // Retrieve the score data from MySQL
  $query = "SELECT * FROM guitarwars ORDER BY date DESC";
  $data = mysqli_query($dbc, $query);

  // Loop through the array of score data, formatting it as HTML 
  echo '<ul id="commentary_users" class="testimonial">';
  $i = 0;
  while ($row = mysqli_fetch_array($data)) { 
    // Display the score data

    if (is_file(GW_UPLOADPATH . $row['screenshot']) && filesize(GW_UPLOADPATH . $row['screenshot']) > 0) {
      echo '   <li><a href="#"><img src="' . GW_UPLOADPATH . $row['screenshot'] . '" alt="Suzane" width="120" height="120" />
    </a>';
 
    }
    else {
      echo '<td><img class="tamanho" src="' . GW_UPLOADPATH . 'unverified.gif' . '" alt="Unverified score" /></td></tr>';
    }
    /*echo '<tr><td class="scoreinfo">';*/
    echo '<blockquote><p>' . $row['score'] . '</p> </blockquote>';
     echo '<cite>- <a href="#">' . $row['name'] . '</a> <span class="context">| ' . $row['date'] . '</span></cite> </li>';


    $i++;
  }
  echo '</ul>';

  mysqli_close($dbc);
?>

<!-- 
 <ul id="commentary_users" class="testimonial">
  <li>
    <a href="#">
      <img src="images/suzanne_watts.jpg" alt="Suzane" width="120" height="120" />
    </a>
    <blockquote>
      <p>Ele simplificou as minhas contas, levou o estresse para longe e mudou a minha um dia por mês em 30 minutos. Ele me permitiu centralizar meu faturamento, contas, contas bancárias e citações.</p>
    </blockquote>
    <cite>- <a href="#">Suzana</a> <span class="context">| Blue Cherry</span></cite>
  </li>

    <li>

    <a href="#">
      <img src="images/suzanne_watts.jpg" alt="Suzane" width="120" height="120" />
    </a>
    <blockquote>
      <p>Ele simplificou as minhas contas, levou o estresse para longe e mudou a minha um dia por mês em 30 minutos. Ele me permitiu centralizar meu faturamento, contas, contas bancárias e citações.</p>
    </blockquote>
    <cite>- <a href="#">Suzana</a> <span class="context">| Blue Cherry</span></cite>
  </li>
    <li>
    <a href="#">
      <img src="images/suzanne_watts.jpg" alt="Suzane" width="120" height="120" />
    </a>
    <blockquote>
      <p>Ele simplificou as minhas contas, levou o estresse para longe e mudou a minha um dia por mês em 30 minutos. Ele me permitiu centralizar meu faturamento, contas, contas bancárias e citações.</p>
    </blockquote>
    <cite>- <a href="#">Suzana</a> <span class="context">| Blue Cherry</span></cite>
  </li>
    <li>
    <a href="#">
      <img src="images/suzanne_watts.jpg" alt="Suzane" width="120" height="120" />
    </a>
    <blockquote>
      <p>Ele simplificou as minhas contas, levou o estresse para longe e mudou a minha um dia por mês em 30 minutos. Ele me permitiu centralizar meu faturamento, contas, contas bancárias e citações.</p>
    </blockquote>
    <cite>- <a href="#">Suzana</a> <span class="context">| Blue Cherry</span></cite>
  </li>
</ul> --> -->

</body> 
</html>
