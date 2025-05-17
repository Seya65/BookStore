<!DOCTYPE html>
<html>
<head>
    <title>Book Manager</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f6f9;
            color: #333;
            padding: 20px;
        }
        h2 { color: #2c3e50; margin-bottom: 20px; }
        form {
            background: #fff; padding: 20px; border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1); max-width: 600px; margin-bottom: 40px;
        }
        input, button {
            width: 90%; padding: 12px; margin-bottom: 15px;
            border-radius: 8px; border: 1px solid #ccc; font-size: 16px;
        }
        input:focus { border-color: #3498db; outline: none; }
        button {
            background: #3498db; color: #fff; border: none;
            cursor: pointer; transition: background 0.3s;
        }
        button:hover { background: #2980b9; }
        label { font-weight: bold; margin-bottom: 5px; display: block; color: #444; }
        table {
            width: 100%; border-collapse: collapse; background: #fff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-radius: 12px; overflow: hidden;
        }
        th {
            background-color: #2c3e50; color: white; padding: 15px; text-align: left;
        }
        td { padding: 15px; border-top: 1px solid #eee; }
        tr:hover { background-color: #f0f8ff; }
        img {
            height: 100px; border-radius: 8px; transition: transform 0.3s ease;
        }
        img:hover { transform: scale(1.1); }
        a { text-decoration: none; margin-right: 10px; color: #3498db; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<h2><?php echo e($editMode ? 'Edit Book' : 'Add a New Book'); ?></h2>

<form method="POST" enctype="multipart/form-data" action="<?php echo e($editMode ? route('books.update', $editBook->id) : route('books.store')); ?>">
    <?php echo csrf_field(); ?>
    <?php if($editMode): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>

    <label>Title</label>
    <input name="title" value="<?php echo e(old('title', $editBook->title ?? '')); ?>" required>

    <label>Author</label>
    <input name="author" value="<?php echo e(old('author', $editBook->author ?? '')); ?>" required>

    <label>Genre</label>
    <input name="genre" value="<?php echo e(old('genre', $editBook->genre ?? '')); ?>" required>

    <label>Year</label>
    <input name="year" type="number" value="<?php echo e(old('year', $editBook->published_year ?? '')); ?>" required>

    <label>Cover Image <?php echo e($editMode ? '(leave blank to keep existing)' : ''); ?></label>
    <input type="file" name="cover" accept=".jpg,.jpeg,.png" <?php echo e($editMode ? '' : 'required'); ?>>

    <button type="submit"><?php echo e($editMode ? 'Update Book' : 'Add Book'); ?></button>
</form>

<h2>All Books</h2>
<table>
    <tr>
        <th>ID</th><th>Title</th><th>Author</th><th>Genre</th><th>Year</th><th>Cover</th><th>Actions</th>
    </tr>
    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($book->id); ?></td>
        <td><?php echo e($book->title); ?></td>
        <td><?php echo e($book->author); ?></td>
        <td><?php echo e($book->genre); ?></td>
        <td><?php echo e($book->published_year); ?></td>
        <td>
            <?php if($book->cover_photo): ?>
                <img src="<?php echo e(asset($book->cover_photo)); ?>" alt="Cover">
            <?php else: ?>
                No cover
            <?php endif; ?>
        </td>
        <td>
            <a href="<?php echo e(route('books.edit', $book->id)); ?>">✏️ Edit</a>
           
                
<form method="POST" action="<?php echo e(route('books.destroy', $book->id)); ?>" style="display:inline;" onsubmit="return confirm('Delete this book?')" width="20px">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <button type="submit" style="border:none; background:none; width:70px; height:16px;color:#3498db; cursor:pointer;">🗑 Delete</button>
</form>



            </form>
        </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\new_bookstore-main\bookmanager\resources\views/welcome.blade.php ENDPATH**/ ?>