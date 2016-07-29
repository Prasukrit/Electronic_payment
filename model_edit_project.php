
<div class="modal animated fade " id="editProject<?php echo $project_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="edit_project.php" method="post" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">แก้ไขโครงการ</h4>
                </div>

                <div class="modal-body">

                    <div class="row form-group">
                        <div class="col-sm-offset-1 col-sm-2" >
                            <lable>RO</lable>
                            <input class="form-control" type="text" name="ro"  placeholder="ระบุ RO" value="10" readonly  />
                        </div>
                        <div class="col-sm-2" >
                            <lable>M</lable>
                            <input class="form-control" type="text" name="m"  placeholder="ระบุ M" value="<?php echo $m ; ?>"  />
                        </div>
                        <div class="col-sm-2" >
                            <lable>Phase</lable>
                            <input type="text" name="phase" class="form-control" placeholder="ระบุ Phase" value="<?php echo $phase ; ?>" />
                        </div>
                        <div class="col-sm-2" >
                            <lable>Lot</lable>
                            <input type="text" name="lot" class="form-control" placeholder="ระบุ Lot" value="<?php echo $lot ; ?>" />
                        </div>
                        <div class="col-sm-2" >
                            <lable>Location code</lable>
                            <input type="text" name="location_code" class="form-control" placeholder="ระบุ Location code" value="<?php echo $location_code ; ?>" />
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-offset-1 col-sm-10">
                            <div class="row form-group">
                                <div class="col-sm-4">
                                    <label>รหัสโครงการ</label>
                                    <div class="">
                                        <input class="form-control" type="text" name="project_id" placeholder="ระบุรหัสโครงการ"  value="<?php echo $project_id ; ?>" readonly />
                                    </div>
                                </div>
                                <div class=" col-sm-8">
                                    <label>ชื่อโครงการ</label>
                                    <div class="">
                                        <input class="form-control" type="text" name="project_name"  placeholder="ระบุชื่อโครงการ" value="<?php echo $project_name ; ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                
                                <div class="col-sm-6">
                                    <lable>ที่อยู่</lable>
                                    <textarea name="address" class="form-control" rows="3" placeholder="ระบุที่อยู่"><?php echo $address; ?></textarea>
                                </div>
                                <div class="col-sm-6">
                                    <lable>เขต</lable>
                                    <input type="text" name="location_district" class="form-control " placeholder="ระบุเขต" value="<?php echo $location_district ; ?>" />
                                </div>

                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <lable>ผู้ติดต่อ</lable>
                                    <input type="text" name="contact" class="form-control" placeholder="ระบุผู้ติดต่อ" value="<?php echo $contact ; ?>" />
                                </div>
                                <div class="col-sm-6">
                                    <lable>เบอร์โทรศัพท์</lable>
                                    <input type="text" name="tel" class="form-control" placeholder="ระบุเบอร์โทร" value="<?php echo $tel ; ?>" />
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="location_district" value="<?php echo $get_location_district; ?>" />
                    <input type="submit" class="btn btn-success" name="submit" value="เพิ่ม" />
                    <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">ปิด</button>
                </div>
            </form>
        </div>
    </div>
</div>