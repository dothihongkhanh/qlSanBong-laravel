@extends('client.layouts.app')
@section('content')
<style>

.container{
    margin-top: 20px;
    margin-bottom: 20px;
}
.profile {
    display: inline !important;
    background: #eee ;
    margin-top: 20px;

}

.ui-w-80 {
    width : 80px !important;
    height: auto;
}

.btn-default {
    border-color: rgba(24, 28, 33, 0.1);
    background  : rgba(0, 0, 0, 0);
    color       : #4E5155;
}

label.btn {
    margin-bottom: 0;
}

.btn-outline-primary {
    border-color: #26B4FF;
    background  : transparent;
    color       : #26B4FF;
}

.btn {
    cursor: pointer;
}

.text-light {
    color: #babbbc !important;
}

.btn-facebook {
    border-color: rgba(0, 0, 0, 0);
    background  : #3B5998;
    color       : #fff;
}

.btn-instagram {
    border-color: rgba(0, 0, 0, 0);
    background  : #000;
    color       : #fff;
}

.card {
    background-clip: padding-box;
    box-shadow     : 0 1px 4px rgba(24, 28, 33, 0.012);
}

.row-bordered {
    overflow: hidden;
}

.account-settings-fileinput {
    position  : absolute;
    visibility: hidden;
    width     : 1px;
    height    : 1px;
    opacity   : 0;
}

.account-settings-links .list-group-item.active {
    font-weight: bold !important;
}

html:not(.dark-style) .account-settings-links .list-group-item.active {
    background: transparent !important;
}

.account-settings-multiselect~.select2-container {
    width: 100% !important;
}

.light-style .account-settings-links .list-group-item {
    padding     : 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}

.light-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
}

.material-style .account-settings-links .list-group-item {
    padding     : 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}

.material-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
}

.dark-style .account-settings-links .list-group-item {
    padding     : 0.85rem 1.5rem;
    border-color: rgba(255, 255, 255, 0.03) !important;
}

.dark-style .account-settings-links .list-group-item.active {
    color: #fff !important;
}

.light-style .account-settings-links .list-group-item.active {
    color: #4E5155 !important;
}

.light-style .account-settings-links .list-group-item {
    padding     : 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}



.user-info {
    text-align: center;
    margin-bottom: 15px;
    padding: 30px;
    color: #616670;
    border-bottom: 1px solid #f3f3f3
    }
    
    .user-info .img-profile {
    width: 120px;
    height: 120px;
    margin-bottom: 15px
    }
    
    .user-info .meta li {
    margin-bottom: 10px
    }
    
    .user-info .meta li span {
    display: inline-block;
    width: 100px;
    margin-right: 5px;
    text-align: right
    }
    
    .user-info .meta li a {
    color: #616670
    }
    
    .user-info .meta li.activity {
    color: #a2a6af
    }



</style>
<div class="profile">
    <div class=" container light-style flex-grow-1 container-p-y ">

        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0 border-right">
                    <div class="user-info">
                    <img class="avatar img-profile rounded-circle img-circle img-responsive center-block" src="https://www.freeiconspng.com/thumbs/account-icon/account-icon-8.png" alt="Image">
                    <ul class="meta list list-unstyled">
                        <li class="name"><h3>Tên tài khoản</h3></li>
                    </ul>
                    </div>
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">Thông tin chung</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Đổi mật khẩu</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-update-notifications">Cài đặt thông báo</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-order-field">Đơn đặt sân</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-history-order-field">Lịch sử đặt sân</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">Thông báo</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <img src="" class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                <form method="POST" enctype="multipart/form-data" id="avatarForm">
                                    <label class="btn btn-outline-primary">
                                        Upload new photo
                                        <input type="file" class="file-upload account-settings-fileinput">
                                    </label> &nbsp;
                                    <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </form>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Tên đăng nhập</label>
                                    <input type="text" class="form-control mb-1" value="Tên đăng nhập">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Tên tài khoản</label>
                                    <input type="text" class="form-control" value="Tên Tài khoản">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Số điện thoại</label>
                                    <input type="text" class="form-control mb-1" value="số điện thoại">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Địa chỉ</label>
                                    <input type="text" class="form-control" value="Địa chỉ">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Mật khẩu hiện tại</label>
                                    <input type="password" class="form-control"  value="Mật khẩu">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Mật khẩu mới</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nhập lại mật khẩu mới</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-update-notifications">
                            <div class="card-body pb-2">
                                <h5 class="mb-4">Cài đặt thông báo</h5>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">
                                            <b>Cập nhật đơn đăt sân </b>
                                            Thông báo khi có cập nhật về đơn đặt sân của tôi, bao gồm cả việc cập nhật thanh toán.
                                        </span>
                                    </label>
                                </div>                                                
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-order-field">
                            <p></p>
                        </div>
                        <div class="tab-pane fade" id="account-history-order-field">
                            <div class="card-body pb-2">
                                <h5 class="mb-4">Lịch sử đặt sân</h5>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">
                                            <b>Cập nhật đơn đăt sân </b>
                                            Thông báo khi có cập nhật về đơn đặt sân của tôi, bao gồm cả việc cập nhật thanh toán.
                                        </span>
                                    </label>
                                </div>                                                
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-notifications">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Activity</h6>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Email me when someone comments on my article</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Email me when someone answers on my forum
                                            thread</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input">
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Email me when someone follows me</span>
                                    </label>
                                </div>
                            </div>
                            {{-- <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Application</h6>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">News and announcements</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input">
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Weekly product updates</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Weekly blog digest</span>
                                    </label>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3">
            <button type="button" class="btn btn-primary">Save changes</button>&nbsp;
            <button type="button" class="btn btn-default">Cancel</button>
        </div>
        
    
</div>
</div>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
<script>
    $(document).ready(function() {


        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.avatar').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


        $(".file-upload").on('change', function() {
            readURL(this);
        });
    });
</script>

@endsection