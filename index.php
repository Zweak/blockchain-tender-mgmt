<!DOCTYPE html>
<?php 
    session_start();
    require 'constants.php';
?>
<html lang="en" class="light scroll-smooth" dir="ltr">
    <head>
        <meta charset="UTF-8" />
        <title><?php echo APP_NAME; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Tailwind CSS Saas & Software Landing Page Template" />
        <meta name="keywords" content="agency, application, business, clean, creative, cryptocurrency, it solutions, modern, multipurpose, nft marketplace, portfolio, saas, software, tailwind css" />
        <meta name="author" content="Shreethemes" />
        <meta name="website" content="https://shreethemes.in/" />
        <meta name="email" content="support@shreethemes.in" />
        <meta name="version" content="1.6.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="assets/images/favicon.ico" />
        <link href="assets/libs/%40iconscout/unicons/css/line.css" type="text/css" rel="stylesheet" />
        <link rel="stylesheet" href="assets/css/icons.css" />
        <link rel="stylesheet" href="assets/css/tailwind.min.css" />
        <style>
            #error {
                color: #ff0000;
            }
            .error {
                display: block !important;
            }
        </style>
    </head>
    
    <body class="font-nunito text-base text-black dark:text-white dark:bg-slate-900">
        <section class="md:h-screen py-36 flex items-center bg-[url('../../assets/images/cta.html')] bg-no-repeat bg-center">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black"></div>
            <div class="container">
                <div class="flex justify-center">
                    <div class="max-w-[400px] w-full m-auto p-6 bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-800 rounded-md">
                        <center>
                            <h1><?php echo strtoupper(APP_NAME); ?></h1>
                            <hr><br>
                        </center>
                        <form class="ltr:text-left rtl:text-right form-horizontal" id="loginForm" action="submit_login.php" method="post">
                            <div class="grid grid-cols-1">
                                <div class="mb-4">
                                    <label class="font-semibold" for="LoginEmail">Company Email*</label>
                                    <input type="email" id="company_email" name="company_email" class="form-input mt-3" placeholder="Enter company email" />
                                </div>
                                <div class="mb-4">
                                    <label class="font-semibold" for="LoginEmail">Company Password*</label>
                                    <input type="password" id="company_password" name="company_password" class="form-input mt-3" placeholder="Enter company password" />
                                </div>

                                <div class="flex justify-between mb-4">
                                    <!-- <div class="form-checkbox flex items-center mb-0">
                                        <input class="ltr:mr-2 rtl:ml-2 border border-inherit w-[14px] h-[14px]" type="checkbox" value="" id="RememberMe">
                                        <label class="text-slate-400" for="RememberMe">Remember me</label>
                                    </div>
                                    <p class="text-slate-400 mb-0"><a href="auth-re-password.html" class="text-slate-400">Forgot password ?</a></p> -->
                                </div>

                                <div class="mb-4">
                                    <input type="submit" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md w-full" value="Login" id="loginbtn" />
                                </div>
                                <center>
                                    <?php 
                                        if(isset($_SESSION['error']))
                                        {
                                    ?>
                                            <br><p id="error">Email or password is incorrect.</p><br>
                                    <?php
                                            unset($_SESSION['error']);
                                        }
                                    ?>
                                </center>
                                <div class="text-center">
                                    <span class="text-slate-400 ltr:mr-2 rtl:ml-2">Don't have an account ?</span> <a href="register.php" class="text-black dark:text-white font-bold inline-block">Sign Up</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <div class="fixed bottom-3 ltr:right-3 rtl:left-3">
            <a href="#" class="back-button btn btn-icon bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-full"><i data-feather="arrow-left" class="h-4 w-4"></i></a>
        </div>
        <script src="assets/js/jquery-3.3.1.min.js"></script>
        <script src="assets/js/jquery.validate.js"></script>
        <script src="assets/js/additional_methods.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>
        <script src="assets/js/plugins.init.js"></script>
        <script src="assets/js/app.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                setTimeout(function(){
                    $("#error").hide(1000);
                },5000);
                
                $("#loginForm").validate({
                    errorElement: 'small',
                    rules:{
                        company_email:{
                            required: true,
                            email: true
                        },
                        company_password:{
                            required: true
                        }
                    },
                    messages:{
                        company_email:{
                            required: 'Please enter company email',
                            email: 'Please enter valid company email'
                        },
                        company_password:{
                            required: 'Please enter company password'
                        }
                    }
                });
            });
        </script>
    </body>
</html>