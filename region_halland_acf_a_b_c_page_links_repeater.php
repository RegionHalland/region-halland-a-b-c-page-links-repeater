<?php

	/**
	 * @package Region Halland ACF A-B-C Page Links Repeater
	 */
	/*
	Plugin Name: Region Halland ACF A-B-C Page Links Repeater
	Description: ACF-fält för extra fält nederst på en utbildning-sida
	Version: 1.0.1
	Author: Roland Hydén
	License: MIT
	Text Domain: regionhalland
	*/

	// Anropa function om ACF är installerad
	add_action('acf/init', 'my_acf_add_abc_page_links_repeater_field_groups');

	// Function för att lägga till "field groups"
	function my_acf_add_abc_page_links_repeater_field_groups() {

		// Om funktionen existerar
		if (function_exists('acf_add_local_field_group')):

			// Skapa formlärfält
			acf_add_local_field_group(array(
			    
			    'key' => 'group_1000121',
			    'title' => 'ABC-länkar',
			    'fields' => array(
			        0 => array(
			            'key' => 'field_1000122',
			            'label' => __('Länk-lista', 'halland'),
			            'name' => 'name_1000123',
			            'type' => 'repeater',
			            'instructions' => __('Klicka på "Lägg till rad" för att lägga till en ny länk.', 'halland'),
			            'required' => 0,
			            'conditional_logic' => 0,
			            'wrapper' => array(
			                'width' => '',
			                'class' => '',
			                'id' => '',
			            ),
			            'collapsed' => '',
			            'min' => 0,
			            'max' => 100,
			            'layout' => 'row',
			            'button_label' => '',
			            'sub_fields' => array(
				          0 => array(
				              'key' => 'field_1000124',
		            		  'label' => __('Länk', 'regionhalland'),
		            		  'name' => 'name_1000125',
		            		  'type' => 'link',
		            		  'instructions' => __('Länk för abc-lista.', 'regionhalland'),
		            		  'required' => 0,
		            		  'conditional_logic' => 0,
		            		  'wrapper' => array(
		                		'width' => '',
		                		'class' => '',
		                		'id' => '',
		            		  ),
		            		  'return_format' => 'array',
		        		  ),
			            ),
		        ),
			    ),
			    'location' => array(
			        0 => array(
			            0 => array(
			                'param' => 'page_template',
			                'operator' => '==',
			                'value' => 'views/template-abc-lista.blade.php',
			            ),
			        ),
			    ),
			    'menu_order' => 3,
			    'position' => 'normal',
			    'style' => 'default',
			    'label_placement' => 'top',
			    'instruction_placement' => 'label',
			    'hide_on_screen' => '',
			    'active' => 1,
			    'description' => '',
			));

		endif;

	}

	function get_region_halland_acf_abc_page_links() {

		// Hämta alla länkar
		$myLinkFields = get_field('name_1000123');

		// Temporär array för alla länkar
		$myLinks = array();
		
		// Loopa igenom alla länkar
		foreach ($myLinkFields as $field) {
			
			// Länk-arrayen för respektive länk
			$arrLinks = $field['name_1000125'];

			// Variabler
			$strLinkTitle  = $arrLinks['title'];
			$strLinkUrl    = $arrLinks['url'];
			$strLinkTarget = $arrLinks['target'];
			$strFirstLetter = strtoupper(mb_substr($strLinkTitle, 0, 1));
			switch ($strFirstLetter) {
			     case 'Å':
			         $intFirstLetter = 27;
			         break;
			     case 'Ä':
			         $intFirstLetter = 28;
			         break;
			     case 'Ö':
			         $intFirstLetter = 29;
			         break;
			     default:
					$intFirstLetter = ord(strtolower($strFirstLetter)) - 96;
			 } 

			// Pusha alla variabler till temporär array
			array_push($myLinks, array(
	           'first_letter'  => $strFirstLetter,
	           'first_letter_number'  => $intFirstLetter,
	           'link_title'  => $strLinkTitle,
	           'link_url'    => $strLinkUrl,
	           'link_target' => $strLinkTarget
	        ));

		}
		
		// Sortera om arrayen baserat på 'title'
		// var_dumpar man $mySortedLinks så returnefrar denna 1 om sorteringen har gått bra
		$mySortedLinks = usort($myLinks, 'region_halland_acf_abc_page_links_repeater_sort_by_link_title');
		
		// Temporär array för alla sorterade länkar
		$myPreparedLinks = array();
		
		// Temporär array för alla sorterade länkar
		$myPreparedLetters = array();
		
		// Variabel för sista bokstav i loopen, börja med tomt
		$lastLetter = "";

		// Loopa igenom alla sorterade länkar
		foreach ($myLinks as $links) {

			// Variabler
			$strLinkTitle   = $links['link_title'];
			$strLinkUrl     = $links['link_url'];
			$strLinkTarget  = $links['link_target'];
			$strCheckLetter = strtolower(mb_substr($strLinkTitle, 0, 1));
			
			// Kolla om det är en ny bokstav, sätt till 0 och tomt annars
			if ($lastLetter <> $strCheckLetter) {
				
				$intAnchorLink = 1;
				$strLetter     = $strCheckLetter;
				$strLetterU    = strtoupper($strLetter);
				
				// Pusha till temporär letter array
				array_push($myPreparedLetters, array(
		           'start_letter'   => $strLetter,
		           'start_letter_u' => $strLetterU
		        ));
			
			} else {
				
				$intAnchorLink = 0;
				$strLetter     = "";
				$strLetterU    = "";
			
			}

			// Pusha till temporär sorterad array
			array_push($myPreparedLinks, array(
	           'link_title'      => $strLinkTitle,
	           'link_url'        => $strLinkUrl,
	           'link_target'     => $strLinkTarget,
	           'start_letter'    => $strLetter,
		       'start_letter_u'  => $strLetterU,
	           'has_anchor_link' => $intAnchorLink
	        ));

	        // Uppdatera variabel för sista bokstav i loopen
			$lastLetter = $strLetter;
		}
		
		$myPreparedAllLetters = array();
		$strAllLetters = "a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,x,y,z,Å,Ä,Ö";
		$arrAllLetters = explode(",",$strAllLetters);
		foreach ($arrAllLetters as $letter) {
			$strLetterU 	= strtoupper($letter);
			$checkLetter 	= array_search($letter, array_column($myPreparedLetters, 'start_letter'));
			if (is_numeric($checkLetter)) {
				$hasContent = 1;
			} else {
				$hasContent = 0;
			}
			array_push($myPreparedAllLetters, array(
	           'start_letter'   => $letter,
	           'start_letter_u' => $strLetterU,
	           'has_content'    => $hasContent
	        ));
		}

		$myMultiPreparedLinks = array();
		$myMultiPreparedLinks['content']    = $myPreparedLinks;
		$myMultiPreparedLinks['letters']    = $myPreparedLetters;
		$myMultiPreparedLinks['allLetters'] = $myPreparedAllLetters;
		
		// Returnera remporär array för sorterade länkar
		return $myMultiPreparedLinks;

	}
	
	// Funktion för att sortera en array baserat på kolumn, i detta fall kolumnen 'title'
	function region_halland_acf_abc_page_links_repeater_sort_by_link_title($a, $b) {
  		return region_halland_acf_abc_page_links_repeater_intcmp($a["first_letter_number"], $b["first_letter_number"]);
	}

	function region_halland_acf_abc_page_links_repeater_intcmp($a,$b)
    {
    	return ($a-$b) ? ($a-$b)/abs($a-$b) : 0;
    }

	// Metod som anropas när pluginen aktiveras
	function region_halland_acf_abc_page_links_repeater_activate() {
		// Ingenting just nu...
	}

	// Metod som anropas när pluginen avaktiveras
	function region_halland_acf_abc_page_links_repeater_deactivate() {
		// Ingenting just nu...
	}
	
	// Vilken metod som ska anropas när pluginen aktiveras
	register_activation_hook( __FILE__, 'region_halland_acf_abc_page_links_repeater_activate');

	// Vilken metod som ska anropas när pluginen avaktiveras
	register_deactivation_hook( __FILE__, 'region_halland_acf_abc_page_links_repeater_deactivate');

?>