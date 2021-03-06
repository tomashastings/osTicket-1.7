<?php
/*********************************************************************
    settings.php

    Handles all admin settings.
    
    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006-2013 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
**********************************************************************/

require('admin.inc.php');
$errors=array();
$settingOptions=array(
                'system' => __('System Settings'),
                'tickets' => __('Ticket Settings and Options'),
                'emails' => __('Email Settings'),
                'kb' => __('Knowledgebase Settings'),
                'autoresp' => __('Autoresponder Settings'),
                'alerts' => __('Alerts and Notices Settings'));
//Handle a POST.
if($_POST && !$errors) {
    if($cfg && $cfg->updateSettings($_POST,$errors)) {
        $msg=sprintf(__('%s updated successfully'),Format::htmlchars($settingOptions[$_POST['t']]));
        $cfg->reload();
    } elseif(!$errors['err']) {
        $errors['err']=__('Unable to update settings - correct errors below and try again');
    }
}

$target=($_REQUEST['t'] && $settingOptions[$_REQUEST['t']])?$_REQUEST['t']:'system';
$config=($errors && $_POST)?Format::input($_POST):Format::htmlchars($cfg->getConfigInfo());

$nav->setTabActive('settings', ('settings.php?t='.$target));
require_once(STAFFINC_DIR.'header.inc.php');
include_once(STAFFINC_DIR."settings-$target.inc.php");
include_once(STAFFINC_DIR.'footer.inc.php');
?>
