<?php
class DropDownItem
{
    public $items = array();
    public $title;
    /**
     * @param Item[] $items
     * @param string $title
     */
    public function __construct($items, $title = 'New DropDown') {
	$this->items = $items;
	$this->title = $title;
    }
    
}
