<div class="main-content" >
    <div class="wrap-content container" id="container">
        <div class="container-fluid container-fullw bg-white">
            <div class="row">
                <div class="main-login col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div class="box-register">
                        <form class="form-register" id="frm_register" name="frm_register" method="post" action="<?= base_url() ?>admin/user/updateCustomer" enctype="multipart/form-data">
                            <fieldset>
                                <input type="hidden" class="form-control" name="cid" id="cid" value="<?php echo (isset($user)) ? $user->cust_id : ''; ?>">
                                <h3 class="box-title">Edit User</h3>
                                <div class="form-group">
                                    <span class="input-icon">
                                        <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo (isset($user)) ? $user->first_name : ''; ?>" placeholder="First Name">
                                        <i class="fa fa-user"></i> 
                                    </span><span id="errorfirst_name" style="color:red;"></span>
                                </div>
                                <div class="form-group">
                                    <span class="input-icon">
                                        <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo (isset($user)) ? $user->last_name : ''; ?>" placeholder="Last Name">
                                        <i class="fa fa-user"></i> 
                                    </span><span id="errorlast_name" style="color:red;"></span>
                                </div>


                                <div class="form-group">
                                    <span class="input-icon">
                                        <input type="text" class="form-control" name="title" id="title" value="<?php echo (isset($user)) ? $user->title : ''; ?>" placeholder="Title">
                                        <i class="fa fa-briefcase" aria-hidden="true"></i>
                                    </span><span id="errorlast_name" style="color:red;"></span>
                                </div>

                                <div class="form-group">
                                    <span class="input-icon">
                                        <select class="form-control" id="job_type" name="job_type">
                                        <option value="Accounting & Finance" <?=($user->job_type && $user->job_type == 'Accounting & Finance')?'selected':''?>> &nbsp;Accounting & Finance</option>
                                        <option value="Corp Dev & Strategy" <?=($user->job_type && $user->job_type == 'Corp Dev & Strategy')?'selected':''?>> &nbsp;Corp Dev & Strategy</option>
                                        <option value="Engineering" <?=($user->job_type && $user->job_type == 'Engineering')?'selected':''?>> &nbsp;Engineering</option>
                                        <option value="Executive Staff" <?=($user->job_type && $user->job_type == 'Executive Staff & Finance')?'selected':''?>> &nbsp;Executive Staff</option>
                                        <option value="HR & Learning" <?=($user->job_type && $user->job_type == 'HR & Learning')?'selected':''?>> &nbsp;HR & Learning</option>
                                        <option value="Marketing" <?=($user->job_type && $user->job_type == 'Marketing')?'selected':''?>> &nbsp;Marketing</option>
                                        <option value="Operations & IT" <?=($user->job_type && $user->job_type == 'Operations & IT')?'selected':''?>> &nbsp;Operations & IT</option>
                                        <option value="Product Management" <?=($user->job_type && $user->job_type == 'Product Management')?'selected':''?>> &nbsp;Product Management</option>
                                        <option value="Sales" <?=($user->job_type && $user->job_type == 'Sales')?'selected':''?>> &nbsp;Sales</option>
                                        <option value="Sales Engineering" <?=($user->job_type && $user->job_type == 'Sales Engineering')?'selected':''?>> &nbsp;Sales Engineering</option>
                                        <option value="SDR" <?=($user->job_type && $user->job_type == 'SDR')?'selected':''?>> &nbsp;SDR</option>
                                        <option value="Support" <?=($user->job_type && $user->job_type == 'Support')?'selected':''?>> &nbsp;Support</option>

                                        <optgroup label="___">
                                            <option value="Other" <?=($user->job_type && $user->job_type == 'Other')?'selected':''?>> &nbsp;Other</option>
                                        </optgroup>
                                    </select>
                                        <i class="fa fa-building" aria-hidden="true"></i>
                                    </span>

                                    <span id="errordegree" style="color:red"></span>
                                </div>

                                <div class="form-group">
                                    <span class="input-icon">
                                        <select id="region" name="region" class="form-control">
                                        <option value="Americas" <?=($user->region && $user->region == 'Americas')?'selected':''?>> &nbsp;Americas</option>
                                        <option value="APJ" <?=($user->region && $user->region == 'APJ')?'selected':''?>> &nbsp;APJ</option>
                                        <option value="EMEA" <?=($user->region && $user->region == 'EMEA')?'selected':''?>> &nbsp;EMEA</option>
                                        <option value="Global" <?=($user->region && $user->region == 'Global')?'selected':''?>> &nbsp;Global</option>
                                        <option value="Other" <?=($user->region && $user->region == 'Other' || $user->region == null)?'selected':''?>> &nbsp;Other</option>
                                    </select>
                                        <i class="fa fa-globe" aria-hidden="true"></i>
                                    <span id="errorcountry" style="color:red"></span>
                                    </span>
                                </div>

                                <div class="form-group">
                                    <span class="input-icon">
                                        <input type="text" class="form-control" name="phone" id="phone" value="<?php echo (isset($user)) ? $user->phone : ''; ?>" placeholder="Phone">
                                        <i class="fa fa-phone"></i> 
                                    </span><span id="errorphone" style="color:red;"></span>
                                </div>
                                <div class="form-group">
                                    <span class="input-icon">
                                        <input type="email" class="form-control" name="email" value="<?php echo (isset($user)) ? $user->email : ''; ?>" id="email" placeholder="Email">
                                        <i class="fa fa-envelope"></i> 
                                    </span><span id="erroremail" style="color:red;"></span>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary form-control" id="btn_register">
                                        <?php echo (isset($user)) ? 'Update' : 'Save'; ?> <i class="fa fa-arrow-circle-right"></i>
                                    </button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: DYNAMIC TABLE -->
    </div>
</div>
</div>   
<?php
$msg = $this->input->get('msg');
switch ($msg) {
    case "U":
        $m = "Successfully updated!";
        $t = "success";
        break;
    case "A":
        $m = "Email or Phone already exists!";
        $t = "error";
        break;
    case "E":
        $m = "Something went wrong, please try again!";
        $t = "error";
        break;
    default:
        $m = 0;
        break;
}
?>
<!-- start: JavaScript Event Handlers for this page -->

<script type="text/javascript">
    $(document).ready(function () {

<?php if ($msg): ?>
            alertify.<?= $t ?>("<?= $m ?>");
<?php endif; ?>
    });
</script>
<!-- end: JavaScript Event Handlers for this page -->
<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>
</html>
