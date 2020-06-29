$(document).ready(function(){  
        $("#simpanPasswordBaru").click(function(){   
          var password = $("#password").val();
          var passwordBaru = $("#passwordBaru").val();  
            // Returns error message when submitted without req fields.  
            if(password==''){  
              console.log('kosong');
              // jQuery("div#err_msg").removeClass();
              // jQuery("div#err_msg").addClass('alert alert-warning');
              // jQuery("div#err_msg").show();  
              // jQuery("div#msg").html("All fields are required");  
            }  
            else{  
            // AJAX Code To Submit Form.  
            $.ajax({  
              type: "POST",  
              url: "http://localhost/drp/profil/cek_password",  
              data: {password: password, passwordBaru: passwordBaru},  
              cache: false,  
              success: function(result){  
                if(result!=0){  
                        // On success redirect.  
                        jQuery("small#oldPassCheck").html(""); 
                        window.location.replace(result); 
                      }  
                      else{
                        console.log('salah'); 
                        jQuery("small#oldPassCheck").removeClass("text-muted");
                        jQuery("small#oldPassCheck").addClass("warning-text");
                        jQuery("small#oldPassCheck").html("Password Salah");
                        // $("#simpanPasswordBaru").attr("disabled","true");
                      }  
                    }  
                  });   
          }  
        });  
      });