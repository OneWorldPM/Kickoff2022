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
})
