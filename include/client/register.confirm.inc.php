<div class="container">
    <div class="row">
        <div class="col-md-12">
<?php if ($content) {
    list($title, $body) = $ost->replaceTemplateVariables(
        array($content->getName(), $content->getBody())); ?>
        <div class="page-title">
<h1><?php echo Format::display($title); ?></h1>
</div>
<div style="margin:0px 15px 40px 15px;">
<p><?php
echo Format::display($body); ?>
</p>
</div>
<?php } else { ?>
        <div class="page-title">
<h1><?php echo __('Account Registration'); ?></h1>
</div>
<div style="margin:0px 15px 40px 15px;">
<p>
<strong><?php echo __('Thanks for registering for an account.'); ?></strong>
</p>
<p><?php echo __(
"We've just sent you an email to the address you entered. Please follow the link in the email to confirm your account and gain access to your tickets."
); ?>
</p>
</div>
<?php } ?>
</div>
</div>
</div>
