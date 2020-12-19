<?php $__env->startSection('title', '登録済み予定の一覧'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
  <h2>予定完了一覧</h2>
  <table class="table">
    <thead class="table table-dark">
      <tr>
        <th>ID</th>
        <th>タイトル</th>
        <th>場所</th>
        <th>期限</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($todo->priority == 5): ?>
        <tr class="priority-todo">
          <?php endif; ?>
          <td><?php echo e($todo->id); ?></td>
          <td><?php echo e(str_limit($todo->title, 100)); ?></td>
          <td><?php echo e(str_limit($todo->space, 250)); ?></td>
          <td><?php echo e(str_limit($todo->deadline, 100)); ?></td>
          <td>
            <div><a class="mod-btn" href="<?php echo e(action('Admin\TodoController@incomplete', ['id' => $todo->id])); ?>">未完了</a></div>
          </td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
</div>
<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\curriculum5\resources\views/todo/complete_list.blade.php ENDPATH**/ ?>