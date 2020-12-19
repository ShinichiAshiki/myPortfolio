<?php $__env->startSection('title', '登録済み予定の一覧'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
  <h2>期限切れ予定一覧</h2>

  <div>
    <div>
      <form action="<?php echo e(action('Admin\TodoController@search_dead_list')); ?>" method="post">
        <div>
          <div class="search-box">
            <div class="search">
              <input type="text" name="cond_title" placeholder="タイトル">
              <?php echo e(csrf_field()); ?>

              <input type="submit" class="search-btn" value="検索">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
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
          <?php if($todo->is_complete == 0): ?>
          <tr>
            <td><?php echo e($todo->id); ?></td>
            <td><?php echo e(str_limit($todo->title, 100)); ?></td>
            <td><?php echo e(str_limit($todo->space, 250)); ?></td>
            <td><?php echo e(str_limit($todo->deadline, 100)); ?></td>
            <td>
              <div>
                  <a href="<?php echo e(action('Admin\TodoController@delete', ['id' => $todo->id])); ?>">削除</a>
                  <a class="mod-btn" href="<?php echo e(action('Admin\TodoController@complete', ['id' => $todo->id])); ?>">完了</a>
              </div>
            </td>
          </tr>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>
<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\curriculum5\resources\views/todo/dead_list.blade.php ENDPATH**/ ?>