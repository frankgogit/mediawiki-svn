<?php

# Setup and Hooks for the SelectCategory extension, an extension of the
# edit box of MediaWiki to provide an easy way to add category links
# to a specific page.

# @package MediaWiki
# @subpackage Extensions
# @author Leon Weber <leon.weber@leonweber.de> & Manuel Schneider <manuel.schneider@wikimedia.ch>
# @copyright © 2006 by Leon Weber & Manuel Schneider
# @licence GNU General Public Licence 2.0 or later

if( !defined( 'MEDIAWIKI' ) ) {
	echo( "This file is an extension to the MediaWiki software and cannot be used standalone.\n" );
	die();
}

## Entry point for the hook and main worker function for editing the page:
function fnSelectCategoryEditHook( &$m_pageObj, $m_isUpload = false ) {
	global $wgSelectCategoryNamespaces;
	global $wgTitle;

	# Run only if we are in an enabled namespace:
	if ( $wgSelectCategoryNamespaces[ $wgTitle->getNamespace() ] || $m_isUpload ) {
		# Extract all categorylinks from page:
		$m_pageCats = fnSelectCategoryGetPageCategories( $m_pageObj );
		# Get all categories from wiki:
		$m_allCats = fnSelectCategoryGetAllCategories();
		# Get the right member variables, depending on if we're on an upload form or not:
		if( !$m_isUpload ) {
			# Never ever use editFormTextTop here as it resides outside the <form> so we will never get contents
			$m_place = editFormTextAfterWarn;
			$m_textBefore = "";
		} else	{
			$m_place = uploadFormTextAfterSummary;
			$m_textBefore = "\n</td></tr><tr><td align='right'><label for='wpSelectCategory'>Select category:</label></td><td align='left'>";
		}

		# Print the select box:
		$m_pageObj->$m_place .= "<!-- SelectCategory begin -->\n";
		$m_pageObj->$m_place .= "\n$m_textBefore";
		$m_pageObj->$m_place .= "<select id=\"SelectCategoryBox\" size=\"10\" name=\"SelectCategoryList[]\" multiple=\"multiple\">\n";
		# Populate box with categories:
		foreach( $m_allCats as $m_cat => $m_prefix ) {
			# Check if the category is in the list of category links on the page then select the entry:
			if ( $m_pageCats[ $m_cat ] ) $m_selected = 'selected="selected"';
			else $m_selected = '';
			# Print the entry:
			$m_pageObj->$m_place .= "\t<option $m_selected value=\"". htmlspecialchars( $m_cat ) . "\">";
			for ( $m_i = 0; $m_i < $m_prefix; $m_i++ ) $m_pageObj->$m_place .= '&nbsp;';
			$m_pageObj->$m_place .= htmlspecialchars( $m_cat );
			$m_pageObj->$m_place .= "</option>\n";
		}
		# Close select box:
		$m_pageObj->$m_place .= "</select>\n";
		$m_pageObj->$m_place .= "<!-- SelectCategory end -->\n";

	}	
	# Return true to let the rest work:
	return true;
}

## Entry point for the hook and main worker function for saving the page:
function fnSelectCategorySaveHook( &$article, &$user, &$m_text, &$summary, $minor, $watch, $sectionanchor, &$flags ) {
	global $wgContLang;
	
	# Get localised namespace string:
	$m_catString = $wgContLang->getNsText( NS_CATEGORY );
	# Get some distance from the rest of the content:
	$m_text .= "\n";
	# Iterate through all selected category entries:
	foreach( $_POST['SelectCategoryList'] as $m_cat ) {
		$m_text .= "\n[[$m_catString:$m_cat]]";
	}

	# Return to the let MediaWiki do the rest of the work:
	return true;
}

function fnSelectCategoryUplSaveHook( &$obj )
{
	global $wgContLang;
	
	# Get localised namespace string:
	$m_catString = $wgContLang->getNsText( NS_CATEGORY );
	# Get some distance from the rest of the content:
	$m_text .= "\n";
	foreach( $_POST['SelectCategoryList'] as $m_cat ) {
		$m_text .= "\n[[$m_catString:$m_cat]]";
	}
	$obj->mUploadDescription .= $m_text;
	# Return to the let MediaWiki do the rest of the work:
	return true;
}

## Entry point for the hook for printing the CSS:
function fnSelectCategoryOutputHook( &$m_pageObj, &$m_parserOutput ) {
	global $wgScriptPath;

	# Register CSS file for our select box:
	$m_pageObj->addLink(
		array(
			'rel'	=> 'stylesheet',
			'type'	=> 'text/css',
			'href'	=> $wgScriptPath . '/extensions/SelectCategory/SelectCategory.css'
		)
	);
}

## Entry point for the hook for our localised messages:
function SelectCategoryMessageHook() {
}

function msg( $msg /*, ...*/ ) {
	static $initialized = false;
	global $wgMessageCache;

	if ( !$initialized ) {
                        $wgMessageCache->addMessages( self::loadMessages() );
                        $initialized = true;
                }
                if ( $msg === false ) {
                        return null;
                }
                $args = func_get_args();
                $msg = array_shift( $args );
                if ( $msg == '' ) {
                        return wfMsgReal( $msg, $args );
                } else {
                        return wfMsgReal( "categorytree-$msg", $args );
                }
}

## Get all categories from the wiki - starting with a given root or otherwise detect root automagically (expensive):
function fnSelectCategoryGetAllCategories() {
	global $wgSelectCategoryRoot;

	if( $wgSelectCategoryRoot ) {
		# Include root and step into the recursion:
		$m_allCats = array_merge( array( $wgSelectCategoryRoot => 0 ), fnSelectCategoryGetChildren( $wgSelectCategoryRoot ) );
	} else {
		# Initialize return value:
		$m_allCats = array();

		# Get a database object:
		$m_dbObj =& wfGetDB( DB_SLAVE );
		# Get table names to access them in SQL query:
		$m_tblCatLink = $m_dbObj->tableName( 'categorylinks' );
		$m_tblPage = $m_dbObj->tableName( 'page' );
	
		# Automagically detect root categories:
		$m_sql = "	SELECT tmpSelectCat1.cl_to AS title
				FROM $m_tblCatLink AS tmpSelectCat1 
				LEFT JOIN $m_tblPage AS tmpSelectCatPage ON tmpSelectCat1.cl_to = tmpSelectCatPage.page_title 
				LEFT JOIN $m_tblCatLink AS tmpSelectCat2 ON tmpSelectCatPage.page_id = tmpSelectCat2.cl_from 
				WHERE tmpSelectCat2.cl_from IS NULL GROUP BY tmpSelectCat1.cl_to";
		# Run the query:
		$m_res = $m_dbObj->query( $m_sql, __METHOD__ );
		# Process the resulting rows:
		while ( $m_row = $m_dbObj->fetchRow( $m_res ) ) {
			# Attach the entry to our array:
			$m_allCats = array_merge( $m_allCats, array( $m_row['title'] => 0 ) );
			$m_allCats = array_merge( $m_allCats, fnSelectCategoryGetChildren( $m_row['title'] ) );
		}	
		# Free result:
		$m_dbObj->freeResult( $m_res );
	}
	
	# Afterwards return the array to the caller:
	return $m_allCats;
}

function fnSelectCategoryGetChildren( $m_root, $m_prefix = 1 ) {
	# Initialize return value:
	$m_allCats = array();
	
	# Get a database object:
	$m_dbObj =& wfGetDB( DB_SLAVE );
	# Get table names to access them in SQL query:
	$m_tblCatLink = $m_dbObj->tableName( 'categorylinks' );
	$m_tblPage = $m_dbObj->tableName( 'page' );
	
	# The normal query to get all children of a given root category:
	$m_sql = "	SELECT tmpSelectCatPage.page_title AS title
			FROM $m_tblCatLink AS tmpSelectCat 
			LEFT JOIN $m_tblPage AS tmpSelectCatPage ON tmpSelectCat.cl_from = tmpSelectCatPage.page_id 
			WHERE tmpSelectCat.cl_to LIKE '$m_root' AND tmpSelectCatPage.page_namespace = 14";
	# Run the query:
	$m_res = $m_dbObj->query( $m_sql, __METHOD__ );
	# Process the resulting rows:
	while ( $m_row = $m_dbObj->fetchRow( $m_res ) ) {
		# Add current entry to array:
		$m_allCats = array_merge( array( $m_row['title'] => $m_prefix ), fnSelectCategoryGetChildren( $m_row['title'], ++$m_prefix ) );
	}	
	# Free result:
	$m_dbObj->freeResult( $m_res );
	
	# Afterwards return the array to the upper recursion level:
	return $m_allCats;
}

## Returns an array with the categories the articles is in.
## Also removes them from the text the user views in the editbox.
function fnSelectCategoryGetPageCategories( $m_pageObj ) {
	global $wgContLang;
	
	# Get page contents:
	$m_pageText = $m_pageObj->textbox1;
	# Get localised namespace string:
	$m_catString = strtolower( $wgContLang->getNsText( NS_CATEGORY ) );
	# The regular expression to find the category links:
	$m_pattern = "\[\[({$m_catString}|category):(.*)\]\]";
	$m_replace = "$2";
	# The container to store all found category links:
	$m_catLinks = array ();
	# The container to store the processed text:
	$m_cleanText = '';

	# Check linewise for category links:
	foreach( explode( "\n", $m_pageText ) as $m_textLine ) {
		# Filter line through pattern and store the result:
                $m_cleanText .= trim( preg_replace( "/{$m_pattern}/i", "", $m_textLine ) ) . "\n";
		# Check if we have found a category, else proceed with next line:
                if( !preg_match( "/{$m_pattern}/i", $m_textLine) ) continue;
		# Get the category link from the original text and store it in our list:
		$m_catLinks[ preg_replace( "/.*{$m_pattern}/i", $m_replace, $m_textLine ) ] = true;
	}
	# Place the cleaned text into the text box:
	$m_pageObj->textbox1 = trim( $m_cleanText );
	
	# Return the list of categories as an array without dupes:
	return $m_catLinks;
}

# Pseudo function. Passes all the work to fnSelectCategoryEditHook(), 
# but tells it we're on the upload page.
function fnSelectCategoryUploadHook( &$upload_obj )
{
	return fnSelectCategoryEditHook( &$upload_obj, true );
}

?>