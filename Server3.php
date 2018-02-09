<?php
error_reporting(0);

$page = isset($_GET['p'])?$_GET['p']:'';

if($page == 'AddBloodChem'){
require 'lib/Db.config.pdo.php';
require 'lib/Db.config.php';

            
            $SPECIMEN              = mysql_real_escape_string($_POST['SPECIMEN']);
            $LABR_ID               = mysql_real_escape_string($_POST['LBR_ID']);
            $PATHOLOGIST           = mysql_real_escape_string($_POST['PATHOLOGIST']);
            $MEDTECH               = mysql_real_escape_string($_POST['MEDTECH']);
            $TAKEN                 = mysql_real_escape_string($_POST['TAKEN']);
            $MEAL                  = mysql_real_escape_string($_POST['LAST_MEAL']);
            $BUN_ETYPE_INT         = mysql_real_escape_string($_POST['BEI']);
            $BUN_ETYPE_CON         = mysql_real_escape_string($_POST['BEC']);
            $CHSTRL_INT            = mysql_real_escape_string($_POST['CI']);
            $CHSTRL_CON            = mysql_real_escape_string($_POST['CC']);
            $CRTN_ETYPE_INT        = mysql_real_escape_string($_POST['CEI']);
            $CRTN_ETYPE_CON        = mysql_real_escape_string($_POST['CEC']);
            $FBS_ETYPE_INT         = mysql_real_escape_string($_POST['FEI']);
            $FBS_ETYPE_CON         = mysql_real_escape_string($_POST['FEC']);
            $HDL_M_ETYPE_INT       = mysql_real_escape_string($_POST['HMEI']);
            $HDL_M_ETYPE_CON       = mysql_real_escape_string($_POST['HMEC']);
            $HDL_F_ETYPE_INT       = mysql_real_escape_string($_POST['HFEI']);
            $HDL_F_ETYPE_CON       = mysql_real_escape_string($_POST['HFEC']);
            $LDL_ETYPE_INT         = mysql_real_escape_string($_POST['LEI']);
            $LDL_ETYPE_CON         = mysql_real_escape_string($_POST['LEC']);
            $PO_PR_ETYPE_INT       = mysql_real_escape_string($_POST['PPEI']);
            $PO_PR_ETYPE_CON       = mysql_real_escape_string($_POST['PPEC']);
            $RBS_ETYPE_INT         = mysql_real_escape_string($_POST['REI']);
            $RBS_ETYPE_CON         = mysql_real_escape_string($_POST['REC']);
            $SGOT_M_ETYPE_INT      = mysql_real_escape_string($_POST['SGOTMEI']);
            $SGOT_F_ETYPE_INT      = mysql_real_escape_string($_POST['SGOTFEI']);
            $SGPT_M_ETYPE_INT      = mysql_real_escape_string($_POST['SGPTMEI']);
            $SGPT_F_ETYPE_INT      = mysql_real_escape_string($_POST['SGPTFEI']);
            $TRYLYDE_ETYPE_INT     = mysql_real_escape_string($_POST['TEI']);
            $TRYLYDE_ETYPE_CON     = mysql_real_escape_string($_POST['TEC']);
            $URIC_F_ETYPE_INT      = mysql_real_escape_string($_POST['UFEI']);
            $URIC_F_ETYPE_CON      = mysql_real_escape_string($_POST['UFEC']);
            $URIC_M_ETYPE_INT      = mysql_real_escape_string($_POST['UMEI']);
            $URIC_M_ETYPE_CON      = mysql_real_escape_string($_POST['UMEC']);
            $date                  = date("Y-m-d");
            $Year                  = date('Y',strtotime($date));
            $Month                 = date('M',strtotime($date));
            
            
            $LAB_RECORD = $db->prepare("insert into laboratory_record values('',?,?,?,?,?,?,?,?)");
            $LAB_RECORD->bindParam(1,$LABR_ID);
            $LAB_RECORD->bindParam(2,$MEDTECH);
            $LAB_RECORD->bindParam(3,$PATHOLOGIST);
            $LAB_RECORD->bindParam(4,$TAKEN);
            $LAB_RECORD->bindParam(5,$MEAL);
            $LAB_RECORD->bindParam(6,$SPECIMEN);
            $LAB_RECORD->bindParam(7,$Month);
            $LAB_RECORD->bindParam(8,$Year);
            $LAB_RECORD->execute();

            $Lab_rec_id = $db->lastInsertId();
            
            $BLOODCHEM = $db->prepare("insert into blood_examination values('',?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$BLOODCHEM->bindParam(1,$BUN_ETYPE_INT);
			$BLOODCHEM->bindParam(2,$CRTN_ETYPE_INT);
			$BLOODCHEM->bindParam(3,$FBS_ETYPE_INT);
			$BLOODCHEM->bindParam(4,$HDL_M_ETYPE_INT);
			$BLOODCHEM->bindParam(5,$HDL_F_ETYPE_INT);
			$BLOODCHEM->bindParam(6,$LDL_ETYPE_INT);
			$BLOODCHEM->bindParam(7,$PO_PR_ETYPE_INT);
			$BLOODCHEM->bindParam(8,$RBS_ETYPE_INT);
			$BLOODCHEM->bindParam(9,$SGOT_M_ETYPE_INT);
			$BLOODCHEM->bindParam(10,$SGOT_F_ETYPE_INT);
			$BLOODCHEM->bindParam(11,$SGPT_M_ETYPE_INT);
			$BLOODCHEM->bindParam(12,$SGPT_F_ETYPE_INT);
			$BLOODCHEM->bindParam(13,$TRYLYDE_ETYPE_INT);
			$BLOODCHEM->bindParam(14,$URIC_M_ETYPE_INT);
			$BLOODCHEM->bindParam(15,$URIC_F_ETYPE_INT);
			$BLOODCHEM->bindParam(16,$BUN_ETYPE_CON);
			$BLOODCHEM->bindParam(17,$CRTN_ETYPE_CON);
			$BLOODCHEM->bindParam(18,$FBS_ETYPE_CON);
			$BLOODCHEM->bindParam(19,$HDL_M_ETYPE_CON);
            $BLOODCHEM->bindParam(20,$HDL_F_ETYPE_CON);
            $BLOODCHEM->bindParam(21,$LDL_ETYPE_CON);
            $BLOODCHEM->bindParam(22,$PO_PR_ETYPE_CON);
            $BLOODCHEM->bindParam(23,$RBS_ETYPE_CON);
            $BLOODCHEM->bindParam(24,$TRYLYDE_ETYPE_CON);
            $BLOODCHEM->bindParam(25,$URIC_M_ETYPE_CON);
            $BLOODCHEM->bindParam(26,$URIC_F_ETYPE_CON);
            $BLOODCHEM->bindParam(27,$CHSTRL_INT);
            $BLOODCHEM->bindParam(28,$CHSTRL_CON);
            $BLOODCHEM->bindParam(29,$Lab_rec_id);
            $BLOODCHEM->bindParam(30,$Month);
            $BLOODCHEM->bindParam(31,$Year);
            $BLOODCHEM->execute();

            $Status = 'Completed';
            $LABREQ_UP = $db->prepare("Update lab_request set STATUS=? Where LBR_ID = ?");
            $LABREQ_UP->bindParam(1,$Status);
            $LABREQ_UP->bindParam(2,$LABR_ID);
            $LABREQ_UP->execute();
}
else if($page == 'MedtechList'){
    require 'lib/Db.config.pdo.php';
    require 'lib/Db.config.php';
    
        $sql = "SELECT *, CONCAT(Firstname,' ',Middlename,' ',Lastname,'. RMT') AS Fullname FROM users WHERE Position = 'Medtech' AND STATUS = 'Active'";
                $do = mysql_query($sql);
                $countM = mysql_num_rows($do);
    
        if($countM > 0){
            while($MT = mysql_fetch_array($do)){
                echo "<option value='";echo $MT['User_id'];echo "'>"; echo $MT['Fullname']; echo "</option>";
            }
        }else{
            echo "<option value=''>No registered medical technologist in the system</option>";
        }			
}
else if($page == 'PathologistList'){
    require 'lib/Db.config.pdo.php';
    require 'lib/Db.config.php';
    
        $sql = "SELECT *, CONCAT(Firstname,' ',Middlename,' ',Lastname) AS Fullname FROM users WHERE Position = 'Pathologist' AND STATUS = 'Active'";
                $do = mysql_query($sql);
                $countP = mysql_num_rows($do);
    
        if($countP > 0){
            while($PT = mysql_fetch_array($do)){
                echo "<option value='";echo $PT['User_id'];echo "'>"; echo $PT['Fullname']; echo "</option>";
            }
        }else{
            echo "<option value=''>No registered pathologist in the system</option>";
        }			
}
else if($page == 'AddFecal'){
    require 'lib/Db.config.pdo.php';
    require 'lib/Db.config.php';

            
            $SPECIMEN                           = mysql_real_escape_string($_POST['SPECIMEN']);
            $LABR_ID                            = mysql_real_escape_string($_POST['LBR_ID']);
            $CLR_MCRO_EXM                       = mysql_real_escape_string($_POST['CLRME']);
            $PARA_ASCARIS                       = mysql_real_escape_string($_POST['PARAA']);
            $FLAG_G_LAMBIA                      = mysql_real_escape_string($_POST['FGL']);
            $CONS_MCRO_EXM                      = mysql_real_escape_string($_POST['CONSME']);
            $PARA_HKWORM                        = mysql_real_escape_string($_POST['PHKW']);
            $FLAG_T_HOMINIS                     = mysql_real_escape_string($_POST['FTM']);
            $HLMT_MCRO_EXM                      = mysql_real_escape_string($_POST['HME']);
            $PARA_TRHRIS                        = mysql_real_escape_string($_POST['PARAT']);
            $PARA_STRGLOIDES                    = mysql_real_escape_string($_POST['PARAST']);
            $CT_OB                              = mysql_real_escape_string($_POST['CO']);
            $E_AMOEBA_HISTOL                    = mysql_real_escape_string($_POST['EAH']);
            $PCELLS_MICRO_EXM                   = mysql_real_escape_string($_POST['PME']);
            $E_HISTOL_CYST                      = mysql_real_escape_string($_POST['EHC']);
            $RBC_MCRO_EXM                       = mysql_real_escape_string($_POST['RME']);
            $E_HISTOL_TROPH                     = mysql_real_escape_string($_POST['EHT']);
            $E_AMOEBA_COLI                      = mysql_real_escape_string($_POST['EAC']);
            $COLI_CYST                          = mysql_real_escape_string($_POST['CC']);
            $COLI_TROPH                         = mysql_real_escape_string($_POST['CT']);
            $MEAL                               = mysql_real_escape_string($_POST['LAST_MEAL']);
            $MEDTECH                            = mysql_real_escape_string($_POST['MEDTECH']);
            $PATHOLOGIST                        = mysql_real_escape_string($_POST['PATHOLOGIST']);
            $TAKEN                              = mysql_real_escape_string($_POST['TAKEN']);
            $REMARKS                            = mysql_real_escape_string($_POST['REMARKS']);
            $date                               = date("Y-m-d");
            $Year                               = date('Y',strtotime($date));
            $Month                              = date('M',strtotime($date));

            $LAB_RECORD = $db->prepare("insert into laboratory_record values('',?,?,?,?,?,?,?,?)");        
            $LAB_RECORD->bindParam(1,$LABR_ID);
            $LAB_RECORD->bindParam(2,$MEDTECH);
            $LAB_RECORD->bindParam(3,$PATHOLOGIST);
            $LAB_RECORD->bindParam(4,$TAKEN);
            $LAB_RECORD->bindParam(5,$MEAL);
            $LAB_RECORD->bindParam(6,$SPECIMEN);
            $LAB_RECORD->bindParam(7,$Month);
            $LAB_RECORD->bindParam(8,$Year);
            $LAB_RECORD->execute();
            
            $Lab_rec_id = $db->lastInsertId();
            
            $FECAL = $db->prepare("insert into fecalysis values('',?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $FECAL->bindParam(1,$Lab_rec_id);
            $FECAL->bindParam(2,$CLR_MCRO_EXM); 
            $FECAL->bindParam(3,$CONS_MCRO_EXM); 
            $FECAL->bindParam(4,$HLMT_MCRO_EXM); 
            $FECAL->bindParam(5,$PARA_ASCARIS); 
            $FECAL->bindParam(6,$PARA_HKWORM); 
            $FECAL->bindParam(7,$PARA_TRHRIS); 
            $FECAL->bindParam(8,$PARA_STRGLOIDES); 
            $FECAL->bindParam(9,$CT_OB); 
            $FECAL->bindParam(10,$PCELLS_MICRO_EXM); 
            $FECAL->bindParam(11,$RBC_MCRO_EXM); 
            $FECAL->bindParam(12,$E_AMOEBA_HISTOL); 
            $FECAL->bindParam(13,$E_HISTOL_CYST); 
            $FECAL->bindParam(14,$E_HISTOL_TROPH); 
            $FECAL->bindParam(15,$E_AMOEBA_COLI); 
            $FECAL->bindParam(16,$COLI_CYST); 
            $FECAL->bindParam(17,$COLI_TROPH); 
            $FECAL->bindParam(18,$FLAG_G_LAMBIA); 
            $FECAL->bindParam(19,$FLAG_T_HOMINIS); 
            $FECAL->bindParam(20,$REMARKS);
            $FECAL->bindParam(21,$Month);
            $FECAL->bindParam(22,$Year); 
            $FECAL->execute();

            $Status = 'Completed';
            $LABREQ_UP = $db->prepare("Update lab_request set STATUS=? Where LBR_ID = ?");
            $LABREQ_UP->bindParam(1,$Status);
            $LABREQ_UP->bindParam(2,$LABR_ID);
            $LABREQ_UP->execute();

}
else if($page == 'AddHema'){
    require 'lib/Db.config.pdo.php';
    require 'lib/Db.config.php';

            
            $SPECIMEN         = mysql_real_escape_string($_POST['SPECIMEN']);
            $LABR_ID          = mysql_real_escape_string($_POST['LBR_ID']);
            $HEMA_M_ETYPE_CBC = mysql_real_escape_string($_POST['HEMA_M_ETYPE_CBC']);
            $WBC_ETYPE_CBC    = mysql_real_escape_string($_POST['WBC_ETYPE_CBC']);
            $HEMA_F_ETYPE_CBC = mysql_real_escape_string($_POST['HEMA_F_ETYPE_CBC']);
            $RBC_ETYPE_CBC    = mysql_real_escape_string($_POST['RBC_ETYPE_CBC']);
            $HEMO_M_ETYPE_CBC = mysql_real_escape_string($_POST['HEMO_M_ETYPE_CBC']);
            $HEMO_F_ETYPE_CBC = mysql_real_escape_string($_POST['HEMO_F_ETYPE_CBC']);
            $SEG_DIFF_COUNT   = mysql_real_escape_string($_POST['SEG_DIFF_COUNT']);
            $STAB_DCOUNT      = mysql_real_escape_string($_POST['STAB_DCOUNT']);
            $EOSI_DCOUNT      = mysql_real_escape_string($_POST['EOSI_DCOUNT']);
            $PLA_CT_DCOUNT    = mysql_real_escape_string($_POST['PLA_CT_DCOUNT']);
            $LYMP_DCOUNT      = mysql_real_escape_string($_POST['LYMP_DCOUNT']);
            $MONO_DCOUNT      = mysql_real_escape_string($_POST['MONO_DCOUNT']);
            $BASO_DCOUNT      = mysql_real_escape_string($_POST['BASO_DCOUNT']);
            $MYELO_DCOUNT     = mysql_real_escape_string($_POST['MYELO_DCOUNT']);
            $JUVEN_DCOUNT     = mysql_real_escape_string($_POST['JUVEN_DCOUNT']);
            $BLD_TYP_DCOUNT   = mysql_real_escape_string($_POST['BLD_TYP_DCOUNT']);
            $REMARKS          = mysql_real_escape_string($_POST['REMARKS']);
            $MEAL             = mysql_real_escape_string($_POST['LAST_MEAL']);
            $MEDTECH          = mysql_real_escape_string($_POST['MEDTECH']);
            $PATHOLOGIST      = mysql_real_escape_string($_POST['PATHOLOGIST']);
            $TAKEN            = mysql_real_escape_string($_POST['TAKEN']);
            $REMARKS          = mysql_real_escape_string($_POST['REMARKS']);
            $date             = date("Y-m-d");
            $Year             = date('Y',strtotime($date));
            $Month            = date('M',strtotime($date));

            $LAB_RECORD = $db->prepare("insert into laboratory_record values('',?,?,?,?,?,?,?,?)");        
            $LAB_RECORD->bindParam(1,$LABR_ID);
            $LAB_RECORD->bindParam(2,$MEDTECH);
            $LAB_RECORD->bindParam(3,$PATHOLOGIST);
            $LAB_RECORD->bindParam(4,$TAKEN);
            $LAB_RECORD->bindParam(5,$MEAL);
            $LAB_RECORD->bindParam(6,$SPECIMEN);
            $LAB_RECORD->bindParam(7,$Month);
            $LAB_RECORD->bindParam(8,$Year);
            $LAB_RECORD->execute();
            
            $Lab_rec_id = $db->lastInsertId();
            
            $HEMA = $db->prepare("insert into hematology values('',?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $HEMA->bindParam(1,$Lab_rec_id);
            $HEMA->bindParam(2,$HEMA_M_ETYPE_CBC); 
            $HEMA->bindParam(3,$HEMA_F_ETYPE_CBC); 
            $HEMA->bindParam(4,$HEMO_M_ETYPE_CBC); 
            $HEMA->bindParam(5,$HEMO_F_ETYPE_CBC); 
            $HEMA->bindParam(6,$WBC_ETYPE_CBC); 
            $HEMA->bindParam(7,$RBC_ETYPE_CBC); 
            $HEMA->bindParam(8,$SEG_DIFF_COUNT); 
            $HEMA->bindParam(9,$STAB_DCOUNT); 
            $HEMA->bindParam(10,$EOSI_DCOUNT); 
            $HEMA->bindParam(11,$LYMP_DCOUNT); 
            $HEMA->bindParam(12,$MONO_DCOUNT); 
            $HEMA->bindParam(13,$BASO_DCOUNT); 
            $HEMA->bindParam(14,$MYELO_DCOUNT); 
            $HEMA->bindParam(15,$PLA_CT_DCOUNT); 
            $HEMA->bindParam(16,$BLD_TYP_DCOUNT); 
            $HEMA->bindParam(17,$JUVEN_DCOUNT); 
            $HEMA->bindParam(18,$REMARKS);
            $HEMA->bindParam(19,$Month);
            $HEMA->bindParam(20,$Year); 
            $HEMA->execute();

            $Status = 'Completed';
            $LABREQ_UP = $db->prepare("Update lab_request set STATUS=? Where LBR_ID = ?");
            $LABREQ_UP->bindParam(1,$Status);
            $LABREQ_UP->bindParam(2,$LABR_ID);
            $LABREQ_UP->execute();

}
else if($page == 'AddUrinal'){
    require 'lib/Db.config.pdo.php';
    require 'lib/Db.config.php';
            
            $SPECIMEN           = mysql_real_escape_string($_POST['SPECIMEN']);
            $LABR_ID            = mysql_real_escape_string($_POST['LBR_ID']);
            $COLOR_PHY_PRO      = mysql_real_escape_string($_POST['COLOR_PHY_PRO']);            
            $PUS_CELL           = mysql_real_escape_string($_POST['PUS_CELL']);
            $AU_CRYSTALS        = mysql_real_escape_string($_POST['AU_CRYSTALS']);
            $TRANS_PHY_PRO      = mysql_real_escape_string($_POST['TRANS_PHY_PRO']);
            $RBC_CELL           = mysql_real_escape_string($_POST['RBC_CELL']);
            $APO_CRYSTALS       = mysql_real_escape_string($_POST['APO_CRYSTALS']);
            $PH_PHY_PRO         = mysql_real_escape_string($_POST['PH_PHY_PRO']);
            $YEAST_CELL         = mysql_real_escape_string($_POST['YEAST_CELL']);
            $URIC_ACID_CRYSTALS = mysql_real_escape_string($_POST['URIC_ACID_CRYSTALS']);
            $SPEC_GRAV_PHY_PRO  = mysql_real_escape_string($_POST['SPEC_GRAV_PHY_PRO']);
            $SQUAMOS_CELL       = mysql_real_escape_string($_POST['SQUAMOS_CELL']);
            $CAL_OX_CRYSTALS    = mysql_real_escape_string($_POST['CAL_OX_CRYSTALS']);
            $RENAL_CELL         = mysql_real_escape_string($_POST['RENAL_CELL']);
            $TRI_PO_CRYSTALS    = mysql_real_escape_string($_POST['TRI_PO_CRYSTALS']);
            $BACTERIA_CELL      = mysql_real_escape_string($_POST['BACTERIA_CELL']);
            $RED_SUG_CT         = mysql_real_escape_string($_POST['RED_SUG_CT']);
            $DESA_CASTS         = mysql_real_escape_string($_POST['DESA_CASTS']);
            $MUC_TH             = mysql_real_escape_string($_POST['MUC_TH']);
            $PRO_CT             = mysql_real_escape_string($_POST['PRO_CT']);
            $CO_GRAN_CASTS      = mysql_real_escape_string($_POST['CO_GRAN_CASTS']);
            $REMARKS            = mysql_real_escape_string($_POST['REMARKS']);
            $FIN_GRAN_CASTS     = mysql_real_escape_string($_POST['FIN_GRAN_CASTS']);
            $PUS_CASTS          = mysql_real_escape_string($_POST['PUS_CASTS']);
            $RBC_CASTS          = mysql_real_escape_string($_POST['RBC_CASTS']);
            $WAXY_CASTS         = mysql_real_escape_string($_POST['WAXY_CASTS']);
            $MEAL               = mysql_real_escape_string($_POST['LAST_MEAL']);
            $MEDTECH            = mysql_real_escape_string($_POST['MEDTECH']);
            $PATHOLOGIST        = mysql_real_escape_string($_POST['PATHOLOGIST']);
            $TAKEN              = mysql_real_escape_string($_POST['TAKEN']);
            $date               = date("Y-m-d");
            $Year               = date('Y',strtotime($date));
            $Month              = date('M',strtotime($date));

            $LAB_RECORD = $db->prepare("insert into laboratory_record values('',?,?,?,?,?,?,?,?)");        
            $LAB_RECORD->bindParam(1,$LABR_ID);
            $LAB_RECORD->bindParam(2,$MEDTECH);
            $LAB_RECORD->bindParam(3,$PATHOLOGIST);
            $LAB_RECORD->bindParam(4,$TAKEN);
            $LAB_RECORD->bindParam(5,$MEAL);
            $LAB_RECORD->bindParam(6,$SPECIMEN);
            $LAB_RECORD->bindParam(7,$Month);
            $LAB_RECORD->bindParam(8,$Year);
            $LAB_RECORD->execute();
            
            $Lab_rec_id = $db->lastInsertId();
            
            $URINE = $db->prepare("insert into urinalysis values('',?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $URINE->bindParam(1,$Lab_rec_id);
            $URINE->bindParam(2,$COLOR_PHY_PRO); 
            $URINE->bindParam(3,$TRANS_PHY_PRO); 
            $URINE->bindParam(4,$PH_PHY_PRO); 
            $URINE->bindParam(5,$SPEC_GRAV_PHY_PRO); 
            $URINE->bindParam(6,$RED_SUG_CT); 
            $URINE->bindParam(7,$PRO_CT); 
            $URINE->bindParam(8,$PUS_CELL); 
            $URINE->bindParam(9,$RBC_CELL); 
            $URINE->bindParam(10,$YEAST_CELL); 
            $URINE->bindParam(11,$SQUAMOS_CELL); 
            $URINE->bindParam(12,$RENAL_CELL); 
            $URINE->bindParam(13,$BACTERIA_CELL); 
            $URINE->bindParam(14,$DESA_CASTS); 
            $URINE->bindParam(15,$CO_GRAN_CASTS); 
            $URINE->bindParam(16,$FIN_GRAN_CASTS); 
            $URINE->bindParam(17,$PUS_CASTS); 
            $URINE->bindParam(18,$RBC_CASTS);
            $URINE->bindParam(19,$WAXY_CASTS);
            $URINE->bindParam(20,$AU_CRYSTALS);
            $URINE->bindParam(21,$APO_CRYSTALS);
            $URINE->bindParam(22,$URIC_ACID_CRYSTALS);
            $URINE->bindParam(23,$CAL_OX_CRYSTALS);
            $URINE->bindParam(24,$TRI_PO_CRYSTALS);
            $URINE->bindParam(25,$MUC_TH);
            $URINE->bindParam(26,$REMARKS);
            $URINE->bindParam(27,$Month);
            $URINE->bindParam(28,$Year); 
            $URINE->execute();

            $Status = 'Completed';
            $LABREQ_UP = $db->prepare("Update lab_request set STATUS=? Where LBR_ID=?");
            $LABREQ_UP->bindParam(1,$Status);
            $LABREQ_UP->bindParam(2,$LABR_ID);
            $LABREQ_UP->execute();

}
?>