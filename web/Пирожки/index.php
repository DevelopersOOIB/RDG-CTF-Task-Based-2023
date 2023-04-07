<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>KRONOS</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/easy-responsive-tabs.min.css">
        <link rel="stylesheet" href="css/tabs.css">
        <link rel="stylesheet" href="css/templatemo-style.css">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
    <div class="preloader">
      <div class="spinner">
        <div class="dot1"></div>
        <div class="dot2"></div>
      </div>
    </div>
    <section class="section-full image-bg">

      <div class="container">

        <div class="row">

          <div class="col-md-12">

            <a href="index.html"><div class="responsive-logo hidden-lg hidden-md hidden-sm"><img src="img/logo.png"></div></a>

            <!-- Begin .HorizontalTab -->
            <div class="VerticalTab VerticalTab_hash_scroll VerticalTab_6 tabs_ver_6">

              <ul class="resp-tabs-list hor_1">
                <a href="index.php"><div class="logo"><img src="img/logo.png"></div></a>
                <li class="tabs-1" data-tab-name="profile"><span class="tabs-text">Welcome</span></li>
                <li class="tabs-4" data-tab-name="contact"><span class="tabs-text">Admin panel</span></li>
               
                <li class="tabs-2" data-tab-name="resume"><span class="tabs-text">Get Order</span></li>
              </ul>

              <div class="resp-tabs-container hor_1 tabs_scroll">

                <div class="fc-tab-1">

                  <div class="home-container">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="left-content">
                          <div class="left-line"></div>
                          <h2>Лучшие пирожки с маком <em>Курник</em></h2>
                          <p>Вам грустно и одиноко? Нечем себя развлечь? Достали пирожки с капустой? <br>Попробуйте наш пирожок с маком!</p>

                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="right-content">
                          <img src="img/home-image.jpg">
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="fc-tab-2">

                  <div class="about-container">
                    <div class="row">
                      <div class="col-md-6 contact-form">
                        <h2>Enter admin credentials</h2>
                        <form action="" method="POST">
                          <input type="text" name="user">
                          <input type="password" name="passwd">
                          <input type="submit" value="Login">
                        </form>

                        <?php
                            if (isset($_POST['user']) && isset($_POST['passwd'])) {
                              $user = $_POST['user'];
                              $passwd = $_POST['passwd'];
                              if($user == 'admin' && $passwd == 'UTryHackRDGCTF!???!?!?'){
                                header("Location: 83df67dbe149dd3f95a1c2eeffd55826/");
                                exit();
                              }else{
                                echo "<pre>Wrong user or password</pre>";
                              }
                            }
                        ?>

                      </div>
                      <div class="col-md-6 contact-form">
                      <p>11010000 10100100 11010000 10110000 11010000 10110111 11010000 10110111 11010000 10111000 11010000 10111101 11010000 10110011 00100000 00101101 00100000 11010001 10000010 11010000 10110101 11010001 10000101 11010000 10111101 11010000 10111000 11010000 10111010 11010000 10110000 00100000 11010001 10000010 11010000 10110101 11010001 10000001 11010001 10000010 11010000 10111000 11010001 10000000 11010000 10111110 11010000 10110010 11010000 10110000 11010000 10111101 11010000 10111000 11010001 10001111 00100000 11010000 10011111 11010000 10011110</p>
                      </div>
                    </div>
                  </div>

                </div>

                
                <div class="fc-tab-4">

                  <div class="contact-container">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="contact-form">
                          <div class="heading">
                            <h2>Order</h2>
                          </div>
                          <form id="contact" action="" method="POST">
                            <p>Запишите в поле фамилию, имя, отчество, дату рождения и ваш контактный телефон. Мы определим цену заказа и свяжемся с вами. Разделитель между данными тире(-). Телефон вида: +12345678910</p>
                            <fieldset>
                              <input name="order" type="text" class="form-control" id="text" placeholder="Фам-Им-От-Др-+79998882211" required="">
                            </fieldset>

                            <fieldset>
                              <button type="submit" id="form-submit" class="btn">Submit</button>
                            </fieldset>
                          </form>

                          <?php

                              if(isset($_POST['order'])){
                                  $order = $_POST['order'];
                                  echo "<pre>$order</pre>";
                                  $file = fopen('orders.w','a');
                                  fwrite($file, $order . "\n");
                                  fclose($file);
                              }

                          ?>

                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="more-info contact-form">
                          <form id="contact" action="" method="POST">
                          <p>Если Вы уже сделали заказ ранее и хотите узнать на каком этапе находится его выполнение, проверьте это по нашей базе. Для этого введите ваш номер телефона.</p>
                            <fieldset>
                              <input name="check" type="text" class="form-control" id="name" placeholder="+79998882211" required="">
                            </fieldset>
                            <fieldset>
                              <button type="submit" id="form-submit" class="btn">Check</button>
                            </fieldset>
                          </form>

                          <?php
                              if(isset($_POST['check'])){
                                  $link=mysqli_connect("db:3306", "mysqlUserNotAccessable", "superEncryptedPassword123", "miniBoss");

                                  $check = $_POST['check'];
                                  $query="SELECT id,phone FROM phones WHERE phone='$check'";
                                  $blacklist = array(
                                                        'and' => '',
                                                        'sleep' => '',
                                                        'SLEEP' => '',
                                                        'if' => '',
                                                        'AND' => '',
                                                        'OR' => '',
                                                        'IF' => '',
                                                        '4946' => '',
                                                        '4f52' => '',
                                                        '414e44' => '',
                                                        '6966' => '',
                                                        '616e64' => '',
                                                        '6f72' => ''
                                                        );
                                  $query = str_replace(array_keys($blacklist), $blacklist, $query);
                                  $result=mysqli_query($link, $query);
                                  if (!$result)  die("Error While Selection process : " . mysqli_error());
                                  if(mysqli_num_rows($result) == 0) echo "<pre>Такого номера нет в базе</pre>";
                                  else {
                                    $row = mysqli_fetch_assoc($result);
                                    echo "<pre>Номер найден id: ".$row['id']."</pre>";
                                    $query="SELECT * FROM orders WHERE gid='".$row['id']."'";
                                    $result=mysqli_query($link, $query);
                                    if (!$result)  die("Error While Selection process : " . mysql_error());
                                    if(mysqli_num_rows($result) == 0) echo "<pre>По Вашему номеру еще нет статуса</pre>";
                                    $row = mysqli_fetch_assoc($result);
                                    echo "<pre>Статус заказа: ".$row['descr']."</pre>";
                                  }
                              }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>


              </div>
            </div>

          </div>

        </div>

      </div>

    </section>

    </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script src="js/jquery.nicescroll.min.js"></script>
        <script src="js/easyResponsiveTabs.js"></script>
    </body>

</html>