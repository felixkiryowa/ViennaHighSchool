<div class="right_col" role="main">
          <!-- top tiles -->
          
          <!-- /top tiles -->

          <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add Teacher</h2>
              
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      <div class="messages"></div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Other Name </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="other-name" class="form-control col-md-7 col-xs-12" type="text" name="other-name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Username *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="user-name" class="form-control col-md-7 col-xs-12" type="text" name="username">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="email" class="form-control col-md-7 col-xs-12" type="text" name="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Password *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" class="form-control col-md-7 col-xs-12" type="text" name="password">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="user-role" class="control-label col-md-3 col-sm-3 col-xs-12">User Role *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="user-role" name ="user-role"  class="form-control" required>
                            <option value="">Choose..</option>
                            <option value="admin">Admin</option>
<<<<<<< HEAD
                            <option value="class_teacher">Class Teacher</option>
=======
>>>>>>> f3e5c3609bfe03bb6bb307f9c85dc204540db58e
                            <option value="teacher">Teacher</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="user-status" class="control-label col-md-3 col-sm-3 col-xs-12">User Status *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="user-status" name ="user-status" class="form-control" required>
                            <option value="">Choose..</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                          </select>
                        </div>
                      </div>
<<<<<<< HEAD
=======
                      <div class="form-group" id="teaches_class">
                        <label for="user-status" class="control-label col-md-3 col-sm-3 col-xs-12">Teacher To Class? *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="checkbox" class="flat" name="teaches_class" value=" S.1"> S.1
                          <input type="checkbox" class="flat" name="teaches_class" value=" S.2"> S.2
                          <input type="checkbox" class="flat" name="teaches_class" value=" S.3"> S.3
                          <input type="checkbox" class="flat" name="teaches_class" value=" S.4"> S.4
                          <input type="checkbox" class="flat" name="teaches_class" value=" S.5"> S.5
                          <input type="checkbox" class="flat" name="teaches_class" value=" S.6"> S.6
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="user-status" class="control-label col-md-3 col-sm-3 col-xs-12">Class Teacher To Class? *</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="checkbox" class="flat" name="class_teacher_of" value=" S.1"> S.1
                          <input type="checkbox" class="flat" name="class_teacher_of" value=" S.2"> S.2
                          <input type="checkbox" class="flat" name="class_teacher_of" value=" S.3"> S.3
                          <input type="checkbox" class="flat" name="class_teacher_of" value=" S.4"> S.4
                          <input type="checkbox" class="flat" name="class_teacher_of" value=" S.5"> S.5
                          <input type="checkbox" class="flat" name="class_teacher_of" value=" S.6"> S.6
                        </div>
                      </div>
                    
                      <div class="form-group">
                        <label for="subject" class="control-label col-md-3 col-sm-3 col-xs-12">Subject(s) *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <!-- name ="subject" class="form-control" -->
                        <select id='callbacks' class="form-control" multiple='multiple'>
                            <option value="">Choose..</option>
                            <option value="ENGLISH">ENGLISH</option>
                            <option value="MATHEMATICS">MATHEMATICS</option>
                            <option value="GEOGRAPHY">GEOGRAPHY</option>
                            <option value="COMMERCE">COMMERCE</option>
                            <option value="HISTORY">HISTORY</option>
                            <option value="FINE ART">FINE ART</option>
                            <option value="BIOLOGY">BIOLOGY</option>
                            <option value="CHEMISTRY">CHEMISTRY</option>
                            <option value="PHYSICS">PHYSICS</option>
                            <option value="AGRICULTURE">AGRICULTURE</option>
                            <option value="C.R.E">C.R.E</option>
                            <option value="ENTREPRENEURSHIP">ENTREPRENEURSHIP</option>
                            <option value="KISWAHILI">KISWAHILI</option>
                            <option value="I.R.E">I.R.E</option>
                            <option value="COMPUTER">COMPUTER</option>
                            <option value="LUGANDA">LUGANDA</option>
                            <option value="ENGLISH LITERATURE">ENGLISH LITERATURE</option>
                          </select>
                        </div>
                      </div>
>>>>>>> f3e5c3609bfe03bb6bb307f9c85dc204540db58e
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button id="add_teacher_submit_btn" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
<<<<<<< HEAD
     
=======
>>>>>>> f3e5c3609bfe03bb6bb307f9c85dc204540db58e
              </div>
            </div>
          </div>
    </div>