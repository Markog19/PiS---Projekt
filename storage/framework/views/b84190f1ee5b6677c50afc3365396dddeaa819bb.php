<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous">

<script src='https://kit.fontawesome.com/a076d05399.js'></script>



<?php $__env->startSection('content'); ?>


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                    <nav class="navbar-light">
                        <p class="navbar-brand">Pregled kategorija</p>

                        <div class=" mx-auto pull-right" id="navbarSupportedContent">
                            <form action="<?php echo e(route('home.index')); ?>" method="GET" role="search" class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" name="term" id="term" type="search" placeholder="Pretraži kategoriju" aria-label="Search">
                                <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i> Pretraži</button>
                            </form>
                        </div>
                    </nav>
                </div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <?php if($categories): ?>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-3">
                                        <img src="<?php echo e(url('storage/uploads/categories_photos/'.$category->cover_image)); ?>" style="width:100%; height:100%;" class="card-img" alt="..." >
                                    </div>
                                    <div class="col-md-8">

                                        <div class="card-body">
                                            <h5 class="card-title"><a href="<?php echo e(url('category/' . $category->id)); ?>" ><i class="fas fa-folder-open"></i> <?php echo e($category->name); ?></a></h5>
                                            <?php ($count=0); ?>
                                            <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($category->id == $document->category_id): ?>
                                                    <?php (++$count); ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                            <p class="card-text">Broj dukumenata: <?php echo e($count); ?></p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>

                                        </div>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-users')): ?>

                                            <form action="<?php echo e(route('categories.destroy', $category)); ?>" method="POST" class="float-right">
                                            <?php echo csrf_field(); ?>
                                            <?php echo e(method_field('DELETE')); ?>


                                            <!-- in blade -->
                                                <button type="submit" onclick="return confirm('Jeste li sigurni da želite izbrisati  kategoriju <?php echo e($category->name); ?>?')" class="btn btn-danger" style="margin-left: 5px"><i class="fas fa-folder-minus"></i> Izbriši kategoriju</button>
                                            </form>

                                            <a href="<?php echo e(route('categories.edit',$category)); ?>">
                                                <button type="button" class="btn btn-primary float-right"><i class="fas fa-edit"></i> Uredi kategoriju</button>
                                            </a>

                                        <?php endif; ?>


                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($categories->links()); ?>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Role/resources/views/home.blade.php ENDPATH**/ ?>