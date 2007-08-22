<?php

require_once("Attribute.php");
require_once("WikiDataGlobals.php");
require_once("ViewInformation.php");

/**
 *
 * This file models the structure of the OmegaWiki database in a
 * database-independent fashion. To do so, it follows a simplified
 * relational model, consisting of Attribute objects which are hierarchically
 * grouped together using Structure objects. See Attribute.php for details.
 *
 * The actual data is stored in Records, grouped together as RecordSets.
 * See Record.php and RecordSet.php for details.
 *
 * OmegawikiAttributes2.php was running out of date already, so
 * merging here.
 *
 * TODO:
 * - The current model of a ton of hardcoded globals is highly inadequate
 * and should be replaced with a more abstract schema description. 
 *	-replacing with a single associative array.
 * - Attribute names are in WikidataGlobals.php, but should really be 
 * localizable through MediaWiki's wfMsg() function.
 * 	-this is step 2
 * - Records and RecordSets are currently capable of storing most (not all)
 * data, but can't actually commit them to the database again. To achieve
 * proper separation of architectural layers, the Records should learn
 * to talk directly with the DB layer.
 *	-this is what RecordHelpers are for.
 */
function initializeOmegaWikiAttributes(ViewInformation $viewInformation){
	$init_and_discard_this= OmegaWikiAttributes::getInstance($viewInformation); 
}


class OmegaWikiAttributes {

	/** pseudo-Singleton, if viewinformation changes, will construct new instance*/
	static function getInstance(ViewInformation $viewInformation=null) {
		static $instance=array();
		if (!is_null($viewInformation)) {
			if (!array_key_exists($viewInformation->hashCode(), $instance)) {
				$instance["last"] = new OmegaWikiAttributes($viewInformation);
				$instance[$viewInformation->hashCode()] = $instance["last"];
			}
		}		
		return $instance["last"];
	}

	protected $attributes = array();

	function __construct(ViewInformation $viewInformation) {
		$this->hardValues($viewInformation);
	}

	/** Hardcoded schema for now. Later refactor to load from file or DB 
	 * 
	 * Naming: keys are previous name minus -"Attribute"
	 * 	(-"Structure" is retained, -"Attributes" is retained)
	*/
	private function hardValues($viewInformation) {
	
		$t=$this; #<-keep things short to declutter
	
		$t->language = new Attribute("language", wfMsg("Language"), "language");
		$t->spelling = new Attribute("spelling", wfMsg("Spelling"), "spelling");
		$t->text = new Attribute("text", wfMsg("Text"), "text");
		$t->definedMeaningAttributes = new Attribute("defined-meaning-attributes", wfMsg("DefinedMeaningAttributes"), "will-be-specified-below");
		$t->objectAttributes = new Attribute("object-attributes", wfMsg("Annotation"), "will-be-specified-below");
		$t->expressionId = new Attribute("expression-id", "Expression Id", "expression-id");
		$t->identicalMeaning = new Attribute("indentical-meaning", wfMsg("IdenticalMeaning"), "boolean");
		
		if ($viewInformation->filterOnLanguage()) 
			$t->expression = new Attribute("expression", wfMsg("Spelling"), "spelling");
		else {
			$t->expressionStructure = new Structure("expression", $t->language, $t->spelling);
			$t->expression = new Attribute(null, wfMsg("Expression"), $t->expressionStructure);
		}
		
		$t->definedMeaningId = new Attribute("defined-meaning-id", "Defined meaning identifier", "defined-meaning-id");
		$t->definedMeaningDefiningExpression = new Attribute("defined-meaning-defining-expression", "Defined meaning defining expression", "short-text");
		$t->definedMeaningCompleteDefiningExpressionStructure = 
			new Structure("defined-meaning-full-defining-expression",
				  $t->definedMeaningDefiningExpression,
				  $t->expressionId,
				  $t->language
			);
		#try this
		$t->definedMeaningCompleteDefiningExpressionStructure->setStructureType("expression");
		$t->definedMeaningCompleteDefiningExpression=new Attribute(null, "Defining expression", $t->definedMeaningCompleteDefiningExpressionStructure);
		global
			  $definedMeaningReferenceType;
			
		$t->definedMeaningLabel = new Attribute("defined-meaning-label", "Defined meaning label", "short-text");
		$t->definedMeaningReferenceStructure = new Structure("defined-meaning", $t->definedMeaningId, $t->definedMeaningLabel, $t->definedMeaningDefiningExpression);
		$definedMeaningReferenceType = $t->definedMeaningReferenceStructure;
		$t->definedMeaningReference = new Attribute(null, wfMsg("DefinedMeaningReference"), $definedMeaningReferenceType);
		$t->collectionId = new Attribute("collection", "Collection", "collection-id");
		$t->collectionMeaning = new Attribute("collection-meaning", wfMsg("Collection"), $t->definedMeaningReferenceStructure);
		$t->sourceIdentifier = new Attribute("source-identifier", wfMsg("SourceIdentifier"), "short-text");
		$t->gotoSourceStructure = new Structure("goto-source",$t->collectionId, $t->sourceIdentifier);
		$t->gotoSource = new Attribute(null, wfMsg("GotoSource"), $t->gotoSourceStructure); 
		$t->collectionMembershipStructure = new Structure("collection-membership",$t->collectionId, $t->collectionMeaning, $t->sourceIdentifier);
		$t->collectionMembership = new Attribute(null, wfMsg("CollectionMembership"), $t->collectionMembershipStructure);
		$t->classMembershipId = new Attribute("class-membership-id", "Class membership id", "integer");	 
		$t->class = new Attribute("class", "Class", $t->definedMeaningReferenceStructure);
		$t->classMembershipStructure = new Structure("class-membership", $t->classMembershipId, $t->class);
		$t->classMembership = new Attribute(null, wfMsg("ClassMembership"), $t->classMembershipStructure);
		
		global
			 $wgPossiblySynonymousAttributeId;
			 
		$t->possiblySynonymousId = new Attribute("possibly-synonymous-id", "Possibly synonymous id", "integer");	 
		$t->possibleSynonym = new Attribute("possible-synonym", wfMsg("PossibleSynonym"), $t->definedMeaningReferenceStructure);
		# Bug found ... This never worked before: (!)
		#$t->possiblySynonymousStructure = new Structure("possibly-synonymous", $t->possiblySynonymousId, $t->possiblySynonymous);
		$t->possiblySynonymousStructure = new Structure("possibly-synonymous", $t->possiblySynonymousId, $t->possibleSynonym);
		$t->possiblySynonymous = new Attribute(null, wfMsg("PossiblySynonymous"), $t->possiblySynonymousStructure);

		global
			$relationTypeType;
		
		$t->relationId = new Attribute("relation-id", "Relation identifier", "object-id");
		$t->relationType = new Attribute("relation-type", wfMsg("RelationType"), $t->definedMeaningReferenceStructure); 
		$t->otherDefinedMeaning = new Attribute("other-defined-meaning", wfMsg("OtherDefinedMeaning"), $definedMeaningReferenceType);
		
		global
		    $wgRelationsAttributeId, $wgIncomingRelationsAttributeId ;
			
		$t->relationStructure = new Structure("relations", $t->relationId, $t->relationType, $t->otherDefinedMeaning, $t->objectAttributes);
		$t->relations = new Attribute(null, wfMsg("Relations"), $t->relationStructure);
		$t->reciprocalRelations = new Attribute("reciprocal-relations", wfMsg("IncomingRelations"), $t->relationStructure);
		$t->translatedTextId = new Attribute("translated-text-id", "Translated text ID", "integer");	
		$t->translatedTextStructure = new Structure("translated-text", $t->language, $t->text);	
		
		$t->definitionId = new Attribute("definition-id", "Definition identifier", "integer");

		if ($viewInformation->filterOnLanguage() && !$viewInformation->hasMetaDataAttributes())
			$t->alternativeDefinition = new Attribute("alternative-definition", wfMsg("AlternativeDefinition"), "text");
		else
			$t->alternativeDefinition = new Attribute("alternative-definition", wfMsg("AlternativeDefinition"), $t->translatedTextStructure);
		
		$t->source = new Attribute("source-id", wfMsg("Source"), $definedMeaningReferenceType);
		
		global
			$wgAlternativeDefinitionsAttributeId;
			
		$t->alternativeDefinitionsStructure =  new Structure("alternative-definitions", $t->definitionId, $t->alternativeDefinition, $t->source);
			
		$t->alternativeDefinitions = new Attribute(null, wfMsg("AlternativeDefinitions"), $t->alternativeDefinitionsStructure);
		
		global
			$wgSynonymsAndTranslationsAttributeId;
		
		if ($viewInformation->filterOnLanguage())
			$synonymsAndTranslationsCaption = wfMsg("Synonyms");
		else
			$synonymsAndTranslationsCaption = wfMsg("SynonymsAndTranslations");

		$t->attributeObjectId = new Attribute("attributeObjectId", "Attribute object", "object-id");

		$t->syntransId = new Attribute("syntrans-id", "$synonymsAndTranslationsCaption identifier", "integer");
		$t->synonymsTranslationsStructure = new Structure("synonyms-translations", $t->syntransId, $t->expression, $t->identicalMeaning, $t->objectAttributes);
		$t->synonymsAndTranslations = new Attribute(null, "$synonymsAndTranslationsCaption", $t->synonymsTranslationsStructure);
		$t->translatedTextAttributeId = new Attribute("translated-text-attribute-id", "Attribute identifier", "object-id");
		$t->translatedTextAttribute = new Attribute("translated-text-attribute", wfMsg("TranslatedTextAttribute"), $definedMeaningReferenceType);
		$t->translatedTextValueId = new Attribute("translated-text-value-id", "Translated text value identifier", "translated-text-value-id");
		
		if ($viewInformation->filterOnLanguage() && !$viewInformation->hasMetaDataAttributes())
			$t->translatedTextValue = new Attribute("translated-text-value", wfMsg("TranslatedTextAttributeValue"), "text");
		else
			$t->translatedTextValue = new Attribute("translated-text", wfMsg("TranslatedTextAttributeValue"), $t->translatedTextStructure);
		
		$t->translatedTextAttributeValuesStructure = new Structure("translated-text-attribute-values",$t->translatedTextAttributeId, $t->attributeObjectId, $t->translatedTextAttribute, $t->translatedTextValueId, $t->translatedTextValue, $t->objectAttributes);
		$t->translatedTextAttributeValues = new Attribute(null, wfMsg("TranslatedTextAttributeValues"), $t->translatedTextAttributeValuesStructure);
		$t->attributeObject = new Attribute("attribute-object-id", "Attribute object", "object-id");
		$t->textAttributeId = new Attribute("text-attribute-id", "Attribute identifier", "object-id");
		$t->textAttributeObject = new Attribute("text-attribute-object-id", "Attribute object", "object-id");
		$t->textAttribute = new Attribute("text-attribute", wfMsg("TextAttribute"), $t->definedMeaningReferenceStructure);
		$t->textAttributeValuesStructure = new Structure("text-attribute-values", $t->textAttributeId, $t->textAttributeObject, $t->textAttribute, $t->text, $t->objectAttributes);	
		$t->textAttributeValues = new Attribute(null, wfMsg("TextAttributeValues"), $t->textAttributeValuesStructure);
		$t->linkLabel = new Attribute("label", "Label", "short-text"); 
		$t->linkURL = new Attribute("url", "URL", "url");
		$t->link = new Attribute("link", "Link", new Structure($t->linkLabel, $t->linkURL));
		
		$t->linkAttributeId = new Attribute("link-attribute-id", "Attribute identifier", "object-id");
		$t->linkAttributeObject = new Attribute("link-attribute-object-id", "Attribute object", "object-id");
		$t->linkAttribute = new Attribute("link-attribute", wfMsg("LinkAttribute"), $t->definedMeaningReferenceStructure);
		$t->linkAttributeValuesStructure = new Structure("link-attribute-values", $t->linkAttributeId, $t->linkAttributeObject, $t->linkAttribute, $t->link, $t->objectAttributes);	
		$t->linkAttributeValues = new Attribute(null, wfMsg("LinkAttributeValues"), $t->linkAttributeValuesStructure);
		$t->optionAttributeId = new Attribute('option-attribute-id', 'Attribute identifier', 'object-id');
		$t->optionAttributeObject = new Attribute('option-attribute-object-id', 'Attribute object', 'object-id');
		$t->optionAttribute = new Attribute('option-attribute', wfMsg("OptionAttribute"), $definedMeaningReferenceType);
		$t->optionAttributeOption = new Attribute('option-attribute-option', wfMsg("OptionAttributeOption"), $definedMeaningReferenceType);
		$t->optionAttributeValuesStructure = new Structure('option-attribute-values', $t->optionAttributeId, $t->optionAttribute, $t->optionAttributeObject, $t->optionAttributeOption, $t->objectAttributes);
		$t->optionAttributeValues = new Attribute(null, wfMsg("OptionAttributeValues"), $t->optionAttributeValuesStructure);
		$t->optionAttributeOptionId = new Attribute('option-attribute-option-id', 'Option identifier', 'object-id');
		$t->optionAttributeOptionsStructure = new Structure('option-attribute-options', $t->optionAttributeOptionId, $t->optionAttribute, $t->optionAttributeOption, $t->language);
		$t->optionAttributeOptions = new Attribute(null, wfMsg("OptionAttributeOptions"), $t->optionAttributeOptionsStructure);
		
		if ($viewInformation->filterOnLanguage() && !$viewInformation->hasMetaDataAttributes())
			$t->translatedText = new Attribute("translated-text", wfMsg("Text"), "text");	
		else
			$t->translatedText = new Attribute(null, wfMsg("TranslatedText"), $t->translatedTextStructure);
			
		$t->definition = new Attribute(null, wfMsg("Definition"), new Structure("definition", $t->translatedText, $t->objectAttributes));

		global
			$wgClassAttributesAttributeId;
		
		$t->classAttributeId = new Attribute("class-attribute-id", "Class attribute identifier", "object-id");
		$t->classAttributeAttribute = new Attribute("class-attribute-attribute", wfMsg("ClassAttributeAttribute"), $t->definedMeaningReferenceStructure);
		$t->classAttributeLevel = new Attribute("class-attribute-level", wfMsg("ClassAttributeLevel"), $t->definedMeaningReferenceStructure);
		$t->classAttributeType = new Attribute("class-attribute-type", wfMsg("ClassAttributeType"), "short-text");
		$t->classAttributesStructure = new Structure("class-attributes", $t->classAttributeId, $t->classAttributeAttribute, $t->classAttributeLevel, $t->classAttributeType, $t->optionAttributeOptions);
		$t->classAttributes = new Attribute(null, wfMsg("ClassAttributes"), $t->classAttributesStructure);

		$t->definedMeaning = new Attribute(null, wfMsg("DefinedMeaning"), 
			new Structure(
				"defined-meaning",
				$t->definition, 
				$t->classAttributes, 
				$t->alternativeDefinitions, 
				$t->synonymsAndTranslations, 
				$t->relations, 
				$t->reciprocalRelations, 
				$t->classMembership, 
				$t->collectionMembership, 
				$t->definedMeaningAttributes)
		);

		$t->expressionMeaningStructure = new Structure("expression-exact-meanings", $t->definedMeaningId, $t->text, $t->definedMeaning); 	
		$t->expressionExactMeanings = new Attribute(null, wfMsg("ExactMeanings"), $t->expressionMeaningStructure);
		$t->expressionApproximateMeanings = new Attribute("expression-approximate-meanings", wfMsg("ApproximateMeanings"), $t->expressionMeaningStructure);
		# bug found here also: $t->expressionAoproximateMeaning_S_	
		$t->expressionMeaningsStructure = new Structure("expression-meanings", $t->expressionExactMeanings, $t->expressionApproximateMeanings);
		$t->expressionMeanings = new Attribute(null, wfMsg("ExpressionMeanings"), $t->expressionMeaningsStructure);
		$t->expressionsStructure = new Structure("expressions", $t->expressionId, $t->expression, $t->expressionMeanings);
		$t->expressions = new Attribute(null, wfMsg("Expressions"), $t->expressionsStructure);
		$t->objectId = new Attribute("object-id", "Object identifier", "object-id");
		$t->objectAttributesStructure = new Structure("object-attributes", $t->objectId, $t->textAttributeValues, $t->translatedTextAttributeValues, $t->optionAttributeValues);
		$t->objectAttributes->setAttributeType($t->objectAttributesStructure);
		$t->definedMeaningAttributes->setAttributeType($t->objectAttributesStructure);
		
		$t->annotatedAttributes = array(
			$t->definition, 
			$t->synonymsAndTranslations, 
			$t->relations,
			$t->reciprocalRelations
		);
		
		foreach ($viewInformation->getPropertyToColumnFilters() as $propertyToColumnFilter) {
			$attribute = $propertyToColumnFilter->getAttribute();
			$attribute->setAttributeType($t->objectAttributesStructure);
			
			foreach ($t->annotatedAttributes as $annotatedAttribute) 		
				$annotatedAttribute->type->addAttribute($attribute);
		}
	}

	protected function __set($key,$value) {
		$attributes=&$this->attributes;
		$attributes[$key]=$value;
	}
	
	public function __get($key) {
		$attributes=&$this->attributes;
		if (!array_key_exists($key, $attributes)) {
			throw new Exception("Key does not exist: " . $key);
		}
		return $attributes[$key];
	}	
}



