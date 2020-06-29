 $(document).ready(function(){
        var usernamelama = $("#username").val();    
        $("#username").keyup(function(){  
            // Returns error message when submitted without req fields.
            var username = $("#username").val();
            if (username==usernamelama) {
              console.log('sama');
              jQuery("small#UsernameCheck").removeClass("warning-text");
              jQuery("small#UsernameCheck").addClass("text-muted");
              $("#simpan-sunting").removeAttr("disabled");
              // removeAttr()           
            }
            else{
              $.ajax({  
                type: "POST",  
                url: "http://localhost/drp/profil/cek_username",  
                data: {username: username},  
                cache: false,  
                success: function(result){  
                  if(result==1 || $("#username").val() == ''){  
                        // On success redirect.  
                        console.log('tidaktersedia');
                        jQuery("small#UsernameCheck").removeClass("text-muted");
                        jQuery("small#UsernameCheck").addClass("warning-text");
                        jQuery("small#UsernameCheck").html("Username tidak tersedia.");
                        $("#simpan-sunting").attr("disabled","true");
                      }  
                      else{
                        console.log('tersedia');
                        jQuery("small#UsernameCheck").removeClass("warning-text");
                        jQuery("small#UsernameCheck").addClass("text-muted");
                        jQuery("small#UsernameCheck").html("Username tersedia.");
                        $("#simpan-sunting").removeAttr("disabled");
                      }  
                    }  
                  });   
            }
          });  
      });