<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="p-4">
        <div class="d-flex justify-content-between">
            <h1 class="text-2xl font-medium"><span class="text-3xl font-bold text-red-500 uppercase">Laravel</span> ToDo List</h1>
            <!-- Button trigger modal -->
            <button type="button" class="px-6 py-2 rounded-lg text-white font-medium bg-blue-600" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Launch demo modal
            </button>
        </div>

        <table id="todos" class="display" style="width:100%" style="background-color:aqua; width:100%; height:20rem;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Todo Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php echo e($index = 0); ?>

                <?php $__currentLoopData = $todos;
                $__env->addLoop($__currentLoopData);
                foreach ($__currentLoopData as $todo):
                    $__env->incrementLoopIndices();
                    $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php echo e($index += 1); ?>
                        </td>
                        <td>
                            <p class="font-bold text-gray-600 uppercase"><?php echo e($todo->todoName); ?></p>
                        </td>
                        <?php if ($todo->status == 1): ?>
                            <td><input type="checkbox" name="status" id="" checked disabled></td>
                        <?php else: ?>
                            <td><input type="checkbox" name="status" id="" disabled></td>
                        <?php endif; ?>
                        <td class="flex">
                            <a href="<?php echo e(route('update', $todo->id)); ?>" class="py-1 px-3 bg-emerald-600 rounded-lg text-white font-base">Update</a> |
                            <!-- <a href="/delete/<?php echo e($todo->id); ?>">Delete</a> -->
                            <form id="deleteForm" method="GET" action="<?php echo e(route('deletetodo', $todo->id)); ?>">
                                <button type="button" class="py-1 px-3 bg-red-600 rounded-lg text-white font-base" onclick="confirmDelete()">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach;
                $__env->popLoop();
                $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div
                <div class="modal-body">


                    <form id="todoForm" method="post" action="<?php echo e(route('todos.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('post'); ?>
                        <div class="mb-3">
                            <label for="text" class="form-label">Todo Name</label>
                            <input type="text" class="form-control" name="todoName">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="status" type="checkbox" value="1"
                                id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Done
                            </label>
                        </div>

                        <button type="button" onclick="confirmAdd()" class="px-6 py-2 rounded-lg text-white font-medium bg-blue-600">Submit</button>
                    </form>



                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        new DataTable('#todos');
    </script>
    <script>
        function confirmAdd() {
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to save this todo?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('todoForm').submit();
                } else {
                }
            });
        }
        function confirmDelete() {
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to save this todo?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm').submit();
                } else {
                }
            });
        }
    </script>
</body>

</html>
<?php /**PATH D:\Laravel\LaravelTodoList\resources\views/components/read.blade.php ENDPATH**/?>