<?php
if(!defined('OSTCLIENTINC') || !$faq  || !$faq->isPublished()) die('Access Denied');

$category=$faq->getCategory();

?>
<div class="container">
<div class="row">
<div class="col-md-12">
    <div class="page-title">
        <h1><?php echo __('Frequently Asked Questions');?></h1>
    </div>

    <div id="breadcrumbs">
        <a href="index.php"><?php echo __('All Categories');?></a>
        &raquo; <a href="faq.php?cid=<?php echo $category->getId(); ?>"><?php echo $category->getName(); ?></a>
    </div>

    <div class="faq-content">
        <div class="article-title faq-title">
        <h2> <?php echo $faq->getLocalQuestion() ?> </h2>
        </div>
        <div class="thread-body bleed">
        <?php echo $faq->getLocalAnswerWithImages(); ?>
        </div>

        <?php
            if ($attachments = $faq->getLocalAttachments()->all()) { ?>
        <section>
            <strong><?php echo __('Attachments');?>:</strong>
        <?php foreach ($attachments as $att) { ?>
            <div class="article-meta">
            <a href="<?php echo $att->file->getDownloadUrl(); ?>" class="no-pjax">
                <i class="icon-file"></i>
                <?php echo Format::htmlchars($att->getFilename()); ?>
            </a>
            </div>
        <?php } ?>
        </section>
        <?php } ?>

        <div class="logtime"><?php echo sprintf(__('Last Updated %s'),
            Format::relativeTime(Misc::db2gmtime($category->getUpdateDate()))); ?>
        </div>

    </div>
</div>
</div>
</div>
