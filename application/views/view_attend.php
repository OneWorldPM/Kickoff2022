<?php
if (isset($_GET['testing']))
{
//    echo "<pre>";
//    print_r($sessions);
//    echo "</pre>";
//    exit;
}
$time_zone = "EST";
?>
<style>
    body{
        background-image: url(<?= base_url() ?>front_assets/agility/Agility_main_page_backdrop.png);
        background-attachment: fixed;
        background-size: cover !important;
        background-position: center center !important;
    }

    .progress-bar {
        height: 100%;
        padding: 3px;
        background: rgb(200, 201, 202);
        box-shadow: none; 
    }
    .progress_bar_new {
        height: 100%;
        padding: 3px;
        background: #99d9ea;
        box-shadow: none;
        text-align: center;
        color: #fff;
        padding-top: 0px;
    }

    .option_section_css{
        background-color: #f1f1f1;
        padding-top: 4px;
        padding-left: 6px;
        border-radius: 9px;
        margin-bottom: 10px;
    }
    .option_section_css_selected{
        background-color: #e1f6ff;
        padding-top: 4px;
        padding-left: 6px;
        border-radius: 9px;
        margin-bottom: 10px;
    }
    .progress {
        height: 26px;
        margin-bottom: 10px;
        overflow: hidden;
        background-color: #e6edf3;
        border-radius: 5px;
        -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
        box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
    }
    section{
        padding: 25px 0px;
    }

    #unableToOpenZoom{
        color: red;
    }

    #unableToOpenZoom:hover{
        color: blue;
    }

</style>
<section class="parallax" style="top: 0; padding-top: 0px;">
    <div class="container container-fullscreen"> 
        <div class="text-middle">
            <div class="row">
                <div class="col-md-12">
                    <!-- CONTENT -->
                    <?php
                    if ((isset($sessions) && !empty($sessions))) {
                        $time = $sessions->time_slot;
                        $datetime = $sessions->sessions_date . ' ' . $time;
                        $datetime = date("Y-m-d H:i", strtotime($datetime));
                        $datetime = new DateTime($datetime);
                        $datetime1 = new DateTime();
                        $diff = $datetime->getTimestamp() - $datetime1->getTimestamp();
                        if ($diff >= 900) {
                            $diff = $diff - 900;
                        } else {
                            $diff = 0;
                        }
                    }
                    ?>
                    <input type="hidden" id="time_second" value="<?= $diff ?>">
                    <section class="content">
                        <div class="container" style=" background: rgba(250, 250, 250, 0.8);"> 
                            <div class="row p-b-40">
                                <div class="col-md-12" style="background-color: #0470F8; margin-bottom: 10px;">
                                    <h3 style="margin-bottom: 5px; color: #fff; font-weight: 700; text-transform: uppercase;"><?= isset($sessions) ? $sessions->session_title : "" ?></h3>
                                </div>    
                                <div class="col-md-7 m-t-20" style="border-right: 1px solid;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <?php if ($sessions->sessions_photo != "") { ?>
                                                <img alt="" src="<?= base_url() ?>uploads/sessions/<?= (isset($sessions) && !empty($sessions)) ? $sessions->sessions_photo : "" ?>" style="width: 100%;">
                                            <?php } else { ?>
                                                <img alt="" src="<?= base_url() ?>front_assets/images/session_avtar.jpg" style="width: 100%;">
                                            <?php } ?>   
                                        </div>  
                                        <div class="col-md-8">
                                            <h2 style="margin-bottom: 0px;"><?= (isset($sessions) && !empty($sessions)) ? $sessions->session_title : "" ?></h2>
                                            <small><i class="fa fa-calendar" aria-hidden="true"></i>
                                                <span style="color: #b97a43;">
                                                    <?php if($time_zone == "EST"):?>
                                                    <?= $sessions->sessions_date . ' ' . date("h:i A", strtotime($sessions->time_slot) + 60*180)?> - <?=date("h:i A", strtotime($sessions->end_time)+ 60*180) ?> EST</span>
                                                    <?php else: ?>
                                                    <?= $sessions->sessions_date . ' ' . date("h:i A", strtotime($sessions->time_slot))?> - <?=date("h:i A", strtotime($sessions->end_time)) ?> CT</span>
                                                    <?php endif; ?>
                                                <?php
                                                if ($sessions->us_emea_switch == 1)
                                                { ?>
                                                    <span style="color: #b97a43;">US/EMEA <?= $sessions->sessions_date_display_us_emea . ' ' . date("h:i A", strtotime($sessions->start_time_display_us_emea))?> <?=($sessions->sessions_type_id == 1)?'':' - ' . date("h:i A", strtotime($sessions->end_time_display_us_emea)) ?> PT</span>
                                                    <?php
                                                }


                                                if ($sessions->us_emea_switch == 1 && $sessions->apj_switch == 1)
                                                { ?>
                                                    /
                                                    <?php
                                                }


                                                if ($sessions->apj_switch == 1)
                                                { ?>
                                                    <span style="color: #358080;">APJ <?= $sessions->sessions_date_display_apj . ' ' . date("h:i A", strtotime($sessions->start_time_display_apj))?> <?=($sessions->sessions_type_id == 1)?'':' - ' . date("h:i A", strtotime($sessions->end_time_display_apj)) ?> AEDT</span>
                                                    <?php
                                                }
                                                ?></small>
                                            <p class="m-t-20"><?= (isset($sessions) && !empty($sessions)) ? $sessions->sessions_description : "" ?></p>
                                        </div>    
                                    </div>
                                </div>
                                <div class="col-md-5" style="text-align: center;">
                                    <?php
                                    $size = 0;
                                    if (isset($sessions->presenter) && !empty($sessions->presenter)) {
                                        $size = sizeof($sessions->presenter);
                                    }
                                    ?>
                                    <?php if ($size <= 2) { ?>
                                        <br>
                                        <br>
                                    <?php } ?>
                                    <?php
                                    if (isset($sessions->presenter) && !empty($sessions->presenter)) {
                                        foreach ($sessions->presenter as $value) {
                                            ?>
                                            <h3 style="margin-bottom: 0px;  cursor: pointer;" data-presenter_id="<?= $value->presenter_id ?>" data-presenter_photo="<?= $value->presenter_photo ?>" data-presenter_name="<?= $value->presenter_name ?>" data-designation="<?= $value->designation ?>" data-email="<?= $value->email ?>" data-company_name="<?= $value->company_name ?>" data-bio="<?= $value->bio ?>" class="presenter_open_modul" ><u style="color: #337ab7;"><?= $value->presenter_name ?></u><?= ($value->title != "") ? "," : "" ?> <?= $value->title ?></h3>
                                            <h3 style="margin-bottom: 0px;  cursor: pointer;"> <?= $value->company_name ?></h3>
                                            <!--<p class="m-t-20"><?= (isset($sessions) && !empty($sessions)) ? $sessions->bio : "" ?></p>-->
                                            <!--<img alt="" src="<?= base_url() ?>uploads/presenter_photo/<?= (isset($sessions) && !empty($sessions)) ? $sessions->presenter_photo : "" ?>" class="img-circle" height="100" width="100">-->
                                            <?php
                                        }
                                    }
                                    ?>
<!--<p class="m-t-20"><?= (isset($sessions) && !empty($sessions)) ? $sessions->bio : "" ?></p>-->
<!--<img alt="" src="<?= base_url() ?>uploads/presenter_photo/<?= (isset($sessions) && !empty($sessions)) ? $sessions->presenter_photo : "" ?>" class="img-circle" height="100" width="100">-->
                                </div>
                                <div class="col-md-12 m-t-40">
                                    <div class="col-md-4 col-md-offset-4" style="text-align: center; text-align: center; padding: 10px; background-color: #fff; border: 1px solid;">
                                        <p><i class="fa fa-info-circle" aria-hidden="true" style="font-size: 20px;"></i></p>
                                        <p>You will automatically enter the session 15 minutes before it is due to begin.</p>
                                        <p id="timerPara">Entry will be enabled in <span id="id_day_time"></span></p>
                                    </div>
                                </div>
                                <?php if (1 == 2){ ?>
                                    <div class="col-md-12">
                                        <a class="button black-light button-3d rounded right" style="margin: 0px 0;" href="<?= base_url() ?>sessions/view/<?= (isset($sessions) && !empty($sessions)) ? $sessions->sessions_id : "" ?>"><span>Take me there</span></a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </section><br><br>
                    <!-- END: SECTION --> 
                </div>
            </div> 
        </div>
    </div>
</section>
<div class="modal fade" id="modal" tabindex="-1" role="modal" aria-labelledby="modal-label" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width: 730px;">
        <div class="modal-content">
            <div class="modal-header" style="padding: 0px;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="row" style="padding-top: 10px; padding-bottom: 20px;">
                    <div class="col-sm-12">
                        <div class="col-sm-4" id="social_link_div_show">
                            <!--                            <div id="social_link_div" style="text-align: center; background-color: #ff095c; text-align: center; background-color: #ff095c; position: absolute; padding: 0px 50px 0px 50px; margin-top: 100px; border-bottom-left-radius: 41px; border-bottom-right-radius: 41px;">-->
                            <!--                                <ul style="list-style: none; display: inline-flex; padding-left: 0px; padding-top: 10px;">-->
                            <!--                                    <li data-placement="top" data-original-title="Twitter">-->
                            <!--                                        <a id="twitter_link" target="_blank">-->
                            <!--                                            <i class="fa fa-twitter" style="color: #fff;"></i>-->
                            <!--                                        </a>-->
                            <!--                                    </li>-->
                            <!--                                    <li data-placement="top" data-original-title="Facebook" style="padding-left: 15px; padding-right: 20px;">-->
                            <!--                                        <a id="facebook_link" target="_blank">-->
                            <!--                                            <i class="fa fa-facebook" style="color: #fff;"></i>-->
                            <!--                                        </a>-->
                            <!--                                    </li>-->
                            <!--                                    <li data-placement="top" data-original-title="LinkedIn">-->
                            <!--                                        <a id="linkedin_link" target="_blank">-->
                            <!--                                            <i class="fa fa-linkedin" style="color: #fff;"></i>-->
                            <!--                                        </a>-->
                            <!--                                    </li>-->
                            <!--                                </ul>-->
                            <!--                            </div>-->
                            <img src="" id="presenter_profile" class="img-circle" style="height: 170px; width: 170px;">


                        </div>
                        <div class="col-sm-8" style="padding-top: 15px;">
                            <h3 id="presenter_title" style="font-weight: 700"></h3>
                            <h6 id="presenter_designation" style="font-weight: 700"></h6>
                            <p class="presenter-email-field" style="border-bottom: 1px dotted; margin-bottom: 10px; padding-bottom: 10px;"><b style="color: #000;">Email </b> <span id="email" style="padding-left: 10px;"></span></p>
                            <p class="presenter-comapny-field" style="border-bottom: 1px dotted; margin-bottom: 10px; padding-bottom: 10px;"><b style="color: #000;">Company </b> <span id="company" style="padding-left: 10px;"></span></p>
                            <p class="presenter-bio-field" style="border-bottom: 1px dotted; margin-bottom: 10px; padding-bottom: 10px;"><b style="color: #000;">Bio </b> <span id="bio" style="padding-left: 10px;"></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="timer_status" value="1">
<script type="text/javascript">
    let session_type_id = "<?=$sessions->sessions_type_id?>";
    let zoom_redirect = "<?=$sessions->zoom_redirect?>";
    let zoom_redirect_url = "<?=$sessions->zoom_redirect_url?>";
    let session_reply = "<?=$sessions->session_reply?>";

    $(document).ready(function () {

        if ($("#time_second").val() <= 0) {
            timer();
        } else {
            window.setInterval(timer, 1000);
        }
        $(".presenter_open_modul").click(function () {
            var presenter_id = $(this).attr("data-presenter_id");
            var presenter_photo = $(this).attr("data-presenter_photo");
            var presenter_name = $(this).attr("data-presenter_name");
            var designation = $(this).attr("data-designation");
            var company_name = $(this).attr("data-company_name");
            var email = $(this).attr("data-email");
            var twitter_link = $(this).attr("data-twitter_link");
            var facebook_link = $(this).attr("data-facebook_link");
            var linkedin_link = $(this).attr("data-linkedin_link");
            var bio = $(this).attr('data-bio');
            if (presenter_photo != "" && presenter_photo != null) {
                $.ajax({
                    url: '<?= base_url() ?>uploads/presenter_photo/' + presenter_photo,
                    type: 'HEAD',
                    error: function ()
                    {
                        $('#presenter_profile').attr('src', "<?= base_url() ?>uploads/presenter_photo/presenter_avtar.png");
                        $('#modal').modal('show');
                    },
                    success: function ()
                    {
                        $('#presenter_profile').attr('src', "<?= base_url() ?>uploads/presenter_photo/" + presenter_photo);
                        $('#modal').modal('show');
                    }
                });
            } else {
                $('#presenter_profile').attr('src', "<?= base_url() ?>uploads/presenter_photo/presenter_avtar.png");
                $('#modal').modal('show');
            }

            if (presenter_name != "" && presenter_name != null) {
                $('#presenter_title').text(presenter_name);
            } else {
                $('#presenter_title').text(presenter_name);
            }

            if (designation != "" && designation != null) {
                $('#presenter_designation').html(designation);
            } else {
                $('#presenter_designation').html(designation);
            }

            if (email != "" && email != null &&
                presenter_id != 9 &&
                presenter_id != 10 &&
                presenter_id != 11 &&
                presenter_id != 12 &&
                presenter_id != 6 &&
                presenter_id != 7 &&
                presenter_id != 21 &&
                presenter_id != 22 &&
                presenter_id != 23 &&
                presenter_id != 20
            )
            {
                $('.presenter-email-field').show();
                $('#email').text(email);
            }else{
                $('.presenter-email-field').hide();
            }

            if (company_name != "" && company_name != null) {
                $('.presenter-comapny-field').show();
                $('#company').text(company_name);
                $('#company_lbl').text("Company");
            } else {
                $('.presenter-comapny-field').hide();
                $('#company').text("");
                $('#company_lbl').text("");
            }

            if(
                bio != "" && bio != null &&
                presenter_id != 6 &&
                presenter_id != 7 &&
                presenter_id != 21 &&
                presenter_id != 22 &&
                presenter_id != 23
            ) {
                $('.presenter-bio-field').show();
                $('#bio').html(bio);
            } else {
                $('.presenter-bio-field').hide();
                $('#bio').html("");
            }

            $("#twitter_link").attr("href", twitter_link);
            $("#facebook_link").attr("href", facebook_link);
            $("#linkedin_link").attr("href", linkedin_link);
            $("#bio_text").html(bio);
        });
    });
    var testingSeconds = 5;
    var upgradeTime = <?=(isset($_GET['testing']))?'testingSeconds;':'$("#time_second").val();'?>
    var seconds = upgradeTime;
    function timer()
    {
        var days = Math.floor(seconds / 24 / 60 / 60);
        var hoursLeft = Math.floor((seconds) - (days * 86400));
        var hours = Math.floor(hoursLeft / 3600);
        var minutesLeft = Math.floor((hoursLeft) - (hours * 3600));
        var minutes = Math.floor(minutesLeft / 60);
        var remainingSeconds = seconds % 60;
        function pad(n) {
            return (n < 10 ? "0" + n : n);
        }
        if (pad(days) > 1) {
            var days_lable = "days";
        } else {
            var days_lable = "day";
        }

        if (pad(hours) > 1) {
            var hours_lable = "hours";
        } else {
            var hours_lable = "hour";
        }

        if (pad(minutes) > 1) {
            var minutes_lable = "minutes";
        } else {
            var minutes_lable = "minute";
        }
        if (pad(remainingSeconds) > 1) {
            var remainingSeconds_lable = "seconds";
        } else {
            var remainingSeconds_lable = "second";
        }
        document.getElementById('id_day_time').innerHTML = pad(days) + " " + days_lable + ", " + pad(hours + 3) + " " + hours_lable + ", " + pad(minutes) + " " + minutes_lable + ", " + pad(remainingSeconds) + " " + remainingSeconds_lable;
        if (seconds <= 0) {

            if ($('#timer_status').val() == 1)
            {

                if (session_reply == 1)
                {
                    $('#timer_status').val(0);
                    window.location = "<?= site_url() ?>sessions/view/<?= (isset($sessions) && !empty($sessions)) ? $sessions->sessions_id : "" ?>";
                }

                if (zoom_redirect == 1)
                {
                    $('#timer_status').val(0);
                    if (window.open(zoom_redirect_url, "_blank")){
                        return false;
                    }else{
                        $('#timer_status').val(0);
                        $('#timerPara').html('' +
                            '<span><a id="unableToOpenZoom" href="'+zoom_redirect_url+'" target="_blank">Your browser has blocked the opening of the new tab for Zoom, please click here to open Zoom.</a></span>');
                        return false;
                    }
                }


                if (session_type_id == 16 && zoom_redirect == 1)
                {
                    $('#timer_status').val(0)
                    if (window.open(zoom_redirect_url, "_blank")){

                    }else{
                        $('#timerPara').html('' +
                            '<span><a id="unableToOpenZoom" href="'+zoom_redirect_url+'" target="_blank">Your browser has blocked the opening of the new tab for Zoom, please click here to open Zoom.</a></span>');
                    }
                }else{
                    $('#timer_status').val(0)
                    window.location = "<?= site_url() ?>sessions/view/<?= (isset($sessions) && !empty($sessions)) ? $sessions->sessions_id : "" ?>";
                }
            }

        } else {
            seconds--;
        }
    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        var page_link = $(location).attr('href');
        var user_id = <?= $this->session->userdata("cid") ?>;
        var page_name = "Attend View";
        $.ajax({
            url: "<?= base_url() ?>home/add_user_activity",
            type: "post",
            data: {'user_id': user_id, 'page_name': page_name, 'page_link': page_link},
            dataType: "json",
            success: function (data) {
            }
        });
    });
</script>
