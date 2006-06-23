<?php

require_once('languages.php');
require_once('forms.php');
require_once('attribute.php');
require_once('tuple.php');

function booleanAsText($value) {
	if ($value)
		return "Yes";
	else
		return "No";		
}

function booleanAsHTML($value) {
	if ($value)
		return '<input type="checkbox" checked="checked" disabled="disabled"/>';
	else
		return '<input type="checkbox" disabled="disabled"/>';
}

function spellingAsLink($value) {
	global
		$wgUser;
		
	return $wgUser->getSkin()->makeLink("WiktionaryZ:$value", htmlspecialchars($value));
} 

function languageIdAsText($languageId) {
	global
		$wgLanguageNames;	

	return $wgLanguageNames[$languageId];
}

function definingExpression($definedMeaningId) {
	$dbr =& wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query("SELECT spelling from uw_defined_meaning, uw_expression_ns where uw_defined_meaning.defined_meaning_id=$definedMeaningId and uw_expression_ns.expression_id=uw_defined_meaning.expression_id and uw_defined_meaning.is_latest_ver=1 and uw_expression_ns.is_latest=1");
	
	while ($spelling = $dbr->fetchObject($queryResult))
		$result = $spelling->spelling; 
		
	return $result;
}

function definedMeaningExpression($definedMeaningId) {
	$dbr =& wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query("SELECT spelling from uw_syntrans, uw_expression_ns where defined_meaning_id=$definedMeaningId and uw_expression_ns.expression_id=uw_syntrans.expression_id and uw_expression_ns.language_id=85 limit 1");
	$expression = $dbr->fetchObject($queryResult);
	
	return $expression->spelling;
}

function getTextValue($textId) {
	$dbr =& wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query("SELECT old_text from text where old_id=$textId");

	return $dbr->fetchObject($queryResult)->old_text; 
}

function getCollectionMeaningId($collectionId) {
	$dbr =& wfGetDB(DB_SLAVE);
	$queryResult = $dbr->query("SELECT collection_mid FROM uw_collection_ns WHERE collection_id=$collectionId AND is_latest=1");
	
	return $dbr->fetchObject($queryResult)->collection_mid;	
}

function definingExpressionAsLink($definedMeaningId) {
	return spellingAsLink(definingExpression($definedMeaningId));
}

function definedMeaningAsLink($definedMeaningId) {
	return spellingAsLink(definedMeaningExpression($definedMeaningId));
}

function collectionAsLink($collectionId) {
	return definedMeaningAsLink(getCollectionMeaningId($collectionId));
}

function convertToHTML($value, $type) {
	switch($type) {
		case "boolean": return booleanAsHTML($value);
		case "spelling": return spellingAsLink($value);
		case "collection": return collectionAsLink($value);
		case "defined-meaning": return definedMeaningAsLink($value);
		case "defining-expression": return definingExpressionAsLink($value);
		case "relation-type": return definedMeaningAsLink($value);
		case "attribute": return definedMeaningAsLink($value);
		case "language": return languageIdAsText($value);
		case "short-text":
		case "text": return htmlspecialchars($value);
		default: return htmlspecialchars($value);
	}
}

function getInputFieldsForAttribute($namePrefix, $attribute, $value) {
	switch($attribute->type) {
		case "language": return array(getLanguageSelect($namePrefix . $attribute->id));
		case "spelling": return array(getTextBox($namePrefix . $attribute->id, $value));
		case "boolean": return array(getCheckBox($namePrefix . $attribute->id, $value));
		case "expression": return array(getLanguageSelect($namePrefix . "language"), getTextBox($namePrefix . "spelling", $value));
		case "defined-meaning":
		case "defining-expression":
			return array(getSuggest($namePrefix . $attribute->id, "defined-meaning"));
		case "relation-type": return array(getSuggest($namePrefix . $attribute->id, "relation-type"));
		case "attribute": return array(getSuggest($namePrefix . $attribute->id, "attribute"));
		case "collection": return array(getSuggest($namePrefix . $attribute->id, "collection"));
		case "short-text": return array(getTextBox($namePrefix . $attribute->id, $value));
		case "text": return array(getTextArea($namePrefix . $attribute->id, $value));
		default: return array();
	}	
}

function getAttributeTuple($attribute, $value) {
	$result = new ArrayTuple(new Heading(array($attribute)));
	$result->setAttributeValue($attribute, $value);
	
	return $result;
}

function getExpressionTuple($language, $spelling) {
	global
		$languageAttribute, $spellingAttribute;
	
	$result = new ArrayTuple(new Heading(array($languageAttribute, $spellingAttribute)));
	$result->setAttributeValue($languageAttribute, $language);
	$result->setAttributeValue($spellingAttribute, $spelling);
	
	return $result;
}

function getFieldValuesForAttribute($namePrefix, $attribute, $namePostFix) {
	global
		$wgRequest;
		
	$attributeId = $namePrefix . $attribute->id . $namePostFix;
		
	switch($attribute->type) {
		case "language": return getAttributeTuple($attribute, $wgRequest->getInt($attributeId));
		case "spelling": return getAttributeTuple($attribute, trim($wgRequest->getText($attributeId)));
		case "boolean": return getAttributeTuple($attribute, $wgRequest->getCheck($attributeId));
		case "expression": return getExpressionTuple($wgRequest->getInt($namePrefix . "language" . $namePostFix), trim($wgRequest->getText($namePrefix . "spelling" . $namePostFix)));
		case "defined-meaning": 
		case "defining-expression":
			return getAttributeTuple($attribute, $wgRequest->getInt($attributeId));
		case "relation-type": return getAttributeTuple($attribute, $wgRequest->getInt($attributeId));
		case "attribute": return getAttributeTuple($attribute, $wgRequest->getInt($attributeId));
		case "collection": return getAttributeTuple($attribute, $wgRequest->getInt($attributeId));
		case "short-text":
		case "text": return getAttributeTuple($attribute, trim($wgRequest->getText($attributeId)));
	}
}


?>
