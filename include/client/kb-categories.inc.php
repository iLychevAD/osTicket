<div class="container">
    <div class="row">
        <div class="col-md-12">

        <div class="page-title">
              <h1><?php echo __('Frequently Asked Questions');?></h1>
         </div>

         <div class="row">
             <form method="get" action="faq.php" id="kb-search">
             <input type="hidden" name="a" value="search"/>
             <div class="col-md-5">
             <select class="form-control" name="topicId"  style="width:100%;max-width:100%">
                 <option value="">—<?php echo __("Browse by Topic"); ?>—</option>
                 <?php
                 $topics = Topic::objects()
                     ->annotate(array('has_faqs'=>SqlAggregate::COUNT('faqs')))
                     ->filter(array('has_faqs__gt'=>0));
                 foreach ($topics as $T) { ?>
                         <option value="<?php echo $T->getId(); ?>"><?php echo $T->getFullName();
                             ?></option>
                 <?php } ?>
             </select>
             </div>
             <div class="col-md-5">
                 <div class="faq-search-form">
                     <input type="text" name="q" class="form-control search" placeholder="<?php
                         echo __('Search our knowledge base'); ?>"/>

                 </div>
             </div>
             <div class="col-md-2">
                 <input class="btn btn-block btn-primary button" id="searchSubmit" type="submit" value="<?php echo __('Search');?>">
             </div>
             </form>
         </div>
         </div>

<div class="col-md-12">
<div class="kb-results">
<?php
    $categories = Category::objects()
        ->exclude(Q::any(array(
            'ispublic'=>Category::VISIBILITY_PRIVATE,
            'faqs__ispublished'=>FAQ::VISIBILITY_PRIVATE,
        )))
        ->annotate(array('faq_count'=>SqlAggregate::COUNT('faqs')))
        ->filter(array('faq_count__gt'=>0));
    if ($categories->exists(true)) { ?>
        <div class="well"><?php echo __('Click on the category to browse FAQs.'); ?></div>

        <ul id="kb">
<?php
        foreach ($categories as $C) { ?>
            <li><i></i>
            <div>
            <h4><?php echo sprintf('<a href="faq.php?cid=%d">%s (%d)</a>',
                $C->getId(), Format::htmlchars($C->getLocalName()), $C->faq_count); ?>
            <span class="faded" style="margin:5px 0; display:block;">
                <?php echo Format::safe_html($C->getLocalDescriptionWithImages()); ?>
            </span> </h4>
<?php       foreach ($C->faqs
                    ->exclude(array('ispublished'=>FAQ::VISIBILITY_PRIVATE))
                    ->limit(5) as $F) { ?>
                <div class="popular-faq"><i class="icon-file-alt"></i>
                <a href="faq.php?id=<?php echo $F->getId(); ?>">
                <?php echo $F->getLocalQuestion() ?: $F->getQuestion(); ?>
                </a></div>
<?php       } ?>
            </div>
            </li>
<?php   } ?>
       </ul>
<?php
    } else {
        echo __('NO FAQs found');
    }
?>
</div>
</div>
</div>
</div>
