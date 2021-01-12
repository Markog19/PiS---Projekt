<?php $__env->startSection('content'); ?>


    <div class="container-fluid gedf-wrapper">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6 gedf-main">

                <!--- \\\\\\\Post-->
                <div class="card gedf-card">
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('categories.update',$category)); ?>" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <?php echo method_field('PUT'); ?>
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Uredi kategoriju</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                                    <div class="form-group">
                                        <input id="name" type="text" class="form-control" name="name" value="<?php echo e($category->name); ?>" placeholder="Ime kategorije" required autofocus>
                                    </div>

                                    <div class="form-group">

                                        <div class="col-md-8">
                                            <label class="text">Trenutna naslovna fotografija kategorije</label>
                                            <img src="<?php echo e(url('storage/uploads/categories_photos/'.$category->cover_image)); ?>" style="width:100%; height:100%;" class="card-img" alt="..." >
                                        </div>

                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Prenesite novu naslovnu fotografiju</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="cover_image" name="cover_image">

                                            <label class="custom-file-label" for="cover_image">jpeg | png | jpg | bmp</label>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="btn-toolbar justify-content-between">


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Uredi</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
                <!-- Post /////-->





            </div>

        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Role/resources/views/admin/categories/edit.blade.php ENDPATH**/ ?>