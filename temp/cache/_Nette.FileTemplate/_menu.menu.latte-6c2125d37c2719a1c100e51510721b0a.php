<?php //netteCache[01]000380a:2:{s:4:"time";s:21:"0.46790500 1361303538";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:58:"C:\wamp\www\NewWorldProject\app\components\menu\menu.latte";i:2;i:1361303534;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"b7f6732 released on 2013-01-01";}}}?><?php

// source file: C:\wamp\www\NewWorldProject\app\components\menu\menu.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '06rokyqmj2')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block menu
//
if (!function_exists($_l->blocks['menu'][] = '_lb874a7804e5_menu')) { function _lb874a7804e5_menu($_l, $_args) { extract($_args)
?><div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
	<div class="container">
	    <div class="nav-collapse">
		<ul class="nav">
<?php $iterations = 0; foreach ($menuItems as $item): if (is_a($item, "Item")): ?>
			    <li class="<?php echo htmlSpecialChars($item->class) ?>"><a href="<?php echo htmlSpecialChars($_presenter->link("Kodedit:")) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($template->translate(($item->title)), ENT_NOQUOTES) ?></a></li>
<?php else: ?>
			    <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo Nette\Templating\Helpers::escapeHtml($item->title, ENT_NOQUOTES) ?> <b class="caret"></b></a>
				<ul class="dropdown-menu">
<?php $iterations = 0; foreach ($item->items as $dropItem): ?>
					<li><a href="<?php echo htmlSpecialChars($_control->link($dropItem->url)) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($template->translate(($dropItem->title)), ENT_NOQUOTES) ?></a></li>
<?php $iterations++; endforeach ?>
				</ul>
			    </li>
<?php endif ;$iterations++; endforeach ?>
		</ul>
		<ul class="navbar-form pull-right">
		    <li><a href="<?php echo htmlSpecialChars($_presenter->link("this", array('lang'=>'en'))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($template->translate(('English')), ENT_NOQUOTES) ?></a></li>
		    <li><a href="<?php echo htmlSpecialChars($_presenter->link("this", array('lang'=>'cs'))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($template->translate(('Česky')), ENT_NOQUOTES) ?></a></li>
		</ul>
<?php call_user_func(reset($_l->blocks['login']), $_l, get_defined_vars())  ?>
	    </div><!--/.nav-collapse -->
	</div>
    </div>
</div>
<?php call_user_func(reset($_l->blocks['error']), $_l, get_defined_vars())  ?>

<?php
}}

//
// block login
//
if (!function_exists($_l->blocks['login'][] = '_lbc12453953e_login')) { function _lbc12453953e_login($_l, $_args) { extract($_args)
;if ($presenter->user->isLoggedIn()): ?>
			<ul class="nav pull-right">
			    <li><a href="#"><?php echo Nette\Templating\Helpers::escapeHtml($user->getName(), ENT_NOQUOTES) ?></a></li>
			    <li><a href="<?php echo htmlSpecialChars($_presenter->link("userLogout!")) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($template->translate(('logout')), ENT_NOQUOTES) ?></a></li>
			</ul>
<?php else: ?>
			<?php $form->render('begin') ?>
			<?php $form->render('errors') ?>
				<?php echo $form['username']->control ?>
				<?php echo $form['password']->control ?>
				<?php echo $form['submitter']->control ?>
			<?php $form->render('end') ;endif ;
}}

//
// block error
//
if (!function_exists($_l->blocks['error'][] = '_lbf4327c2d48_error')) { function _lbf4327c2d48_error($_l, $_args) { extract($_args)
;$iterations = 0; foreach ($flashes as $flash): ?><div class="alert <?php echo htmlSpecialChars($flash->type) ?> span6 pull-right">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong><?php echo Nette\Templating\Helpers::escapeHtml($template->translate(($flash->message)), ENT_NOQUOTES) ?></strong>
</div>
<?php $iterations++; endforeach ;
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