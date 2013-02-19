<?php
class HomepagePresenter extends BasePresenter
{
    private $user;
    
    protected function startup() {
	parent::startup();
	$this->user = $this->context->user;
    }

    public function renderDefault()
    {
    }
      
}
