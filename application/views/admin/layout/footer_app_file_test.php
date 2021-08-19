<!-- BEGIN FOOTER -->
<div class="footer">
  <div class="footer-inner">
     2019 &copy; AgriMin Control International.
  </div>
  <div class="footer-tools">
    <span class="go-top">
      <i class="fa fa-angle-up"></i>
    </span>
  </div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
    <script src="<?php echo ASSETS_PATH; ?>plugins/respond.min.js"></script>
    <script src="<?php echo ASSETS_PATH; ?>plugins/excanvas.min.js"></script> 
    <![endif]-->
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/bootstrap/js/bootstrap2-typeahead.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!--<script src="<?php echo ASSETS_PATH; ?>plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>-->
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo ASSETS_PATH; ?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH; ?>plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH; ?>plugins/clockface/js/clockface.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH; ?>plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH; ?>plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH; ?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH; ?>plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH; ?>plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH; ?>plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH; ?>plugins/jquery-multi-select/js/jquery.multi-select.js"></script
<script type="text/javascript" src="<?php echo ASSETS_PATH; ?>plugins/data-tables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH; ?>plugins/data-tables/DT_bootstrap.js"></script>
<!-- The basic File Upload plugin -->
<!-- file upload
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery-file-upload/js/jquery.fileupload.js"></script>-->
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo ASSETS_PATH; ?>scripts/core/app.js"></script>
<script src="<?php echo ASSETS_PATH; ?>scripts/custom/components-pickers.js"></script>
<script src="<?php echo ASSETS_PATH; ?>scripts/custom/custom.js"></script>
<script src="<?php echo ASSETS_PATH; ?>scripts/custom/table-advanced.js"></script>
<script src="<?php echo ASSETS_PATH; ?>scripts/custom/components-dropdowns.js"></script>
<!--<script src="<?php echo ASSETS_PATH; ?>scripts/custom/form-fileupload.js"></script>-->
<!-- END PAGE LEVEL SCRIPTS -->
<script>
        jQuery(document).ready(function() {       
           // initiate layout and plugins
           App.init();
           ComponentsPickers.init();
           Custom.init();
           Custom.initCompanyMaster();
           Custom.initBranchMaster();
           Custom.initClientMaster();
           Custom.initCargoMaster();
           Custom.initCargoGroupMaster();
           Custom.initUnitMaster();
           Custom.initPackingMaster();
           Custom.initClientInteraction();
           Custom.initNewClientInteraction();
           Custom.initUserMaster();
           Custom.initUserDetails();
           Custom.initUserAccess();
           Custom.initAddfileregister();
           ComponentsDropdowns.init();
           //FormFileUpload.init();
           TableAdvanced.init();

        });

        // This is used in adddailyactivity module start
        //Try to get tbody first with jquery children. works faster!
        /****var tbody = $('#cargo_details').children('tbody');
        //Then if no tbody just select your table 
        var table = tbody.length ? tbody : $('#cargo_details');
        $('#cargo_row').click(function(){
            //Add row
            table.append('<tr class="active"><td><select class="form-control cargomaster" name="cargo[]" id="cargo"><option value="">Select</option></select></td><td><input type="text" class="form-control input-small" id="div_parameters" name="div_parameters[]" value=""></td><td><select class="form-control packingmaster" name="div_packing[]" id="div_packing"><option value="">Select</option></select></td><td><input type="text" class="form-control input-small" placeholder="" name="div_quantity[]" id="div_quantity" value="" ></td><td width="10%"><select class="form-control unitmaster" name="div_unit[]" id="div_unit"><option value="">Select</option></select></td><td><input type="text" class="form-control input-small div_vessel_name" placeholder="" name="div_vessel_name[]" id="div_vessel_name" value=""></td><td><input type="text" class="form-control input-small div_voyage_no" id="div_voyage_no" name="div_voyage_no[]" value=""></td><td><input type="text" class="form-control input-small div_origin" id="div_origin" name="div_origin[]" value=""></td><td><input type="text" class="form-control input-small div_load_port" id="div_load_port" name="div_load_port[]" value=""></td><td><input type="text" class="form-control input-small div_discharge_port" id="div_discharge_port" name="div_discharge_port[]" value=""></td><td><input type="text" class="form-control input-small div_net_wet" id="div_place_attendance" name="div_place_attendance[]" value=""></td></tr>');
        });  *****/


       /*$("#cargo_row").on("click",function(){
       
        var $tableBody = $('#cargo_details').find("tbody"),
                $trLast = $tableBody.find("tr:last"),
                $trNew = $trLast.clone();
            
            $trLast.after($trNew);
        });*/


        $('#cargo_row').click(function () { 

            $('#cargo_details tbody').append($('#cargo_details tbody tr:last').clone());

            $('#cargo_details tr').each(function(i) {
                if (i === 1)
                    return;

                var selectinput = $(this).find('select');
                //var textinput = $(this).find('input');
                //var textarea = $(this).find('textarea');
                selectinput.eq(0).attr('id', 'cargo' + i);
                selectinput.eq(1).attr('id', 'div_parameters' + i);
                //textinput.eq(0).attr('id', 'FinancialAmount' + i);
                //textarea.eq(0).attr('id', 'FinancialDescription' + i);
            });

        });       

        //$('.cargomaster').change(function(){
        $('#cargo1').change(function(){  
            
            //var params = $('.cargomaster').val();
            var params = $('#cargo1').val();
            alert(params);
            if(params != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>Addfileregisternew/fetch_labparameters',
               'type': 'post',
               'data' : { params : params},
               'success' : function(data)
               {
                 // alert(data);
                 $('#div_parameters1').html(data);
               } 
               });
             }
        });

        $('#cargo2').change(function(){  
            
            //var params = $('.cargomaster').val();
            var params = $('#cargo2').val();
            alert(params);
            if(params != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>Addfileregisternew/fetch_labparameters',
               'type': 'post',
               'data' : { params : params},
               'success' : function(data)
               {
                 // alert(data);
                 $('#div_parameters2').html(data);
               } 
               });
             }
        });

        $('#div_parameters1').change(function(){
            var params_id = $('#div_parameters1').val();

             if(params_id != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>Addfileregisternew/fetch_labmethods',
               'type': 'post',
               'data' : { params_id : params_id},
               'success' : function(data)
               {
                 // alert(data);
                 $('#div_methods1').html(data);
               } 
               });
             } 
        });


        //$('[name="parameters_checkbox"]').change(function()
        $("input[name='parameters_checkbox[]']").change(function()
        {
          if ($(this).is(':checked')) {
             //alert($(this).val());
             var method_params = $(this).val();
             if(method_params != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>Addfileregisternew/fetch_labmethods',
               'type': 'post',
               'data' : { method_params : method_params},
               'success' : function(data)
               {
                  //alert(data);
                  $('#div_lab_methods'+method_params).html(data);
               } 
               });
             } 
          };
        }); 
        

        $('#user_company').change(function(){
            var comp_id = $('#user_company').val();
         
               
             if(comp_id != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>Addbranchmaster/fetch_branch',
               'type': 'post',
               'data' : { branch_id : comp_id},
               'success' : function(data)
               {
                 // alert(data);
                 $('#branch_name').html(data);
               } 
               });
             } 
        });


        $('#company_country').change(function(){
            var comp_id = $('#company_country').val();

             if(comp_id != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>addcompanymaster/fetch_states',
               'type': 'post',
               'data' : { country_id : comp_id},
               'success' : function(data)
               {
                 // alert(data);
                 $('#company_state').html(data);
               } 
               });
             } 
        });


       $('#company_state').change(function(){
            var state_id = $('#company_state').val();
            
             if(state_id != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>addcompanymaster/fetch_city',
               'type': 'post',
               'data' : { state_id : state_id},
               'success' : function(data)
               {
                 
                 $('#company_city').html(data);
               } 
               });
             } 
        });

       $('#clients_interacted').change(function(){
            var comp_id = $('#clients_interacted').val();
            
             if(comp_id != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>Addclientinteraction/fetch_clientdata',
               'type': 'post',
               'data' : { id : comp_id},
               'success' : function(data)
               {
                 res = data.split("|");
                 //alert(res[2]);
                 $('#office_address').html(res[0]);
                 $('#office_no').val(res[1]);
                 $('#company_web').val(res[2]);
                 $('#country_name').val(res[3]);
                 $('#state_name').val(res[4]);
                 $('#city_name').val(res[5]);
                 $('#company_country').val(res[6]);
                 $('#company_state').val(res[7]);
                 $('#company_city').val(res[8]);

               } 
               });
             } 
        });


       $('#user_type').change(function(){
            var user_type = $('#user_type').val();
            //alert(user_type);
             if(user_type != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>Adduseraccessmaster/fetch_users',
               'type': 'post',
               'data' : { user_type : user_type},
               'success' : function(data)
               {
                 //alert(data);
                 $('#user_name').html(data);
               } 
               });
             } 
        });


        $('#cargo_group').change(function(){ 
            var cargo_group = $('#cargo_group').val();
            
            if(cargo_group != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>Addfileregister/fetch_cargo',
               'type': 'post',
               'data' : { cargo_group : cargo_group},
               'success' : function(data)
               {
                 
                 $('#cargo').html(data);
               } 
               });
             }
       });

       $('#cargo_group_new').change(function(){ 
            var cargo_group = $('#cargo_group_new').val();
            
            if(cargo_group != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>Addfileregisternew/fetch_cargo',
               'type': 'post',
               'data' : { cargo_group : cargo_group},
               'success' : function(data)
               {
                 $('.cargomaster').html(data);
               } 
               });
             }

             if(cargo_group != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>Addfileregisternew/fetch_packing',
               'type': 'post',
               'data' : { cargo_group : cargo_group},
               'success' : function(data)
               {
                 $('.packingmaster').html(data);
               } 
               });
             }

             if(cargo_group != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>Addfileregisternew/fetch_unit',
               'type': 'post',
               'data' : { cargo_group : cargo_group},
               'success' : function(data)
               {
                 $('.unitmaster').html(data);
               } 
               });
             }
       });  


       $('#main_menus').change(function(){
            var main_menus = $('#main_menus').val();
            //alert(main_menus);
             if(main_menus != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>Adduseraccessmaster/fetch_submenus',
               'type': 'post',
               'data' : { main_menus : main_menus},
               'success' : function(data)
               {
                 $('#submenu_text').html(data);
               } 
               });
             } 
        });

       <?php /*$('#cargo').change(function(){
            var cargo_id = $('#cargo').val();

             if(cargo_id != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>addfileregister/fetch_field_parameters',
               'type': 'post',
               'data' : { cargo_id : cargo_id},
               'success' : function(data)
               {
                 // alert(data);
                 $('#field_parameter_div').html(data);
               } 
               });
             }



             if(cargo_id != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>addfileregister/fetch_lab_parameters',
               'type': 'post',
               'data' : { cargo_id : cargo_id},
               'success' : function(data)
               {
                 // alert(data);
                 $('#lab_parameter_div').html(data);
               } 
               });
             }

        }); */ ?>

        $(".file_save").click(
            function() {
                //alert($(this).attr("value"));
                var $form = $('#fileregister-form');
                $("#file_save_button").val($(this).attr("value"));
                $form.data('validator').cancelSubmit = true;
                $form.submit();
            }
        );

        $(".parentCheckBox").click(
            function() {
                $(this).parents('fieldset:eq(0)').find('.childCheckBox').attr('checked', this.checked);
            }
        );
        //clicking the last unchecked or checked checkbox should check or uncheck the parent checkbox
        $('.childCheckBox').click(
            function() {
                if ($(this).parents('fieldset:eq(0)').find('.parentCheckBox').attr('checked') == true && this.checked == false)
                    $(this).parents('fieldset:eq(0)').find('.parentCheckBox').attr('checked', false);
                if (this.checked == true) {
                    var flag = true;
                    $(this).parents('fieldset:eq(0)').find('.childCheckBox').each(
                      function() {
                          if (this.checked == false)
                              flag = false;
                      }
                    );
                    $(this).parents('fieldset:eq(0)').find('.parentCheckBox').attr('checked', flag);
                }
            }
        );
       $('#edit_main_menus').change(function(){ 
            var main_menus = $('#edit_main_menus').val();
            var user_access_id = $('#user_access_id').val();
            //alert(user_access_id);
             if(main_menus != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>Edituseraccessmaster/fetch_submenus_userid',
               'type': 'post',
               'data' : { main_menus : main_menus,user_access_id : user_access_id},
               'success' : function(data)
               {user_access_id
                 $('#submenu_text').html(data);
               } 
               });
             } 
        });

      

        $("#filladdress").on("click", function(){
          if (this.checked) {
              $("#perm_address").val($("#curr_address").val());
          } else {
              $("#perm_address").val('');
          }
        });


/*function selectAll(){
        var items=document.getElementsByName('viewcheckbox');
        for(var i=0; i<items.length; i++){
          if(items[i].type=='checkbox')
            items[i].checked=true;
        }
      }*/
      $('#div2').hide(); 
      $('#div3').hide(); 
      $('#div4').hide(); 
      $('#div5').hide(); 
      $('#div6').hide(); 
      $('#div7').hide();
      $('#div8').hide();
      $('#div9').hide();
      $('#div10').hide();
      $('#div11').hide();
      $('#file_type').change(function(){
          var id = $(this).val();
           //alert(id);
          if (id==1) { 
          $('#div1').show(); 
          $('#div2').hide(); 
          $('#div3').hide(); 
          $('#div4').hide(); 
          $('#div5').hide(); 
          $('#div6').hide(); 
          $('#div7').hide();
          $('#div8').hide();
          $('#div9').hide();
          $('#div10').hide();
          $('#div11').hide(); 
          //$('#div3').hide(); 
        }
          
        if (id==2) {
          $('#div2').show(); 
          $('#div1').hide(); 
          $('#div3').hide(); 
          $('#div4').hide(); 
          $('#div5').hide(); 
          $('#div6').hide(); 
          $('#div7').hide();
          $('#div8').hide();
          $('#div9').hide();
          $('#div10').hide();
          $('#div11').hide();
          //$('#div3').hide(); 
        }
        if (id==3) {
          $('#div3').show(); 
          $('#div1').hide(); 
          $('#div2').hide(); 
          $('#div4').hide(); 
          $('#div5').hide(); 
          $('#div6').hide(); 
          $('#div7').hide();
          $('#div8').hide();
          $('#div9').hide();
          $('#div10').hide();
          $('#div11').hide(); 
        }
        if (id==4) {
          $('#div4').show(); 
          $('#div1').hide(); 
          $('#div2').hide(); 
          $('#div3').hide(); 
          $('#div5').hide(); 
          $('#div6').hide(); 
          $('#div7').hide();
          $('#div8').hide();
          $('#div9').hide();
          $('#div10').hide();
          $('#div11').hide(); 
        }
        if (id==5) {
          $('#div5').show(); 
          $('#div1').hide(); 
          $('#div2').hide(); 
          $('#div3').hide(); 
          $('#div4').hide(); 
          $('#div6').hide(); 
          $('#div7').hide();
          $('#div8').hide();
          $('#div9').hide();
          $('#div10').hide();
          $('#div11').hide(); 
        }
        if (id==6) {
          $('#div6').show(); 
          $('#div1').hide(); 
          $('#div2').hide(); 
          $('#div3').hide(); 
          $('#div4').hide(); 
          $('#div5').hide(); 
          $('#div7').hide();
          $('#div8').hide();
          $('#div9').hide();
          $('#div10').hide();
          $('#div11').hide(); 
        }
        if (id==7) {
          $('#div7').show(); 
          $('#div1').hide(); 
          $('#div2').hide(); 
          $('#div3').hide(); 
          $('#div4').hide(); 
          $('#div5').hide(); 
          $('#div6').hide();
          $('#div8').hide();
          $('#div9').hide();
          $('#div10').hide();
          $('#div11').hide(); 
        }
        if (id==8) {
          $('#div8').show(); 
          $('#div1').hide(); 
          $('#div2').hide(); 
          $('#div3').hide(); 
          $('#div4').hide(); 
          $('#div5').hide(); 
          $('#div6').hide();
          $('#div7').hide();
          $('#div9').hide();
          $('#div10').hide();
          $('#div11').hide(); 
        }
        if (id==9) {
          $('#div9').show(); 
          $('#div1').hide(); 
          $('#div2').hide(); 
          $('#div3').hide(); 
          $('#div4').hide(); 
          $('#div5').hide(); 
          $('#div6').hide();
          $('#div7').hide();
          $('#div8').hide();
          $('#div10').hide();
          $('#div11').hide(); 
        }
        if (id==10) {
          $('#div10').show(); 
          $('#div1').hide(); 
          $('#div2').hide(); 
          $('#div3').hide(); 
          $('#div4').hide(); 
          $('#div5').hide(); 
          $('#div6').hide();
          $('#div7').hide();
          $('#div8').hide();
          $('#div9').hide();
          $('#div11').hide(); 
        }
        if (id==11) {
          $('#div11').show(); 
          $('#div1').hide(); 
          $('#div2').hide(); 
          $('#div3').hide(); 
          $('#div4').hide(); 
          $('#div5').hide(); 
          $('#div6').hide();
          $('#div7').hide();
          $('#div8').hide();
          $('#div9').hide();
          $('#div10').hide(); 
        }
    });



      $('#select-all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }



});

    </script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
