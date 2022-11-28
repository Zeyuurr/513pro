<head>
<style>
  .product-info {
    float: left;
    margin-left: 20px;
}

div.product-info ul {
    margin: 10px 0px;
    padding: 0;
}

div.product-info li {
    cursor: pointer;
    list-style-type: none;
    display: inline-block;
    color: #ff6262;
    text-shadow: 0 0 1px #666666;
    font-size: 14px;
}

div.product-info .selected {
    color: #e4a400;
    text-shadow: 0 0 5px #ffb900;
}
.product-title {
    font-size: 1.5em;
}

.product-category {
    margin: 20px 0px;
    font-size: 0.9em;
    color: #c4c4c5;
    text-transform: uppercase;
    border-left: #c4c4c5 3px solid;
    padding: 0px 5px 0px 5px;
    text-transform: uppercase;
}
body{
    background-color:lightblue;
}
</style>
</head>
<?php
include 'DBController.php';
$db_handle = new DBController();
//<div class="product-category"><?php echo $query[0]["category"] ; 
$query = $db_handle->runQuery("SELECT * FROM tblproduct WHERE id = " . $_GET["id"]);
if (! empty($query)) {
        ?>  
            <div class="preview-image">
            <img src="<?php echo $query[0]["image"] ; ?>" />
        </div>
<div class="product-info">
                <div class="product-title"><?php echo $query[0]["name"] ; ?></div>
                <ul>
  <?php
  for($i=1;$i<=5;$i++) {
  $selected = "";
  if(!empty($query[0]["average_rating"]) && $i<=$query[0]["average_rating"]) {
    $selected = "selected";
  }
  ?>
  <li class='<?php echo $selected; ?>'>&#9733;</li>  
  <?php }  ?>
</ul>
<p>1. It has no store/commercial yeast     </p>  
<p>2. Hand kneaded and shaped in-house   </p>  
<p>3. Prepared over 14-17hrs    </p>                
<p>4. Organic flour, the water is filtered and the electricity used to power the oven is solar powered!  </p>  
<p>5. Store bought bread is mixed and baked within 2 hours meaning the gluten content is really high and can lead
to someone feeling clogged up when eating bread. Sourdough is a great alternative and much easier to digest.</p>

<div><?php echo $query[0]["price"] ; ?> USD</div>

            </div>      
<?php
}
?>