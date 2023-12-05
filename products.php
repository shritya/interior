
<?php
$currentSubcategoryID = 1;
$categoryID = 1;
$query = "SELECT * FROM product_subcategories WHERE category_id = $categoryID AND id > $currentSubcategoryID LIMIT 1";
$result = mysqli_query($con, $query);
if ($result) {
    $nextSubcategory = mysqli_fetch_assoc($result);
    echo $nextSubcategory['name'];
} else {
    echo "Error: " . mysqli_error($con);
}
?>



<form action="processform.php" method="post">
<div class="end">
            <h2>Enter your details and get your Quotation</h2>
            <div class="client-input ">
    <!-- Form fields -->
    <input class="input-style" type="text" name="name"  placeholder="Name" required>
    <input class="input-style" type="text" name="number" placeholder="Number" required>
    <input class="input-style" type="email" name="email" placeholder="E-mail" required>
    <input class="input-style" type="text" name="address" placeholder="Address" required>

    <button class="button" type="submit">Submit</button>
    </div>
    </div>

    <!-- ... (other form fields) -->
    
</form>

                
      