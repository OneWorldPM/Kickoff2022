<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

<style>
    #bg {
        position: fixed;
        top: 0;
        left: 0;

        /* Preserve aspet ratio */
        min-width: 100%;
        min-height: 100%;
    }
</style>

<div id="bg" alt="" style="background-image: url(<?=base_url()?>front_assets/agility/Agility_main_page_backdrop.png);"></div>

<div class="row m-t-40">
    <div class="col-md-12 text-center">
        <span style="color: white;font-size: 40px;font-weight: 600;">Morning Wellness</span>
    </div>
</div>

<div class="row m-t-40">

    <div class="col-md-4 col-sm-12 col-xs-12">
        <div id="thumbnail1" class="video-thumbnail" style="cursor: pointer" video-url="https://vimeo.com/514752822">
            <img src="<?=base_url()?>front_assets/agility/morning_wellness/play_button.png" style="position: absolute;margin-top: 15%;margin-left: 40%;width: 100px;">
            <img src="<?=base_url()?>front_assets/agility/morning_wellness/5_Minute_Breathing_Exercise.JPG" width="100%">
        </div>
    </div>

    <div class="col-md-4 col-sm-12 col-xs-12">
        <div id="thumbnail1" class="video-thumbnail" style="cursor: pointer" video-url="https://vimeo.com/514753297">
            <img src="<?=base_url()?>front_assets/agility/morning_wellness/play_button.png" style="position: absolute;margin-top: 15%;margin-left: 40%;width: 100px;">
            <img src="<?=base_url()?>front_assets/agility/morning_wellness/8_Minute_Meditation.JPG" width="100%">
        </div>
    </div>

    <div class="col-md-4 col-sm-12 col-xs-12">
        <div id="thumbnail1" class="video-thumbnail" style="cursor: pointer" video-url="https://vimeo.com/514752976">
            <img src="<?=base_url()?>front_assets/agility/morning_wellness/play_button.png" style="position: absolute;margin-top: 15%;margin-left: 40%;width: 100px;">
            <img src="<?=base_url()?>front_assets/agility/morning_wellness/10_minute_Chari_Yoga.JPG" width="100%">
        </div>
    </div>

</div>

<style>
    .modal-dialog {
        width: 100%;
        height: 98%;
        margin: 0;
        padding: 0;
    }

    .modal-content {
        height: 98%;
        min-height: 98%;
        border-radius: 0;
    }
    .modal-body{
        height: 100%;
    }

    iframe{
        width: 100% !important;
        height: 100% !important;
    }
</style>

<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #ffffff8f;">
            <div class="modal-header" style="padding: unset;">
                <button type="button" class="btn btn-sm btn-danger pull-right" data-dismiss="modal"><i class="far fa-times-circle"></i> CLOSE</button>
            </div>
            <div id="videoPlayer" class="modal-body">
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://player.vimeo.com/api/player.js"></script>
<script>
    $(document).ready(function () {

        $('.action-btn').on('click', function () {
            Swal.fire({
                title: '',
                text: 'Click here to recommit to safety as a priority in 2021',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'I commit'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.open("https://f.hubspotusercontent20.net/hubfs/4149976/Innovation%20Scavenger%20Hunt.pdf", "_blank");
                }
            })
        });


        $('.video-thumbnail').on('click', function () {

            var videoUrl = $(this).attr('video-url');

            var options = {
                url: videoUrl,
                autoplay: true
            };

            var videoPlayer = new Vimeo.Player('videoPlayer', options);

            videoPlayer.setVolume(1);


            videoPlayer.play().then(function() {
                // The video is playing
            }).catch(function(error) {
                switch (error.name) {
                    case 'PasswordError':
                        // The video is password-protected
                        break;

                    case 'PrivacyError':
                        // The video is private
                        break;

                    default:
                        // Some other error occurred
                        break;
                }
            });

            videoPlayer.on('play', function() {
                console.log('Played the first video');
            });


            $('#videoModal').on('hidden.bs.modal', function () {
                videoPlayer.pause().then(function() {
                    // The video is paused
                }).catch(function(error) {
                    switch (error.name) {
                        case 'PasswordError':
                            // The video is password-protected
                            break;

                        case 'PrivacyError':
                            // The video is private
                            break;

                        default:
                            // Some other error occurred
                            break;
                    }
                });

                videoPlayer.unload().then(function() {
                    // The video has been unloaded
                });

                videoPlayer.destroy().then(function() {
                    // The player is destroyed
                });
            });


            $('#videoModal').modal('show');


            });


        });
</script>

