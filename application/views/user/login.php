<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN | PT. Dimas Reiza Perwira - Management System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="<?php echo base_url('assets/img/drp_icon.png'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>
<body>	
	<div class="container">
		<div class="card text-center">
			<div class="card-header">
				LOGIN
			</div>
			<div class="card-body">
				<form>
					<div id='err_msg' class="alert" style='display: none'>  
                		<div id='content_result'>  
                			<div id='err_show' class="w3-text-red">  
                				<div id='msg'> 
                				</div>
                			</div>
                		</div>
                	</div>			
					<div>
						<input type="text" class="form" id="username" placeholder="Username">
					</div>
					<div>
						<input type="password" class="form" id="password" placeholder="Password">
					</div>
					<div>
						<button id="login" type="button" class="btn btn-primary">Login</button>
					</div>
				</form>	
			</div>
			
			<div class="card-footer text-muted">
				PT. DIMAS REIZA PERWIRA - MANAGEMENT SYSTEM
			</div>
		</div>
	</div>	
	<script src="<?php echo base_url('assets/js/jquery-3.2.1.slim.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-4.0.0/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/jquery.1.11.1.min.js')?>"></script>
	<script type="text/javascript">  
        // Ajax post  
        $(document).ready(function(){  
        	$("#login").click(function(){  
        		var username = $("#username").val();  
        		var password = $("#password").val();  
		        // Returns error message when submitted without req fields.  
		        if(username==''||password==''){  
		        	console.log('kosong');
		        	jQuery("div#err_msg").removeClass();
		        	jQuery("div#err_msg").addClass('alert alert-warning');
		        	jQuery("div#err_msg").show();  
		        	jQuery("div#msg").html("All fields are required");  
		        }  
		        else{  
		        // AJAX Code To Submit Form.  
			        $.ajax({  
			        	type: "POST",  
			        	url: "<?php echo base_url('login/login');?>",  
			        	data: {username: username, password: password},  
			        	cache: false,  
			        	success: function(result){  
			        		if(result!=0){  
				                // On success redirect.  
				                window.location.replace(result);  
				            }  
				            else{
				       	    	console.log(result);
				       	    	jQuery("div#err_msg").removeClass();
				       	    	jQuery("div#err_msg").addClass('alert alert-danger');
				       	    	jQuery("div#err_msg").show();  
				            	jQuery("div#msg").html("Login Failed");	
				            }  
						}  
		    		});	  
		    	}  
			});  
        });  
    </script>
</body>
</html>`