<?php //netteCache[01]000375a:2:{s:4:"time";s:21:"0.67469300 1360943410";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:53:"C:\wamp\www\NewWorldProject\app\components\menu.latte";i:2;i:1360943408;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"b7f6732 released on 2013-01-01";}}}?><?php

// source file: C:\wamp\www\NewWorldProject\app\components\menu.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '5snvaldx12')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block menu
//
if (!function_exists($_l->blocks['menu'][] = '_lb5ecdd8c878_menu')) { function _lb5ecdd8c878_menu($_l, $_args) { extract($_args)
?><div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
	<div class="nav-collapse">
	    <ul class="nav">
<?php $iterations = 0; foreach ($menuItems as $item): ?>
		<li class="<?php echo htmlSpecialChars($item['class']) ?>"><a href="<?php echo htmlSpecialChars($_control->link($item['url'])) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($item['title'], ENT_NOQUOTES) ?></a></li>
<?php $iterations++; endforeach ?>
		<li class="outer"><a href="#about">About</a></li>
		<li><a href="#contact">Contact</a></li>
		 <li class="dropdown">
	      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
	      <ul class="dropdown-menu">
		<li><a href="#">Action</a></li>
		<li><a href="#">Another action</a></li>
		<li><a href="#">Something else here</a></li>
		<li class="divider"></li>
		<li class="nav-header">Nav header</li>
		<li><a href="#">Separated link</a></li>
		<li><a href="#">One more separated link</a></li>
	      </ul>
	    </li>
	  </ul>
	  <form class="navbar-form pull-right">
	    <input class="span2" type="text" placeholder="Email" />
	    <input class="span2" type="password" placeholder="Password" />
	    <button type="submit" class="btn">Sign in</button>
	  </form>
	</div><!--/.nav-collapse -->
    </div>
</div>
<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['menu']), $_l, get_defined_vars()) ; 