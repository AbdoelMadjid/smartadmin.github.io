<div class="flash-data" data-flashdata="<?= $this->session->flashdata('myflash'); ?>"></div>

<div class="mb-3">
    <!-- <button class="btn btn-primary"><i class="fas fa-user-plus pr-2"></i>Add User</button> -->
    <a href="<?= base_url(); ?>AddUser/registration" class="btn btn-primary add_new_user"><i class="fas fa-user-plus"> ADD USER</i></a>
</div>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">List Users</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nik</th>
                            <th>NickName</th>
                            <th>FullName</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php foreach ($userlist as $myUserList) : ?>
                        <tbody>
                            <tr>
                                <td>
                                    <?= $myUserList['id']; ?>

                                </td>
                                <td>
                                    <?= $myUserList['nik']; ?>
                                </td>
                                <td>
                                    <?= $myUserList['nickname']; ?>
                                </td>
                                <td>
                                    <?= $myUserList['fullname']; ?>
                                </td>
                                <td>
                                    <?= $myUserList['role']; ?>
                                </td>
                                <td>
                                    <!-- <button class="btn btn-danger btn-sm">Delete</button> -->
                                    <a href="<?= base_url(); ?>AddUser/Delete/<?= $myUserList['id']; ?>" class="btn btn-danger btn-sm del_user"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>

                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>