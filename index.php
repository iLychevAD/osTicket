<?php
/*********************************************************************
    index.php

    Helpdesk landing page. Please customize it to fit your needs.

    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006-2013 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
**********************************************************************/
require('client.inc.php');

require_once INCLUDE_DIR . 'class.page.php';
$section = 'home';
require(CLIENTINC_DIR.'header.inc.php');
?>

<div class="hero">
    <div class="container"><div class="row">
        <div class="col-md-12">
            <div class="hero-content">
                <?php
                if($cfg && ($page = $cfg->getLandingPage()))
                    echo $page->getBodyWithImages();
                else
                    echo  '<h1>'.__('Welcome to the Support Center').'</h1>';
                ?>
            </div>
        </div>
    </div></div>
</div>


<div id="landing_page">

<div class="container"><div class="row">
    <?php
         if ($cfg->getClientRegistrationMode() != 'disabled'
             || !$cfg->isClientLoginRequired()) { ?>
    <div class="col-sm-6">
            <div id="new_ticket">
                <i class="icon-file-text-alt"></i>
                <h3><?php echo __('Open a New Ticket');?></h3>

                <div><?php echo __('Пожалуйста, при заведении заявки укажите как можно более детальную информацию об инциденте. Для внесения изменений в уже заведенный инцидент, войдите в систему.');?></div>
                <p>
                    <a href="open.php" class="green button"><?php echo __('Open a New Ticket');?></a>
                </p>
            </div>
    </div>
 <?php } ?>
    <div class="col-sm-6">
            <div id="check_status">
                <i class="icon-time"></i>
                <h3> <?php echo __('Check Ticket Status');?></h3>

                <div><?php echo __('Мы предоставляем доступ ко всем вашим предыдущим заявкам, включая их статус, а так же информацию о шагах по решению инцидента.');?></div>
                <p>
                    <a href="<?php if(is_object($thisclient)){ echo 'tickets.php';} else {echo 'view.php';}?>" class="blue button"><?php echo __('Check Ticket Status');?></a>
                </p>
            </div>
    </div>

</div></div>
</div>
<?php //include CLIENTINC_DIR.'templates/sidebar.tmpl.php'; ?>

<?php
if ($cfg && $cfg->isKnowledgebaseEnabled()) { ?>

    <div class="kb-home">
        <div class="container"><div class="row">
            <div class="col-md-12">
            <p><?php echo sprintf(
                __('Пожалуйста, убедитесь, что проверили нашу базу знаний %s перед открытием нового инцидента'),
                sprintf('<a href="kb/index.php">%s</a>',
                    __('(FAQs)')
                )); ?>
            </p>
            </div>

            <div class="search-form">
                <form method="get" action="kb/faq.php">
                <input type="hidden" name="a" value="search"/>
                <input type="text" name="q" class="search" placeholder="<?php echo __('Search our knowledge base'); ?>"/>
                <button type="submit" class="green button"><?php echo __('Search'); ?></button>
                </form>
            </div>
        </div></div>
        <span class="ardown">  <i class="icon-caret-down"></i> </span>
    </div>

<?php } ?>

<div class="clear"></div>



<?php require(CLIENTINC_DIR.'footer.inc.php'); ?>
