<style>
    .radio-item {
        display: inline-block;
        position: relative;
        padding: 0 6px;
        margin: 10px 0 0;
    }

    .radio-item input[type='radio'] {
        display: none;
    }

    .radio-item label {
        color: #666;
        font-weight: normal;
    }

    .radio-item label:before {
        content: " ";
        display: inline-block;
        position: relative;
        top: 5px;
        margin: 0 5px 0 0;
        width: 20px;
        height: 20px;
        border-radius: 11px;
        border: 2px solid #172397;
        background-color: transparent;
    }

    .radio-item-on input[type=radio]:checked + label:after {
        border-radius: 11px;
        width: 12px;
        height: 12px;
        position: absolute;
        top: 9px;
        left: 10px;
        content: " ";
        display: block;
        background: #1d9715;
    }

    .radio-item-off input[type=radio]:checked + label:after {
        border-radius: 11px;
        width: 12px;
        height: 12px;
        position: absolute;
        top: 9px;
        left: 10px;
        content: " ";
        display: block;
        background: #c61a00;
    }
</style>



<div class="main-content" >
    <div class="wrap-content container" id="container">
        <!-- start: PAGE TITLE -->
        <section id="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle">Lobby Video</h1>
                </div>
            </div>
        </section>
        <div class="container-fluid container-fullw bg-white">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="panel panel-light-primary" id="panel5">
                        <div class="panel-heading">
                            <h4 class="panel-title text-white"><i class="fa fa-vimeo-square" aria-hidden="true"></i> Lobby Video (Only Vimeo is supported)</h4>
                        </div>
                        <div class="panel-body bg-white" style="border: 1px solid #b2b7bb !important;">

                            <div class="radio-item radio-item-on">
                                <input type="radio" id="on" name="status" value="1" <?=(isset($video_data->status) && $video_data->status == 1)?'checked':''?>>
                                <label for="on">ON</label>
                            </div>

                            <div class="radio-item radio-item-off">
                                <input type="radio" id="off" name="status" value="0" <?=(isset($video_data->status) && $video_data->status == 0)?'checked':''?>>
                                <label for="off">OFF</label>
                            </div>

                            <div class="form-group" style="margin-top: 20px">
                                <label>
                                    Vimeo video ID
                                </label>
                                <input type="text" placeholder="Vimeo video ID" id="video_id" name="video_id" class="form-control" value="<?=(isset($video_data->vimeo_video_id))?$video_data->vimeo_video_id:''?>">
                                <span class="help-block"><i class="ti-info-alt text-primary"></i> In <span style="color: blue;">https://vimeo.com/504577638</span>  <span style="color: green;">504577638</span> is the video ID</span>
                            </div>
                            

                            <button type="button" class="save-btn btn btn-wide btn-o btn-info pull-right">
                                Save
                            </button>

                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- end: FEATURED BOX LINKS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    $('.save-btn').on('click', function () {
        let video_id = $('#video_id').val();
        let status = $('input[name="status"]:checked').val();

        $.post( "<?=base_url()?>admin/lobby_video/updateDetails",
            {
                video_id: video_id,
                status: status
            }
            ).done(function( data ) {
                if (data == 1){
                    Swal.fire(
                        'Done!',
                        '',
                        'success'
                    );
                }else{
                    Swal.fire(
                        'Error!',
                        '',
                        'error'
                    );
                }
            }).error(()=>{Swal.fire(
            'Error!',
            '',
            'error'
        );});
    });
</script>
