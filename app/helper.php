<?php
if (!function_exists('str_NewSlug')) {


	function str_NewSlug($firstname,$lastname,$x=0){

		$slug=str_slug($firstname.$lastname);
		$slug = ($x>0) ? $slug.$x : $slug ;
		$user=\DB::table("users")->where("slug",$slug)->first();
		
        
		if (!empty($user->id)){
          $x=$x+1;
          return str_NewSlug($firstname,$lastname,$x);


		}


		return $slug;





	}


}