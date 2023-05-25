<!DOCTYPE html>
<?php 
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

    </head>
    
    <body class="font-nunito text-base text-black dark:text-white dark:bg-slate-900">
        <section class="md:h-screen py-36 flex items-center bg-[url('../../assets/images/cta.html')] bg-no-repeat bg-center">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black"></div>
            <div class="container">
                <div class="flex justify-center">
                    <div class="max-w-[400px] w-full m-auto p-6 bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-800 rounded-md">
                        <a href="index.html"><img src="assets/images/logo-icon-64.png" class="mx-auto" alt=""></a>
                        <h5 class="my-6 text-xl font-semibold">Login</h5>
                        <form class="ltr:text-left rtl:text-right">
                            <div class="grid grid-cols-1">
                                <div class="mb-4">
                                    <label class="font-semibold" for="LoginEmail">Email Address:</label>
                                    <input id="LoginEmail" type="email" class="form-input mt-3" placeholder="name@example.com">
                                </div>

                                <div class="mb-4">
                                    <label class="font-semibold" for="LoginPassword">Password:</label>
                                    <input id="LoginPassword" type="password" class="form-input mt-3" placeholder="Password:">
                                </div>

                                <div class="flex justify-between mb-4">
                                    <div class="form-checkbox flex items-center mb-0">
                                        <input class="ltr:mr-2 rtl:ml-2 border border-inherit w-[14px] h-[14px]" type="checkbox" value="" id="RememberMe">
                                        <label class="text-slate-400" for="RememberMe">Remember me</label>
                                    </div>
                                    <p class="text-slate-400 mb-0"><a href="auth-re-password.html" class="text-slate-400">Forgot password ?</a></p>
                                </div>

                                <div class="mb-4">
                                    <input type="submit" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md w-full" value="Login / Sign in">
                                </div>

                                <div class="text-center">
                                    <span class="text-slate-400 ltr:mr-2 rtl:ml-2">Don't have an account ?</span> <a href="auth-signup.html" class="text-black dark:text-white font-bold inline-block">Sign Up</a>
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
        <script src="assets/libs/feather-icons/feather.min.js"></script>
        <script src="assets/js/plugins.init.js"></script>
        <script src="assets/js/app.js"></script>
    </body>
</html>