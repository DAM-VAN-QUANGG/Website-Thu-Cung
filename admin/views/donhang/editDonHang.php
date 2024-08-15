<!-- Navbar -->
<!-- header -->
<?php require './views/layout/header.php'; ?>
<!-- /.navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chỉnh sửa thông tin đơn hàng : <?= $donHang['ma_don_hang']?></h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sửa thông tin đơn hàng</h3>
                        </div>


                        <form action="<?= BASE_URL_ADMIN . '?act=sua-don-hang' ?>" method="POST">
                            <input type="text" name="don_hang_id" value="<?= $donHang['id'] ?>" hidden>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên người nhận </label>
                                    <input type="text" class="form-control" name="ten_nguoi_nhan"
                                        value="<?= $donHang['ten_nguoi_nhan'] ?>" >
                                    <?php if (isset($errors['ten_nguoi_nhan'])) { ?>
                                        <p class="text-danger"><?= $errors['ten_nguoi_nhan'] ?> </p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Số điện thoại </label>
                                    <input type="text" class="form-control" name="sdt_nguoi_nhan"
                                        value="<?= $donHang['sdt_nguoi_nhan'] ?>" >
                                    <?php if (isset($errors['sdt_nguoi_nhan'])) { ?>
                                        <p class="text-danger"><?= $errors['sdt_nguoi_nhan'] ?> </p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Email </label>
                                    <input type="email" class="form-control" name="email_nguoi_nhan"
                                        value="<?= $donHang['email_nguoi_nhan'] ?>" placeholder="Nhập tên danh mục">
                                    <?php if (isset($errors['email_nguoi_nhan'])) { ?>
                                        <p class="text-danger"><?= $errors['email_nguoi_nhan'] ?> </p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Địa chỉ </label>
                                    <input type="text" class="form-control" name="dia_chi_nguoi_nhan"
                                        value="<?= $donHang['dia_chi_nguoi_nhan'] ?>" placeholder="Nhập tên danh mục">
                                    <?php if (isset($errors['dia_chi_nguoi_nhan'])) { ?>
                                        <p class="text-danger"><?= $errors['dia_chi_nguoi_nhan'] ?> </p>
                                    <?php } ?>
                                </div>

                                <div class=" form-group">
                                    <label>Ghi chú</label>
                                    <textarea name="ghi_chu" id="" class="form-control"
                                       ><?= $donHang['ghi_chu'] ?></textarea>
                                    </div>
                                        <hr>

                                        <div class="form-group">
                                    <label for="inputStatus">Trạng thái đơn hàng </label>
                                    <select id="inputStatus" class="form-control custom-select" name="trang_thai_id">
                                    <?php foreach ($listTrangThaiDonHang as $trangThai) : ?>
                                        <option 
                                        <?php
                                      

                                        if ($donHang['trang_thai_id']> $trangThai['id']
                                         || $donHang['trang_thai_id']==9 
                                         || $donHang['trang_thai_id']==10 
                                         || $donHang['trang_thai_id']==11 )
                                         
                                         {
                                            echo'disabled';
                                        }
                                            
                                        
                                        
                                        ?>
                                        <?= $trangThai['id']==$donHang['trang_thai_id'] ? 'selected' : ''?>
                                         value="<?=$trangThai['id']; ?>">
                                        <?= $trangThai['ten_trang_thai']?>
                                         </option>
                                       <?php endforeach?>
                                    </select>
                                 
                                
                                </div>


                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- footer -->
<?php include './views/layout/footer.php'; ?>
<!-- end footer -->


</body>

</html>