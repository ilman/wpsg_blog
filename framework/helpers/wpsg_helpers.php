<?php 

use Scienceguard\SG_Util;

function sg_val($array, $key=null, $default=null){
	return SG_Util::val($array, $key, $default);
}

/*wrapper to get theme option*/
function sg_opt($param=null, $default=null){	
	if(SG_THEME_OPTIONS){
		return sg_val(SG_THEME_OPTIONS, $param, $default);
	}
	else{		
		return sg_val(null, $param, $default);
	}
}


function sg_view_path($path){
	if(file_exists($path)){ return $path; }

	$base = rtrim(TEMPLATEPATH, '/');
	$path = trim($path, '/');

	if(file_exists($base.'/front/'.$path)){
		$path = $base.'/front/'.$path;
	}
	else{
		$path = $base.'/'.$path;
	}

	return $path;
}


function sg_asset_url($path){
	$path = trim($path, '/');
	return get_template_directory_uri().'/'.$path;
}


function sg_get_template_part( $slug, $name = null ) {
	if($name){
		$file = $slug.'-'.$name;
	}
	else{
		$file = $slug;
	}

	include sg_view_path($file.'.php');
}


function sg_include_path($path, $file_type='php'){

	$glob = glob(rtrim(TEMPLATEPATH, '/')."/$path/*.$file_type");
	if(!is_array($glob)){
		return false;
	}
		
	foreach ($glob as $filename){
		include_once($filename);
	}
}