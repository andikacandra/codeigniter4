$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: base_url + "/Home/getPegawai/",
        dataType: "json",
        success: function (data) {
            $('#body-pegawai').html(data);
        }
    });
});