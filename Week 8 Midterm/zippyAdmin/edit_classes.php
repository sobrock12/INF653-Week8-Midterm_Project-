<?php include 'view/header.php'; ?>
<div id="main_div">
    <!--contains table that displays classes contained in vehicle_class table and gives user option to delete listed class.
        lets user enter new class via text form at bottom of page. passes variables to functions that run SQL queries 
        to add and remove items from table-->
    <main>
        <section>
            <h2>Vehicle Class List</h2>

                <table>
                    <thead>
                        <tr>
                            <th>Name</th><th></th>
                        </tr>
                        <tr>
                    </thead>

                    <tbody>
                        <?php foreach ($classes as $class) : ?>
                            <tr>
                                <td><?php echo $class['class']; ?></td>

                                <td>
                                    <form action="." method="post">
                                        <input type="hidden" name="action" value="delete_class">
                                        <input type="hidden" name="class_code"
                                            value="<?php echo $class['class_code']; ?>">
                                        <input type="submit" value="Remove">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table> <br>

                <h2>Add Vehicle Class</h2>
                <form action="." method="post" id="add_class_form">
                    <input type="hidden" name="action" value="add_class">

                    <label>Name:</label>
                    <input type="text" name="class_name" required><br>
        
                    <label>&nbsp;</label>
                    <input id="add_class_button" type="submit" class="button blue" value="Add Class"><br>
                </form>
                <hr><br>
        </section>
        <section>
            <!--links to other pages in admin app-->
            <p><a href="index.php">Back to Admin Vehicle List</a></p><br>
            <p><a href="index.php?action=show_add_vehicle_form">Add a Vehicle to Inventory</a></p><br>
            <p><a href="index.php?action=edit_types">View/Edit Vehicle Types</a></p>
        </section>
    </main>
</div>
<?php include 'view/footer.php'; ?>
