$(document).ready(function(){

    // Check for the various File API support.
    if (window.File && window.FileReader && window.FileList && window.Blob) {
        // Great success! All the File APIs are supported.
    } else {
        $('#file-import-error').removeClass('hidden');
    }

    $('#raw-data').on('input propertychange', function() {
        var data = $('#raw-data').val()
        if (data.length > 0) {
            $('#btn-generate-output').prop('disabled', false);
        }
        else {
            $('#btn-generate-output').prop('disabled', true);
        }
    });

    document.querySelector("#btn-copy-output").onclick = function(){
        document.querySelector("#output").select();
        document.execCommand('copy');
    }

    $('#file-upload').on('change', function() {
        var file = $('#file-upload').val();

        if (file && file.length > 0) {
            $('#btn-import').attr('disabled', false);
        }
        else {
            $('#btn-import').attr('disabled', true);
        }
    });

    $('#btn-import').on('click', function () {     
        if (!window.File || !window.FileReader || !window.FileList || !window.Blob) {
            $('#file-import-error').removeClass('hidden');
        }
        else {
            var input = document.getElementById('file-upload');
            if (!input) {
                alert("Um, couldn't find the fileinput element.");
            }
            else if (!input.files) {
                alert("This browser doesn't seem to support the `files` property of file inputs.");
            }
            else if (!input.files[0]) {
                alert("Please select a file before clicking 'Load'");               
            }
            else {
                var file = input.files[0];
                var fr = new FileReader();
                fr.onload = function (e) {
                    var data = e.target;
                    data = JSON.parse(data.result);
                    $('#raw-data').val(JSON.stringify(data, undefined, 4));
                }
                fr.readAsText(file);
                $('#btn-generate-output').prop('disabled', false);
            }
        }
    });


    $('#btn-generate-output').on('click', function(){
        button_clicked('#btn-generate-output', function(){
            $('#modal-loading').modal('show');
            var data = {
                features: JSON.parse($('#raw-data').val())
            }
            
            $.ajax({
                url: BASE_URL + '/api/generate_stops',
                async: true,
                type: 'POST',
                dataType: 'json',
                data: data.features,
                success: function(response) {
                    var data = JSON.stringify(response.data.original);
                    $('#output').val(data);
                    $('#modal-loading').modal('hide');
                }
            });
        });
    });

    function button_clicked(button_id, callback) {
        $(button_id).attr('disabled', true);
        callback();
        $(button_id).attr('disabled', false);
    }

    
    
});
