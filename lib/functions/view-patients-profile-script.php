<script type="text/javascript" charset="utf-8">
          $(document).ready(function() {
              $('#example').dataTable( {
                  "aaSorting": [[ 0, "desc" ]]
              } );
          } );
          
      $(document).ready(function(){
        var Auth ='<?php echo $Position; ?>';
        if (Auth == "Admin") 
        {                       
            $('#Patient-li').show(); 
            $('#Schedule-li').show();
            $('#Inventory-li').show();
            $('#Laboratory-li').show();
            $('#Reports-li').show();
            $('#User-li').show();
            $('#Maintenance-li').show();
        }
        else if(Auth == "Doctor") {
            $('#User-li').hide();
            $('#Patient-li').hide();
            $('#Maintenance-li').hide();
            $('#Reports-li').hide();
            $('#Laboratory-li').hide();
            $('#Inventory-li').hide();
        }
        else if(Auth == "Medtech") {
            $('#User-li').hide();
            $('#Maintenance-li').hide();
            $('#Reports-li').hide();
            $('#Patient-li').hide();
            $('#Schedule-li').hide();
            $('#Inventory-li').hide();
        }
        });

      $(document).ready(function(){
          var Disease = $('#DISE_DISO').val();
          var Significant = $('#SIG_INJ').val(); 
          var Alcohol = $('#ALCO_DRUGS').val();
          var Medication = $('#MEDCT').val();
          var Assistive_dev = $('#ASSIST_DEV').val();
          var Treatment = $('#TRMT').val();
          var Hospitalized = $('#HPTL').val();
          var Person_Assist = $('#PERS_ASSIST').val();
          var Smoke = $('#SMOKE').val();
          var CB_Health = $('#CB_HEALTH_COND').val();
          var TU_Health = $('#TU_HEALTH_COND').val();   
          $('#DISE_DISO_TXTA').attr('disabled',true);
          $('#SIG_INJ_TXTA').attr('disabled',true);
          $('#ALCO_DRUGS_TXTA').attr('disabled',true);
          $('#MEDCT_TXTA').attr('disabled',true);
          $('#ASSIST_DEV_TXTA').attr('disabled',true);
          $('#HPTL_TXTA').attr('disabled',true);
          $('#TRMT_TXTA').attr('disabled',true);
          $('#SMOKE_TXTA').attr('disabled',true);
          $('#PERS_ASSIST_TXTA').attr('disabled',true);
          $('#CB_HEALTH_COND_TXTA').attr('disabled',true);
          $('#TU_HEALTH_COND_TXTA').attr('disabled',true);
          if(Disease == "Yes"){
            $('#DISE_DISO_TXTA').attr('disabled',false);
          }
          if(Significant == "Yes"){
            $('#SIG_INJ_TXTA').attr('disabled',false);
          }
          if(Alcohol == "Yes"){
            $('#ALCO_DRUGS_TXTA').attr('disabled',false);
          }
          if(Medication == "Yes"){
            $('#MEDCT_TXTA').attr('disabled',false);
          }
          if(Assistive_dev == "Yes"){
            $('#ASSIST_DEV_TXTA').attr('disabled',false);
          }
          if(Treatment == "Yes"){
            $('#TRMT_TXTA').attr('disabled',false);
          }
          if(Person_Assist == "Yes"){
            $('#PERS_ASSIST_TXTA').attr('disabled',false);
          }
          if(Hospitalized == "Yes"){
            $('#HPTL_TXTA').attr('disabled',false);
          }
          if(Smoke == "Yes"){
            $('#SMOKE_TXTA').attr('disabled',false);
          }
          if(CB_Health == "Yes"){
            $('#CB_HEALTH_COND_TXTA').attr('disabled',false);
          }
          if(TU_Health == "Yes"){
            $('#TU_HEALTH_COND_TXTA').attr('disabled',false);
          }
      });
        
    </script>
	  <script type="text/javascript">
	  $(document).ready(function () {
		  $(".select2-single").select2({placeholder: 'Please select option'});

		  $(".select2-multiple").select2();
	  });

    function addMedicalRecord(){
          var Medillness = $('#MedRillness').val(); 
          var MedBP =  $('#MedRBP').val();
          var MedWeight = $('#MedRWeight').val();
          var MedTemp = $('#MedRTemp').val();
          var MedDate = $('#MedRDate').val();
          var Sched_id = '<?php echo $SCHED_ID; ?>';

          if(Medillness == '' || MedBP == '' || MedWeight == '' || MedTemp == ''){
             $('#Error_Message').html('Please fill in all fields! &nbsp;');
          }
          else{
             $('#Error_Message').html('');
              if (confirm('Are you sure you want to set schedule for this patient?')) {
                $.ajax({
                      type: "POST",
                      url: "Server.php?p=addMedicalRecord",
                      data: "MedRillness="+Medillness+"&MedRBP="+MedBP+"&MedRWeight="+MedWeight+"&MedRTemp="+MedTemp+"&MedRDate="+MedDate+"&Sched_ID="+Sched_id,
                      success: function(data){
                       $('#Success_Message').html('Successfully Added! &nbsp;');
                        setTimeout(function() {
                          $('#Success_Message').fadeOut('slow');
                        }, 1000);
                        setTimeout(function(){
                          window.location.reload();
                        }, 2000);
                      }
                    });
              }else{
                //do nothing
              }
          }
      }
    function RetrieveDoctor(str){
      var id = str;
   
      $.ajax({
                type: "GET",
                url: "Server.php?p=DoctorList",
                success: function(data){
                  $('#listofDoctor-'+id).html(data);
                }
      });

    }
    function addTreatment(str){
          var Med_RID = str;
          var Diagnosis = $('#DIAG_DTLS-'+Med_RID).val(); 
          var Treatment =  $('#TREATMENT-'+Med_RID).val();
          var Remarks = $('#REMARKS-'+Med_RID).val();
          var FollowUp = $('#F_CHECKUP-'+Med_RID).val();
          var Doctor = $('#listofDoctor-'+Med_RID).val();
          var RefDoc = $('#Ref_Doc_name-'+Med_RID).val();
          var RefDoc_CN = $('#Ref_Doc_CN-'+Med_RID).val();
          var RefDoc_Add = $('#Ref_Doc_Add-'+Med_RID).val();
          var checkbox = $('#c1-'+Med_RID+':checked').val();

          if(Diagnosis == '' || Treatment == '' || Remarks == '' || FollowUp == ''){
             $('#Error_Message-TRMT-'+Med_RID).html('Please fill all fields! &nbsp;');
          }else{
            $('#Error_Message-TRMT-'+Med_RID).html('');
           $.ajax({
                type: "POST",
                url: "Server.php?p=addTreatment",
                data: "DGN="+Diagnosis+"&TRMT="+Treatment+"&RMKS="+Remarks+"&FPCHK="+FollowUp+"&DOC="+Doctor+"&MRID="+Med_RID+"&REFDN="+RefDoc+"&REF_CN="+RefDoc_CN+"&REF_ADD="+RefDoc_Add,
                success: function(data){
                  $('#Success_Message-TRMT-'+Med_RID).html('Successfully Added! &nbsp;');
                        setTimeout(function() {
                          $('#Success_Message-TRMT-'+Med_RID).fadeOut('slow');
                        }, 1500);
                        setTimeout(function(){
                          window.location.reload();
                        }, 2000);
                      }
          });
        }
      }
	</script>