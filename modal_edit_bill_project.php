<div class="modal animated fade " id="myModal<?php echo $project_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <form action="edit_bill_project.php" method="post" >
            
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel" style="color: #FFFFFF;"><?php echo $project_id . " - " . $project_name; ?></h4>
                </div>
                <div class="modal-body">
                    <div class="row ">
                        <h4 class="text-center " style="color: green;"  >รายงานค่าไฟประจำ เดือน <?php echo $month; ?> ปี <?php echo $year; ?></h4>
                        <hr>
                    </div>
                    <div class="row" >
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label>ID</label>
                                <input type="text" class="form-control input-sm" name="bill_no" id="bill_no" readonly  value="<?php echo $bill_no; ?>" > 
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label>เลขมิเตอร์</label>
                                <input type="text" class="form-control input-sm" name="meter_no"   id="meter_no" value="<?php echo $meter_no; ?>" >
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label>เลขมิเตอร์เดือนก่อน</label>
                                <input type="text" class="form-control input-sm" name="previous_meter_no" id="previous_meter_no"  value="<?php echo $previous_meter_no; ?>" >
                            </div>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label>ค่าปรับ</label>
                                <input type="text" class="form-control input-sm" name="fine_pay" id="fine_pay"  value="<?php echo $fine_pay; ?>" >
                            </div>
                        </div>

                        <div class="col-xs-4">  
                            <div class="form-group">
                                <label>ค่าใช้จ่ายเพิ่มเติม</label>
                                <input type="text" class="form-control input-sm" name="addition_pay" id="addition_pay"  value="<?php echo $addition_pay; ?>" >   
                            </div>
                        </div>
                        <div class="col-xs-4">  
                            <div class="form-group">
                                <label>ค่าบำรุงรักษา</label>
                                <input type="text" class="form-control input-sm" name="maintence_pay" id="maintence_pay"  value="<?php echo $maintence_pay; ?>" >   
                            </div>
                        </div>
                    </div>
                    <div class="row" >

                        <div class="col-xs-4">  
                            <div class="form-group">
                                <label>VAT</label>
                                <input type="text" class="form-control input-sm" name="vat" id="vat"  value="<?php echo $vat; ?>">   
                            </div>
                        </div>
                        <div class="col-xs-4">  
                            <div class="form-group">
                                <label>จำนวนเงิน</label>
                                <input type="text" class="form-control input-sm" name="amount" id="amount"  value="<?php echo $amount; ?>">   
                            </div>
                        </div>

                        <div class="col-xs-4">  
                            <div class="form-group">
                                <label>งวดการจ่าย</label>
                                <input type="text" class="form-control input-sm" name="period" id="period"   value="<?php echo $period; ?>">   
                            </div>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-xs-4">  
                            <div class="form-group">
                                <label>PR NO.</label>
                                <input type="text" class="form-control input-sm" name="pr_no" id="pr_no"   value="<?php echo $pr_no; ?>">   
                            </div>
                        </div>
                        <div class="col-xs-4">  
                            <div class="form-group">
                                <label>เอกสาร</label>
                                <input type="text" class="form-control input-sm" name="document" id="document"   value="<?php echo $document; ?>">   
                            </div>
                        </div>
                        <div class="col-xs-4">  
                            <div class="form-group">
                                <label>หมายเหตุ</label>
                                <input type="text" class="form-control input-sm" name="remark" id="remark"  value="<?php echo $remark; ?>">   
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="month_no" value="<?php echo $month_no; ?>" />
                    <input type="hidden" name="year" value="<?php echo $year; ?>" />
                    <input type="submit" class="btn btn-success" value="อัพเดท" >
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                </div>

            </div>
        </form>
    </div>
</div>