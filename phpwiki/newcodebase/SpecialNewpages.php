<?

function wfSpecialNewpages()
{
	global $wgUser, $wgOut, $wgLang, $wgTitle;
	global $limit, $offset; # From query string
	$fname = "wfSpecialNewpages";

	if ( ! $limit ) {
		$limit = $wgUser->getOption( "rclimit" );
		if ( ! $limit ) { $limit = 50; }
	}
	if ( ! $offset ) { $offset = 0; }

	$sql = "SELECT cur_title,cur_timestamp FROM cur WHERE cur_is_new=1 " .
	  "AND cur_namespace=0 AND cur_is_redirect=0 ORDER BY " .
	  "cur_timestamp DESC LIMIT {$offset}, {$limit}";
	$res = wfQuery( $sql, $fname );

	$top = SearchEngine::showingResults( $offset, $limit );
	$wgOut->addHTML( "<p>{$top}\n" );

	$sl = SearchEngine::viewPrevNext( $offset, $limit,
	  "title=Special%3ANewpages" );
	$wgOut->addHTML( "<br>{$sl}\n" );

	$sk = $wgUser->getSkin();
	$s = "<ul>";
	while ( $obj = wfFetchObject( $res ) ) {
		$d = $wgLang->timeanddate( $obj->cur_timestamp );
		$link = $sk->makeKnownLink( $obj->cur_title, "" );
		$s .= "<li>{$d} {$link}</li>\n";
	}
	wfFreeResult( $res );
	$s .= "</ul>";
	$wgOut->addHTML( $s );
	$wgOut->addHTML( "<p>{$sl}\n" );
}

?>
