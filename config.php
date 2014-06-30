<?php 
	if(!session_id()) {
        session_start();
    }
	require 'GraphSDK/src/Facebook/autoload.php';
	$fb = new Facebook\Facebook([
	  'app_id' => 'fb_app_id_here', // Replace {app-id} with your app id
	  'app_secret' => 'fb_app_secret_here', // Replace {app_secret} with your app secret
      'default_graph_version' => 'v11.0',
	]);

?>