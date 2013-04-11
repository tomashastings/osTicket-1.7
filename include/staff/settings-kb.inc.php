<?php
if(!defined('OSTADMININC') || !$thisstaff || !$thisstaff->isAdmin() || !$config) die('Access Denied');
?>
<h2><?php echo __('Knowledge Base Settings and Options');?></h2>
<form action="settings.php?t=kb" method="post" id="save">
<?php csrf_token(); ?>
<input type="hidden" name="t" value="kb" >
<table class="form_table settings_table" width="940" border="0" cellspacing="0" cellpadding="2">
    <thead>
        <tr>
            <th colspan="2">
                <h4><?php echo __('Knowledge Base Settings');?></h4>
                <em><?php echo __("Disabling knowledge base disables clients' interface.");?></em>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td width="180"><?php echo __('Knowledge base status');?>:</td>
            <td>
              <input type="checkbox" name="enable_kb" value="1" <?php echo $config['enable_kb']?'checked="checked"':''; ?>>
              <?php echo __('Enable Knowledge base&nbsp;<em>(Client interface)</em>');?>
              &nbsp;<font class="error">&nbsp;<?php echo $errors['enable_kb']; ?></font>
            </td>
        </tr>
        <tr>
            <td width="180"><?php echo __('Canned Responses');?>:</td>
            <td>
                <input type="checkbox" name="enable_premade" value="1" <?php echo $config['enable_premade']?'checked="checked"':''; ?> >
                <?php echo __('Enable canned responses&nbsp;<em>(Available on ticket reply)</em>');?>
                &nbsp;<font class="error">&nbsp;<?php echo $errors['enable_premade']; ?></font>
            </td>
        </tr>
    </tbody>
</table>
<p style="padding-left:210px;">
    <input class="button" type="submit" name="submit" value="<?php echo __('Save Changes');?>">
    <input class="button" type="reset" name="reset" value="<?php echo __('Reset Changes');?>">
</p>
</form>
