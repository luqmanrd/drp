// Ajax post  
        $(document).ready(function(){  
          $("#passwordKonfirmasi").keyup(function(){  
            // Returns error message when submitted without req fields.
            if ($("#passwordBaru").val() == $("#passwordKonfirmasi").val()) {
              jQuery("small#newPassCheck").html("");
              $("#simpanPasswordBaru").removeAttr("disabled");
              // $("#simpan-sunting").removeAttr("disabled");
              // // removeAttr()           
            }
            else{
              // console.log('tidak sama');
              jQuery("small#newPassCheck").html("Tidak Sesuai");
              $("#simpanPasswordBaru").attr("disabled","true");
            }
          });  
        });