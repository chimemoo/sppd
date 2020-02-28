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
                        <h3 class="box-title">Approve SPPD</h3>
                    </div>

                    <form method="post" id="crudForm" action="<?php echo base_url('leader/manage_sppd/approve_process/').$idSppd; ?>" enctype="multipart/form-data" accept-charset="utf-8">
                        <div id="report-error" class="report-div error"></div>
                        <div id="report-success" class="report-div success"></div>

                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>Date Start</th>
                                    <td>
                                        <?php echo $sppd_detail[0]['dsspdmsspd']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Date Finish</th>
                                    <td>
                                        <?php echo $sppd_detail[0]['dfspdmsspd']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Worker Name</th>
                                    <td>
                                        <?php echo $sppd_detail[0]['wkspdmsspd']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Vendor</th>
                                    <td>
                                        <?php echo $sppd_detail[0]['vdspdmsspd']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Reason</th>
                                    <td>
                                        <?php echo $sppd_detail[0]['rsspdmsspd']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Function</th>
                                    <td>
                                        <?php echo $sppd_detail[0]['fcspdmsspd']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Proposed Time</th>
                                    <td>
                                        <?php echo $sppd_detail[0]['ptspdmsspd']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <?php echo $sppd_detail[0]['stspdmsspd']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Watcher</th>
                                    <td>
                                        <?php echo $sppd_detail[0]['wcspdmsspd']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tarif</th>
                                    <td>
                                        <select name="tfspdmssdp" class="form-control">
                                            <?php
                                                foreach ($tarif as $tf){
                                            ?>
                                                <option <?php if($sppd_detail[0]['tfspdmsspd'] == $tf['idtrfmstrf']){ echo 'selected'; }?> value="<?php echo $tf['idtrfmstrf'] ?>"><?php echo $tf['jktrfmstrf'].' Km - '.$tf['sttrfmstrf'].'-'.$tf['dttrfmstrf'].'(Rp.'.$tf['tftrfmstrf'].')'; ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <th>Amount</th>
                                    <td>
                                        <input type="text" name="amspdmsspd" class="form-control" value="<?php echo $sppd_detail[0]['amspdmsspd']; ?>">
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Start of hidden inputs -->
                                <!-- End of hidden inputs -->
                        
                        <div class="box-footer">
                            <input type="submit" value="Approve" name="approve" class="btn btn-success">
                            <input type="submit" value="Decline" name="approve" class="btn btn-danger">
                            <a class="btn btn-warning" id="cancel-button" href="<?php echo base_url('leader/manage_sppd/manage_sppd'); ?>">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>