<?php
$media_file = 'example.swf';
?>
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" width="468" height="60" id="mymoviename"> 
<param name="movie"  value="<?php echo $media_file;?>" /> 
<param name="quality" value="high" /> 
<param name="bgcolor" value="#ffffff" /> 
<embed src="<?php echo $media_file;?>" quality="high" bgcolor="#ffffff" width="468" height="60" name="mymoviename" align="" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"> 
</embed> 
</object> 