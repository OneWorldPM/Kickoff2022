$(function(){
     $('#agendaBtn').on('click', function(){
         $('#agendaModal').modal('show');
     })
    $('#header_agenda').on('click', function(e){
        e.preventDefault();
         $('#agendaModal').modal('show');
     })

    $('#travelBtn').on('click', function(){
        $('#travelModal').modal('show');
    })

    $('#activityBtn').on('click', function(){
        $('#activityModal').modal('show');
    })

    $('#health_safety').on('click', function(){
        $('#health_safety_modal').modal('show');
    })


    get_agenda();
    get_health_and_safety();
})

function get_agenda(){
   $.post(base_url+'/admin/homepage_setting/getModalContents',{},
       function(data){

       // console.log(data[0].agenda);
           $('#agendaText').html(data[0].agenda);
   },'json')
}

function get_health_and_safety(){
    $.post(base_url+'/admin/homepage_setting/getModalContents',{},
        function(data){
            $('#healthandsafetyTextarea').html(data[0].healthandsafety);
        },'json')
}
