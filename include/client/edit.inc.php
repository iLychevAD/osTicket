<?php

if(!defined('OSTCLIENTINC') || !$thisclient || !$ticket || !$ticket->checkUserAccess($thisclient)) die('Access Denied!');

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title">
                <h1>
                    <?php echo sprintf(__('Editing Ticket #%s'), $ticket->getNumber()); ?>
                </h1>
            </div>
<div style="margin:0px 0px 40px 0px; ">

<form action="tickets.php" method="post">
    <?php echo csrf_token(); ?>
    <input type="hidden" name="a" value="edit"/>
    <input type="hidden" name="id" value="<?php echo Format::htmlchars($_REQUEST['id']); ?>"/>
<table width="100%">
    <tbody id="dynamic-form">
    <?php if ($forms)
        foreach ($forms as $form) {
#            $form->render(false);
            $form->render(['staff' => false]);

    } ?>
    </tbody>
</table>
<hr>
<p>
    <input class="button" type="submit" value="Update"/>
    <input class="button reset" type="reset" value="Reset"/>
    <input class="button cancel" type="button" value="Cancel" onclick="javascript:
        window.location.href='index.php';"/>
</p>
</form>
</div>
</div></div></div>
