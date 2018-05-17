
    <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
              </div>
            <footer>
                <hr>
            <h6 class="navbar navbar-expand-lg navbar-dark bg-dark" >
              "جميع حقوق النشر محفوظه للمصدر"
            </h6>

          </footer>
          <script>


          window.onload = function () {
             getAllLevels();
          };


          function report(Id) {
            var id = "school="+$('#school_name').val();
            var dateFrom = "&date_from="+$('#date_from').val();
            var dateTo = "&date_to="+$('#date_to').val();
            var postData = id+dateFrom+dateTo;

            $.ajax({
              url: "<?= base_url() ?>Users_admin/report_by_date",
              type:"POST",
              data: postData,
              success: function (html) {
                alert(postData);
                $('#report_by_date').html(html);
              },
              error: function () {
                alert('error..');
              }
            });
          }


          function deleteLevel(level){
            var id = level;
            var Postdata = 'id='+id;

            $.ajax({
              url: "<?php echo base_url() ?>Levels_admin/delete_level",
              type: "POST",
              data: Postdata,
              success: function(html){
                // remove row on table
                $('#row-id-'+id).remove();
                //remove Modal
                $('#'+id).hide();
                //remove modeal backdrop
                $('.modal-backdrop').hide();

              },
              error: function(){
                alert('Error....');
              }
            });
            }


            function createFunction() {
              var Postdata = $('#createLevel').serialize();
              $.ajax({
                url: "<?php echo base_url() ?>Levels_admin/add_level",
                type: "POST",
                data: Postdata,
                success: function(html){
                  getAllLevels();
                  $('#add').hide();
                  //remove modeal backdrop
                  $('.modal-backdrop').hide();
                },
                error: function(){
                  alert(Postdata);
                }
              });
            }


            function reloadfees(id) {
              var  postData = 'student_id='+id;
              $.ajax({
                type: "POST",
                url:"<?= base_url() ?>Users_admin/calculate_fees",
                data: postData,
                success: function(html){
                  $("#fees_table").html(html);
                },
                error: function () {
                  alert("error");
                }
              });
            }

            function addTofees(studentId, restFees, sumPays,total) {
              var id = studentId;
              var restFees = restFees;
              var schoolId = $('#school_name').val();
              var classId = "&class_id="+$('#class').val();
              var total = total;
              var formdata = $('#addFees').serialize();
              var val_p = $('#fees_pays').val();
              if(val_p > restFees){
                alert('من فضلك ادخل  مبلغ اقل من ' + restFees);
                fail();
              }
              var sum_pays = (parseFloat(sumPays)) + (parseFloat(val_p));
              var s_pays = "&sum="+sum_pays;

              var reman_p = (parseFloat(total)) - (parseFloat(sum_pays));
              var reman = "&reman_p="+reman_p;
              var sId = "&sch_id="+schoolId;
              var s_id = "&student_id="+id;
              var PostData = formdata+sId+s_id+s_pays+reman+classId;
              $.ajax({
                url: "<?php echo base_url() ?>Users_admin/addTofees",
                type: "POST",
                data: PostData,
                success: function(html){
                  reloadfees(id);
                  $('#add').hide();
                  //remove modeal backdrop
                  $('.modal-backdrop').hide();
                  $('#i').load();
                },
                error: function(){
                  alert(PostData);
                }
              });
            }

            function getAllLevels() {
              $.ajax({
                url: "<?php echo base_url() ?>Levels_admin/get_levels",
                type: "GET",
                success: function(html){
                  $("#body_rows").html(html);
                },
                error: function(){
                  alert('cn');
                }
              });
            }


            function totala() {
            var fees = $("#fees").val();
            var transport = $("#price").val();
            var tax1 = $("#tax1").val();
            var tax2 = $("#tax2").val();
            var total = $("#total").val();

             total = (parseFloat(fees)) + (parseFloat(transport) * 30) + (parseFloat(tax1)) + ((parseFloat(tax2) * parseFloat(fees)) / 100);
            $("#total").val(total);
           }



          $(document).ready(function(){

            function check_name() {

              var name_length = $("#name_form").val().length;

              if (name_length < 2) {
                $("#name_error").html("غير صحيح");
                $("#name_error").show();
                error_name = true;
              } else {
                $("#name_error").hide();
              }
            }

            function check_password() {

              var password_length = $("#password_form").val().length;

              if (password_length < 6) {
                $("#password_error").html("يجب ان يكون اكثر من  6 حروف");
                $("#password_error").show();
                error_password = true;
              } else {
                $("#password_error").hide();
              }
            }

            function check_conf_password() {

              var password = $("#password_form").val();
              var conf_password = $("#conf_password_form").val();

              if (password != conf_password) {
                $("#conf_password_error").html("يجب التشابه");
                $("#conf_password_error").show();
                error_conf_password = true;
              } else {
                $("#conf_password_error").hide();
              }
            }







          // check name
          $("#name_form").keyup(function(){
              check_name();
          });

          // check zip code
          $("#zip_form").keyup(function(){
              check_zip();
          });

          // check username


          // check email
          $("#email_form").keyup(function(){
              check_email();
          });

          // check password
          $("#password_form").keyup(function(){
              check_password();
          });

          // matchs
          $("#conf_password_form").keyup(function(){
              check_conf_password();
          });




          // Check to submit
          $("#form").submit(function() {

                  error_name = false;
                  error_zip = false;
                  error_email = false;
                  error_password = false;
                  error_conf_password = false;

                  check_name();
                  check_password();
                  check_conf_password();

                  if(error_name == false && error_zip == false && error_email == false &&  error_password == false && error_conf_password == false){
                    return true;
                  }else {
                    return false;
                  }
      });

      // Dropdown dependent
      $("#level").on('change', function(){
        var levelid = $(this).val();
        if(levelid != ''){
          var  postData =  'id='+levelid;
          $.ajax({
            type: "POST",
            url:"<?= base_url() ?>Users_admin/years_study",
            data: postData,
            success: function(html){
              $("#years_study").html(html);
            },
            error: function () {
              alert(postData);
            }
          });
        }
      });





      $("#tax_type").on('change', function(){
        var taxType = $(this).val();
        if(taxType == 1){
          $('#tax1').prop('disabled', false);
          $('#tax2').prop('disabled', true);
          $('#tax2').prop('value', 0);
        } else if(taxType == 2){
            $('#tax1').prop('disabled', true);
            $('#tax2').prop('disabled', false);
            $('#tax1').prop('value', 0);
        }else {
          $('#tax1').prop('disabled', true);
          $('#tax2').prop('disabled', true);
          $('#tax1').prop('value', 0);
          $('#tax2').prop('value', 0);
        }
      });

      $("#years_study").on('change', function(){
        var yearId = $(this).val();
        if(yearId != ""){
          var  postData ='n_year_study='+yearId;
          $.ajax({
            type: "POST",
            url:"<?= base_url() ?>Users_admin/select_fees",
            data: postData,
            success: function(html){
              $("#fee").html(html);
            },
            error: function () {
              alert("bcks");
            }
          });
        }
      });

      $("#years_study").on('change', function(){
        var yearId = $(this).val();
        if(yearId != ""){
          var  postData =  'n_year_study='+yearId;
          $.ajax({
            type: "POST",
            url:"<?= base_url() ?>Users_admin/year_study",
            data: postData,
            success: function(html){
              $("#class").html(html);
            },
            error: function () {
              alert("bcks");
            }
          });
        }
      });

      $("#school_name").on('change', function(){
        var schoolId = $(this).val();
        if(schoolId != ""){
          var  postData = 'school_id='+schoolId;
          $.ajax({
            type: "POST",
            url:"<?= base_url() ?>Users_admin/class_school_id",
            data: postData,
            success: function(html){
              $("#class").html(html);
            },
            error: function () {
              alert("error");
            }
          });
        }
      });


      $("#class").on('change', function(){
        var classId = $(this).val();
        if(classId != ""){
          var  postData = 'class_id='+classId;
          $.ajax({
            type: "POST",
            url:"<?= base_url() ?>Users_admin/student_byClass_id",
            data: postData,
            success: function(html){
              $("#class_student").html(html);
            },
            error: function () {
              alert("error");
            }
          });
        }
      });

      $("#class_student").on('change', function(){
        var studentId = $(this).val();
        if(studentId != ""){
          var  postData = 'student_id='+studentId;
          $.ajax({
            type: "POST",
            url:"<?= base_url() ?>Users_admin/calculate_fees",
            data: postData,
            success: function(html){
              $("#fees_table").html(html);
            },
            error: function () {
              alert("error");
            }
          });
        }
      });


      // Dropdown dependent
      $("#transport").on('change', function(){
        var transportid = $(this).val();
        if(transportid != ''){
          var  postData =  'id='+transportid;
          $.ajax({
            type: "POST",
            url:"<?= base_url() ?>Users_admin/price_transport",
            data: postData,
            success: function(html){
                alert(postData);
              $("#pricee").html(html);
            },
            error: function () {
              alert(postData);
            }
          });
        }
      });

      // Calculate Total




     $('input.amount').keyup(function(){
     var price = $("#priice").val();
     var qty = $("#qty").val();
     var tax = $("#tax").val();
     var disc = $("#disc").val();
     var total = $("#toital").val();
       var total = (parseFloat(price) * parseFloat(qty)) + (parseFloat(tax) - parseFloat(disc));
     $("#toital").val(parseFloat(total));
    });



      $("#username_form").keyup(function (){
        var userName = $("#username_form").val().trim();
          var  postData =  'username='+userName;
          if(userName != ''){
            $('#username_error').show();
          $.ajax({
            type: "POST",
            url:"<?= base_url() ?>Users_admin/get_valid_username",
            data:postData ,
            success: function(response){
              if(response > 0){
                          $("#username_error").html("<span class='text-danger'>تم استخدامة لطالب اخر</span>");
                      }else{
                          $("#username_error").html("<span class='text-success'>متاح </span>");
                      }
                   },
            error: function () {
              alert("bcks");
            }
          });
        }else{
          $("#username_error").hide();
        }
      });






          //check to submit
      /*
      var name = document.forms["myForm"]["name"].value;
      var zip = document.forms["myForm"]["zipcode"].value;
      var email = document.forms["myForm"]["email"].value;
      var username = document.forms["myForm"]["username"].value;
      var password = document.forms["myForm"]["password"].value;
      var password2 = document.forms["myForm"]["password2"].value;
      if(name.length < 3 || zip.length < 5 || username.length < 8 || password.length < 6 || password.value === password2.value){
      check_name();
      check_zip();
      check_email();
      check_password();
      check_username();
      check_conf_password();
      return false;
      }else {
      return true;
      }
      }
      */

        });


        </script>
        <script src="//code.jquery.com/jquery-1.11.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  </body>
</html>
