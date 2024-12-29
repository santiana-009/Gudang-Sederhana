$('#keyInput').on('input', function() {
    // Ambil nilai key dari input
    var key = $(this).val();
    
    $.ajax({
        type: 'GET',
        url: '/data/' + key, // Gunakan URL dengan parameter
        success: function (data) {
            // Manipulasi atau tampilkan data di sini
            $('#result').html(JSON.stringify(data));
        },
        error: function (error) {
            console.log(error);
        }
    });
});