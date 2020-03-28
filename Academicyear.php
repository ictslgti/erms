<?php
$title = "SLGTI Academic Year | Online Examination Result Management System | SLGTI";
$description = "Online Examination Result  Management System (ERMS)-SLGTI";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("./head.php"); ?>
</head>

<body>
    <div class="page-wrapper toggled bg2 border-radius-on light-theme">
        <nav id="sidebar" class="sidebar-wrapper">
            <?php include_once("nav.php"); ?>
        </nav>
        <main class="page-content pt-2">
            <div id="overlay" class="overlay"></div>
            <div class="container-fluid p-5">
                <!-- #1 Insert Your Content-->

                <div class="container">
                   <div class="row">
                     <div class="col-sm">
                        <div class="border border-primary text-center rounded text-primary p-3">
                          <h1>SLGTI Academic Year</h1>                  
                        </div>
                    </div>
                 </div>
                    <br>
                    <br>
                  <form method="POST" action="">
                  <div class="row"> 
                  <div class="col-sm">
                     <div class="form-group">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01">Academic Year </label>
                        </div>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                          </div>
                        </div>
                      </div>

                      <div class="col-sm">
                     <div class="form-group">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01"> Year Status</label>
                        </div>
                          <select class="custom-select" id="inputGroupSelect01">
                            <option selected>Choose Academic Year Status</option>
                            <option value="1">Completed</option>
                            <option value="2">Active</option>
                          </select>
                          </div>
                        </div>
                      </div>
                      </div>
                      <br>

               
               <div class="row">
               <div class="col-sm">
                      <div class="form-group">
                          <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon3">Semester1 Start Date</span>
                              </div>
                              <input type="date" id="birthday" name="Assessment_Date"class="form-control" id="basic-url" aria-describedby="basic-addon3">
                              </div>
                        </div>
                      </div>
    
                    <div class="col-sm">
                      <div class="form-group">
                          <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon3">Semester1 End Date</span>
                              </div>
                              <input type="date" id="birthday" name="Assessment_Date"class="form-control" id="basic-url" aria-describedby="basic-addon3">
                              </div>
                        </div>
                      </div>
                    </div>
               </div>
                  <br>

                  <div class="row">
               <div class="col-sm">
                      <div class="form-group">
                          <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon3">Semester2 Start Date</span>
                              </div>
                              <input type="date" id="birthday" name="Assessment_Date"class="form-control" id="basic-url" aria-describedby="basic-addon3">
                              </div>
                        </div>
                      </div>
    
                    <div class="col-sm">
                      <div class="form-group">
                          <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon3">Semester2 End Date</span>
                              </div>
                              <input type="date" id="birthday" name="Assessment_Date"class="form-control" id="basic-url" aria-describedby="basic-addon3">
                              </div>
                        </div>
                      </div>
                    </div>
              
                  <br>


                  
                <div class="row">
                    <div class="col-11 "></div>
                    <div class="col-1 ">
                      <button type="button" class="btn btn-outline-success " >Add</button>
                   </div>
                </div>
               </form>
            </div>
              
                <!-- #1 Insert Your Content" -->
            </div>
        </main>
    </div>
    <?php include_once("script.php"); ?>
</body>

</html>
