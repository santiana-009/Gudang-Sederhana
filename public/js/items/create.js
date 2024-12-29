$(document).ready(function(){
    $("#selectType").select2({
        placeholder: 'Select Type',
        ajax: {
            url: "/selectType", // Update the URL to match your route
            processResults: function(data){
                return {
                    results: data.results // Assuming your JSON response has a 'results' key
                };
            }
        }
    });
});
