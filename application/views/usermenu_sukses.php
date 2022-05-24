<html>
<head>
<title>Save Succeed</title>
</head>
<body>
 
<center><h1>Berhasil Simpan</h1></center>
 
<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>
 
</body>
</html>