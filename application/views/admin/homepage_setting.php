<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<?//=print_r($agenda);exit;?>
<div class="main-content" >
    <div class="wrap-content container" id="container">
        <!-- start: PAGE TITLE -->
        <div class="container-fluid container-fullw bg-white">
            <div class="row">
                <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div class="box-register">
                        <form action=""  method="post">
                            <fieldset>
                                <h3 class="box-title">Update Homepage</h3>
                                <button class="btn btn-success" id="agendaBtn">Agenda</button>
                            </fieldset>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end: FEATURED BOX LINKS -->

<!-- Modal -->
<div class="modal fade" id="agendaSetting" tabindex="-1" aria-labelledby="agendaSettingLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agendaSettingLabel">Agenda Setting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <textarea id="agendaText"><?=(isset($agenda) && !empty ($agenda))?$agenda:''?></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="saveAgenda">Save changes</button>
            </div>
        </div>
    </div>
</div>

<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script>
    $(function(){
        $('#agendaText').summernote({
            placeholder: 'Hello stand alone ui',
            height: 400,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

        $('#agendaBtn').on('click', function(e){
            e.preventDefault();
            $('#agendaSetting').modal('show');
        })

        $('#saveAgenda').on('click', function(){
            var agendaText = $('#agendaText').val();
            // console.log(agendaText);
            $.post('<?=base_url()?>/admin/homepage_setting/saveAgenda/',
                {
                    'agendaText': agendaText
                }, function(success){
                if(success){
                    $('#agendaSetting').modal('hide');
                    Swal.fire(
                        'Success',
                        'Agenda Updated',
                        'success'
                    )
                }else{
                    $('#agendaSetting').modal('hide');
                }
            })
        })


    })


</script>