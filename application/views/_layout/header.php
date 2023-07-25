    <style type="text/css">
        /* ============ desktop view ============ */
        @media all and (min-width: 992px) {
            .navbar .nav-item .dropdown-menu {
                display: none;
            }

            .navbar .nav-item:hover .nav-link {
                color: #fff;
            }

            .navbar .nav-item:hover .dropdown-menu {
                display: block;
            }

            .navbar .nav-item .dropdown-menu {
                margin-top: 0;
            }
        }

        /* ============ desktop view .end// ============ */
    </style>
    <?php
    $segment = $this->router->fetch_class();
    $method = $this->router->fetch_method();
    $head_banner = $this->model_banner->find_by_pk(1);



    if ($segment == 'user' || $segment == 'account') { ?>
        <div class="user">
        <?php } else { ?>
            <div class="banner">
            <?php } ?>

            <div class="psudoBanner">
                <div class="left-banner-img">
                    <img src="<?php echo get_image($head_banner['banner_image_path'], $head_banner['banner_image']) ?>" class="img-fluid" alt="Responsive image" width="100%">
                </div>
                <div class="video-box-width">
                    <video autoplay muted loop playsinline preload="metadata">
                        <source src="<?php echo get_image($head_banner['banner_video_path'], $head_banner['banner_video']) ?>" type="video/mp4">
                    </video>

                </div>
            </div>
            <header>
                <div class="container-fluid nav-top">
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <a class="navbar-brand" href="<?= g('base_url') ?>">
                                <img src="<?php echo get_image($layout_data['logo']['logo_image_path'], $layout_data['logo']['logo_image']); ?>" class="logo">
                            </a>
                        </div>
                        <div class="col-md-10">
                            <div class="socil-icon">
                                <a href="<?= g('db.admin.facebook') ?>" target="_blank">
                                    <img src="<?= g('images_root') ?>facebook.svg" alt="">
                                </a>
                                <a href="<?= g('db.admin.youtube') ?>" target="_blank">
                                    <img src="<?= g('images_root') ?>youtube.svg" alt="">
                                </a>
                                <a href="<?= g('db.admin.instagram') ?>" target="_blank">
                                    <img src="<?= g('images_root') ?>insta.svg" alt="">
                                </a>
                                <a href="<?= g('db.admin.twitter') ?>" target="_blank">
                                    <img src="<?= g('images_root') ?>twitter.svg" alt="">
                                </a>
                                <a class="color-back-purple" data-toggle="modal" data-target="#searchModal">
                                    <img src="<?= g('images_root') ?>search.svg" height="15px">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <nav class="navbar navbar-expand-md">
                                <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                                    <span class="navbar-toggler-icon text-light"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                                    <ul class="navbar-nav">
                                        <?php
                                        foreach ($main_nav_headings as $headings) : ?>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?= g('base_url') ?><?php echo $headings['nav_bar_url']; ?>"><?php echo $headings['nav_bar_title']; ?></a>
                                            </li>
                                        <?php
                                        endforeach;
                                        ?>
                                    </ul>
                                    <!-- <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= g('base_url') ?>campconcept"><?php echo $main_nav_headings[0]['headings_title'] ?>Camp Concept</a>
                                            <a class="nav-link" href="<?= g('base_url') ?>campconcept"><?php echo $main_nav_headings[0]['headings_title'] ?></a>

                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= g('base_url') ?>upcomingcamps">Upcoming Camps</a>
                                            <a class="nav-link" href="<?= g('base_url') ?>upcomingcamps"><?php echo $main_nav_headings[1]['headings_title'] ?></a>

                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= g('base_url') ?>campresults">Camp Results</a>
                                            <a class="nav-link" href="<?= g('base_url') ?>campresults"><?php echo $main_nav_headings[2]['headings_title'] ?></a>

                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= g('base_url') ?>fieldgoalkickerrankings">Field
                                                Goal Evals</a>
                                            <a class="nav-link" href="<?= g('base_url') ?>fieldgoalkickerrankings"><?php echo $main_nav_headings[3]['headings_title'] ?></a>

                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= g('base_url') ?>kickoffkickerrankings">Kickoff
                                                Evals</a>
                                            <a class="nav-link" href="<?= g('base_url') ?>kickoffkickerrankings"><?php echo $main_nav_headings[4]['headings_title'] ?></a>

                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= g('base_url') ?>punterrankings">Punt Evals</a>
                                            <a class="nav-link" href="<?= g('base_url') ?>punterrankings"><?php echo $main_nav_headings[5]['headings_title'] ?></a>

                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= g('base_url') ?>snapperrankings">Snapper
                                                Evals</a>
                                            <a class="nav-link" href="<?= g('base_url') ?>snapperrankings"><?php echo $main_nav_headings[6]['headings_title'] ?></a>

                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= g('base_url') ?>evaluationteam">Evaluation
                                                Team</a>
                                            <a class="nav-link" href="<?= g('base_url') ?>evaluationteam"><?php echo $main_nav_headings[7]['headings_title'] ?></a>

                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= g('base_url') ?>media">Media</a>
                                            <a class="nav-link" href="<?= g('base_url') ?>media"><?php echo $main_nav_headings[8]['headings_title'] ?></a>

                                        </li>



                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= g('base_url') ?>contact-us">Contact us</a>
                                            <a class="nav-link" href="<?= g('base_url') ?>contact-us"><?php echo $main_nav_headings[9]['headings_title'] ?></a>

                                        </li>
                                       

                                    </ul> -->
                                </div>
                            </nav>
                        </div>

                    </div>
                </div>
                <div class="sider">
                    <a class="navbar-brand" href="<?= g('base_url') ?>home">
                        <img src="<?php echo get_image($layout_data['logo']['logo_image_path'], $layout_data['logo']['logo_image']); ?>" class="logo">
                    </a>
                    <i class="fa fa-bars" onclick="openNav()"></i>
                </div>
            </header>

            <!-- Modal -->
            <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Search</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row" style="padding: 0 1rem">
                                <form action="<?= g('base_url') ?>search" method="GET">

                                    <div class="cGrid">
                                        <div class="row">
                                            <div class="col-lg-4 cgItem">
                                                <div class="sorting">
                                                    <span>Type</span>
                                                    <select class="form-select" attr-year="1" id="type" aria-label="Default select example" name="type">
                                                        <option value="1">Kickers</option>
                                                        <option value="2">Punters</option>
                                                        <option value="3">Long Snappers</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 cgItem">
                                                <div class="sorting">
                                                    <span>Last name</span>
                                                    <input type="text" placeholder="Last name" name="lastname">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 cgItem">
                                                <div class="sorting">
                                                    <span>Graduation year</span>
                                                    <select class="form-select" id="gyear" attr-year="1" aria-label="Default select example" name="gradyear">
                                                        <?php
                                                        $years = $this->model_kicker_year->find_all_active();
                                                        foreach ($years as $key => $value) { ?>
                                                            <option value="<?php echo $value['kicker_year_id'] ?>">
                                                                <?php echo $value['kicker_year_title'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 cgItem">
                                                <div class="sorting">
                                                    <span>State</span>
                                                    <input type="text" placeholder="State" name="state">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 cgItem">
                                                <div class="sorting">
                                                    <span>Star Rating</span>
                                                    <select class="form-select" id="" attr-year="1" aria-label="Default select example" name="rating">
                                                        <option value="7">D1 FBS Ready- 5 star</option>
                                                        <option value="6">D1 FBS Power 5 Ready- 5 star</option>
                                                        <option value="5">D1 FBS Group 5 Ready- 5 star</option>
                                                        <option value="4.5">D1 FCS Ready- 4.5 star</option>
                                                        <option value="4">D2 Ready- 4 star</option>
                                                        <option value="3.5">D3 Ready- 3.5 star</option>
                                                        <option value="3">D3 Ready- 3 star</option>
                                                        <option value="2.5">Still Developing- 2.5 star</option>
                                                        <option value="2">Still Developing- 2 star</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <button type="submit" class="cgIteml">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- sideNav -->
            <div id="mySidenav" class="sidenav">
                <div class="d-flex">
                    <span class="closebtn" onclick="closeNav()">&times;</span>
                    <span class="input-group-text searchModalBtn" data-toggle="modal" data-target="#searchModal">
                        <img src="<?= g('images_root') ?>search.svg" height="15px">
                    </span>
                </div>
                   <ul class="navbar-nav">
                                        <?php
                                        foreach ($main_nav_headings as $headings) : ?>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?= g('base_url') ?><?php echo $headings['nav_bar_url']; ?>"><?php echo $headings['nav_bar_title']; ?></a>
                                            </li>
                                        <?php
                                        endforeach;
                                        ?>
                                    </ul>

                <div class="socil-icon">
                    <a href="<?= g('db.admin.facebook') ?>" target="_blank">
                        <img src="<?= g('images_root') ?>facebook.svg" alt="">
                    </a>
                    <a href="<?= g('db.admin.youtube') ?>" target="_blank">
                        <img src="<?= g('images_root') ?>youtube.svg" alt="">
                    </a>
                    <a href="<?= g('db.admin.instagram') ?>" target="_blank">
                        <img src="<?= g('images_root') ?>insta.svg" alt="">
                    </a>
                    <a href="<?= g('db.admin.twitter') ?>" target="_blank">
                        <img src="<?= g('images_root') ?>twitter.svg" alt="">
                    </a>
                </div>
            </div>

            <script>
                $(document).ready(function() {

                    $('#type').on('change', function() {
                        var id = $(this).val();

                        var params = {};
                        params.id = id;
                        var res = AjaxRequest.fire(base_url + "search/get_years", params);
                        var selCat = [];

                        if (res.status == 1) {
                            $('#gyear').html(res.html);
                        } else {
                            // $('#gyear').html('');                  
                        }


                    });
                });

                function openNav() {
                    document.getElementById("mySidenav").style.right = "0px";
                }

                function closeNav() {
                    document.getElementById("mySidenav").style.right = "-500px";
                }
            </script>