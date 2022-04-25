<div>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.jqueryui.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.jqueryui.min.css"> 
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Complains List</h4>
                </div>
                <div class="card-body">
                    <div id="btn-place"></div>
                    <div class="table-responsive">
                        <table class="table table-responsive-sm" id="myTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student Number</th>
                                    <th>Student Full Name</th>
                                    <th>Offense</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $incr = 1; ?>
                                @foreach ($data as $item)
                                    <tr>
                                        <th>{{ $incr }}</th>
                                        <td>{{ $item->stud_num }}</td>
                                        <td>{{ $item->stud_name }}</td>
                                        <td>{{ $item->offense_title }}</td>
                                        <td>{{ Carbon\Carbon::parse($item->created_at)->format('F j')}}</td>
                                    </tr>
                                    <?php $incr++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <!-- Large modal -->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">Modal body text goes here.</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('focusAdmin/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('focusAdmin/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('focusAdmin/js/custom.min.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.jqueryui.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.jqueryui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#myTable').DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            });
            
            table.buttons().container()
            .insertBefore( '#myTable_filter' );
        });
        
        
    </script>

</div>

