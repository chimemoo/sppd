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

                    <form method="post" id="crudForm" action="<?php echo base_url('Watcher/Manage_sppd/create_sppd_process'); ?>" enctype="multipart/form-data" accept-charset="utf-8">
                        <div id="report-error" class="report-div error"></div>
                        <div id="report-success" class="report-div success"></div>

                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>Date Start</th>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="dsspdmsspd">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Date Finish</th>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="dfspdmsspd">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>
                                        <input class="form-control" name="wkspdmsspd" id="cari-worker" placeholder="Cari nama">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Vendor</th>
                                    <td>
                                        <input id="search_vendor" name="vdspdmsspd" type="text" class="form-control" placeholder="Search" />
                                    </td>
                                </tr>
                                <tr>
                                    <th>Function</th>
                                    <td>
                                        <input id="search_function" name="fcspdmsspd" type="text" class="form-control" placeholder="Search" />
                                    </td>
                                </tr>
                                <tr id="unusrmsusr_field_box">
                                    <th>Reason</th>
                                    <td>
                                        <input class="form-control" name="rsspdmsspd" type="text" value="" maxlength="45">
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Start of hidden inputs -->
                                <!-- End of hidden inputs -->
                        
                        <div class="box-footer">
                            <input type="submit" value="Save" class="btn btn-success">
                            <a class="btn btn-warning" id="cancel-button" href="<?php echo base_url('watcher/manage_sppd/list_sppd'); ?>">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>