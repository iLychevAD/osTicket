<div class="container">
<div class="row">
<div class="col-md-12">
    <div class="page-title">
        <h1><?php echo __('Frequently Asked Questions');?></h1>
        <div><strong><?php echo __('Search Results'); ?></strong></div>
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
    <?php
        if ($faqs->exists(true)) {
            echo '<div id="faq">'.sprintf(__('%d FAQs matched your search criteria.'),
                $faqs->count())
                .'<ol>';
            foreach ($faqs as $F) {
                echo sprintf(
                    '<li><a href="faq.php?id=%d" class="previewfaq">%s</a></li>',
                    $F->getId(), $F->getLocalQuestion(), $F->getVisibilityDescription());
            }
            echo '</ol></div>';
        } else {
            echo '<div class="well">'.__('The search did not match any FAQs.').'</div>';
        }
    ?>
</div>
</div>
</div>
