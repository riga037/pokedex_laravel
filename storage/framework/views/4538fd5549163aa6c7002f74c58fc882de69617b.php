<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Pokedex</title>
  <!-- CSS only -->
  <!-- CSS only -->
   <!-- Scripts -->
   <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>
   <style>
    #nav {
        transition: all .3s;
    }

    #nav:hover {
        background-color: #D70040;
        border-radius: 5px;
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-0">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
            <img style="height:45px" src="/icon/icon.png">
            </a>
       
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto p-3">
                <div>
                    <a id="nav" class="navbar-brand p-3" href="<?php echo e(url('/')); ?>">Home</a>
                    <a id="nav" class="navbar-brand p-3" href="<?php echo e(url('/monsters')); ?>">Monsters</a> 
                    <a id="nav" class="navbar-brand p-3" href="<?php echo e(url('/typestable')); ?>">Types</a>
                    <a id="nav" class="navbar-brand p-3" href="<?php echo e(url('/moves')); ?>">Moves</a>        
                </div>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    <?php if(auth()->guard()->guest()): ?>
                        <?php if(Route::has('login')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if(Route::has('register')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php else: ?>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <?php echo e(Auth::user()->name); ?>

                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

  <div class="container"> 
    <?php echo $__env->yieldContent('content'); ?>
  </div>

</body>
</html><?php /**PATH /home/usuari/projectes/pokedex_laravel/resources/views/plantilla.blade.php ENDPATH**/ ?>