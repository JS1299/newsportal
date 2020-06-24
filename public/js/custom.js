$(document).ready(function() {
    getUserList();


    $(document).on('click', '.active_deactive_user', function() {
        const thisRef = $(this);
        thisRef.text('processing');
        $.ajax({
            type: 'GET',
            url: 'active_deactive_user/'+thisRef.attr('id'),
            success:function(response) {
                var response = JSON.parse(response);
                if(response == 'success') {
                    showAlert(200, 'Status Updated Successfully');
                    getUserList();
                } else if(JSON.parse(response) == 'failed') {
                    $('#notifDiv').fadeIn();
                    $('#notifDiv').css('background', 'red');
                    $('#notifDiv').text('Unable to deactivate employee');
                    setTimeout(() => {
                        $('#notifDiv').fadeOut();
                    }, 3000);
                }
            }
        });
    });
});



function getUserList() {
    $.ajax({
        type: 'GET',
        url: 'userFetchList',
        success: function (response) {
            var response = JSON.parse(response);
            $('#get_data').empty();
            $('#get_data').append(`<table class="table table-hover dt-responsive nowrap userList" id="example" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                </thead>
            <tbody>
        </tbody>
    </table>`);

            response.forEach(element => {
                $('.userList tbody').append(`<tr>
                        <td>${element.id}</td>
                        <td>${element.name}</td>
                        <td>${element.email}</td>
                        <td>
                        <button class="btn btn-dark btn-sm active_deactive_user" id="${element.id}">${element.status == 1 ? `UNBLOCK` : `BLOCK`}</button>
                        </td>
                </tr>`);
            });
        }
    })
}


function showAlert(code, message) {
    $('#notifDiv').css('background', (code === 200 ? 'green': 'red'));
    $('#notifDiv').fadeIn();
    $('#notifDiv').text(message);
    setTimeout(() =>{
        $('#notifDiv').fadeOut();
    }, 3000)
}
