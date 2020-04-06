<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Custom GTFS</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app_stylesheet.css') }}">

        <!-- Javascripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        
        <script>
            var BASE_URL = "{{ url('') }}";
        </script>
    </head>
    <body>
        <div id="modal-loading" data-backdrop="static" data-keyboard="false" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Generating Output...</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-3">
            <div class="form-group pr-3">
                <div class="col-sm-3">
                    <label for="file-upload">Import File</label>
                    <input type="file" class="form-control-file" id="file-upload" accept=".geojson">
                    <span>Accepts .geojson files only</span>
                    <br>
                    <span id="file-import-error" class="hidden msg-warning">File Import is not fully supported in this browser.</span>
                </div>
                <div class="col-sm-3 mt-3">
                    <input type="button" id="btn-import" class="btn btn-success" value="Import" disabled>
                    <input type="button" id="btn-generate-output" class="btn btn-secondary" value="Generate Output" disabled>
                </div>
            </div>
            <div class="row pl-3 pr-3 pt-2">
                <div class="form-group col-sm-6">
                    <label for="raw-data">Raw Data</label>
                    <textarea class="form-control" id="raw-data" rows="30"></textarea>
                </div>
                <div class="form-group col-sm-6">
                    <label for="output">Output</label>
                    <input type="button" id="btn-copy-output" value="Copy" class="btn btn-primary float-md-right btn-sm">
                    <textarea class="form-control" id="output" rows="30" disabled></textarea>
                </div>
            </div>
        </div>
    </body>
</html>
