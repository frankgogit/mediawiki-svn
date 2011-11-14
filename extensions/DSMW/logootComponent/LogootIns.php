<?php
/**
 * Insertion operation used in the logoot algorithm
 *
 * @copyright INRIA-LORIA-ECOO project
 * @author muller jean-philippe
 */
class LogootIns {
    private $mLogootPosition;
    private $mLineContent;

    /**
     *
     * @param <Object> $position LogootPosition
     * @param <String> $content line content
     */
    function  __construct( $position, $content ) {
        $this->setLogootPosition( $position );
        $this->setLineContent( $content );
    }

    public function getLogootPosition() {
        return $this->mLogootPosition;
    }

    public function getLineContent() {
        return $this->mLineContent;
    }

    public function setLogootPosition( $position ) {
        $this->mLogootPosition = $position;
    }

    public function setLineContent( $content ) {
        $this->mLineContent = $content;
    }

    public function execute() {

    }
}
