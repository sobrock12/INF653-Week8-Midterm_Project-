<?php include 'view/header.php'; ?>             <!--adds html header file-->
<div id="main_div">
    <main>
        <section>

            <!--form displays three selection lists and two radio buttons. each form element passes selected variable to 
            //get_vehicles_by_criteria function-->
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

            
                <!--table that prints out results of selected vehicles if size of $vehicles array is not zero-->
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
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php } else { ?> <!--if no elements are found in $vehicles array, prints out message-->
                    <h2>No vehicles found using selected criteria! Please try another search.</h2>
                <?php } ?>
        </section>
    </main>
</div>
<?php include 'view/footer.php'; ?>     <!--this is the html footer for the page-->
