<?php $__env->startSection('title', '予定の編集'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>予定編集</h2>
                <form action="<?php echo e(action('Admin\TodoController@update')); ?>" method="post" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" name="title" value="<?php echo e($todo_form->title); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="space">場所</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="space" value="<?php echo e($todo_form->space); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="deadline">期限</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="deadline" value="<?php echo e($todo_form->deadline); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="priority">重要度</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="priority" value="<?php echo e($todo_form->priority); ?>">
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?php echo e($todo_form->id); ?>">
                    <?php echo e(csrf_field()); ?>

                    <input type="submit" class="update-btn" value="更新">
                </form>
            </div>
        </div>
    </div>
<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\curriculum5\resources\views/todo/edit.blade.php ENDPATH**/ ?>