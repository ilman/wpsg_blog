<?php 

Class SG_FrontAction
{
	public static function content_header(){


		if(!is_home() || !is_front_page()){
			sg_breadcrumbs();
		}


		if(!is_search()){
			if(is_category() || is_tax('continent')){
				$title = '';
				$post_thumb = '';

				$category = get_category(get_query_var('cat'), false);
				if(isset($category->parent) && $category->parent != 0){
					$title .= get_category_parents($category->parent, true,' > ');
				}
				$title .= single_cat_title('', false);


				if(function_exists('z_taxonomy_image_url')){
					$post_thumb = '<img src="'.z_taxonomy_image_url(null, 'post-featured').'" alt="'.single_cat_title('', false).'" />';
				}


				echo '<div class="post-featured">
					<div class="post-block">
						<div class="post-thumb">'.$post_thumb.'</div>
						<div class="post-body">
							<div class="inner">
								<h2 class="post-title">'.$title.'</h2>
								<p>'.category_description($category).'</p>
							</div>
						</div>
					</div>
					<!-- post-block -->
				</div>
				<!-- featured post -->';
			}
		}
	}


	public static function post_only_post_type($query){
	    if(!is_admin() && $query->is_archive() && $query->is_main_query()){
	        $query->set('post_type', 'post' );
	    }
	}
}

add_action('sg_content_header', array('SG_FrontAction', 'content_header'));
add_action('pre_get_posts', array('SG_FrontAction', 'post_only_post_type') );