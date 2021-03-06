<?php
/*
Plugin Name: SEO Comment Paging
Plugin URI: http://www.wihe.net/seo-evitar-contenido-duplicado-comentarios-wordpress/
Description: El objetivo de este plugin es mejorar el posicionamiento de buscadores colocando las etiquetas meta noindex y nofollow en la paginacion de comentarios (disponibles en WordPress 2.7+) evitando de esta manera el duplicado de contenidos, se aplica a todas las paginas individuales de nuestro blog.
Author: William Henostroza
Version: 1.0
Author URI: http://www.wihe.net/
*/

/* Descripci�n:
El objetivo de este plugin es mejorar el posicionamiento de buscadores colocando las etiquetas meta noindex y nofollow en la paginacion de comentarios (disponibles en WordPress 2.7+) evitando de esta manera el duplicado de contenidos, se aplica a todas las paginas individuales de nuestro blog.
 */


/*	Copyright 2009	William Henostroza (contacto: http://www.wihe.net/)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

function prevent_duplicate_comment()
{	global $wp_query;

	if (version_compare( (float) get_bloginfo('version'), 2.7, '>=') ){

		if ($wp_query->is_singular && get_option('page_comments')){ // Si la opci�n de paginaci�n esta habilitada
			if (isset($wp_query->query['cpage'])
				&& absint($wp_query->query['cpage']) >= 1 ){
                echo "\n".'<!-- Start Of Script Generated By SEO Comment Paging (http://www.wihe.net) -->'."\n";
				echo '<meta name="robots" content="noindex,nofollow" />'.PHP_EOL;
				echo '<!-- End Of Script Generated By SEO Comment Paging (http://www.wihe.net) -->'."\n";
                }else{
				echo "\n".'<!-- Start Of Script Generated By SEO Comment Paging (http://www.wihe.net) -->'."\n";
                echo '<meta name="robots" content="index,follow" />'.PHP_EOL;
				echo '<!-- End Of Script Generated By SEO Comment Paging (http://www.wihe.net) -->'."\n";
			}
		}
	}
}

add_action('wp_head','prevent_duplicate_comment');
?>