<div class="flash-data" data-flashdata="<?= $this->session->flashdata('myflash'); ?>"></div>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add New Video</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

    <?php
    $attributes = array('id' => 'FrmUploadFile', 'method' => 'post');
    echo form_open_multipart('AdminMenu/save', $attributes);
    ?>
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="fileInput" name="fileInput" accept=".mp4, .mpeg4, .webm, .ogg">
                    <label class="custom-file-label" for="fileInput">Choose file</label>
                </div>
                <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary" value="upload">Submit</button>
    </div>
    <!-- </form> -->
</div>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">All Videos</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <?php foreach ($mylist as $videoList) : ?>

                <div class="col-sm-4">
                    <div class="position-contain  bg-gray" style="height: 180px">
                        <div class="ml-3 mb-2 mr-1"> <?= $videoList['title']; ?> </div>

                        <video id="video1" height="150px" width="340" controls>
                            <source src="<?= base_url(str_replace('D:/myAdmin/', '', $videoList['path'])); ?>" type="video/mp4">
                        </video>
                    </div>
                    <a href="<?= base_url(); ?>AdminMenu/Delete/<?= $videoList['id']; ?>" class="btn btn-danger mt-2 del_btn"><i class="fa fa-trash"> Delete</i></a>

                </div>
            <?php endforeach; ?>
        </div>