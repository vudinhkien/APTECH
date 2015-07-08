<aside class="left-side sidebar-offcanvas">
            <section class="sidebar ">
                <div class="page-sidebar  sidebar-nav">
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul id="menu" class="page-sidebar-menu">
                        <li>
                            <a href="index.php?view=dashboard">
                                <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="livicon" data-c="#F89A14" data-hc="#F89A14" data-name="calendar" data-size="18" data-loop="true"></i>
                                Giới thiệu
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="livicon" data-name="barchart" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Quản lý dịch vụ</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-double-right"></i>
                                        List dịch vụ
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-double-right"></i>
                                        Thêm dịch vụ mới
                                    </a>
                                </li>
                              
                            </ul>
                        </li>
                        <li <?php if(isset($_GET['view'])) echo $_GET['view']=='form-product' || $_GET['view']=='list-product' || $_GET['view']=='list-cat-product' || $_GET['view']=='form-cat-product' ? 'class=active' : ''; ?>>
                            <a href="#">
                                <i class="livicon" data-name="mail" data-size="18" data-c="#5bc0de" data-hc="#5bc0de" data-loop="true"></i>
                                <span class="title">Quản lý sản phẩm</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li <?php if(isset($_GET['view'])) echo $_GET['view']=='list-product' ? 'class=active' : ''; ?>>
                                    <a href="index.php?view=list-product">
                                        <i class="fa fa-angle-double-right"></i>
                                        List sản phẩm
                                    </a>
                                </li>
                                <li <?php if(isset($_GET['view'])) echo $_GET['view']=='form-product' ? 'class=active' : ''; ?>>
                                    <a href="index.php?view=form-product">
                                        <i class="fa fa-angle-double-right"></i>
                                        Thêm sản phẩm
                                    </a>
                                </li>
                                 <li <?php if(isset($_GET['view'])) echo $_GET['view']=='list-cat-product' ? 'class=active' : ''; ?>>
                                    <a href="index.php?view=list-cat-product">
                                        <i class="fa fa-angle-double-right"></i>
                                        List danh mục sp
                                    </a>
                                </li>
                                <li <?php if(isset($_GET['view'])) echo $_GET['view']=='form-cat-product' ? 'class=active' : ''; ?>>
                                    <a href="index.php?view=form-cat-product">
                                        <i class="fa fa-angle-double-right"></i>
                                        <?php 
										if(isset($_GET['act'])) echo $_GET['act']=='update' ? 'Sửa' : 'Thêm'; else echo "Thêm"; ?> danh mục
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!---danhsach order-->
                         <li <?php if(isset($_GET['view'])) echo $_GET['view']=='order' ? 'class=active' : ''; ?>>
                            <a href="index.php?view=list-order">
                                <i class="livicon" data-name="mail" data-size="18" data-c="#5bc0de" data-hc="#5bc0de" data-loop="true"></i>
                                <span class="title">Quản lý đơn hàng</span>
                                <span class="fa arrow"></span>
                            </a>
                          </li>
                          <!---end danhsach order--> 
                        <li <?php if(isset($_GET['view'])) echo $_GET['view']=='form-news' || $_GET['view']=='list-news' || $_GET['view']=='list-cat' || $_GET['view']=='form-cat' ? 'class=active' : ''; ?>>
                            <a href="#">
                                <i class="livicon" data-name="brush" data-c="#F89A14" data-hc="#F89A14" data-size="18" data-loop="true"></i>
                                <span class="title">Quản lý bài viết</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li <?php if(isset($_GET['view'])) echo $_GET['view']=='list-news' ? 'class=active' : ''; ?>>
                                    <a href="index.php?view=list-news">
                                        <i class="fa fa-angle-double-right"></i>
                                        List bài viết
                                    </a>
                                </li>
                                <li <?php if(isset($_GET['view'])) echo $_GET['view']=='form-news' ? 'class=active' : ''; ?>>
                                    <a href="index.php?view=form-news">
                                        <i class="fa fa-angle-double-right"></i>
                                        <?php if(isset($_GET['act'])) echo $_GET['act']=='update' ? 'Sửa' : 'Thêm'; else echo "Thêm"; ?> bài viết
                                    </a>
                                </li>
                                 <li <?php if(isset($_GET['view'])) echo $_GET['view']=='list-cat' ? 'class=active' : ''; ?>>
                                    <a href="index.php?view=list-cat">
                                        <i class="fa fa-angle-double-right"></i>
                                        List danh mục
                                    </a>
                                </li>
                                <li <?php if(isset($_GET['view'])) echo $_GET['view']=='form-cat' ? 'class=active' : ''; ?>>
                                    <a href="index.php?view=form-cat">
                                        <i class="fa fa-angle-double-right"></i>
                                        <?php 
										if(isset($_GET['act'])) echo $_GET['act']=='update' ? 'Sửa' : 'Thêm'; else echo "Thêm"; ?> danh mục
                                    </a>
                                </li>
                              
                            </ul>
                        </li>
                         <li>
                            <a href="#">
                                <i class="livicon" data-name="table" data-c="#418BCA" data-hc="#418BCA" data-size="18" data-loop="true"></i>
                                <span class="title">Quản lý bình luận</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-double-right"></i>
                                        <span class="badge badge-danger">20</span>
                                        Bình luận chưa duyệt
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-double-right"></i>
                                        Bình luận đã duyệt
                                    </a>
                                </li>
                               
                            </ul>
                        </li>
                       <!--lien hệ-->
                        <li <?php if(isset($_GET['view'])) echo $_GET['view']=='list-lienhe' ? 'class=active' : ''; ?>>
                            <a href="index.php?view=list-lienhe">
                                <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="list-ul" data-size="18" data-loop="true"></i>
                                <span class="badge badge-danger">10</span>
                                Liên hệ
                            </a>
                        </li>
                        
                        
                        <li <?php if(isset($_GET['view'])) echo $_GET['view']=='form-menu' || $_GET['view']=='list-menu' || $_GET['view']=='list-menu-type' || $_GET['view']=='form-menu-type' || $_GET['view']=='list-menu-group' || $_GET['view']=='form-menu-group' || $_GET['view']=='config-menu-frontend' ? 'class=active' : ''; ?>>
                            <a href="#">
                                <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Quản lý menu</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li <?php if(isset($_GET['view'])) echo $_GET['view']=='list-menu' ? 'class=active' : ''; ?>>
                                    <a href="index.php?view=list-menu">
                                        <i class="fa fa-angle-double-right"></i>
                                        Danh sách menu
                                    </a>
                                </li>
                                <li <?php if(isset($_GET['view'])) echo $_GET['view']=='form-menu' ? 'class=active' : ''; ?>>
                                    <a href="index.php?view=form-menu">
                                        <i class="fa fa-angle-double-right"></i>
                                        <?php if(isset($_GET['act'])) echo $_GET['act']=='update' ? 'Sửa' : 'Thêm'; else echo "Thêm"; ?> menu
                                    </a>
                                </li>
                                <li <?php if(isset($_GET['view'])) echo $_GET['view']=='list-menu-type' ? 'class=active' : ''; ?>>
                                    <a href="index.php?view=list-menu-type">
                                        <i class="fa fa-angle-double-right"></i>
                                        Danh sách kiểu menu
                                    </a>
                                </li>
                                <li <?php if(isset($_GET['view'])) echo $_GET['view']=='form-menu-type' ? 'class=active' : ''; ?>>
                                    <a href="index.php?view=form-menu-type">
                                        <i class="fa fa-angle-double-right"></i>
                                        <?php if(isset($_GET['act'])) echo $_GET['act']=='update' ? 'Sửa' : 'Thêm'; else echo "Thêm"; ?> kiểu menu type
                                    </a>
                                </li>
                                <li <?php if(isset($_GET['view'])) echo $_GET['view']=='list-menu-group' ? 'class=active' : ''; ?>>
                                    <a href="index.php?view=list-menu-group">
                                        <i class="fa fa-angle-double-right"></i>
                                        Danh sách nhóm menu
                                    </a>
                                </li>
                                <li <?php if(isset($_GET['view'])) echo $_GET['view']=='form-menu-group' ? 'class=active' : ''; ?>>
                                    <a href="index.php?view=form-menu-group">
                                        <i class="fa fa-angle-double-right"></i>
                                        <?php if(isset($_GET['act'])) echo $_GET['act']=='update' ? 'Sửa' : 'Thêm'; else echo "Thêm"; ?> menu group
                                    </a>
                                </li>
                                <li <?php if(isset($_GET['view'])) echo $_GET['view']=='config-menu-frontend' ? 'class=active' : ''; ?>>
                                    <a href="index.php?view=config-menu-frontend">
                                        <i class="fa fa-angle-double-right"></i>
                                        Cấu hình menu
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li <?php if(isset($_GET['view'])) echo $_GET['view']=='form-user' || $_GET['view']=='list-user' ? 'class=active' : ''; ?>>
                            <a href="#">
                                <i class="livicon" data-name="lab" data-c="#EF6F6C" data-hc="#EF6F6C" data-size="18" data-loop="true"></i>
                                <span class="title">Quản lý user</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li <?php if(isset($_GET['view'])) echo $_GET['view']=='list-user' ? 'class=active' : ''; ?>>
                                    <a href="index.php?view=list-user">
                                        <i class="fa fa-angle-double-right"></i>
                                        List user
                                    </a>
                                </li>
                                <li <?php if(isset($_GET['view'])) echo $_GET['view']=='form-user' ? 'class=active' : ''; ?>>
                                    <a href="index.php?view=form-user">
                                        <i class="fa fa-angle-double-right"></i>
                                        <?php if(isset($_GET['act'])) echo $_GET['act']=='update' ? 'Sửa' : 'Thêm'; else echo "Thêm"; ?> user
                                    </a>
                                </li>
                               
                            </ul>
                        </li>
                       
                        <li <?php if(isset($_GET['view'])) echo $_GET['view']=='form-slide' || $_GET['view']=='list-slide' ? 'class=active' : ''; ?>>>
                            <a href="#">
                                <i class="livicon" data-name="image" data-c="#418BCA" data-hc="#418BCA" data-size="18" data-loop="true"></i>
                                <span class="title">Quản lý slideshow</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li <?php if(isset($_GET['view'])) echo $_GET['view']=='list-slide' ? 'class=active' : ''; ?>>
                                    <a href="index.php?view=list-slide">
                                        <i class="fa fa-angle-double-right"></i>
                                        List ảnh
                                    </a>
                                </li>
                                <li<?php if(isset($_GET['view'])) echo $_GET['view']=='form-slide' ? 'class=active' : ''; ?> >
                                    <a href="index.php?view=form-slide">
                                        <i class="fa fa-angle-double-right"></i>
                                        <?php if(isset($_GET['act'])) echo $_GET['act']=='update' ? 'Sửa' : 'Thêm'; else echo "Thêm"; ?> slide
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="livicon" data-name="users" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Quản lý banner</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-double-right"></i>
                                        List banner
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-double-right"></i>
                                        Thêm banner mới
                                    </a>
                                </li>
                               
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="livicon" data-c="#F89A14" data-hc="#F89A14" data-name="calendar" data-size="18" data-loop="true"></i>
                                Cấu hình chung
                            </a>
                        </li>
                        
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
            </section>
            <!-- /.sidebar -->
</aside>