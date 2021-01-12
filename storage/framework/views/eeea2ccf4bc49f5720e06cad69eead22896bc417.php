<?php $__env->startSection('content'); ?>


    <div class="container-fluid gedf-wrapper">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6 gedf-main">

                <!--- \\\\\\\Post-->
                <div class="card gedf-card">
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('categories.store')); ?>" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Napravi novu kategoriju</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                                <div class="form-group">

                                    <input id="name" type="text" class="form-control" name="name" placeholder="Ime kategorije" required  autofocus>
                                </div>

                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">Naslovna fotografija</span>
                                      </div>
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="cover_image" name="cover_image" required>

                                        <label class="custom-file-label" for="cover_image">jpeg | png | jpg | bmp</label>
                                      </div>
                                    </div>

                            </div>

                        </div>
                        <div class="btn-toolbar justify-content-between">


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create</button>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Role/resources/views/admin/categories/create.blade.php ENDPATH**/ ?>