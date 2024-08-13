<?php
session_start();
/* DECLARE VARIABLES */
$username = 'admin';
$password = 'admin';
$random1 = 'secret_key1';
$random2 = 'secret_key2';
$hash = md5($random1 . $password . $random2);
$self = $_SERVER['REQUEST_URI'];
/* USER LOGOUT */
if(isset($_GET['logout']))
{
  unset($_SESSION['login']);
}
/* USER IS LOGGED IN */
if (isset($_SESSION['login']) && $_SESSION['login'] == $hash)
{
  logged_in_msg($username);
}
/* FORM HAS BEEN SUBMITTED */
else if (isset($_POST['submit']))
{
  if ($_POST['username'] == $username && $_POST['password'] == $password)
  {
    //IF USERNAME AND PASSWORD ARE CORRECT SET THE LOGIN SESSION
    $_SESSION["login"] = $hash;
    header("Location: $_SERVER[PHP_SELF]");
  }
  else
  {
    // DISPLAY FORM WITH ERROR
    display_login_form();
    display_error_msg();
  }
}
/* SHOW THE LOGIN FORM */
else
{
  display_login_form();
}
/* TEMPLATES */
function display_login_form()
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" type="image/png" href="images/icons/favicon.ico">

  <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v11/vendor/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v11/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v11/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

  <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v11/vendor/animate/animate.css">

  <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v11/vendor/css-hamburgers/hamburgers.min.css">

  <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v11/vendor/select2/select2.min.css">

  <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v11/css/util.css">
  <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v11/css/main.css">

  <meta name="robots" content="noindex, follow">
  <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js" nonce="32974cbb-696a-4451-a0b2-c772c5677435"></script>
  <script defer="" referrerpolicy="origin" src="/cdn-cgi/zaraz/s.js?z=JTdCJTIyZXhlY3V0ZWQlMjIlM0ElNUIlNUQlMkMlMjJ0JTIyJTNBJTIyTG9naW4lMjBWMTElMjIlMkMlMjJ4JTIyJTNBMC45OTA4MDU2Njk4MTQ0OTA1JTJDJTIydyUyMiUzQTEzNjAlMkMlMjJoJTIyJTNBNzY4JTJDJTIyaiUyMiUzQTY2NyUyQyUyMmUlMjIlM0ExMzYwJTJDJTIybCUyMiUzQSUyMmh0dHBzJTNBJTJGJTJGY29sb3JsaWIuY29tJTJGZXRjJTJGbGYlMkZMb2dpbl92MTElMkZpbmRleC5odG1sJTIyJTJDJTIyciUyMiUzQSUyMmh0dHBzJTNBJTJGJTJGY29sb3JsaWIuY29tJTJGd3AlMkZ0ZW1wbGF0ZSUyRmxvZ2luLWZvcm0tdjExJTJGJTIyJTJDJTIyayUyMiUzQTI0JTJDJTIybiUyMiUzQSUyMlVURi04JTIyJTJDJTIybyUyMiUzQTMwMCUyQyUyMnElMjIlM0ElNUIlNUQlN0Q="></script>
  <script nonce="32974cbb-696a-4451-a0b2-c772c5677435">
    (function(w,d){!function(a,e,t,r){a.zarazData=a.zarazData||{};a.zarazData.executed=[];a.zaraz={deferred:[]};a.zaraz.q=[];a.zaraz._f=function(e){return function(){var t=Array.prototype.slice.call(arguments);a.zaraz.q.push({m:e,a:t})}};for(const e of["track","set","ecommerce","debug"])a.zaraz[e]=a.zaraz._f(e);a.zaraz.init=()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r),n=e.getElementsByTagName("title")[0];n&&(a.zarazData.t=e.getElementsByTagName("title")[0].text);a.zarazData.x=Math.random();a.zarazData.w=a.screen.width;a.zarazData.h=a.screen.height;a.zarazData.j=a.innerHeight;a.zarazData.e=a.innerWidth;a.zarazData.l=a.location.href;a.zarazData.r=e.referrer;a.zarazData.k=a.screen.colorDepth;a.zarazData.n=e.characterSet;a.zarazData.o=(new Date).getTimezoneOffset();a.zarazData.q=[];for(;a.zaraz.q.length;){const e=a.zaraz.q.shift();a.zarazData.q.push(e)}z.defer=!0;for(const e of[localStorage,sessionStorage])Object.keys(e||{}).filter((a=>a.startsWith("_zaraz_"))).forEach((t=>{try{a.zarazData["z_"+t.slice(7)]=JSON.parse(e.getItem(t))}catch{a.zarazData["z_"+t.slice(7)]=e.getItem(t)}}));z.referrerPolicy="origin";z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData)));t.parentNode.insertBefore(z,t)};["complete","interactive"].includes(e.readyState)?zaraz.init():a.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,0,"script");})(window,document);
  </script>
</head>
<body>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">

        <span class="login100-form-title p-b-55">
Lmost
</span>


  <?php echo '<form action="' . isset($self) . '" method="post" class="login100-form validate-form">' .

      '<div class="wrap-input100 validate-input m-b-16" >
        <input class="input100" type="text" name="username" id="username"> 
        <span class="focus-input100"></span>
        <span class="symbol-input100">
        <span class="lnr lnr-envelope"></span>
        </span>
      </div>'.


      '<div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
        <input class="input100" type="password" name="password" id="password">
         <span class="focus-input100"></span>
        <span class="symbol-input100">
        <span class="lnr lnr-lock"></span>
        </span>
      </div>' .
'<p class="u-align-center u-text u-text-1">Clave de acceso <a href="https://t.me/JostinSantos" class="u-active-none u-border-1 u-border-white u-btn u-button-link u-button-style u-hover-none u-none u-text-body-alt-color u-btn-2" target="_blank">"Aquí"</a></p>'

   .    '<input type="submit" name="submit" value="login" class="login100-form-btn">' .
     '</form>';
}
function logged_in_msg($username)
{
?>
</div>
    </div>
  </div>

  <script src="https://colorlib.com/etc/lf/Login_v11/vendor/jquery/jquery-3.2.1.min.js"></script>

  <script src="https://colorlib.com/etc/lf/Login_v11/vendor/bootstrap/js/popper.js"></script>
  <script src="https://colorlib.com/etc/lf/Login_v11/vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="https://colorlib.com/etc/lf/Login_v11/vendor/select2/select2.min.js"></script>

  <script src="https://colorlib.com/etc/lf/Login_v11//main.js"></script>

  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
    
        gtag('config', 'UA-23581568-13');
    
  </script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"727f39800f704ffb","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.6.0","si":100}' crossorigin="anonymous"></script>
</body>
</html>
</body>
</html> 

<!DOCTYPE html>
<html style="font-size: 16px;" lang="es"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Lmost</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Casa.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.13.4, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
  <script type="text/javascript" src="assets/js/apicodes.min.js"></script>   
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Casa">
    <meta property="og:type" content="website">
  </head>
  <body data-home-page="Casa.html" data-home-page-title="Casa" class="u-body u-xl-mode">
    <section class="u-black u-clearfix u-section-1" id="carousel_5580">
      <div class="u-clearfix u-sheet u-valign-middle-lg u-sheet-1">
        <div class="u-palette-5-dark-2 u-shape u-shape-rectangle u-shape-1"></div>
        <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-image u-layout-cell u-left-cell u-size-30 u-image-1" data-image-width="1200" data-image-height="959">
                <div class="u-container-layout u-container-layout-1"></div>
              </div>
              <div class="u-container-style u-layout-cell u-right-cell u-size-30 u-layout-cell-2">
                <div class="u-container-layout u-container-layout-2">
                  <div class="u-black u-expanded-width u-form u-form-1">
                    <form id="action-form" action="action.php" method="POST" accept-charset="utf-8" class="u-block-2d19-9 u-clearfix u-form-spacing-15 u-form-vertical u-inner-form" ><!-- hidden inputs for siteId and pageId -->
                      <div class="u-form-group u-form-name">
                        <label for="name-76c6" class="u-form-control-hidden u-label u-label-1">Name</label>
                        <input type="text" placeholder="Enter Titulo" id="name-76c6" name="titulo" class="u-border-3 u-border-no-left u-border-no-right u-border-no-top u-border-white u-input u-input-rectangle" required="">
                      </div><!-- always visible -->
                      <div class="u-form-email u-form-group">
                        <label for="email-76c6" class="u-form-control-hidden u-label u-label-2">Email</label>
                        <input type="text" placeholder="Enter ID Fembed" id="email-76c6" name="link" class="u-border-3 u-border-no-left u-border-no-right u-border-no-top u-border-white u-input u-input-rectangle" required="">
                      </div>
                      <div class="u-form-group">
                        <label for="message-76c6" class="u-form-control-hidden u-label u-label-3">Message</label>
                        <input placeholder="Enter Url Imagen" rows="4" cols="50" id="message-76c6" name="poster" class="u-border-3 u-border-no-left u-border-no-right u-border-no-top u-border-white u-input u-input-rectangle" required="required" type="text">
                      </div>
                      <div class="u-align-center u-form-group u-form-submit">

        <button type="submit" id="action-submit" class="u-active-palette-1-base u-border-none u-btn u-btn-submit u-button-style u-hover-white u-palette-2-base u-text-active-palette-1-base u-text-hover-palette-1-base u-btn-1"> <span id="fa-loading"></i></span> Encriptar URL</button>
                      </div>

                      <input type="hidden" value="" name="recaptchaResponse">
                    </form>
                  </div>
                  <p class="u-align-center u-text u-text-1">Cortecia de <a href="https://www.instagram.com/jostin.si/" class="u-active-none u-border-1 u-border-white u-btn u-button-link u-button-style u-hover-none u-none u-text-body-alt-color u-btn-2" target="_blank">Jostin Santos</a>
                  </p>
                  <a href="?logout=true" class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-50 u-btn-3">Cerrar&nbsp;Sesion</a>
                </div> 
              </div>
            </div>
          </div>
        </div>
        <div class="u-expanded-width u-tabs u-tabs-1">
          <ul class="u-tab-list u-unstyled" role="tablist">
            <li class="u-tab-item" role="presentation">
              <a class="active u-active-white u-button-style u-tab-link u-tab-link-1" id="link-tab-0da5" href="#tab-0da5" role="tab" aria-controls="tab-0da5" aria-selected="true">URL</a>
            </li>
            <li class="u-tab-item" role="presentation">
              <a class="u-active-white u-button-style u-tab-link u-tab-link-2" id="link-tab-14b7" href="#tab-14b7" role="tab" aria-controls="tab-14b7" aria-selected="false">Iframe</a>
            </li>
          </ul>
          <div class="u-tab-content">
            <div class="u-container-style u-tab-active u-tab-pane u-white u-tab-pane-1" id="tab-0da5" role="tabpanel" aria-labelledby="link-tab-0da5">
              <div class="u-container-layout u-container-layout-3">
                <h3 class="u-text u-text-default u-text-2">URL Directo:</h3>
                <div class="u-expanded-width u-form u-form-2">

      <input type="text" id="url-encode" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" placeholder="La URL después de la codificación se mostrará aquí ..." onclick="this.select()">


                </div>
              </div>
            </div>
            <div class="u-align-left u-container-style u-tab-pane u-white u-tab-pane-2" id="tab-14b7" role="tabpanel" aria-labelledby="link-tab-14b7">
              <div class="u-container-layout u-container-layout-4">
                <h3 class="u-text u-text-default u-text-3">Iframe:</h3>
                <div class="u-form u-form-3">
                  <form action="#" method="POST" class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" source="custom" name="form-1" style="padding: 10px;">
                    
                    
                    <div class="u-form-group u-form-message">
                      <label for="message-84f9" class="u-form-control-hidden u-label"></label>
                      <textarea rows="5" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" id="iframe-encode" placeholder="La URL con iframe después de la codificación se mostrará aquí ..." onclick="this.select()"></textarea>
                    </div>

                    <input type="hidden" value="" name="recaptchaResponse">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php  $domainServer = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']); ?>
    <script type="text/javascript">
      jQuery(function ($) {
        $('#action-form').submit(function(e) {
          e.preventDefault();
          $('#action-submit').prop('disabled', !0);
          $('#fa-loading').html('<i class="fa fa-spinner fa-spin"></i>');
              var b = $(this).serializeArray(), c = $(this).attr('action');
          $.ajax({
                type: 'POST',
                dataType: 'text',
                url: c,
                data: b,
            error: function (result) {
              alert("Something went wrong. Please try again!");
              $('#fa-loading').html('<i class="fa fa-arrow-circle-right"></i>');
              $('#action-submit').removeAttr('disabled');
            },
            success: function (result) {
              $('#url-encode').val('<?php echo $domainServer . '/embed.php?data=' ?>'+result+'');
              $('#iframe-encode').html('<iframe src="<?php echo $domainServer . '/embed.php?data=' ?>'+result+'" width="100%" height="100%" frameborder="0" allowfullscreen></iframe>');
              $('#fa-loading').html('<i class="fa fa-arrow-circle-right"></i>');
              $('#action-submit').removeAttr('disabled');
            }
          });
        });
      });
    </script>

</body>
  <?php
  }
function display_error_msg()
{
  echo '<p>Username or password is invalid</p>';
}
?>
</html>