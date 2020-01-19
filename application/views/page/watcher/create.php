<style type="text/css">
    .form-control{
        max-width: 500px;
    }
</style>
<div class="crud-form">
    <div class="box  gc-container">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah SPPD</h3>
                    </div>

                    <form action="" method="post" id="crudForm" enctype="multipart/form-data" accept-charset="utf-8">
                        <div id="report-error" class="report-div error"></div>
                        <div id="report-success" class="report-div success"></div>

                        <table class="table table-striped">
                            <tbody>
                                <tr id="unusrmsusr_field_box">
                                    <th>Start - Finish</th>
                                    <td>
                                        <input type="text" class="form-control" id="reservationtime">
                                    </td>
                                </tr>
                                <tr id="unusrmsusr_field_box">
                                    <th>Name</th>
                                    <td>
                                        <input id="search_worker" name="worker" type="text" class="form-control" placeholder="Search" onchange=/>
                                    </td>
                                </tr>
                                <tr id="unusrmsusr_field_box">
                                    <th>Vendor</th>
                                    <td>
                                        <input id="search_vendor" name="vendor" type="text" class="form-control" placeholder="Search" />
                                    </td>
                                </tr>
                                <tr id="unusrmsusr_field_box">
                                    <th>Function</th>
                                    <td>
                                        <input id="search_function" name="function" type="text" class="form-control" placeholder="Search" />
                                    </td>
                                </tr>
                                <tr id="unusrmsusr_field_box">
                                    <th>Reason</th>
                                    <td>
                                        <input class="form-control" name="reason" type="text" value="" maxlength="45">
                                    </td>
                                </tr>
                                <tr id="unusrmsusr_field_box">
                                    <th>Tarif</th>
                                    <td>
                                        <input class="form-control" name="tarif" type="text" value="" maxlength="45">
                                    </td>
                                </tr>
                                <tr id="unusrmsusr_field_box">
                                    <th>Amount</th>
                                    <td>
                                        <input class="form-control" name="amount" type="text" value="" maxlength="45">
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Start of hidden inputs -->
                                <!-- End of hidden inputs -->
                        
                        <div class="box-footer">
                            <input id="form-button-save" type="submit" value="Save" class="btn btn-success">
                                            <input type="button" value="Save and go back to list" class="btn btn-success" id="save-and-go-back-button">
                                <input type="button" value="Cancel" class="btn btn-warning" id="cancel-button">
                                        <div class="small-loading" id="FormLoading">Loading, updating changes...</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>