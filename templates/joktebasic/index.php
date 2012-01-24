<?php
/**
 * @package     Jokte.Site
 * @subpackage	joktebasic
 * @copyright   Copyright (C) 2012 - 2014 Open Jokte, Inc. All rights reserved.
 * @license     GNU General Public License version 3 or later; see LICENSE.txt
 */
// No direct access.
defined('_JEXEC') or die;

// check modules
$showRightColumn = ($this->countModules('position-3') or $this->countModules('position-6') or $this->countModules('position-8'));
$showbottom = ($this->countModules('position-9') or $this->countModules('position-10') or $this->countModules('position-11'));
$showleft = ($this->countModules('position-4') or $this->countModules('position-7') or $this->countModules('position-5'));

if ($showRightColumn == 0 and $showleft == 0) {
    $showno = 0;
}

JHtml::_('behavior.framework', true);

$app = JFactory::getApplication();

// get params
$logo       = $this->params->get('logo');
$logourl   = $this->params->get('logourl');
$slogan   = $this->params->get('slogan');
$doc = JFactory::getDocument();
$templateparams = $app->getTemplate(true)->params;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
    <head>
        <jdoc:include type="head" />

        <!--[if lte IE 6]>
        <link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ieonly.css" rel="stylesheet" type="text/css" />

        <![endif]-->
        <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/javascript/hide.js"></script>
        <link type="text/css" rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template.css" />

    </head>

    <body>
        <div id="top">
            <div id="logo"><a href="<?php echo $logourl; ?>"><img src="<?php echo $logo; ?>" title="<?php echo $slogan; ?>" alter="<?php echo $slogan; ?>" /></a></div>
            <div id="tmen"><jdoc:include type="modules" name="topmenu" /></div>
            <div id="micon">
                <a href="index.php?option=com_users&view=login"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/login.png" title="" alter="" /></a>
                <a href="index.php?option=com_users&view=registration"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/register.png" title="" alter="" /></a>
                <a href="index.php?option=com_contact&view=contact&id=1"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/contact.png" title="" alter="" /></a>
            </div>
            <div id="cls"></div>
        </div>
        <div id="mmarquee"><jdoc:include type="modules" name="slidemarquee" /></div>
        <div id="content">
            <jdoc:include type="component" />
        </div>
        <div id="bottom">
            <div id="cpy"><jdoc:include type="modules" name="copyleft" /></div>
            <div id="bmen"><jdoc:include type="modules" name="bottomenu" /></div>
            <div id="snet"><jdoc:include type="modules" name="socialnet" /></div>
            <div id="cls"></div>
        </div>
        <div id="myright">&copy;<?php echo date('Y'); ?> <?php echo $app->getCfg('sitename'); ?></div>
    </body>
</html>