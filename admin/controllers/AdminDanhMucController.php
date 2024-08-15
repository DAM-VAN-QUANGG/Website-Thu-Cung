<?php
class AdminDanhMucController
{
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelDanhMuc = new AdminDanhMuc();
    }
    public function danhSachDanhMuc()
    {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/danhmuc/listDanhMuc.php';
    }
    public function formAddDanhMuc()
    {
        //Dùng để hiển thị danh mục
        require_once './views/danhmuc/addDanhMuc.php';
    }


    public function postAddDanhMuc()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tenDanhMuc = $_POST['ten_danh_muc'];
            $moTa = $_POST['mo_ta'];
            $errors = [];
            if (empty($tenDanhMuc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }
            if (empty($errors)) {
                // var_dump('oke');
                $this->modelDanhMuc->insertDanhMuc($tenDanhMuc, $moTa);
                header('Location: ' . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            } else {
                require_once './views/danhmuc/addDanhMuc.php';

            }

        }
    }
    public function formEditDanhMuc()
    {
        //Dùng để hiển thị danh mục
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        if ($danhMuc) {
            require_once './views/danhmuc/editDanhMuc.php';
        } else {
            header('Location: ' . BASE_URL_ADMIN . '?act=danh-muc');
            exit();
        }

    }


    public function postEditDanhMuc()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }
            if (empty($errors)) {
                // var_dump('oke');
                $this->modelDanhMuc->updateDanhMuc($id, $ten_danh_muc, $mo_ta);
                header('Location: ' . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            } else {
                $danhMuc = ['id' => $id, 'ten_danh_muc' => $ten_danh_muc, 'mo_ta' => $mo_ta];
                require_once './views/danhmuc/editDanhMuc.php';

            }

        }
    }
    public function deleteDanhMuc()
    {
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        if ($danhMuc) {
            $this->modelDanhMuc->destroyDanhMuc($id);
        }
        header('Location: ' . BASE_URL_ADMIN . '?act=danh-muc');
        exit();
    }
    



}