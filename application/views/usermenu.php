<!-- <?php var_dump($mylist); ?> -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('myflash'); ?>"></div>
<?php if ($this->session->flashdata('myflash')) : ?>
  <!-- <div class="row mt-3">
          <div class="col md-6">           
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Upload file!</strong> <?= $this->session->flashdata('myflash'); ?>.
                  Check to your local PC
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
          </div>
        </div>                       -->
<?php endif; ?>

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Add New Video</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->

  <?php
  $attributes = array('id' => 'FrmUploadFile', 'method' => 'post');
  echo form_open_multipart('UserMenu/save', $attributes);
  ?>
  <!-- <form method="post" action="<?= base_url() ?>UserMenu/save" enctype="multipart/form-data"> -->
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

          <!-- <a href="<?= base_url(); ?>UserMenu/Delete/<?= $videoList['id']; ?>" class="btn btn-danger mt-2 del_btn" onclick="return confirm('yakin');"><i class="fa fa-trash"> Delete</i></a> -->
          <a href="<?= base_url(); ?>UserMenu/Delete/<?= $videoList['id']; ?>" class="btn btn-danger mt-2 del_btn"><i class="fa fa-trash"> Delete</i></a>

        </div>
      <?php endforeach; ?>
      <!--<div class="col-sm-4">
        <div class="position-relative p-3 bg-gray" style="height: 180px">
          <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-info">
              Ribbon Large
            </div>
          </div>
          Ribbon Large <br>
          <small>.ribbon-wrapper.ribbon-lg .ribbon</small>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="position-relative p-3 bg-gray" style="height: 180px">
          <div class="ribbon-wrapper ribbon-xl">
            <div class="ribbon bg-secondary">
              Ribbon Extra Large
            </div>
          </div>
          Ribbon Extra Large <br>
          <small>.ribbon-wrapper.ribbon-xl .ribbon</small>
        </div>
      </div>
    </div>
     <div class="row mt-4">
      <div class="col-sm-4">
        <div class="position-relative p-3 bg-gray" style="height: 180px">
          <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-success text-lg">
              Ribbon
            </div>
          </div>
          Ribbon Large <br> with Large Text <br>
          <small>.ribbon-wrapper.ribbon-lg .ribbon.text-lg</small>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="position-relative p-3 bg-gray" style="height: 180px">
          <div class="ribbon-wrapper ribbon-xl">
            <div class="ribbon bg-warning text-lg">
              Ribbon
            </div>
          </div>
          Ribbon Extra Large <br> with Large Text <br>
          <small>.ribbon-wrapper.ribbon-xl .ribbon.text-lg</small>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="position-relative p-3 bg-gray" style="height: 180px">
          <div class="ribbon-wrapper ribbon-xl">
            <div class="ribbon bg-danger text-xl">
              Ribbon
            </div>
          </div>
          Ribbon Extra Large <br> with Extra Large Text <br>
          <small>.ribbon-wrapper.ribbon-xl .ribbon.text-xl</small>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-sm-4">
        <div class="position-relative">
          <img src="../../dist/img/photo1.png" alt="Photo 1" class="img-fluid">
          <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-success text-lg">
              Ribbon
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="position-relative">
          <img src="../../dist/img/photo2.png" alt="Photo 2" class="img-fluid">
          <div class="ribbon-wrapper ribbon-xl">
            <div class="ribbon bg-warning text-lg">
              Ribbon
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="position-relative" style="min-height: 180px;">
          <img src="../../dist/img/photo3.jpg" alt="Photo 3" class="img-fluid">
          <div class="ribbon-wrapper ribbon-xl">
            <div class="ribbon bg-danger text-xl">
              Ribbon
            </div>
          </div>
        </div>
      </div>
    </div> -->
    </div>
    <!-- /.card-body -->
  </div>