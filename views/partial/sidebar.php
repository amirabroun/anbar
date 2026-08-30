<main class="main-content dt-sl mt-4 mb-3">
    <div class="container main-container">
        <div class="row">

            <!-- Start Sidebar -->
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 sticky-sidebar">
                <div class="profile-sidebar dt-sl">
                    <div class="dt-sl dt-sn mb-3">
                        <div class="profile-sidebar-header dt-sl">
                            <div class="profile-avatar float-right">
                                <img src="/assets/img/theme/avatar.png" alt="پروفایل عنبری تویز">
                            </div>
                            <div class="profile-header-content mr-3 mt-2 float-right">
                                <span class="d-block profile-username">
                                    <?php if (isset($details_user['first_name'] ) &&isset($details_user['last_name'])){
                                        echo $details_user['first_name'];echo $details_user['last_name'];
                                    }else
                                    {echo '--------';} ?>
                                </span>
                                <span class="d-block profile-phone"><?php echo $details_user['mobile']; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="dt-sl dt-sn mb-3">
                        <div class="profile-menu-section dt-sl">
                            <div class="label-profile-menu mt-2 mb-2">
                                <span>حساب کاربری شما</span>
                            </div>
                            <div class="profile-menu">
                                <ul>
                                    <li>
                                        <a href="<?php echo userUrl($_SESSION['user_sing'])?>" class="active">
                                            <i class="mdi mdi-account-circle-outline"></i>
                                            پروفایل
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo userfactorUrl($_SESSION['user_sing'])?>">
                                            <i class="mdi mdi-basket"></i>
                                            همه سفارش ها
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo userinterestUrl($_SESSION['user_sing'])?>">
                                            <i class="mdi mdi-heart-outline"></i>
                                            لیست علاقمندی ها
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo usermassegeUrl($_SESSION['user_sing'])?>">
                                            <i class="mdi mdi-glasses"></i>
                                           کد های تخفیف شما
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo useraddressUrl($_SESSION['user_sing'])?>">
                                            <i class="mdi mdi-sign-direction"></i>
                                            آدرس ها
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo userinfoUrl($_SESSION['user_sing'])?>">
                                            <i class="mdi mdi-account-edit-outline"></i>
                                            اطلاعات شخصی
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo userquestionUrl($_SESSION['user_sing'])?>">
                                            <i class="mdi mdi-account-edit-outline"></i>
                                            سوالات شما
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Sidebar -->
