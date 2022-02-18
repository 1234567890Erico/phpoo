
<!-- <?php echo '<pre>'; print_r($values); echo '</pre>'; ?>-->


<form action="" method="post" enctype="multipart/form-data" class="border p-3">
    <?php foreach($fields AS $field): ?>
        <div class="form-group mb-3">
            <label for="name" class="form-label"><?= $field['Field'] ?>:</label>
            <input type="text" class="form-control" name="<?= $field['Field'] ?>" value="<?= ($op == 'update') ? $values[$field['Field']] : ''; ?>">
        </div>
    <?php endforeach; ?>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>