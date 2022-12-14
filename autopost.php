<!DOCTYPE html>
<html>
<head>
	<title>Upload photo on Facebook</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
</head>
<body>
<div class="container">
<?php 

	if(isset($_POST['submit'])) {
		require 'config.php';
		$data = [
            'link' => 'https://www.lorem.com/',
            'message' => 'Lorem ipsum is a dummy content generation tool'
		];

        if(!empty($_FILES['file']["tmp_name"]))
        {
        $data["source"] = $fb->fileToUpload($_FILES['file']["tmp_name"]);
        }

		try {
		  // Returns a `Facebook\FacebookResponse` object
		  $response = $fb->post('/me/feed', $data, "EAAHPNsMAXnsBALjQ1yA4l4S2hjZCRQmdDv6xve8gdRLsiQd6XK6VrI8XkFREKg2oCPz3NZA1HXlIWH6iNZB5uicaMJBxamPpO8Kt8pLmPWiW5Sm9wa0dxBoIgk8BpLWMdkbnPVmebTWPwp9ufUZBhOJcg13UVt1hvh39K8DCI0tinbsIfdTDYLFl2Bu8tUQZD");
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}

		$graphNode = $response->getGraphNode();

		echo 'Photo ID: ' . $graphNode['id'];

	}
?>
	<h1>Upload photo on facebook using Graph API in PHP</h1>
    <hr>
    <div class="row">
	    <div class="col-md-6 col-md-offset-2">
			<form name="uploadFrm" method="post" enctype="multipart/form-data">
		    	
		    	<div class="form-group">
		            <label for="message-text" class="control-label">Message:</label>
		            <textarea class="form-control" id="msg" name="msg">Upload photo on facebook using Graph API in PHP</textarea>
		    	</div>
		        <div class="form-group">
				    <label for="file">Select File</label>
				    <input type="file" id="file" name="file">
				    <p class="help-block">Select your file which you want to upload.</p>
				</div>
			    <div class="footer">
			        <button type="submit" name="submit" class="btn btn-primary">Post Status</button>
			    </div>
			</form>
		</div>
	</div>
</div>
</div> <!-- /container --> 
</body>
</html>
