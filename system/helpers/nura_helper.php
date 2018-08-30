<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function nura_enc($kata){
	$dasar	= ["a","e","i","o","u","b","c","d","f","g","h","j","k","l","m","n","p","q","r","s","t","v","w","x","y","z","A","E","I","O","U","B","C","D","F","G","H","J","K","L","M","N","P","Q","R","S","T","V","W","X","Y","Z","5","6","7","4","3","8","9","2","1","0"];
	$encdas	= ["Z","x","a","S","Q","w","e","R","F","M","L","O","2","3","4","5","d","c","V","b","i","k","J","m","l","o","p","z","X","A","s","q","W","E","r","f","D","C","v","B","n","H","g","j","6","7","8","9","0","N","h","G","t","y","U","T","Y","u","I","K","P","1"];
	
	$pandas	= sizeof($dasar);	$pankat	= strlen($kata);
	
	for ($i=0;$i<$pankat;$i++){
		for ($j=0;$j<$pandas;$j++){
			if ($kata[$i]==$dasar[$j]){
				$kata[$i]=$encdas[$j];
				break;
			}
		}
	}
	return base64_encode(base64_encode($kata));
}
function nura_des($kata){
	$dasar	= ["a","e","i","o","u","b","c","d","f","g","h","j","k","l","m","n","p","q","r","s","t","v","w","x","y","z","A","E","I","O","U","B","C","D","F","G","H","J","K","L","M","N","P","Q","R","S","T","V","W","X","Y","Z","5","6","7","4","3","8","9","2","1","0"];
	$encdas	= ["Z","x","a","S","Q","w","e","R","F","M","L","O","2","3","4","5","d","c","V","b","i","k","J","m","l","o","p","z","X","A","s","q","W","E","r","f","D","C","v","B","n","H","g","j","6","7","8","9","0","N","h","G","t","y","U","T","Y","u","I","K","P","1"];
	
	$kata=base64_decode(base64_decode($kata));
	$pandas	= sizeof($dasar);	$pankat	= strlen($kata);
	
	for ($i=0;$i<$pankat;$i++){
		for ($j=0;$j<$pandas;$j++){
			if ($kata[$i]==$encdas[$j]){
				$kata[$i]=$dasar[$j];
				break;
			}
		}
	}
	return $kata;
}
?>