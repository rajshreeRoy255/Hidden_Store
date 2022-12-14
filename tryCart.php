<div class="form-outline mb-4 m-auto">
                    <select name="product_brands" class="form-select" id="">
                        <option value=""><?php echo $row['brand_id']?></option>
                        <?php
                        $select_query_brand= "SELECT * FROM brands";
                        $result_query_brand = mysqli_query($con,$select_query_brand);
                        while($row_b = mysqli_fetch_array($result_query_brand)){
                            $brand_title= $row_b['brand_title'];
                            $brand_id= $row_b['brand_id'];
                            echo "<option value='$brand_id'>$brand_title</option>";
                        }
                        ?>
                    </select>
                </div>