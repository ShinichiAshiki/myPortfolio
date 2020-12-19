<?php $__env->startSection('title', 'todoの新規作成'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>todo新規作成</h2>

                <form action="<?php echo e(action('Admin\TodoController@create')); ?>" method="post" enctype="multipart/form-data">

                    <?php if(count($errors) > 0): ?>
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($e); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="<?php echo e(old('title')); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="space">場所</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="space" value="<?php echo e(old('space')); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="deadline">期限</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="deadline" value="<?php echo e(old('deadline')); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2" for="priority">重要度</label>
                        <div class="col-md-10">
                          <select class="form-control" name="priority" min="1" max="5" value="<?php echo e(old('priority')); ?>">
                            <?php
                            for ($i = 1; $i <=5; $i++) {
                               print ('<option value="' . $i. '">' . $i . '</option>');
                               }
                               ?>
                            </select>
                        </div>
                    </div>


                    <?php echo e(csrf_field()); ?>

                    <input type="submit" class="create-btn" value="登録">
                </form>
            </div>
        </div>
    </div>
<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\curriculum5\resources\views/todo/create.blade.php ENDPATH**/ ?>