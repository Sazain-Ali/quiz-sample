<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php $piereg = get_option(OPTION_PIE_REGISTER); 

$_disable = "";
if(!$this->piereg_pro_is_activate)	{
	$_disable 			= "disabled";
}

?>

<fieldset class="piereg_fieldset_area-nobg" <?php echo $_disable; ?>>
<form method="post" action="" name="pie_invite_sent" id="pie_invite_sent">
<?php if( function_exists( 'wp_nonce_field' )) wp_nonce_field( 'piereg_wp_invitation_code_nonce','piereg_invitation_code_nonce'); ?>
<h3><?php echo _e('Invite Users','pie-register'); ?></h3>
<ul class="bg-white clearfix invite-form">
<?php if(!$this->piereg_pro_is_activate ){ ?>
  <h3 class="inactive-promessage"><?php _e("Available in Pro version","pie-register");?></h3>
<?php }?>
<li class="clearfix">
  <div class="fields">
    <div  class="cols-2">
      <h3>
        <?php _e("Invite users to register <small>(comma separated)</small>: ","pie-register");?>
      </h3>
    </div>
    <div class="cols-3">
      <textarea name="pie_email_invite" id="pie_email_invite" rows="20"></textarea>      
    </div>
  </div>
</li>
<li class="clearfix">
  <div class="fields fields_submitbtn">
    <div class="cols-2">&nbsp;</div><!-- cols-3 -->
    <div class="cols-3 text-right">
      <input name="send_invite_email" class="submit_btn" value="<?php _e('Send Invitation','pie-register');?>" type="submit" />
    </div><!-- cols-3 -->
  </div>
</li>
</ul>
</form>
</fieldset>
<fieldset class="piereg_fieldset_area-nobg" <?php echo $_disable; ?>>
<form method="post" action="">
  <?php if( function_exists( 'wp_nonce_field' )) wp_nonce_field( 'piereg_wp_invitation_code_nonce','piereg_invitation_code_nonce'); ?>
  <h3><?php echo _e('Customize Email Template','pie-register'); ?></h3>
  <ul class="bg-white clearfix invite-form">
      <?php if(!$this->piereg_pro_is_activate ){ ?>
          <h3 class="inactive-promessage"><?php _e("Available in Pro version","pie-register");?></h3>
       <?php }?>
       <li class="clearfix">
        <div class="fields">
          <div  class="cols-2">
            <h3>
              <?php _e("Registration Page","pie-register");?>
            </h3>
          </div><!-- cols-3 -->         
         <div class="cols-3">          
            <select id="pie_email_linkpage" name="pie_email_linkpage" >
              <?php 
              $pages = get_pages(array( 'numberposts' => -1));
              foreach( $pages as $page ) : $page->post_content; ?>
                <option value="<?php echo $page->ID; ?>" <?php echo ($piereg['pie_email_linkpage'] == $page->ID) ? 'selected' : ''; ?>>
                  <?php echo $page->post_title; ?>
                </option>
              <?php endforeach; ?>
            </select>          
          </div><!-- cols-3 -->
        </div>
      </li>
      <li class="clearfix">
        <div class="fields">
          <div  class="cols-2">
            <h3>
              <?php _e("Select Invitation Code","pie-register");?>
            </h3>
          </div><!-- cols-3 -->
         <div class="cols-3">          
            <select id="pie_email_invitecode" name="pie_email_invitecode" >
              <?php 
              global $wpdb;
              $codetable    = $wpdb->prefix."pieregister_code";
              $inviteCodes  = $wpdb->get_results("SELECT * FROM $codetable WHERE `status` = 1");
              $today        = date("y-m-d");          
              foreach($inviteCodes as $key => $val){
                $expiryTime = date("y-m-d", strtotime($inviteCodes[$key]->expiry_date));
                $selected = $piereg['pie_email_invitecode'] == $inviteCodes[$key]->name ? "selected" : "";
                if($expiryTime > $today){
                  echo "<option value='".$inviteCodes[$key]->name."' ".$selected.">".$inviteCodes[$key]->name."</option>";
                }
              }
              ?>
            </select>          
          </div><!-- cols-3 -->
        </div>
      </li>
       <li class="clearfix">
        <div class="fields">
          <div  class="cols-2">
            <h3>
              <?php _e("From","pie-register");?>
            </h3>
          </div><!-- cols-3 -->
         <div class="cols-3">          
            <input value="<?php echo (isset($piereg['pie_name_from'])?$piereg['pie_name_from']:''); ?>" type="text" name="pie_name_from" id="pie_name_from" class="input_fields2" required="" />         
          </div><!-- cols-3 -->
        </div>
      </li>
      <li class="clearfix">
        <div class="fields">
          <div  class="cols-2">
            <h3>
              <?php _e("From Email","pie-register");?>
            </h3>
          </div><!-- cols-3 -->
         <div class="cols-3">          
            <input value="<?php echo (isset($piereg['pie_email_from'])?$piereg['pie_email_from']:''); ?>" type="text" name="pie_email_from" id="pie_email_from" class="input_fields2" required="" />         
          </div><!-- cols-3 -->
        </div>
      </li>
      <li class="clearfix">
        <div class="fields">
          <div  class="cols-2">
            <h3>
              <?php _e("Subject","pie-register");?>
            </h3>
          </div><!-- cols-3 -->
         <div class="cols-3">
            <input value="<?php echo (isset($piereg['pie_email_subject'])?$piereg['pie_email_subject']:''); ?>" type="text" name="pie_email_subject" id="pie_email_subject" class="input_fields2"/ required="">
          </div><!-- cols-3 -->
        </div>
      </li>      
      <li class="clearfix">
        <div class="fields">
          <div  class="cols-2">
            <h3>
              <?php _e("Email Body","pie-register");?>
            </h3>
          </div><!-- cols-3 -->
         <div class="cols-3">          
          <?php  
              $settings = array( 'textarea_name' => "pie_email_content", 'editor_height' => 200 );
              $textarea_text = $piereg['pie_email_content'];
              wp_editor($textarea_text, 'pie_email_content', $settings );
          ?>  
          <br/>  
          <br/><b>%invitation_link% :</b> <?php echo _e('Invitation Link ShortCode can be used in Email Body','pie-register'); ?>
          </div><!-- cols-3 -->         
        </div>
      </li>
      <li class="clearfix">
        <div class="fields fields_submitbtn">
          <div class="cols-2">&nbsp;</div><!-- cols-3 -->
          <div class="cols-3 text-right">
            <input name="submit_invite_email" class="submit_btn" value="<?php _e('Save','pie-register');?>" type="submit" />
          </div><!-- cols-3 -->
        </div>
      </li>
  </ul>
</form>
</fieldset>