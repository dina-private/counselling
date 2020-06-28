<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Manage Organizations</h3>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">

                    <div class="row development_content table-responsive">
                        <table id="organization-table" class="display" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Est. Year</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <tr class="filter-data">
                                <th><input type="text" name="name" data-column="2" class="filter-column"></th>
                                <th>
                                    <select name="est_year" class="filter-column selectpicker" style="width: 100%"
                                            data-live-search="true">
                                        <option value="">All</option>
                                        <?php
                                        $yearRange = range(1950, date('Y'));
                                        foreach ($yearRange as $year) { ?>
                                            <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                        <?php } ?>
                                    </select>

                                </th>
                                <th>
                                    <select name="status" data-column="4" class="filter-column">
                                        <option value="">All</option>
                                        <option value="A">Active</option>
                                        <option value="D">In-Active</option>
                                    </select>
                                </th>
                                <th>
                                    <span class="btn btn-default btn-xs filter-action" data-action="apply"
                                          data-toggle="tooltip" data-placement="top" title="Apply Filter"><i
                                                class="fa fa-search"></i></span>
                                    <span class="btn btn-default btn-xs filter-action" data-action="cancel"
                                          data-toggle="tooltip" data-placement="top" title="Reset Filter"><i
                                                class="fa fa-close"></i></span>
                                </th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Est. Year</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function () {

        var orgTable = $('#organization-table').DataTable({
            "processing": true,
            "serverSide": true,
            "searching": false,
            "ordering": false,
            "ajax": {
                "url": "Organization/ajaxHandler",
                "type": "POST",
                "data": function (d) {
                    d.method = 'getOrganizations';
                    $.extend(d, generateField($('#organization-table')));
                }
            },
            "columns": [
                {"data": "name"},
                {"data": "establishedYear"},
                {"data": "status"},
                {"data": "action"}
            ]
        });
        new $.fn.dataTable.Buttons(orgTable, {
            buttons: [
                {
                    text: 'Create',
                    action: function (e, dt, node, conf) {
                        window.open(baseURL + "Organization/create", '_blank');
                    }
                }
            ]
        });
        orgTable.buttons(0, null).container().prependTo(orgTable.table().container());

        // Array to track the ids of the details displayed rows
        var detailRows = [];

        $('#organization-table tbody').on('click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = orgTable.row(tr);
            var idx = $.inArray(tr.attr('id'), detailRows);

            if (row.child.isShown()) {
                tr.removeClass('details');
                row.child.hide();

                // Remove from the 'open' array
                detailRows.splice(idx, 1);
            } else {
                tr.addClass('details');
                row.child(format(row.data())).show();

                // Add to the 'open' array
                if (idx === -1) {
                    detailRows.push(tr.attr('id'));
                }
            }
        });

        // On each draw, loop over the `detailRows` array and show any child rows
        orgTable.on('draw', function () {
            $.each(detailRows, function (i, id) {
                $('#' + id + ' td.details-control').trigger('click');
            });
        });


        $(document.body).on('click', '.delete-organization', function () {

            var obj = $(this);
            var orgID = obj.attr('data-orgID');
            console.log(orgID);


        });


        $(document.body).on('click', '.active-status', function () {

            var obj = $(this);
            var orgID = obj.attr('data-orgID');
            var status = obj.attr('data-status');
            $.ajax({
                url: baseURL + "Organization/ajaxHandler",
                type: 'POST',
                dataType: 'html',
                data: {
                    orgID: orgID,
                    status: status,
                    method: 'manageStatus'
                },
                beforeSend: function (request) {
                    request.setRequestHeader('Auth', 'EISecret');
                },
                success: function (data) {

                }
            });
            console.log(orgID);

        });

    });
</script>
