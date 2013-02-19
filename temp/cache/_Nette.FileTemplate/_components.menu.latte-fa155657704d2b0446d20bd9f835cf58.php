<?php //netteCache[01]000385a:2:{s:4:"time";s:21:"0.19366800 1361090193";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:63:"C:\wamp\www\NewWorldProject\app\templates\components\menu.latte";i:2;i:1361090029;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"b7f6732 released on 2013-01-01";}}}?><?php

// source file: C:\wamp\www\NewWorldProject\app\templates\components\menu.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'ovjedxtzc0')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block menu
//
if (!function_exists($_l->blocks['menu'][] = '_lbb746a2d3c7_menu')) { function _lbb746a2d3c7_menu($_l, $_args) { extract($_args)
?><div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
	<div class="nav-collapse">
	    <ul class="nav">
<?php $iterations = 0; foreach ($menuItems as $item): if (is_a($item, "Item")): ?>
			<li class="<?php echo htmlSpecialChars($item::$class) ?>"><a href="<?php echo htmlSpecialChars($_control->link($item::$url)) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($item::$title, ENT_NOQUOTES) ?></a></li>
<?php else: ?>
			<li class="dropdown">
			    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo Nette\Templating\Helpers::escapeHtml($item::$title, ENT_NOQUOTES) ?> <b class="caret"></b></a>
			    <ul class="dropdown-menu">
<?php $iterations = 0; foreach ($item::$items as $dropItem): ?>
				    <li><a href="<?php echo htmlSpecialChars($_control->link($dropItem::$url)) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($dropItem::$title, ENT_NOQUOTES) ?></a></li>
<?php $iterations++; endforeach ?>
			    </ul>
			</li>
<?php endif ;$iterations++; endforeach ?>
	    </ul>
	    <ul class="navbar-form pull-right">
		<li><a href="<?php echo htmlSpecialChars($_control->link("this", array('lang' => 'cs'))) ?>">English</a></li>
		<li><a href="<?php echo htmlSpecialChars($_control->link("Home", array('lang' => 'cs'))) ?>
">Česky</a></li>
	    </ul>
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