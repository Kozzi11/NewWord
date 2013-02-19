<?php
class Item
{
    public $title;
    public $class;
    public $url;   
    
    /**
     * @param string $class
     * @param string $title
     * @param string $url
     */
    public function __construct($class = '', $title = 'New item', $url = '#') {
	
	    $this->class = $class;
	    $this->title = $title;
	    $this->url = $url;
    }
}
