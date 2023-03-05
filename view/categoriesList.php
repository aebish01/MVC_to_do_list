<?php include('/xampp/htdocs/MVC_todo_list/view/header.php'); ?>

    <section class="listCategories" id="listCategories">
        <h1>Categories</h1>
            <?php foreach($categories as $category) : ?>
                <div class="listCategory">
                <form action="." method="POST">
                    <input type="hidden" name="action" value="deleteCategory">
                    <input type="hidden" name="categoryId" value="<?= $category['categoryID'] ?>">
                    <button>X</button>
                </form>
                    <p class="bold"><?=$category['categoryName'] ?></p>
                </div>
            <?php endforeach; ?>
    </section>
    <section class="addCategories" id="addCategories">
        <h2>Add Category</h2>
        <form action="." method="POST" id="add_form" class="add_form">
        <input type="hidden" name="action" value="addCategory">
        <div class="add_inputs">
            <label>Category name:</label>
            <input type="text" name="categoryName" maxlength="20" placeholder="Enter Category" required>
        </div>
        <div class="addButton">
            <button class="add-button">Add</button>
        </div>
    </form>

    </section>

