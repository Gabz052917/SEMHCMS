<?php
require 'lib/session.php';
require 'lib/Db.config.pdo.php';
$stmt = $db->prepare("Select P_ID, P_GNDR, P_REL, P_OCCU, P_TYPE, CONCAT(P_FNAME,' ', P_LNAME) AS FullName from patient");
  $stmt->execute();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta name="google" content="notranslate">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico">

    <title>Set Schedule</title>
    <!-- js placed at the end of the document so the pages load faster -->
    <!--<script src="js/jquery.js"></script>-->
    <script type="text/javascript" language="javascript" src="assets/advanced-datatable/media/js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" language="javascript" src="assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
    <script src="js/respond.min.js" ></script>
    <script src="js/preloader.js"></script>
    <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
    <script src="js/advanced-form-components.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-datetimepicker/css/datetimepicker.css" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <link href="css/pageloader.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <div class="preloader-wrapper">
    <div class="preloader">
        <img src="gif/time.svg" alt="SEMHCMS">
        <div style="position: absolute; top: 100%;left: 50%;margin-right: -50%;transform: translate(-50%, -50%);">
          <p style="font-size: 15px; font-weight: bold;">loading</p>
        </div>
    </div>
  </div>
  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
          <div class="sidebar-toggle-box">
              <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
          </div>
          <!--logo start-->
          <a href="index.php" class="logo" >St. Ezekiel Moreno<span>|Healthcare Management System</span></a>
          <!--logo end-->
          <div class="top-nav ">
              <ul class="nav pull-right top-menu">
                  <li>
                      <input type="text" class="form-control search" placeholder="Search">
                  </li>
                  <!-- user login dropdown start-->
                  <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <img alt="" src="img/avatar1_small.jpg">
                          <span class="username"><b><?php echo $UserN; ?></b></span>
                          <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu extended logout">
                          <div class="log-arrow-up"></div>
                          <li><a href="#"><i class=" icon-suitcase"></i>Profile</a></li>
                          <li><a href="#"><i class="icon-cog"></i> Settings</a></li>
                          <li><a href="#"><i class="icon-bell-alt"></i> Notification</a></li>
                          <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
                      </ul>
                  </li>
                  <!-- user login dropdown end -->
              </ul>
          </div>
      </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a href="index.php">
                          <i class="icon-dashboard"></i>
                          <span>Home</span>
                      </a>
                  </li>

                  <li class="sub-menu" id="Patient-li">
                      <a href="javascript:;" >
                          <i class="icon-user"></i>
                          <span>Patient Management</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="add-patient.php">Add Patients</a></li>
                          <li><a  href="view-patients.php">View Patients</a></li>
						  <li><a  href="patient-reports-panel.php">Patient Reports</a></li>
                      </ul>
                  </li>
				  
				  <li class="sub-menu" id="Schedule-li">
                      <a href="javascript:;" class="active">
                          <i class="icon-calendar"></i>
                          <span>Schedule Management</span>
                      </a>
                      <ul class="sub">
                          <li class="active"><a  href="set-schedule.php">Set Schedule</a></li>
                          <li><a  href="view-schedule.php">View Schedule</a></li>
						  <li><a  href="sched-reports-panel.php">Schedule Reports</a></li>
                      </ul>
                  </li>
				  
				  <li class="sub-menu" id="Inventory-li">
                      <a href="javascript:;" >
                          <i class="icon-truck"></i>
                          <span>Inventory Management</span>
                      </a>
                      <ul class="sub">
						  <li><a href="view-inventory.php">View Inventory</a></li>
						  <li><a  href="inv-reports-panel.php">Inventory Reports</a></li>
                      </ul>
                  </li>
          
          <li class="sub-menu" id="Laboratory-li">
                      <a href="javascript:;">
                          <i class="icon-beaker"></i>
                          <span>Lab Management</span>
                      </a>
                      <ul class="sub">
						  <li><a  href="labtest.php">Add Lab Results</a></li>
						  <li><a  href="lab-request.php">View Lab Request</a></li>
						  <li><a  href="labview.php">View Lab Records</a></li>
						  <li><a  href="lab-reports-panel.php">Laboratory Reports</a></li>
                      </ul>
                  </li>
          
          <li class="sub-menu" id="Maintenance-li">
                      <a href="javascript:;" >
                          <i class="icon-download-alt"></i>
                          <span>Maintenance</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="backup.php">Backup Database</a></li>
                          <li><a  href="view-users.php">Manage Users</a></li>
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              List of Patients
                          </header>
                          <div class="panel-body">
                                <div class="adv-table">
								<a class="btn btn-shadow btn-success" href="add-patient.php"><i class="icon-plus"></i> Add Patient</a>
<!-- Table part of the code-->
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                          <th >ID</th>
                                          <th >Name</th>
                                          <th >Gender</th>
                                          <th >Religion</th>
                                          <th >Occupation</th>
                                          <th  class="hidden-phone">Type</th>
                                          <th  class="hidden-phone">Action</th>
                                      </tr>
                                      </thead>
                                      <tbody>
<?php
      while($row = $stmt->fetch()){
?>                                     
                                          <tr class="gradeX">
                                              <td><p>P<?php echo $row['P_ID'] ?></p></td>
                                              <td><?php echo $row['FullName'] ?></td>
                                              <td><?php echo $row['P_GNDR'] ?></td>
                                              <td><?php echo $row['P_REL'] ?></td>
                                              <td><?php echo $row['P_OCCU'] ?></td>
                                              <td class="center hidden-phone"><?php echo $row['P_TYPE'] ?></td>
                                              <td class="center hidden-phone">
                        		<a class="btn btn-shadow btn-success btn-xs" data-toggle="modal" data-target="#setsched-<?php echo $row['P_ID']?>"><i class="icon-calendar"></i> Set Schedule</a>
<!-- Register set Schedule MODAL-->
                                <div aria-hidden="true" aria-labelledby="myModalLabel-<?php echo $row['P_ID']?>" role="dialog" tabindex="-1" id="setsched-<?php echo $row['P_ID']?>" class="modal fade">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                              <h4 class="modal-title" id="myModalLabel-<?php echo $row['P_ID']?>">Set Appointment</h4>
                                          </div>
                                          <div class="modal-body">
                                                <form class="form-horizontal" role="form">
                                                  <div class="form-group">
                                                      <label class="col-md-3 col-sm-2 control-label">Patient Name:</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" value="<?php echo $row['FullName']; ?>" class="form-control" readonly class="form_datetime form-control" disabled>
                                                      </div>
                                                  </div>
                                <div class="form-group">
                                  <label class="col-md-3 col-sm-2 control-label">Patient Type:</label>
                                      <div class="col-lg-6">
                                        <input type="text" value="<?php echo $row['P_TYPE']; ?>" readonly class="form_datetime form-control" disabled>
                                      </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-md-3 col-sm-2 control-label">Gender:</label>
                                      <div class="col-lg-4">
                                        <select readonly class="form_datetime form-control" disabled>
                                          <option value="-None-"<?php
                                              if ($row['P_GNDR'] == "-None-") { echo " selected"; }?>>-None-</option>
                                          <option value="Male"<?php
                                              if ($row['P_GNDR'] == "Male") { echo " selected"; }?>>Male</option>
                                          <option value="Female"<?php
                                              if ($row['P_GNDR'] == "Female") { echo " selected"; }?>>Female</option>
                                        </select>
                                      </div>
                                </div>                        
                          <div class="form-group">
                              <label class="col-md-3 col-sm-2 control-label">Date of Appointment:</label>
								                <div class="col-lg-6">
                                        <input type="date" id="SCHEDULE_DATE-<?php echo $row['P_ID'] ?>" size="16" class="form-control">
                                  </div>
                          </div>
						  <div class="form-group">
                              <label class="col-md-3 col-sm-2 control-label">Time:</label>
                                <div class="col-md-6">
                                    <input type="time" id="SCHEDULE_TIME-<?php date_default_timezone_set('Asia/Manila'); echo $row['P_ID'] ?>" value="<?php echo $CheckTime = date('H:i');?>" class="form-control">
                                </div>
                          </div>
                          <div class="form-group">
                              <label class="col-md-3 col-sm-2 control-label">Appointment Reason:</label>
                                  <div class="col-lg-4">
                                      <select class="form-control" id="SCHEDULE_PURPOSE-<?php echo $row['P_ID'] ?>">
                                        <option hidden>-None-</option>
                                        <option>Check Up</option>
										<option>Dental</option>
                                        <option>X-ray</option>
                                      </select>
                                  </div>
                          </div>
                          </form>
                        </div>
                    <div class="modal-footer">
                      <span style="float: left; font-weight: bold;" id="Error_Message-<?php echo $row['P_ID'] ?>" class="text-danger"></span>
                      <span style="float: left; font-weight: bold;" id="Success_Message-<?php echo $row['P_ID'] ?>" class="text-success"></span>
                      <a data-dismiss="modal" class="btn btn-shadow btn-default" type="button">Cancel</a>
                      <a class="btn btn-shadow btn-success" type="button" onclick="SetSched(<?php echo $row['P_ID'] ?>)"><i class="icon-calendar"></i> Set Schedule</a>
                    </div>
                                      </div>
                                  </div>
                              </div>
            <!--MODAL END-->
                        										  </td>
                                          </tr>
<?php
      }
?>
                                      </tbody>
                                    </table>
                                </div>
                          </div>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2017-2018 &copy; Primal Tinkers.
              <a href="#" class="go-top">
                  <i class="icon-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>
    
    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <!--script for this page only-->
<?php
include 'lib/functions/set-schedule-script.php';
include 'lib/User-Accesslvl.php';
?>
</body>
</html>
