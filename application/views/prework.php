<?php
if (isset($_GET['testing']))
{
    echo "<pre>";
    print_r($all_sessions);
    echo "</pre>";
    exit;
}
?>

<style>
    body{
        background-image: url(<?=base_url()?>front_assets/agility/Agility_main_page_backdrop.png);
        background-attachment: fixed;
        background-size: cover !important;
        background-position: center center !important;
    }

    .post-info {
        margin-bottom: 0px; 
        opacity: 1; 
    }
    .post-item {
        border-bottom: 2px solid #9b9b9b;
    }

    .hidden {
        visibility: hidden;
    }
    a:hover {
        color: #439ce4 !important;
    }
    section{
        padding: 25px 0px;
    }

    .icon-home {
        color: #002f70;
        font-size: 1.5em;
        font-weight: 700;
        vertical-align: middle;
    }

    .box-home {
        background-color: #444;
        border-radius: 20px;
        background: rgba(250, 250, 250, 0.8);
        max-width: 250px;
        min-width: 250px;
        min-height: 150px;
        max-height: 150px;
        padding: 15px;
        border-bottom: 5px solid;
    }

    .box_home_active {
        background-color: #002f70;
        border-radius: 20px;
        max-width: 250px;
        min-width: 250px;
        min-height: 150px;
        max-height: 150px;
        padding: 15px;
        border-bottom: 5px solid;
        color: #fff !important;
    }

    .box-home:hover {
        background-color: #002f70;
        color: #fff !important;
    }

    p {
        margin-bottom: 5px !important;
    }
</style>
<section class="parallax" style="top: 0; padding-top: 0px;">
<!--<section class="parallax" style="background-image: url(<?= base_url() ?>front_assets/images/Sessions_BG_screened.jpg); top: 0; padding-top: 0px;">-->
    <div class="container container-fullscreen" style="min-height: 700px;">
        <div class="">
            <div class="row">
                <div class="col-md-12 m-t-50" style="text-align: -webkit-center;text-align: center;">
                    <?php
                    if (isset($all_sessions_week) && !empty($all_sessions_week && 1==2)) { //disabled
                        $day = 1;
                        foreach ($all_sessions_week as $val) {
                            ?>
                            <div class="col-md-4 col-sm-12" style="margin-bottom:30px;">
                                <a class="icon-home" href="<?= base_url() ?>sessions/getsessions_data/<?= $val->sessions_date ?>"> 
                                    <?php
                                    $current_date = $this->uri->segment(3);
                                    if ($current_date == "") {
                                        $current_date = $all_sessions_week[0]->sessions_date;
                                    }
                                    if ($val->sessions_date == $current_date) {
                                        ?>
                                        <div class="col-lg box_home_active text-center">
                                        <?php } else { ?>
                                            <div class="col-lg box-home text-center">
                                            <?php } ?>
                                                <label style="margin-bottom: 20px; margin-top: 20px;   font-size: 30px; font-weight: 700;">Day <?=$day?></label>
<!--                                            <label style="margin-bottom: 20px; margin-top: 20px;   font-size: 30px; font-weight: 700;"><?//= $val->dayname ?></label><br>-->
<!--                                            <label><?//= date('M-d-Y', strtotime($val->sessions_date)); ?></label>-->
                                        </div>
                                </a>
                            </div>
                            <?php
                            $day++;
                        }
                    }
                    ?>

                    <h1 style="color: white;font-size: 55px;font-weight: 600;">Commercial Kickoff Foundations</h1>
                </div> 
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- CONTENT -->
                    <section class="content">
                        <div class="container"">

                            <!-- Blog post-->
                            <div class="post-content post-single"> 

                                <!-- Blog image post-->
                                <?php
                                if (isset($all_sessions) && !empty($all_sessions)) {
                                    foreach ($all_sessions as $val) {
                                        ?>
                                        <div class="post-item" style="background-color: white;padding-right: 25px;padding-left: 25px;">
                                            <div class="post-image col-md-3 m-t-20">
                                                <?php
                                                if($val->sessions_date >= date('Y-m-d'))
                                                { ?>
                                                    <a href="<?=$val->zoom_redirect_url?>" target="_blank"> <?php if ($val->sessions_photo != "") { ?> <img alt="" src="<?= base_url() ?>uploads/sessions/<?= $val->sessions_photo ?>"> <?php } else { ?>  <img alt="" src="<?= base_url() ?>front_assets/images/session_avtar.jpg"> <?php } ?>  </a>
                                                    <?php
                                                }else{ ?>
                                                    <a href="#"> <?php if ($val->sessions_photo != "") { ?> <img alt="" src="<?= base_url() ?>uploads/sessions/<?= $val->sessions_photo ?>"> <?php } else { ?>  <img alt="" src="<?= base_url() ?>front_assets/images/session_avtar.jpg"> <?php } ?>  </a>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                            <div class="post-content-details col-md-9 m-t-30">

                                                <div class="post-title">
                                                    <h6 style="font-weight: 600">
                                                        <span style="color: #b97a43;"><?= $val->sessions_date . ' ' . date("h:i A", (strtotime($val->time_slot) + 60*180))?> - <?=date("h:i A", strtotime($val->end_time) + 60*180) ?> EST</span>
                                                        <?php
                                                        if ($val->us_emea_switch == 1)
                                                        { ?>
                                                            <span style="color: #b97a43;">US/EMEA <?= $val->sessions_date_display_us_emea . ' ' . date("h:i A", strtotime($val->start_time_display_us_emea))?> <?=($val->sessions_type_id == 1)?'':' - ' . date("h:i A", strtotime($val->end_time_display_us_emea)) ?> CT</span>
                                                        <?php
                                                        }


                                                        if ($val->us_emea_switch == 1 && $val->apj_switch == 1)
                                                        { ?>
                                                         /
                                                        <?php
                                                        }


                                                        if ($val->apj_switch == 1)
                                                        { ?>
                                                        <span style="color: #358080;">APJ <?= $val->sessions_date_display_apj . ' ' . date("h:i A", strtotime($val->start_time_display_apj))?> <?=($val->sessions_type_id == 1)?'':' - ' . date("h:i A", strtotime($val->end_time_display_apj)) ?> AEDT</span>
                                                        <?php
                                                        }
                                                        ?>
                                                    </h6>
                                                    <?php
                                                    if($val->sessions_date >= date('Y-m-d') || $val->session_reply == 1)
                                                    { ?>
                                                        <h3><a href="<?=$val->zoom_redirect_url?>" target="_blank" style="color: #f69240; font-weight: 900;"><?= $val->session_title ?></a></h3>
                                                        <?php
                                                    }else{ ?>
                                                        <h3><a href="#" style="color: #f69240; font-weight: 900;"><?= $val->session_title ?></a></h3>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                <?php
                                                if (isset($val->presenter) && !empty($val->presenter)) {
                                                    foreach ($val->presenter as $value) {
                                                        ?>
                                                        <div class="post-info" style="color: #000 !important; font-size: larger; font-weight: 700;"><span class="post-autor"><a href="#" style="color: #000;" data-presenter_photo="<?= $value->presenter_photo ?>" data-presenter_name="<?= $value->presenter_name ?>" data-designation="<?= $value->designation ?>" data-email="<?= $value->email ?>" data-company_name="<?= $value->company_name ?>" data-twitter_link="<?= $value->twitter ?>" data-facebook_link="<?= $value->facebook ?>" data-linkedin_link="<?= $value->linkin ?>" data-bio="<?= $value->bio ?>"  class="presenter_open_modul" style="color: #337ab7;"><?= $value->presenter_name ?><?= ($value->degree != "") ? "," : "" ?> </a></span> <span class="post-category" style="font-size: 13px;font-weight: unset;color: #626262;"> <?= $value->company_name ?></span> </div>
                                                        <!--<div class="post-info" style="color: #000 !important; font-size: larger; font-weight: 700;"><span class="post-category"> <?//= $value->company_name ?></span> </div>-->
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                <div class="post-description">
                                                    <?= $val->sessions_description ?>
                                                </div>

                                                <div class="post-description">
                                                    <a style="color: #0e90d2; " href="<?=base_url()?>prework"><strong style="text-decoration: underline">RESOURCES</strong></a>
                                                </div>
                                             
                                            </div>
                                                <a class="button black-light button-3d rounded right" target="_blank" style="margin: 0px 0;background-color: #f69240;border-color: #f69240;" href="<?=$val->zoom_redirect_url?>"><span>View</span></a>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <!-- END: Blog post--> 
                        </div>
                    </section>
                    <!-- END: SECTION --> 
                </div>
            </div> 
        </div>
    </div>
</section>
<div class="modal fade" id="modal" tabindex="-1" role="modal" aria-labelledby="modal-label" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
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
<script type="text/javascript">
    $(document).ready(function () {
        $('#social_link_div').addClass('hidden');
        $("#social_link_div_show").hover(function () {
            $('#social_link_div').removeClass('hidden');
        }, function () {
            $('#social_link_div').addClass('hidden');
        });
        $(".presenter_open_modul").click(function () {
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
                    },
                    success: function ()
                    {
                        $('#presenter_profile').attr('src', "<?= base_url() ?>uploads/presenter_photo/" + presenter_photo);
                    }
                });
            } else {
                $('#presenter_profile').attr('src', "<?= base_url() ?>uploads/presenter_photo/presenter_avtar.png");
            }
            if (designation != "" && designation != null) {
                $('#presenter_title').text(presenter_name);
            } else {
                $('#presenter_title').text(presenter_name);
            }

            if (email != "" && email != null)
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

            if(bio != "" && bio != null) {
                $('.presenter-bio-field').show();
                $('#bio').text(bio);
            } else {
                $('.presenter-bio-field').hide();
                $('#bio').text("");
            }

            $("#twitter_link").attr("href", twitter_link);
            $("#facebook_link").attr("href", facebook_link);
            $("#linkedin_link").attr("href", linkedin_link);
            $("#bio_text").text(bio);
            $('#modal').modal('show');
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        var page_link = $(location).attr('href');
        var user_id = <?= $this->session->userdata("cid") ?>;
        var page_name = "Sessions";
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
