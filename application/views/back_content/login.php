<!DOCTYPE html>
<html >
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('back_assets/css/bootstrap.min.css') ?>" />
        <!--===============================================================================================-->
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('back_assets/css/font-awesome.min.css') ?>" />
        <!--  ===============================================================================================
      <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
      ===============================================================================================
      <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
      ===============================================================================================
      <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
      ===============================================================================================
      <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
      ===============================================================================================
      <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
      ===============================================================================================
      <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">-->
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('back_assets/css/util.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('back_assets/css/main.css') ?>">
        <!--===============================================================================================-->
    </head>
    <body>

        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
                    <form class="login100-form validate-form" action="<?php echo str_replace("?", "", site_url('back_ctrl/index')) ?>" method="POST">
                        <span class="login100-form-title p-b-33">
                            Connexion
                        </span>

                        <div class="wrap-input100 validate-input" data-validate = "Un email valide est requis">
                            <input class="input100" type="text" name="email" placeholder="Email">
                            <span class="focus-input100-1"></span>
                            <span class="focus-input100-2"></span>
                        </div>

                        <div class="wrap-input100 rs1 validate-input" data-validate="Le mot de passe est requis">
                            <input class="input100" type="password" name="mdp" placeholder="Password">
                            <span class="focus-input100-1"></span>
                            <span class="focus-input100-2"></span>
                        </div>

                        <div class="container-login100-form-btn m-t-20">
                            <button class="login100-form-btn" type="submit" name="login">
                                Se connecter
                            </button>
                        </div>
                        <!--
                                                          <div class="text-center p-t-45 p-b-4">
                                                                      <span class="txt1">
                                                                          Forgot
                                                                      </span>

                                                                      <a href="#" class="txt2 hov1">
                                                                          Username / Password?
                                                                      </a>
                                                                  </div>

                                                                  <div class="text-center">
                                                                      <span class="txt1">
                                                                          Create an account?
                                                                      </span>

                                                                      <a href="#" class="txt2 hov1">
                                                                          Sign up
                                                                      </a>
                                                                  </div>-->
                    </form>
                </div>
            </div>
        </div>
		<?php var_dump($this->session->userdata('admin')); ?>



        <!--===============================================================================================-->
<!--        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        ===============================================================================================
        <script src="vendor/animsition/js/animsition.min.js"></script>
        ===============================================================================================
        <script src="vendor/bootstrap/js/popper.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        ===============================================================================================
        <script src="vendor/select2/select2.min.js"></script>
        ===============================================================================================
        <script src="vendor/daterangepicker/moment.min.js"></script>
        <script src="vendor/daterangepicker/daterangepicker.js"></script>
        ===============================================================================================
        <script src="vendor/countdowntime/countdowntime.js"></script>-->
        <!--===============================================================================================-->
        <script src="<?php echo base_url('back_assets/js/main.js') ?>"></script>

    </body>
</html>
