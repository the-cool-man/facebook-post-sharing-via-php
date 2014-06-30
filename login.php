<?php 
require 'config.php';

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email', 'publish_actions', 'manage_pages', 'publish_pages',
'business_management', 'publish_to_groups' ]; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://localhost/important/facebook-sharing/callback.php', $permissions);

header("location:" . $loginUrl);
?>