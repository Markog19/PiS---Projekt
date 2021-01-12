<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">



    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>

    <div id="app">
        <nav class="bg-primary navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" style="color: white" href="<?php echo e(url('/')); ?>">
                    <?php echo e(config('app.name', 'Laravel')); ?>

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">

                                <a class="nav-link" style="color: white" href="<?php echo e(route('login')); ?>">
                                    <i class="fab fa-log-in"></i> <?php echo e(__('Login')); ?></a>
                            </li>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" style="color: white" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-users')): ?>

                                <li>
                                    <a class="nav-link" style="color: white" href="<?php echo e(route('categories.create')); ?>"><i class="fas fa-folder-plus"></i> Napravi novu kategoriju</a>
                                </li>
                                <?php endif; ?>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" style="color: white" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user"></i> <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-users')): ?>
                                    <a class="dropdown-item" href="<?php echo e(route('admin.users.index')); ?>">
                                        <i class="fas fa-users-cog"></i> Upravljajte korisnicima
                                    </a>
                                    <?php endif; ?>

                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off" aria-hidden="true"></i>
                                         <?php echo e(__('Odjavite se')); ?>

                                    </a>


                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

        </nav>



        <main class="py-4">
            <div class="container">
                <?php echo $__env->make('partials.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </main>

        <footer class="bg-primary text-white text-center text-lg-start">
            <!-- Grid container -->
            <div class="container p-4">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                        <h5 class="text-uppercase">O nama</h5>

                        <p align="justify">
                            Studentski materijali, je web stranica izrađena u svrhu kolegija "Projektiranje
                            informacijskih sustava. Ideja web aplikacije jeste da se omogući korisnicima objava
                            materijala
                        </p>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Pogledajte</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white"><i class="fab fa-github"></i> GitHub</a>
                            </li>

                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-5 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Informacije</h5>

                        <ul class="list-unstyled" align="justify">
                            <li>
                                <a href="#!" class="text-white">Marko Galić&emsp;&emsp;537/RM&emsp;makro.galic@student.fsre.ba</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Branimir Bulić&emsp;548/RM&emsp;branimir.bulic@student.fsre.ba</a>
                            </li>

                        </ul>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                &copy; <?php echo date("Y"); ?>:
                <a class="text-white" href="<?php echo e(url('/')); ?>">Studentski materijali</a>
            </div>
            <!-- Copyright -->
        </footer>

    </div>


</body>
</html>
<?php /**PATH /opt/lampp/htdocs/Role/resources/views/layouts/app.blade.php ENDPATH**/ ?>