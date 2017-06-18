<?php


if(!function_exists('rupiah')):
  function rupiah($number)
  {
     	return number_format($number,0,',','.');
  }
endif;
