<!-- resources/views/books/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
</head>
<body>

    <h1>All Books</h1>
    <a href="<?php echo e(route('books.create')); ?>">Create New Book</a>

    <table border="1">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Cover</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($book->title); ?></td>
                    <td><?php echo e($book->author); ?></td>
                    <td>
                        <?php if($book->cover): ?>
                            <img src="<?php echo e(asset('storage/' . $book->cover)); ?>" alt="<?php echo e($book->title); ?>" width="100">
                        <?php else: ?>
                            No cover image
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo e(route('books.edit', $book->id)); ?>">Edit</a>
                        <a href="<?php echo e(route('books.destroy', $book->id)); ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\new_bookstore-main\bookmanager\resources\views/books/index.blade.php ENDPATH**/ ?>