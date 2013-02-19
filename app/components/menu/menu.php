<?php
namespace NewWorld;
use Nette\Application\UI\Control;
use Nette;

class Menu extends Control
{
    private $menuItems = array();
    private $textBoxs = array();
    private $buttons =  array();
    
    public $translator;
  
    public $flasmessage;

    /**
     * @param \Item|Item[] $items
     * @throws Nette\InvalidArgumentException
     */
    
    public function addItems($items)
    {
	if(is_array($items)){
	    foreach ($items as $item) {
		if(!is_a($item, "Item")){
		    throw new \Nette\InvalidArgumentException;
		}
		$this->menuItems[] = $item;
	    }
	}
	else {
	    if(!is_a($items, "Item")){
		    throw new \Nette\InvalidArgumentException;
		}
	    $this->menuItems[] = $items;
	}
	
    }
    
    public function addDropDownItem(\DropDownItem $dropItem)
    {
	$this->menuItems[] = $dropItem;
    }

    /**
     * @param string $class 'span1 ... span12'
     * @param string $type  'text|password'
     * @param string $placeHolder 'Email ...'
     */
    public function addTextBox($class, $type, $placeHolder)
    {
	$this->textBoxs[] = array('class'      => $class,
			          'type'       => $type,
			          'placeHolder'=> $placeHolder);
    }
    
    /**
     * @param string $class
     * @param string $type
     * @param string $title
     */
    public function addButton($type, $title)
    {
	$this->buttons = array( 'type' => $type,
				'title'=> $title );
    }
    
    protected function createComponentLoginForm()
    {
        $form = new Nette\Application\UI\Form;
        $form->addText('username', null)->setAttribute('class','span2')
					->setAttribute('placeholder','Email');
	
        $form->addPassword('password')->setAttribute('class','span2')
			      ->setAttribute('placeholder','Password');
	
        $form->addSubmit('submitter', 'Přihlásit')->setAttribute('class','btn')
						  ->setAttribute('style','min-width: 80px');
	$form->getElementPrototype()->class = 'navbar-form pull-right';
	$form->onSuccess[] = callback($this, 'loginForm_submit');
	$form->setTranslator($this->translator);

        return $form;
    }
    
    public function loginForm_submit(Nette\Application\UI\Form $form)
    {
        try {
            //pokusíme se přihlásit uživatele
             $this->presenter->user->login(
                $form['username']->getValue(),
                $form['password']->getValue()
            );
            $this->flashMessage('login.succes', 'alert-success');
	    $this->redirect('this');
        } catch (Nette\Security\AuthenticationException $e) {
            //pokud došlo při přihlašování k chybě, zobrazíme chybovou hlášku
            $this->flashMessage($e->getMessage(),'alert-error');
        }
    }

    public function render()
    {
	$template = $this->template;
	$template->menuItems = $this->menuItems;
	$template->textBoxs = $this->textBoxs;
	$template->form = $this['loginForm'];
	$template->user = $this->presenter->user;
	
	$template->setFile(__DIR__ .'/menu.latte');
	$template->setTranslator($this->translator);
	
	$template->render();
    }
}