<?php include 'view/header.php'; ?>
<div id="main_div">
    <main>
        <section>

            <form action="." method="get" id="sort_selection">
                <div id="select_div">
                <select name="make_selection">
                    <option value="0">View All Makes</option>
                    <?php foreach ($all_vehicles as $all_vehicle) : ?>
                        <option value="<?php echo $all_vehicle['make']; ?>">
                            <?php echo $all_vehicle['make']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>

                <select name="type_selection">
                <option value="0">View All Types</option>
                    <?php foreach ($types as $type) : ?>
                        <option value="<?php echo $type['type_code']; ?>">
                            <?php echo $type['type']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>

                <select name="class_selection">
                <option value="0">View All Classes</option>
                    <?php foreach ($classes as $class) : ?>
                        <option value="<?php echo $class['class_code']; ?>">
                            <?php echo $class['class']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                </div>

                <br>

                <div id="radio_div">
                Sort By:
                <input type="radio" id="price" name="sort_selection" value="0" checked="checked">
                <label for="price">Price</label>
                <input type="radio" id="year" name="sort_selection" value="1">
                <label for="year">Year</label>
                </div>
                <br>
                <input type="submit" value="Submit">
                </form>
                    
                <br>

                <?php if(sizeof($vehicles) != 0) { ?>
                <div id="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Year</th>
                                <th>Make</th>
                                <th>Model</th>
                                <th>Type</th>
                                <th>Class</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($vehicles as $vehicle) : ?>
                            <tr>
                                <td><?php echo $vehicle['year']; ?></td>
                                <td><?php echo $vehicle['make']; ?></td>
                                <td><?php echo $vehicle['model']; ?></td>
                                <td><?php echo $vehicle['type']; ?></td>
                                <td><?php echo $vehicle['class']; ?></td>
                                <td>$<?php echo $vehicle['price']; ?>.00</td>
                                <td><div id="centered_button">
                                    <form action="." method="post">
                                        <input type="hidden" name="action" value="delete_vehicle">
                                        <input type="hidden" name="vehicle_id"
                                            value="<?php echo $vehicle['vehicle_id']; ?>">
                                        <input type="submit" value="Remove">
                                    </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php } else { ?>
                    <h2>No vehicles found using selected criteria! Please try another search.</h2>
                <?php } ?>

                <br>

                <a href="index.php?action=show_add_vehicle_form">Click here</a> to add a vehicle.</p><br>
                <a href="index.php?action=edit_types">View/Edit Vehicle Types</a></p><br>
                <a href="index.php?action=edit_classes">View/Edit Vehicle Classes</a></p>
        </section>
    </main>
</div>
<?php include 'view/footer.php'; ?>