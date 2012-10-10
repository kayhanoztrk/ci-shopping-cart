<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart </title>
<style>
body {
	  font:13px Arial, Helvetica, sans-serif;
}
#cart {
	  float:right; 
	  margin:50px; 
	  border-radius:5px; 
	  -moz-border-radius:5px; 
	  -webkit-border-radius:5px; 
	  border:5px solid #663;
	  background:#669;
}
table
{
	   border:3px solid gray; 
	   -moz-border-radius:3px; 
	   border-radius:3px; 
	   -webkit-border-radius:3px; 
}

</style>
</head>

<body>

<div id="cart">

<?php foreach($this->cart->contents() as $cart): ?>
<table name="cart">
<tr><th>Name:</th><th>Price:</th><th>Options:</th><th>Value:</th></tr>
<tr><td><?php echo $cart['name'];?></td><td><?php echo $cart['price'];?></td>
<?php if($this->cart->has_options($cart['rowid'])):?>
<?php foreach($this->cart->product_options($cart['rowid']) as $options=>$value):?>
<td><?php echo $options;?></td><td><?php echo $value;?></td>
<?php endforeach;?>
<?php endif;?>
</tr>
<?php echo anchor('shopping/shop/remove/'.$cart['rowid'],'Delete from Cart');?>
</table>

<hr />

<?php endforeach;?>
<?php if($this->cart->total()>0):?>
<?php echo '<h3>Total:'.'  '.$this->cart->total().'$'.'</h3><br/>';?>
<?php echo '<hr />';?>
<?php echo anchor('shopping/shop/delete_all','Delete all of them!');?>
<?php endif;?>

</div>
<div id="product">

<?php 
   foreach($products as $product):?>
  <div id="name"> <?php echo form_open(base_url().'shopping/shop/add'); 
   echo form_label($product->name,
   'id="'.$product->id.'"'
   ); ?></div>
   <div id="image"><?php echo img(array('src'=>'./products/'.$product->image,
   'alt'=>$product->name
   
   ));
   ?> </div>
   <?php if($product->option_name): ?>
  <?php form_label(
  $product->option_name,
  'options_'.$product->id
  ); ?>
  
  <?php  echo form_dropdown(  
    $product->option_name, 
	$product->option_values,
	NULL,
	'id="'.$product->id.'"'
	); 
	?>
    <?php endif;?>
    <?php echo form_hidden('id',$product->id);?>
	<br />
	<?php echo form_submit("Action","Add to Cart");?>
    <?php echo form_close();?>
    <?php endforeach;?>
    
   
   
   
   
   </div>
</body>
</html>