

<?php $__env->startSection('content'); ?>
    <h1>Danh sách báo cáo</h1>
    <a href="<?php echo e(route('issues.create')); ?>" class="btn btn-primary mb-3">Thêm báo cáo</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Mã vấn đề</th>
                <th>Tên máy tính</th>
                <th>Tên phiên bản</th>
                <th>Người báo cáo</th>
                <th>Thời gian báo cáo</th>
                <th>Mức độ sự cố</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $issues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($issue->id); ?></td>
                    <td><?php echo e($issue->computer->computer_name); ?></td>
                    <td><?php echo e($issue->computer->model); ?></td>
                    <td><?php echo e($issue->reported_by); ?></td>
                    <td><?php echo e($issue->reported_date); ?></td>
                    <td><?php echo e($issue->urgency); ?></td>
                    <td><?php echo e($issue->status); ?></td>
                    <td>
                        <a href="<?php echo e(route('issues.show', $issue->id)); ?>" class="btn btn-info btn-sm">Xem</a>
                        <a href="<?php echo e(route('issues.edit', $issue->id)); ?>" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="<?php echo e(route('issues.destroy', $issue->id)); ?>" method="POST" style="display: inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xác nhận xoá?')">Xoá</button>
                        </form>                        
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <!-- Hiển thị phân trang -->
    <?php echo e($issues->links('pagination::bootstrap-5')); ?>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var deleteModal = document.getElementById('deleteModal');
            deleteModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var issueId = button.getAttribute('data-id');
                var action = "<?php echo e(url('issues')); ?>/" + issueId;
                var form = deleteModal.querySelector('#deleteForm');
                form.action = action;
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\btth4\resources\views/issues/index.blade.php ENDPATH**/ ?>