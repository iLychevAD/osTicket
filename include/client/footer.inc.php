        </div>
    </div>

    <!-- Editable section  -->

       <div class="company-info">
           <div class="container"><div class="row">
               <div class="contact-info">
                   <h3> Arenadata </h3>
                   <p>
                       127018, г.Москва <br>
                       ул.Складочная, д.3, стр.1,<br>
                       Россия
                   </p>

                   <div> <span>  </span>  <span> support@arenadata.io </span></div>
               </div>

               <div class="social-icons">
                   <ul>
                       <li> <a href="https://www.linkedin.com/company/17959173/"> <i class="icon-linkedin"></i> </a> </li>
                       <li> <a href="https://github.com/arenadata"> <i class="icon-github"></i> </a> </li>
                   </ul>
               </div>

           </div></div>
       </div>

      <!-- Editable section ends -->
      <div id="footer">
        <p>Copyright &copy; <?php echo date('Y'); ?> <?php echo (string) $ost->company ?: 'Arenadata'; ?> - All rights reserved.</p>
      </div>  
</div> <!-- end wrapper -->
<div id="overlay"></div>
<div id="loading">
    <h4><?php echo __('Please Wait!');?></h4>
    <p><?php echo __('Please wait... it will take a second!');?></p>
</div>
<?php
if (($lang = Internationalization::getCurrentLanguage()) && $lang != 'en_US') { ?>
    <script type="text/javascript" src="ajax.php/i18n/<?php
        echo $lang; ?>/js"></script>
<?php } ?>
<script type="text/javascript">
    getConfig().resolve(<?php
        include INCLUDE_DIR . 'ajax.config.php';
        $api = new ConfigAjaxAPI();
        print $api->client(false);
    ?>);
</script>
</body>
</html>
