<?php include 'view/header.php'; ?>
<div id="main_div">
    <!--page displays all types contained in vehicle_type table and lets user delete listed types. also lets user 
        add new type via text box at bottom-->
    <main>
        <section>
            <h2>Vehicle Type List</h2>

                <table>
                    <thead>
                        <tr>
                            <th>Name</th><th></th>
                        </tr>
                        <tr>
                    </thead>

                    <tbody>
                        <?php foreach ($types as $type) : ?>
                            <tr>
                                <td><?php echo $type['type']; ?></td>

                                <td>
                                    <form action="." method="post">
                                        <input type="hidden" name="action" value="delete_type">
                                        <input type="hidden" name="type_code"
                                            value="<?php echo $type['type_code']; ?>">
                                        <input type="submit" value="Remove">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table><br>

                <h2>Add Vehicle Type</h2>
                <form action="." method="post" id="add_type_form">
                    <input type="hidden" name="action" value="add_type">

                    <label>Name:</label>
                    <input type="text" name="type_name" required><br>
        
                    <label>&nbsp;</label>
                    <input id="add_type_button" type="submit" class="button blue" value="Add Type"><br>
                </form>
        </section><hr><br>
        <section>
            <p><a href="index.php">Back to Admin Vehicle List</a></p><br>
            <p><a href="index.php?action=show_add_vehicle_form">Add a Vehicle to Inventory</a></p><br>
            <p><a href="index.php?action=edit_classes">View/Edit Vehicle Classes</a></p>
        </section>
    </main>
</div>
<?php include 'view/footer.php'; ?>
