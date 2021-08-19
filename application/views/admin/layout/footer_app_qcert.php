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
<script src="<?php echo ASSETS_PATH; ?>plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
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
           Custom.initDesignationMaster();
           Custom.initClientInteraction();
           Custom.initNewClientInteraction();
           Custom.initUserMaster();
           Custom.initUserDetails();
           Custom.initUserAccess();
           Custom.initAddfileregister();
           Custom.initInvoiceMaster();
           Custom.initEditInvoiceMaster();
           Custom.initOperationsMaster();
           Custom.initAddInvoiceMaster();
           Custom.initEditInvoiceMaster(); 
           Custom.initPaymentInvoiceMaster();
           Custom.initQCertificateMaster();
           Custom.initAddActivity();
           Custom.initUpdateActivity();
           Custom.initChangePassMaster();
           ComponentsDropdowns.init();
           //FormFileUpload.init();
           TableAdvanced.init();

           <?php if (@$_GET['check_min']==1) {
              echo "$('.minrm').hide();";
           } ?>

           <?php if (@$_GET['check_max']==1) {
              echo "$('.maxrm').hide();";
           } ?>

           <?php if (@$_GET['check_specs']==1) {
              echo "$('.spec').hide();";
           } ?>
    

        });

        
        var cloneCount = 2;
        $(function() {    
          
          var $section = $("#Hold1").clone(); 
            $( "#cloneDiv" ).click(function() { 
                var $sectionClone = $section.clone().prop("id", "Hold");
                $("h4", $sectionClone).text("Hold"+cloneCount);
                //$("#invitems_cargo_name", $sectionClone).val(cloneCount);
                $("#invitems_cargo_name", $sectionClone).attr('id', 'invitems_cargo_name_'+cloneCount).val(cloneCount);
                $('#Hold1').append($sectionClone); 
                cloneCount++;
            });
        });

        var id = 1;
        function add_specifications() {
              if (id==1) { 
                $('#div_hold_1').show(); 
                $('#div_hold_2').hide(); 
                $('#div_hold_3').hide();
                $('#div_hold_4').hide();
                $('#div_hold_5').hide();
                $('#div_hold_6').hide();
                $('#div_hold_7').hide();
                $('#div_hold_8').hide();
                $('#div_hold_9').hide();
                $('#div_hold_10').hide();
              }
              id++;
              if (id==2) { 
                $('#div_hold_1').show(); 
                $('#div_hold_2').show(); 
                $('#div_hold_3').hide();
                $('#div_hold_4').hide();
                $('#div_hold_5').hide();
                $('#div_hold_6').hide();
                $('#div_hold_7').hide();
                $('#div_hold_8').hide();
                $('#div_hold_9').hide();
                $('#div_hold_10').hide();
              }

              if (id==3) { 
                $('#div_hold_1').show(); 
                $('#div_hold_2').show(); 
                $('#div_hold_3').show();
                $('#div_hold_4').hide();
                $('#div_hold_5').hide();
                $('#div_hold_6').hide();
                $('#div_hold_7').hide();
                $('#div_hold_8').hide();
                $('#div_hold_9').hide();
                $('#div_hold_10').hide();
              }

              if (id==4) { 
                $('#div_hold_1').show(); 
                $('#div_hold_2').show(); 
                $('#div_hold_3').show();
                $('#div_hold_4').show();
                $('#div_hold_5').hide();
                $('#div_hold_6').hide();
                $('#div_hold_7').hide();
                $('#div_hold_8').hide();
                $('#div_hold_9').hide();
                $('#div_hold_10').hide();
              }

              if (id==5) { 
                $('#div_hold_1').show(); 
                $('#div_hold_2').show(); 
                $('#div_hold_3').show();
                $('#div_hold_4').show();
                $('#div_hold_5').show();
                $('#div_hold_6').hide();
                $('#div_hold_7').hide();
                $('#div_hold_8').hide();
                $('#div_hold_9').hide();
                $('#div_hold_10').hide();
              }

              if (id==6) { 
                $('#div_hold_1').show(); 
                $('#div_hold_2').show(); 
                $('#div_hold_3').show();
                $('#div_hold_4').show();
                $('#div_hold_5').show();
                $('#div_hold_6').show();
                $('#div_hold_7').hide();
                $('#div_hold_8').hide();
                $('#div_hold_9').hide();
                $('#div_hold_10').hide();
              }

              if (id==7) { 
                $('#div_hold_1').show(); 
                $('#div_hold_2').show(); 
                $('#div_hold_3').show();
                $('#div_hold_4').show();
                $('#div_hold_5').show();
                $('#div_hold_6').show();
                $('#div_hold_7').show();
                $('#div_hold_8').hide();
                $('#div_hold_9').hide();
                $('#div_hold_10').hide();
              }

              if (id==8) { 
                $('#div_hold_1').show(); 
                $('#div_hold_2').show(); 
                $('#div_hold_3').show();
                $('#div_hold_4').show();
                $('#div_hold_5').show();
                $('#div_hold_6').show();
                $('#div_hold_7').show();
                $('#div_hold_8').show();
                $('#div_hold_9').hide();
                $('#div_hold_10').hide();
              }

              if (id==9) { 
                $('#div_hold_1').show(); 
                $('#div_hold_2').show(); 
                $('#div_hold_3').show();
                $('#div_hold_4').show();
                $('#div_hold_5').show();
                $('#div_hold_6').show();
                $('#div_hold_7').show();
                $('#div_hold_8').show();
                $('#div_hold_9').show();
                $('#div_hold_10').hide();
              }

              if (id==10) { 
                $('#div_hold_1').show(); 
                $('#div_hold_2').show(); 
                $('#div_hold_3').show();
                $('#div_hold_4').show();
                $('#div_hold_5').show();
                $('#div_hold_6').show();
                $('#div_hold_7').show();
                $('#div_hold_8').show();
                $('#div_hold_9').show();
                $('#div_hold_10').show();
              }
         } 

        $('body').on('click', '.rmv',function(){
            $(this).closest('tr').remove();
          });

        $('#check_holds').click(function() {
            if(this.checked) {
              $('#hold_div').hide();
            } else {
              $('#hold_div').show();
            }
        });

        $('#check_specs').click(function() {
            if(this.checked) {
              $('.spec').hide();
            } else {
              $('.spec').show();
            }
        });

        $('#check_min').click(function() { 
            if(this.checked) {
              $('.minrm').hide();
            } else {
              $('.minrm').show();
            }
        });

        $('#check_max').click(function() { 
            if(this.checked) {
              $('.maxrm').hide();
            } else {
              $('.maxrm').show();
            }
        });

        function cargo_rows(i) { 
                       

            var inv_tbody1 = $('#cert_hold_details_'+i).children('tbody');
            //Then if no tbody just select your table 
            var inv_table1 = inv_tbody1.length ? inv_tbody1 : $('#cert_hold_details_'+i);


            inv_table1.append('<tr class="active"><td><select class="form-control input-large" name="qcert_spec[]" id="qcert_spec">'+comp_branch+'</select></td><td class="minrm"><select class="form-control input-large" name="qcert_labmin[]" id="qcert_labmin">'+lab_mins+'</select></td><td><select class="form-control input-large" name="qcert_labmax[]" id="qcert_labmax">'+lab_maxs+'</select></td><td><select class="form-control input-large" name="qcert_labmethods[]" id="qcert_labmethods">'+lab_methods+'</select></td><td><input type="text" class="form-control input-small" placeholder="" name="qcert_results[]" id="qcert_results" value=""></td></tr>');



            //});
        }
        
        function cert_rows(i) {
              j = 1;
              $('#cert_hold_details_'+i+' tbody').append($('#cert_hold_details_'+i+' tbody tr:last').clone());

              $('#cert_hold_details_'+i+' tr').each(function(j) {
                  //alert(j);
                  var selectinput = $(this).find('select');
                  //var selectinput1 = $(this).find('select');
                  //var selectinput2 = $(this).find('select');
                  var selectinput3 = $(this).find('select');
                  var selectinput4 = $(this).find('select');
                  var textinput = $(this).find('input');
                  var textinput1 = $(this).find('input');
                  var textinput2 = $(this).find('input');

                  selectinput.eq(0).attr('id', 'qcert_spec_' + i + j);
                  textinput.eq(0).attr('id', 'qcert_labmin_'  + i + j);
                  //selectinput1.eq(1).attr('id', 'qcert_labmin_'  + i + j);
                  textinput1.eq(1).attr('id', 'qcert_labmax_'  + i + j);
                  //selectinput2.eq(2).attr('id', 'qcert_labmax_'  + i + j);
                  selectinput3.eq(1).attr('id', 'qcert_labunits_'  + i + j);
                  selectinput4.eq(2).attr('id', 'qcert_labmethods_'  + i + j);
                  textinput2.eq(2).attr('id', 'qcert_results_'  + i + j);
                  //$('#qcert_results').val(j);
                  //j++;
              });  
              
              
        }

        function other_rows(i) { 
            //alert(i);
            var inv_tbody1 = $('#invoice_cargo_item_details_'+i).children('tbody');
            //Then if no tbody just select your table 
            var inv_table1 = inv_tbody1.length ? inv_tbody1 : $('#invoice_cargo_item_details_'+i);

            inv_table1.append('<tr class="active"><td><input type="text" class="form-control input-large" placeholder="" name="invitems_cargo_name[]" id="invitems_cargo_name" value="" ><input type="hidden" class="form-control input-large" placeholder="" name="invitems_cargo_details[]" id="invitems_cargo_details" value="invitems_cargo_details|'+i+'" ><input type="hidden" name="invitems_cargo_group[]" id="invitems_cargo_group" value="Other"></td><td><input type="text" class="form-control input-small" placeholder="" name="invitems_quantity[]" id="invitems_quantity" value="" onkeyup="cargo_amount3(this);"></td><td><input type="text" class="form-control input-small" placeholder="" name="invitems_rate[]" id="invitems_rate" value="" onkeyup="cargo_amount3(this);"></td><td><input type="text" class="form-control input-small" placeholder="" name="invitems_rate[]" id="invitems_rate" value="" onkeyup="cargo_amount3(this);"></td></tr>');



            //});
        }



        /*var inv_tbody1 = $('#invoice_cargo_item_details_1').children('tbody');
        //Then if no tbody just select your table 
        var inv_table1 = inv_tbody1.length ? inv_tbody1 : $('#invoice_cargo_item_details_1');
        $('#invoice_cargo_item_1').click(function(){
            //Add row
            inv_table1.append('<tr class="active"><td><input type="text" class="form-control input-large" placeholder="" name="invitems_cargo_name[]" id="invitems_cargo_name" value="" ><input type="hidden" class="form-control input-large" placeholder="" name="invitems_cargo_details[]" id="invitems_cargo_details" value="" ></td><td><input type="text" class="form-control input-small" placeholder="" name="invitems_quantity[]" id="invitems_quantity" value="" onkeyup="cargo_amount3(this);"></td><td><input type="text" class="form-control input-small" placeholder="" name="invitems_unit[]" id="invitems_unit" value="" ></td><td><input type="text" class="form-control input-small" placeholder="" name="invitems_rate[]" id="invitems_rate" value="" onkeyup="cargo_amount3(this);"></td><td width="10%"><input type="text" class="form-control input-small invitems_amt" placeholder="" name="invitems_amt[]" id="invitems_amt" value="" ></td></tr>');
        });


        var inv_tbody2 = $('#invoice_cargo_item_details_2').children('tbody');
        //Then if no tbody just select your table 
        var inv_table2= inv_tbody2.length ? inv_tbody2 : $('#invoice_cargo_item_details_2');
        $('#invoice_cargo_item_2').click(function(){
            //Add row
            inv_table2.append('<tr class="active"><td><input type="text" class="form-control input-large" placeholder="" name="invitems_cargo_name[]" id="invitems_cargo_name" value="" ><input type="hidden" class="form-control input-large" placeholder="" name="invitems_cargo_details[]" id="invitems_cargo_details" value="" ></td><td><input type="text" class="form-control input-small" placeholder="" name="invitems_quantity[]" id="invitems_quantity" value="" onkeyup="cargo_amount3(this);"></td><td><input type="text" class="form-control input-small" placeholder="" name="invitems_unit[]" id="invitems_unit" value="" ></td><td><input type="text" class="form-control input-small" placeholder="" name="invitems_rate[]" id="invitems_rate" value="" onkeyup="cargo_amount3(this);"></td><td width="10%"><input type="text" class="form-control input-small invitems_amt" placeholder="" name="invitems_amt[]" id="invitems_amt" value="" ></td></tr>');
        });

        var inv_tbody3 = $('#invoice_cargo_item_details_3').children('tbody');
        //Then if no tbody just select your table 
        var inv_table3= inv_tbody3.length ? inv_tbody3 : $('#invoice_cargo_item_details_3');
        $('#invoice_cargo_item_3').click(function(){
            //Add row
            inv_table3.append('<tr class="active"><td><input type="text" class="form-control input-large" placeholder="" name="invitems_cargo_name[]" id="invitems_cargo_name" value="" ><input type="hidden" class="form-control input-large" placeholder="" name="invitems_cargo_details[]" id="invitems_cargo_details" value="" ></td><td><input type="text" class="form-control input-small" placeholder="" name="invitems_quantity[]" id="invitems_quantity" value="" onkeyup="cargo_amount3(this);"></td><td><input type="text" class="form-control input-small" placeholder="" name="invitems_unit[]" id="invitems_unit" value="" ></td><td><input type="text" class="form-control input-small" placeholder="" name="invitems_rate[]" id="invitems_rate" value="" onkeyup="cargo_amount3(this);"></td><td width="10%"><input type="text" class="form-control input-small invitems_amt" placeholder="" name="invitems_amt[]" id="invitems_amt" value="" ></td></tr>');
        });*/

        
        $('#div_invoice_items_btn').click(function()
        {
            var sum = 0;   
            $(".invitems_amt").each(function() 
            { 
              if(!isNaN(this.value) && this.value.length!=0) 
              {
                sum += parseFloat(this.value);            
              }         
            });

            //alert(sum);
            $('#invoice_subtotal_amt').val(sum);
            $('#invoice_subtotal').val(sum);
            $('#invoice_total_full_amt').val(sum);

            if ($('#invoice_ex_rate').val()) { 
              $('#invoice_subtotal_amt').val((parseFloat($('#invoice_subtotal_amt').val()))*parseFloat($('#invoice_ex_rate').val()));
              $('#invoice_subtotal_amt').val(parseFloat($('#invoice_subtotal_amt').val()).toFixed(2));

              $('#invoice_total_full_amt').val((parseFloat($('#invoice_total_full_amt').val()))*parseFloat($('#invoice_ex_rate').val()));
              $('#invoice_total_full_amt').val(parseFloat($('#invoice_total_full_amt').val()).toFixed(2));
          }

          if ($('#invoice_total_vat_percnt').val()) { 
              $('#invoice_total_full_amt').val((parseFloat($('#invoice_subtotal_amt').val()))+(parseFloat($('#invoice_subtotal_amt').val())*parseFloat($('#invoice_total_vat_percnt').val())/100));

              $('#invoice_subtotal_amt').val(parseFloat($('#invoice_subtotal_amt').val()).toFixed(2));

              $('#invoice_tax_amt').val((parseFloat($('#invoice_total_full_amt').val()).toFixed(2))-(parseFloat($('#invoice_subtotal_amt').val())).toFixed(2));

              $('#invoice_total_tax_amt').val(parseFloat($('#invoice_tax_amt').val()).toFixed(2));

              $('#invoice_total_full_amt').val(parseFloat($('#invoice_total_full_amt').val()).toFixed(2));
          }


        });

        function cargo_amount2(el) {
            var row = $(el).closest("tr"),
            inputs = row.find("[type=text]")
            qty = inputs.eq(1).val(),
            rate = inputs.eq(4).val();

            inputs.eq(5).val((qty * rate).toFixed(2));

        }  

        function cargo_amount3(el) {
            var row = $(el).closest("tr"),
            inputs = row.find("[type=text]")
            qty = inputs.eq(1).val(),
            rate = inputs.eq(2).val();
            //alert(rate);
            inputs.eq(3).val((qty * rate).toFixed(2));

        } 

        /*$("#invitems_quantity,#invitems_rate").keyup(function () {
          $('#invitems_amt').val($('#invitems_quantity').val() * $('#invitems_rate').val());
        });*/
            

      /*$('#div_invoice_items_btn').click(function(){          
          var sum = 0;
          $('.invitems_amt').each(function () {
               //var qty = $(this).find('.invitems_amt').val(); 
               //alert(qty);
               alert($('.invitems_amt').val());
              //var prodprice = Number($('.invitems_amt').val());
              //sum = sum + prodprice;
          });
          //alert(sum);

      });*/

        // This is used in adddailyactivity module start
        //Try to get tbody first with jquery children. works faster!
        var tbody = $('#activity_details').children('tbody');
        //Then if no tbody just select your table 
        var table = tbody.length ? tbody : $('#activity_details');
        $('#activity_row').click(function(){
            //Add row
            table.append('<tr class="active"><td><input type="text" class="form-control input-small" id="div_transport_mode" name="div_transport_mode[]" value=""></td><td><input type="text" class="form-control input-small" id="div_booking_no" name="div_booking_no[]" value=""></td><td><input type="text" class="form-control input-small" id="div_container_no" name="div_container_no[]" value=""></td><td><input type="text" class="form-control input-small" id="div_teu_feu" name="div_teu_feu[]" value=""></td><td><input type="text" class="form-control input-small div_bags_no" id="div_bags_no" name="div_bags_no[]" value=""></td><td><input type="text" class="form-control input-small div_gross_wt" id="div_gross_wt" name="div_gross_wt[]" value=""></td><td><input type="text" class="form-control input-small div_tare_wt" id="div_tare_wt" name="div_tare_wt[]" value=""></td><td><input type="text" class="form-control input-small div_container_wt" id="div_container_wt" name="div_container_wt[]" value=""></td><td><input type="text" class="form-control input-small div_net_wet" id="div_net_wet" name="div_net_wet[]" value=""></td><td><input type="text" class="form-control input-small div_standard_wt" id="div_standard_wt" name="div_standard_wt[]" value=""></td><td><input type="text" class="form-control input-small" id="div_lot_no" name="div_lot_no[]" value=""></td><td><input type="text" class="form-control input-small" id="div_suppliers_name" name="div_suppliers_name[]" value=""></td><td><input type="text" class="form-control input-small" id="div_packing" name="div_packing[]" value=""></td><td><input type="text" class="form-control input-small" id="div_remarks" name="div_remarks[]" value=""></td><td><input type="text" class="form-control input-small" id="div_line_sealno" name="div_line_sealno[]" value=""></td><td><input type="text" class="form-control input-small" id="div_other_sealno" name="div_other_sealno[]" value=""></td><td><input type="text" class="form-control input-small" id="div_empty_bag_wt" name="div_empty_bag_wt[]" value=""></td><td><input type="text" class="form-control input-small" id="div_total_empty_bag_wt" name="div_total_empty_bag_wt[]" value=""></td></tr>');
        }); 

        var remarksdiv = $('#remark_details').children('div');
        var activity_remarksdiv = $('#remark_details');
        $('#remark_row').click(function(){
            //Add row
            activity_remarksdiv.append('<div class="form-group"><label class="control-label col-md-3">Remarks</label><div class="col-md-9"><input type="text" class="form-control" placeholder="" name="remarks_activity[]" id="remarks_activity"></div>');
        }); 

        var marksnodiv = $('#marksno_details').children('div');
        var activity_marksnodiv = $('#marksno_details');
        $('#marksno_row').click(function(){
            //Add row
            activity_marksnodiv.append('<div class="form-group"><label class="control-label col-md-3">Marks & Nos</label><div class="col-md-9"><input type="text" class="form-control" placeholder="" name="marksno_activity[]" id="marksno_activity"></div>');
        }); 

        // This is used in adddailyactivity module  End

        $(document).on("change", ".div_bags_no", function() {
            var sum=0;
            $(".div_bags_no").each(function(){
                if($(this).val() !== "")
                  sum += parseFloat($(this).val(), 10);   
            });
            //alert(sum);
            $("#totdiv_bags_no").val(sum);
        });

        $(document).on("change", ".div_gross_wt", function() {
            var sum=0;
            $(".div_gross_wt").each(function(){
                if($(this).val() !== "")
                  sum += parseFloat($(this).val(), 10);   
            });
            //alert(sum);
            $("#totdiv_gross_wt").val(sum);
        });

         $(document).on("change", ".div_tare_wt", function() {
            var sum=0;
            $(".div_tare_wt").each(function(){
                if($(this).val() !== "")
                  sum += parseFloat($(this).val(), 10);   
            });
            //alert(sum);
            $("#totdiv_tare_wt").val(sum);
        });

         $(document).on("change", ".div_container_wt", function() {
            var sum=0;
            $(".div_container_wt").each(function(){
                if($(this).val() !== "")
                  sum += parseFloat($(this).val(), 10);   
            });
            //alert(sum);
            $("#totdiv_container_wt").val(sum);
        });

         $(document).on("change", ".div_net_wet", function() {
            var sum=0;
            $(".div_net_wet").each(function(){
                if($(this).val() !== "")
                  sum += parseFloat($(this).val(), 10);   
            });
            //alert(sum);
            $("#totdiv_net_wt").val(sum);
        });

         $(document).on("change", ".div_standard_wt", function() {
            var sum=0;
            $(".div_standard_wt").each(function(){
                if($(this).val() !== "")
                  sum += parseFloat($(this).val(), 10);   
            });
            //alert(sum);
            $("#totdiv_standard_wt").val(sum);
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
   
              // fetch_countrycode for adduseremployeedetails page
             if(comp_id != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>addcompanymaster/fetch_countrycode',
               'type': 'post',
               'data' : { country_id : comp_id},
               'success' : function(data)
               {
                 $('#country_code').html(data);
               } 
               });
             } 

             // fetch_countrycode for addclientmaster page
             if(comp_id != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>addcompanymaster/fetch_phonecode',
               'type': 'post',
               'data' : { country_id : comp_id},
               'success' : function(data)
               {
                 //alert(data);
                 $('#client_tel_prefix').val(data);
                 $('#client_mobile_prefix').val(data);
               } 
               });
             } 

        });

      $('#invoice_rec_amt').change(function(){ 
          //alert($('#invoice_balane_amt').val());
          if ($('#invoice_bal_amt').val()) { 
            $('#invoice_balane_amt').val((parseFloat($('#invoice_bal_amt').val()))-parseFloat($('#invoice_rec_amt').val()));
            $('#invoice_balane_amt').val(parseFloat($('#invoice_balane_amt').val()).toFixed(2));
          } else { 
            $('#invoice_balane_amt').val((parseFloat($('#invoice_amt').val()))-parseFloat($('#invoice_rec_amt').val()));
            $('#invoice_balane_amt').val(parseFloat($('#invoice_balane_amt').val()).toFixed(2));
          }
          


      });

      $('#div_invoice_btn').click(function(){  
          //
          $('#invoice_subtotal_amt').val(parseFloat($('#div1_invoice_amt').val())+parseFloat($('#div2_invoice_amt').val())+parseFloat($('#div3_invoice_amt').val())+parseFloat($('#div4_invoice_amt').val())+parseFloat($('#div5_invoice_amt').val()));
          //$('#invoice_subtotal_amt').val((parseFloat($('#invoice_subtotal_amt').val()))*parseFloat($('#invoice_ex_rate').val()));

          $('#invoice_subtotal').val(parseFloat($('#div1_invoice_amt').val())+parseFloat($('#div2_invoice_amt').val())+parseFloat($('#div3_invoice_amt').val())+parseFloat($('#div4_invoice_amt').val())+parseFloat($('#div5_invoice_amt').val()));
          //$('#invoice_subtotal').val((parseFloat($('#invoice_subtotal').val()))*parseFloat($('#invoice_ex_rate').val()));

          $('#invoice_total_full_amt').val(parseFloat($('#div1_invoice_amt').val())+parseFloat($('#div2_invoice_amt').val())+parseFloat($('#div3_invoice_amt').val())+parseFloat($('#div4_invoice_amt').val())+parseFloat($('#div5_invoice_amt').val()));
          //$('#invoice_total_full_amt').val((parseFloat($('#invoice_total_full_amt').val()))*parseFloat($('#invoice_ex_rate').val()));

          if ($('#invoice_ex_rate').val()) { 
              $('#invoice_subtotal_amt').val((parseFloat($('#invoice_subtotal_amt').val()))*parseFloat($('#invoice_ex_rate').val()));
              $('#invoice_subtotal_amt').val(parseFloat($('#invoice_subtotal_amt').val()).toFixed(2));

              $('#invoice_total_full_amt').val((parseFloat($('#invoice_total_full_amt').val()))*parseFloat($('#invoice_ex_rate').val()));
              $('#invoice_total_full_amt').val(parseFloat($('#invoice_total_full_amt').val()).toFixed(2));
          }

          if ($('#invoice_total_vat_percnt').val()) { 
              $('#invoice_total_full_amt').val((parseFloat($('#invoice_subtotal_amt').val()))+(parseFloat($('#invoice_subtotal_amt').val())*parseFloat($('#invoice_total_vat_percnt').val())/100));

              $('#invoice_subtotal_amt').val(parseFloat($('#invoice_subtotal_amt').val()).toFixed(2));

              $('#invoice_tax_amt').val((parseFloat($('#invoice_total_full_amt').val()).toFixed(2))-(parseFloat($('#invoice_subtotal_amt').val())).toFixed(2));

              $('#invoice_total_tax_amt').val(parseFloat($('#invoice_tax_amt').val()).toFixed(2));

              $('#invoice_total_full_amt').val(parseFloat($('#invoice_total_full_amt').val()).toFixed(2));
          }


      });   

      $('#invoice_ex_rate').change(function(){  
          if ($('#invoice_total_vat_percnt').val()) { 
              $('#invoice_subtotal_amt').val(((parseFloat($('#invoice_subtotal').val()))*parseFloat($('#invoice_ex_rate').val())).toFixed(2));
              $('#invoice_total_full_amt').val((parseFloat($('#invoice_subtotal_amt').val()))+(parseFloat($('#invoice_subtotal_amt').val())*parseFloat($('#invoice_total_vat_percnt').val())/100));

              $('#invoice_subtotal_amt').val(parseFloat($('#invoice_subtotal_amt').val()).toFixed(2));


              $('#invoice_tax_amt').val((parseFloat($('#invoice_total_full_amt').val()).toFixed(2))-(parseFloat($('#invoice_subtotal_amt').val())).toFixed(2));

              $('#invoice_total_tax_amt').val(parseFloat($('#invoice_tax_amt').val()).toFixed(2));
              $('#invoice_total_full_amt').val(parseFloat($('#invoice_total_full_amt').val()).toFixed(2));

          } else { 
              $('#invoice_subtotal_amt').val(((parseFloat($('#invoice_subtotal').val()))*parseFloat($('#invoice_ex_rate').val())).toFixed(2));
              $('#invoice_total_full_amt').val(((parseFloat($('#invoice_subtotal').val()))*parseFloat($('#invoice_ex_rate').val())).toFixed(2));
          }  

      });  

      /*$('#div1_approx_qty').change(function(){ 

          if ($('#div1_approx_qty').val() > $('#approx_qty').val()) {
            alert('Quantity should not be Greater than file quantity.');
          } 


      }); */ 


      $('#invoice_total_vat_percnt').change(function(){  
          //$('#invoice_total_full_amt').val((parseInt($('#invoice_subtotal_amt').val()))+(parseInt($('#invoice_subtotal_amt').val())*parseInt($('#invoice_total_vat_percnt').val())/100));
          $('#invoice_total_full_amt').val((parseFloat($('#invoice_subtotal_amt').val()))+(parseFloat($('#invoice_subtotal_amt').val())*parseFloat($('#invoice_total_vat_percnt').val())/100));

          $('#invoice_tax_amt').val((parseFloat($('#invoice_total_full_amt').val()).toFixed(2))-(parseFloat($('#invoice_subtotal_amt').val())).toFixed(2));

          $('#invoice_total_tax_amt').val(parseFloat($('#invoice_tax_amt').val()).toFixed(2));

          $('#invoice_total_full_amt').val(parseFloat($('#invoice_total_full_amt').val()).toFixed(2));

          //$('#invoice_total_tax_amt').val((parseFloat($('#invoice_subtotal_amt').val()))+(parseFloat($('#invoice_subtotal_amt').val())*parseFloat($('#invoice_total_vat_percnt').val())/100)-(parseFloat($('#invoice_subtotal_amt').val())).toFixed(2));
          //alert(parseFloat($('#invoice_total_tax_amt').val()).toFixed(2));
       });  


       $('#invoice_tax_amt').change(function(){ 
          //alert($('#invoice_tax_amt').val());
          $('#invoice_amt').val($('#invoice_basic_amt').val()-$('#invoice_tax_amt').val());
       }); 

       $('#div1_approx_qty').change(function(){ 
          if( !$('#div1_approx_qty').val() ) { $('#div1_approx_qty').val(1); }
          
          $('#div1_invoice_amt').val($('#div1_approx_qty').val()*$('#div1_invoice_rate').val());
          $('#div1_invoice_amt').val(parseFloat($('#div1_invoice_amt').val()).toFixed(2));
       }); 

       $('#div2_approx_qty').change(function(){ 
          if( !$('#div2_approx_qty').val() ) { $('#div2_approx_qty').val(1); }

          $('#div2_invoice_amt').val($('#div2_approx_qty').val()*$('#div2_invoice_rate').val());
          $('#div2_invoice_amt').val(parseFloat($('#div2_invoice_amt').val()).toFixed(2));
       }); 

       $('#div3_approx_qty').change(function(){ 
          if( !$('#div3_approx_qty').val() ) { $('#div3_approx_qty').val(1); }

          $('#div3_invoice_amt').val($('#div3_approx_qty').val()*$('#div3_invoice_rate').val());
          $('#div3_invoice_amt').val(parseFloat($('#div3_invoice_amt').val()).toFixed(2));
       });

       $('#div4_approx_qty').change(function(){ 
          if( !$('#div4_approx_qty').val() ) { $('#div4_approx_qty').val(1); }

          $('#div4_invoice_amt').val($('#div4_approx_qty').val()*$('#div4_invoice_rate').val());
          $('#div4_invoice_amt').val(parseFloat($('#div4_invoice_amt').val()).toFixed(2));
       });

       $('#div5_approx_qty').change(function(){ 
          if( !$('#div5_approx_qty').val() ) { $('#div5_approx_qty').val(1); }

          $('#div5_invoice_amt').val($('#div5_approx_qty').val()*$('#div5_invoice_rate').val());
          $('#div5_invoice_amt').val(parseFloat($('#div5_invoice_amt').val()).toFixed(2));
       });

       $('#div1_invoice_rate').change(function(){ 
          //alert($('#invoice_tax_amt').val());
          if( !$('#div1_approx_qty').val() ) { $('#div1_approx_qty').val(1); }
          
          $('#div1_invoice_amt').val($('#div1_approx_qty').val()*$('#div1_invoice_rate').val());
          $('#div1_invoice_amt').val(parseFloat($('#div1_invoice_amt').val()).toFixed(2));
       });

       $('#div2_invoice_rate').change(function(){ 
          //alert($('#invoice_tax_amt').val());
          if( !$('#div2_approx_qty').val() ) { $('#div2_approx_qty').val(1); }

          $('#div2_invoice_amt').val($('#div2_approx_qty').val()*$('#div2_invoice_rate').val());
          $('#div2_invoice_amt').val(parseFloat($('#div2_invoice_amt').val()).toFixed(2));
       });

       $('#div3_invoice_rate').change(function(){ 
          //alert($('#invoice_tax_amt').val());
          if( !$('#div3_approx_qty').val() ) { $('#div3_approx_qty').val(1); }

          $('#div3_invoice_amt').val($('#div3_approx_qty').val()*$('#div3_invoice_rate').val());
          $('#div3_invoice_amt').val(parseFloat($('#div3_invoice_amt').val()).toFixed(2));
       });


       $('#div4_invoice_rate').change(function(){ 
          //alert($('#invoice_tax_amt').val());
          if( !$('#div4_approx_qty').val() ) { $('#div4_approx_qty').val(1); }

          $('#div4_invoice_amt').val($('#div4_approx_qty').val()*$('#div4_invoice_rate').val());
          $('#div4_invoice_amt').val(parseFloat($('#div4_invoice_amt').val()).toFixed(2));
       });

       $('#div5_invoice_rate').change(function(){ 
          //alert($('#invoice_tax_amt').val());
          if( !$('#div5_approx_qty').val() ) { $('#div5_approx_qty').val(1); }

          $('#div5_invoice_amt').val($('#div5_approx_qty').val()*$('#div5_invoice_rate').val());
          $('#div5_invoice_amt').val(parseFloat($('#div5_invoice_amt').val()).toFixed(2));
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

       $('#activity_file_no').change(function(){
            var file_no = $('#activity_file_no').val();
             
             if(file_no != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>Adddailyactivity/fetch_filedata',
               'type': 'post',
               'data' : { id : file_no},
               'success' : function(data)
               {
                 res = data.split("|");
                 $('#commodity').val(res[13]);
                 $('#client_name').val(res[1]);
               } 
               });
             } 
        });

       $('#file_no').change(function(){
            var inv_file_no = $('#file_no').val();
         
             if(inv_file_no != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>AddInvoicefileregister/fetch_filedata',
               'type': 'post',
               'data' : { id : inv_file_no},
               'success' : function(data)
               {
                 res = data.split("|");
                 //alert(res);
                 $('#file_date').val(res[0]);
                 $('#client_name').val(res[1]);
                 $('#invoice_to').val(res[1]);
                 $('#client_address').val(res[2]);
                 $('#country_name').val(res[3]);
                 $('#state_name').val(res[4]);
                 $('#city_name').val(res[5]);
                 $('#company_country').val(res[6]);
                 $('#company_state').val(res[7]);
                 $('#company_city').val(res[8]);
                 $('#client_id').val(res[9]);
                 $('#vessel_name').val(res[10]);
                 $('#voyage_no').val(res[11]);
                 $('#cargo_group').val(res[12]);
                 $('#cargo_master').val(res[13]);
                 $('#packing').val(res[14]);
                 $('#packing_desc').val(res[15]);
                 $('#approx_qty').val(res[16]);
                 $('#approx_unit').val(res[17]);
                 $('#file_ins').val(res[18]);
                 $('#place').val(res[19]);
                 $('#origin').val(res[20]);
                 $('#load_port').val(res[21]);
                 $('#discharge_port').val(res[22]);
               } 
               });
             } 
        });

       $('#invoice_no').change(function(){
            var invoice_no = $('#invoice_no').val();
         
             if(invoice_no != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>Invoicepaymentregister/fetch_invoicedata',
               'type': 'post',
               'data' : { id : invoice_no},
               'success' : function(data)
               {
                 res = data.split("|");
                 //alert(res);
                 $('#invoice_file_no').val(res[0]);
                 $('#client_id').val(res[1]);
                 $('#invoice_amt').val(res[2]);
                 $('#invoice_basic_amt').val(res[3]);
                 $('#invoice_ex_rate').val(res[4]);
                 $('#invoice_ex_amt').val(res[5]);
                 $('#client_name').val(res[6]);
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
                 $('#office_prefix').val(res[9]);
                 $('#mobile_prefix').val(res[9]);
                 $('#alt_prefix').val(res[9]);
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

<?php
    for($i=1;$i<=25;$i++) { 
         $ids = "'#qcert_spec_".$i."'";
         $mins = "'#qcert_labmin_".$i."'"; 
         $maxs = "'#qcert_labmax_".$i."'";
         $method = "'#qcert_labmethods_".$i."'";
         ?>
         $(document).on('change', <?php echo $ids; ?>, function() {
              var lab_id = $(<?php echo $ids; ?>).val();
              //alert(lab_id);
              <?php /*if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammin',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $mins; ?>).html(data);
                       } 
                       });
              }

              if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammax',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $maxs; ?>).html(data);
                       } 
                       });
              }*/ ?>

              if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammethod',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $method; ?>).html(data);
                       } 
                       });
              }
         });
<?php } ?>

<?php
    $a = 2;
    for($b=6;$b<=20;$b++) {
      #echo "javascript:alert($p.$q);";
         $ids = "'#qcert_spec_".$a.$b."'";
         $mins = "'#qcert_labmin_".$a.$b."'"; 
         $maxs = "'#qcert_labmax_".$a.$b."'";
         $method = "'#qcert_labmethods_".$a.$b."'";
         ?>
         $(document).on('change', <?php echo $ids; ?>, function() {
              var lab_id = $(<?php echo $ids; ?>).val();
              //alert(lab_id);
              <?php /*if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammin',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $mins; ?>).html(data);
                       } 
                       });
              }

              if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammax',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $maxs; ?>).html(data);
                       } 
                       });
              }*/ ?>

              if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammethod',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $method; ?>).html(data);
                       } 
                       });
              }
         });

<?php } ?>

<?php
    $p = 3;
    for($q=1;$q<=5;$q++) {
      #echo "javascript:alert($p.$q);";
         $ids = "'#qcert_spec_".$p.$q."'";
         $mins = "'#qcert_labmin_".$p.$q."'"; 
         $maxs = "'#qcert_labmax_".$p.$q."'";
         $method = "'#qcert_labmethods_".$p.$q."'";
         ?>
         $(document).on('change', <?php echo $ids; ?>, function() {
              var lab_id = $(<?php echo $ids; ?>).val();
              //alert(lab_id);
              <?php /*if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammin',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $mins; ?>).html(data);
                       } 
                       });
              }

              if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammax',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $maxs; ?>).html(data);
                       } 
                       });
              }*/ ?>

              if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammethod',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $method; ?>).html(data);
                       } 
                       });
              }
         });

<?php } ?>

<?php
    $c = 4;
    for($d=1;$d<=25;$d++) {
      #echo "javascript:alert($p.$q);";
         $ids = "'#qcert_spec_".$c.$d."'";
         $mins = "'#qcert_labmin_".$c.$d."'"; 
         $maxs = "'#qcert_labmax_".$c.$d."'";
         $method = "'#qcert_labmethods_".$c.$d."'";
         ?>
         $(document).on('change', <?php echo $ids; ?>, function() {
              var lab_id = $(<?php echo $ids; ?>).val();
              //alert(lab_id);
              <?php /*if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammin',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $mins; ?>).html(data);
                       } 
                       });
              }

              if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammax',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $maxs; ?>).html(data);
                       } 
                       });
              }*/ ?>

              if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammethod',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $method; ?>).html(data);
                       } 
                       });
              }
         });

<?php } ?>

<?php
    $e = 5;
    for($f=1;$f<=25;$f++) {
      #echo "javascript:alert($p.$q);";
         $ids = "'#qcert_spec_".$e.$f."'";
         $mins = "'#qcert_labmin_".$e.$f."'"; 
         $maxs = "'#qcert_labmax_".$e.$f."'";
         $method = "'#qcert_labmethods_".$e.$f."'";
         ?>
         $(document).on('change', <?php echo $ids; ?>, function() {
              var lab_id = $(<?php echo $ids; ?>).val();
              //alert(lab_id);
              <?php /*if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammin',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $mins; ?>).html(data);
                       } 
                       });
              }

              if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammax',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $maxs; ?>).html(data);
                       } 
                       });
              }*/ ?>

              if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammethod',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $method; ?>).html(data);
                       } 
                       });
              }
         });

<?php } ?>

<?php
    $g = 6;
    for($h=1;$h<=25;$h++) {
      #echo "javascript:alert($p.$q);";
         $ids = "'#qcert_spec_".$g.$h."'";
         $mins = "'#qcert_labmin_".$g.$h."'"; 
         $maxs = "'#qcert_labmax_".$g.$h."'";
         $method = "'#qcert_labmethods_".$g.$h."'";
         ?>
         $(document).on('change', <?php echo $ids; ?>, function() {
              var lab_id = $(<?php echo $ids; ?>).val();
              //alert(lab_id);
              <?php /*if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammin',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $mins; ?>).html(data);
                       } 
                       });
              }

              if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammax',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $maxs; ?>).html(data);
                       } 
                       });
              }*/ ?>

              if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammethod',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $method; ?>).html(data);
                       } 
                       });
              }
         });

<?php } ?>

<?php
    $k = 7;
    for($l=1;$l<=25;$l++) {
      #echo "javascript:alert($p.$q);";
         $ids = "'#qcert_spec_".$g.$h."'";
         $mins = "'#qcert_labmin_".$g.$h."'"; 
         $maxs = "'#qcert_labmax_".$g.$h."'";
         $method = "'#qcert_labmethods_".$g.$h."'";
         ?>
         $(document).on('change', <?php echo $ids; ?>, function() {
              var lab_id = $(<?php echo $ids; ?>).val();
              //alert(lab_id);
              <?php /*if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammin',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $mins; ?>).html(data);
                       } 
                       });
              }

              if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammax',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $maxs; ?>).html(data);
                       } 
                       });
              }*/ ?>

              if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammethod',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $method; ?>).html(data);
                       } 
                       });
              }
         });

<?php } ?>

<?php
    $m = 7;
    for($n=1;$n<=25;$n++) {
      #echo "javascript:alert($p.$q);";
         $ids = "'#qcert_spec_".$m.$n."'";
         $mins = "'#qcert_labmin_".$m.$n."'"; 
         $maxs = "'#qcert_labmax_".$m.$n."'";
         $method = "'#qcert_labmethods_".$m.$n."'";
         ?>
         $(document).on('change', <?php echo $ids; ?>, function() {
              var lab_id = $(<?php echo $ids; ?>).val();
              //alert(lab_id);
              <?php /*if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammin',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $mins; ?>).html(data);
                       } 
                       });
              }

              if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammax',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $maxs; ?>).html(data);
                       } 
                       });
              }*/ ?>

              if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammethod',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $method; ?>).html(data);
                       } 
                       });
              }
         });

<?php } ?>

<?php
    $r = 8;
    for($s=1;$s<=25;$s++) {
      #echo "javascript:alert($p.$q);";
         $ids = "'#qcert_spec_".$r.$s."'";
         $mins = "'#qcert_labmin_".$r.$s."'"; 
         $maxs = "'#qcert_labmax_".$r.$s."'";
         $method = "'#qcert_labmethods_".$r.$s."'";
         ?>
         $(document).on('change', <?php echo $ids; ?>, function() {
              var lab_id = $(<?php echo $ids; ?>).val();
              //alert(lab_id);
              <?php /*if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammin',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $mins; ?>).html(data);
                       } 
                       });
              }

              if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammax',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $maxs; ?>).html(data);
                       } 
                       });
              }*/ ?>

              if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammethod',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $method; ?>).html(data);
                       } 
                       });
              }
         });

<?php } ?>

<?php
    $u = 9;
    for($v=1;$v<=25;$v++) {
      #echo "javascript:alert($p.$q);";
         $ids = "'#qcert_spec_".$u.$v."'";
         $mins = "'#qcert_labmin_".$u.$v."'"; 
         $maxs = "'#qcert_labmax_".$u.$v."'";
         $method = "'#qcert_labmethods_".$u.$v."'";
         ?>
         $(document).on('change', <?php echo $ids; ?>, function() {
              var lab_id = $(<?php echo $ids; ?>).val();
              //alert(lab_id);
              <?php /*if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammin',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $mins; ?>).html(data);
                       } 
                       });
              }

              if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammax',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $maxs; ?>).html(data);
                       } 
                       });
              }*/ ?>

              if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammethod',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $method; ?>).html(data);
                       } 
                       });
              }
         });

<?php } ?>

<?php
    $x = 10;
    for($y=1;$y<=25;$y++) {
      #echo "javascript:alert($p.$q);";
         $ids = "'#qcert_spec_".$x.$y."'";
         $mins = "'#qcert_labmin_".$x.$y."'"; 
         $maxs = "'#qcert_labmax_".$x.$y."'";
         $method = "'#qcert_labmethods_".$x.$y."'";
         ?>
         $(document).on('change', <?php echo $ids; ?>, function() {
              var lab_id = $(<?php echo $ids; ?>).val();
              //alert(lab_id);
              <?php /*if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammin',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $mins; ?>).html(data);
                       } 
                       });
              }

              if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammax',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $maxs; ?>).html(data);
                       } 
                       });
              }*/ ?>

              if(lab_id != '')
              {
                       $.ajax({
                       'url' : '<?php echo BASE_PATH; ?>Addqualitycertificate/fetch_labparammethod',
                       'type': 'post',
                       'data' : { params : lab_id},
                       'success' : function(data)
                       {
                         //alert(data);
                         $(<?php echo $method; ?>).html(data);
                       } 
                       });
              }
         });

<?php } ?>
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>