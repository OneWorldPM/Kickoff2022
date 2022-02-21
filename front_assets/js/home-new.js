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
})

function get_agenda(){
   $.post(base_url+'/admin/homepage_setting/getAgenda',{},
       function(data){

       // console.log(data[0].agenda);
           $('#agendaText').html(data[0].agenda);
   },'json')
}
