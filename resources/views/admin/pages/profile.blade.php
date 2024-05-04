<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-7">
                <h4 class="page-title">Profile</h4>
            </div>
            <div class="col-sm-8 col-5 text-right m-b-20">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary float-right btn-rounded"> Dashboard >></a>
            </div>
        </div>
       @include('admin.common.flash-message')
        <div class="row">
            <div class="col-lg-12">
                <div class="bgr_stse"><div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Admin Type</label>
                                <select class="form-control" name="type" id="type"
                                    disabled>
                                    <option disabled selected value="">Select Type</option>
                                    <option <?php if (isset($lists)) {
                                        if ($lists->type == 'Super Admin') {
                                            echo 'selected';
                                        }
                                    } ?> value="Super Admin">Super Admin</option>
                                </select>
                                <span id="typelocation" class="err" style="color:red"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" value="<?php if (isset($lists)) { echo $lists['name']; } else { echo ''; } ?>" name="username" id="title" type="text"
                                    disabled>
                                <span id="titleslocation" class="err" style="color:red"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" id="email" type="email" value="<?php if (isset($lists)) { echo $lists->email; } else { echo ''; } ?>" disabled />
                                <span id="emaillocation" class="err" style="color:red"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" name="phone" id="phone" type="mobile" maxlength="12"
                                    onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?php if (isset($lists)) { echo $lists->phone; } else { echo '';  } ?>" disabled />
                                <span id="phonelocation" class="err" style="color:red"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Image</label>
                                <span id="image1location" class="err" style="color:red"></span>
                            </div>
                            <?php if (isset($lists)) { ?>
                                <script>
                                    document.getElementById('cover_image').value = 'abc';
                                </script>
                                <input type="hidden" name="old_image" value="{{ $lists->image }} ?>" disabled>
                                <td data-title="Images"><img
                                        src="{{ asset(''). $lists->image }}"
                                        width="100px" height="100px" class="rounded"></td>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>