<?php
use NewWorld\Menu;
/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
    /** @persistent */
public $lang = "cs";

/** @var NetteTranslator\Gettext */
protected $translator;

/**
 * Inject translator
 * @param NetteTranslator\Gettext
 */
public function injectTranslator(NetteTranslator\Gettext $translator)
{
	$this->translator = $translator;
}


public function createTemplate($class = NULL)
{
	$template = parent::createTemplate($class);

	// pokud není nastaven, použijeme defaultní z configu
	if (!isset($this->lang)) {
	    $this->lang = $this->context->parameters["lang"];
	}

	$this->translator->setLang($this->lang); // nastavíme jazyk
	$template->setTranslator($this->translator);

	return $template;
}

protected function createComponentMenu()
{  
	$Menu = new Menu();
	$Menu->translator = $this->translator;

	$items[] = new Item('','kod.Edit','Kodedit');
	$items[] = new Item();
	$items[] = new Item();

	$Menu->addItems($items);

	$dropItem = new DropDownItem($items);
	$Menu->addDropDownItem($dropItem);

	$Menu->addTextBox('span2', 'text', 'pokus');

	return $Menu;
}

public function handleUserLogout()
{
	$this->user->logout();
}
}
