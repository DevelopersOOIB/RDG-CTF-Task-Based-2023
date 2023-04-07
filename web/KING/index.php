<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Kingom</title>
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
        <style>#col-md{
            align-content: center;
            width:500px;                
            }</style>
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

            <a href="index.html"><div class="responsive-logo hidden-lg hidden-md hidden-sm"></div></a>

           

                <div class="fc-tab-2">

                  <div class="about-container">
                    <div class="row">
                      <div class="contact-form" id="col-md">
                        <h2>Only for King</h2>
                        <form action="" method="POST" >
                          <input type="text" name="user">
                          <input type="password" name="passwd">
                          <input type="submit" value="Login">
                        </form>

                        <?php
                            if (isset($_POST['user']) && isset($_POST['passwd'])) {
                              $user = $_POST['user'];
                              $passwd = $_POST['passwd'];
                              if($user == 'king' && $passwd == 'funkyprincess'){
                                header("Location: 9384593245n2345n2745n726dn58726378561n2635716n2875687246nd5/");
                                exit();
                              }else{
                                echo "<pre>Wrong user or password</pre>";
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