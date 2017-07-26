<?php
	$callback = isset($_GET['callback'])?$_GET['callback'] : 'fn1';
	$arr1= array('1111111','22222222222','3333333333','4444444444444','555555555555555');

	$arr2= array('aaaaaaaa','bbbbbbbbb','ccccccccc','dddddddddddddd','eeeeeeeeeeeeeeeee');
	if ($callback == 'fn1') {
		$data = json_encode($arr1);
	}else{
		$data = json_encode($arr2);
	}
echo $callback.'('.$data.');';