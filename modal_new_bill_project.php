<div class="modal animated fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="new_bill_project.php" method="post" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">เพิ่มมิเตอร์</h4>
                </div>

                <div class="modal-body">

                    <div class="row form-group">
                        <div class="col-sm-offset-1 col-sm-6">
                            <script>
                                // AJAX call for autocomplete 
                                $(document).ready(function () {
                                    $("#search-box").keyup(function () {
                                        $.ajax({
                                            type: "POST",
                                            url: "readProject.php",
                                            data: 'keyword=' + $(this).val(),
                                            beforeSend: function () {
                                                $("#search-box").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
                                            },
                                            success: function (data) {
                                                $("#suggesstion-box").show();
                                                $("#suggesstion-box").html(data);
                                                $("#search-box").css("background", "#FFF");
                                            }
                                        });
                                    });
                                });
                                //To select country name
                                function selectProject(val) {
                                    $("#search-box").val(val);
                                    $("#suggesstion-box").hide();
                                }
                            </script>

                            <label>ชื่อโครงการ<span style="color: red;">*</span></label>

                            <div class="frmSearch">
                                <input class="form-control" type="text" name="project_name" id="search-box" placeholder="ระบุชื่อโครงการ" required />
                                <div id="suggesstion-box"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label>
                                เลือกเดือน<span style="color: red;">*</span></label>
                            <select name="month_no" class="form-control" required>
                                <option value="">เลือกเดือน</option>
                                <option value="1" >มกราคม</option>
                                <option value="2"  >กุมภาพันธ์</option>
                                <option value="3"  >มีนาคม</option>
                                <option value="4"  >เมษายน</option>
                                <option value="5"  >พฤษภาคม</option>
                                <option value="6"  >มิถุนายน</option>
                                <option value="7"  >กรกฎาคม</option>
                                <option value="8"  >สิงหาคม</option>
                                <option value="9"  >กันยายน</option>
                                <option value="10"  >ตุลาคม</option>
                                <option value="11"  >พฤศจิกายน</option>
                                <option value="12"  >ธันวาคม</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>เลือกปี<span style="color: red;">*</span></label>
                                <select class="form-control" name="year" required>
                                    <option value="">เลือกปี</option>
                                    <option value="2559">2559</option>
                                    <option value="2558">2558</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-offset-1 col-sm-10">
                            <div class="row form-group">
                                <div class="col-sm-12" >
                                    <lable>เลขมิเตอร์</lable>
                                    <input type="text" name="meter_no" class="form-control input-sm" placeholder="ระบุเลขมิเตอร์"  />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4">
                                    <lable>ค่าปรับ</lable>
                                    <input type="text" name="fine_pay" class="form-control input-sm" placeholder="ระบุค่าปรับ"  />
                                </div>
                                <div class="col-sm-4">
                                    <lable>ค่าใช้จ่ายเพิ่มเติม</lable>
                                    <input type="text" name="addition_pay" class="form-control input-sm" placeholder="ระบุค่าใช้จ่ายเพิ่มเติม"  />
                                </div>
                                <div class="col-sm-4">
                                    <lable>ค่าบำรุง</lable>
                                    <input type="text" name="maintence_pay" class="form-control input-sm" placeholder="ระบุค่าบำรุง"  />
                                </div>

                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <lable>VAT</lable>
                                    <input type="text" name="vat" class="form-control input-sm" placeholder="ระบุVAT"  />
                                </div>
                                <div class="col-sm-6">
                                    <lable>จำนวนเงิน</lable>
                                    <input type="text" name="amount" class="form-control input-sm" placeholder="ระบุจำนวนเงิน"  />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <lable>PR_NO</lable>
                                    <input type="text" name="pr_no" class="form-control input-sm" placeholder="ระบุPR_NO"  />
                                </div>
                                <div class="col-sm-6">
                                    <lable>เอกสาร</lable>
                                    <input type="text" name="document" class="form-control input-sm" placeholder="ระบุเอกสาร"  />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <lable>งวดการจ่าย</lable>
                                    <input type="text" name="period" class="form-control input-sm" placeholder="ระบุงวดการจ่าย" />
                                </div>
                                <div class="col-sm-6">
                                    <lable>หมายเหตุ</lable>
                                    <input type="text" name="remark" class="form-control input-sm" placeholder="ระบุหมายเหตุ"  />
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="month_no" value="<?php echo $month_condition; ?>" />
                    <input type="hidden" name="year" value="<?php echo $year; ?>" />
                    <input type="submit" class="btn btn-success" name="submit" value="เพิ่ม" />
                    <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">ปิด</button>
                </div>
            </form>
        </div>
    </div>
</div>