@extends('layouts.admin.main')

@section('title', 'Surveys')

@section('content')
    <main class="content" style="width: 100vw">
        <div class="">
          
            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-3">Surveys</h1>
                   
                </div>
                <div class="col-4 text-end">
                    <a href="{{ route('admin.survey.create') }}" class="btn btn-outline-primary">Add Survey</a>
                    @if (Auth::user()->type == 'Admin')
                    <a onclick="exportTableToExcel('svtbl','srveydata')" class="btn btn-outline-primary">Export data</a>
                    @endif
                </div>
            </div>
           
              
            {{-- <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body"> --}}
                            @include('partials.alerts')
                            @if (count($surveys) > 0)
                                <table class="table table-bordered m-0" id="svtbl">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Customer</th>
                                            <th>Brand</th>
                                            <th>Model</th>
                                            <th>Sell Through</th>
                                            <th>Sell Out</th>
                                            <th>Stock</th>
                                            <th>Signboard</th>
                                            <th>Showcase</th>
                                            <th>Ldu_table</th>
                                            <th>Cabinet</th>
                                            <th>Ldu_qty</th>
                                            <th>Foc_soh</th>
                                            <th>Date_till</th>
                                            <th>Date_from</th>
                                            <th>Feedback</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($surveys as $survey)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $survey->customer->store_name }}</td>
                                                <td>{{ $survey->brand->name }}</td>
                                                <td>{{ $survey->device_model->name }}</td>
                                                <td>{{ $survey->sell_through }}</td>
                                                <td>{{ $survey->sell_out }}</td>
                                                <td>{{ $survey->signboard }}</td>
                                                <td>{{ $survey->showcase }}</td>
                                                <td>{{ $survey->promoter }}</td>
                                                <td>{{ $survey->cabinet }}</td>
                                                <td>{{ $survey->promotion_stand }}</td>
                                                <td>{{ $survey->ldu_qty }}</td>
                                                <td>{{ $survey->foc_soh }}</td>
                                                <td>{{ $survey->date_from }}</td>
                                                <td>{{ $survey->date_till }}</td>
                                               
                                                <td>{{ $survey->feedback }}</td>
                                                <td>
                                                    <a href="{{ route('admin.survey.edit', $survey) }}"
                                                        class="btn btn-primary">
                                                        <i class="align-middle" data-feather="edit"></i>
                                                    </a>
                                                    <a href="{{ route('admin.survey.destroy', $survey) }}"
                                                        class="btn btn-danger">
                                                        <i class="align-middle" data-feather="trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-info m-0">No record found!</div>
                            @endif
                        {{-- </div>
                    </div>
                </div>
            </div> --}}

        </div>
    </main>
    <script>
        function exportTableToExcel(tableID, filename = ''){
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
        
        // Specify file name
        filename = filename?filename+'.xls':'excel_data.xls';
        
        // Create download link element
        downloadLink = document.createElement("a");
        
        document.body.appendChild(downloadLink);
        
        if(navigator.msSaveOrOpenBlob){
            var blob = new Blob(['\ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob( blob, filename);
        }else{
            // Create a link to the file
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
        
            // Setting the file name
            downloadLink.download = filename;
            
            //triggering the function
            downloadLink.click();
        }
    }
    </script>

@endsection
