<?php
//$content_sub = $this->model_cms_page->get_page(13);
$para5['where']['headings_id'] = 5;
$heading5 = $this->model_headings->find_one($para5);

$para6['where']['headings_id'] = 6;
$heading6 = $this->model_headings->find_one($para6);

$para7['where']['headings_id'] = 7;
$heading7 = $this->model_headings->find_one($para7);


?>
<div class="container foo-form-con mb2">
    <h2><?= $heading5['headings_title'] ?></h2>
    <form class="foo-form mt2 contact-form" id="contact-form" action="<?= g('base_url') ?>contact-us/store" method="post">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <label>Full Name</label>
                <input placeholder="Full Name" name="inquiry[inquiry_fullname]">
            </div>
            <div class="col-lg-6 mb-4">
                <label>Email Address</label>
                <input placeholder="Email Address" type="email" name="inquiry[inquiry_email]">
            </div>
            <div class="col-lg-6 mb-4">
                <label>Phone No.</label>
                <input placeholder="Phone No" name="inquiry[inquiry_phone]">
            </div>
            <div class="col-lg-6 mb-4">
                <label>Your State Location</label>
                <input placeholder="Your State Location" name="inquiry[inquiry_promo_code]">
            </div>
            <div class="col-lg-12 mb-4 d-flex flex-column">
                <label>Message</label>
                <textarea rows="6" placeholder="Message" name="inquiry[inquiry_comments]"></textarea>
            </div>
              <div class="col-lg-12 mb-4 d-flex flex-column">
                    <?php $this->load->view('widgets/google_captcha');?>
               </div>
        </div>
           
        <div class="col-lg-12 d-flex justify-content-center mt-3 mb-5">
            <button class="clip btn-send">Contact Us</button>
        </div>
    </form>
</div>

<footer class="footer " style="background-color: #1B1830;">

    <div class="container-fluid mt-4 py-5">
        <div class="row">
            <div class="col-md-2">
                <a href="<?= g('base_url') ?>"> <img src="<?php echo get_image($layout_data['logo']['logo_image_path'], $layout_data['logo']['footer_logo_image']); ?>" alt="" width="80%"></a>
            </div>
            <div class="col-md-5">
                <h4 style="color: #fff;">Useful Links</h4>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="fsm" style="color: #fff; list-style: none;padding: 0;">
                            <li> <a href="<?= g('base_url') ?>campconcept">Camp Concept</a> </li>
                            <li> <a href="<?= g('base_url') ?>upcomingcamps">Upcoming Camps</a> </li>
                            <li> <a href="<?= g('base_url') ?>campresult">Camp Results</a> </li>
                            <li> <a href="<?= g('base_url') ?>kickoffkickerrankings">Kickoff Evals</a> </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="fsm" style="color: #fff; list-style: none;padding: 0;">
                            <li> <a href="<?= g('base_url') ?>fieldgoalkickerrankings">Field Goal Evals</a> </li>
                            <li> <a href="<?= g('base_url') ?>punterrankings">Punt Evals</a> </li>
                            <li> <a href="<?= g('base_url') ?>snapperrankings">Snapper Evals</a> </li>
                            <li> <a href="<?= g('base_url') ?>evaluationteam">Evaluation Team</a> </li>
                        </ul>
                    </div>

                </div>

            </div>
            <div class="col-md-2">
                <h4 style="color: #fff;"><?= $heading6['headings_title'] ?></h4>
                <ul class="fsm" style="color: #fff;list-style: none;padding: 0;">
                    <li>
                        <a href="mailto:<?= g('db.admin.staff_email') ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                        <a href="tel:<?= g('db.admin.phone') ?>"><i class="fa fa-phone-square" aria-hidden="true"></i></a>
                    </li>
                    <!--<li><a href="tel:<?= g('db.admin.phone') ?>"><i class="fa fa-phone-square" aria-hidden="true"></i></a></li>-->
                </ul>
                <!--  <ul style="color: #fff;list-style: none;padding: 0;">
                <li>Northern Region</li>
               <li><?= g('db.admin.company_address_1') ?></li>
                <li><a href="tel:<?= g('db.admin.phone') ?>"><?= g('db.admin.phone') ?></a></li>
                <li>Southern Region</li>
                <li><?= g('db.admin.company_address_2') ?></li> 
                <li><a href="tel:<?= g('db.admin.phone_2') ?>"><?= g('db.admin.phone_2') ?></a></li>
            </ul> -->
            </div>
            <!-- <div class="col-md-3"> -->
            <!-- <ul style="color: #fff;list-style: none;" class="mt-5">
                <li>Media Request</li>
                <li><a href="mailto:<?= g('db.admin.email') ?>"><?= g('db.admin.email') ?> </a></li>
                <li></li>
                <li>Website/Profile Updates</li>
                <li><a href="mailto:<?= g('db.admin.support_email') ?>"><?= g('db.admin.support_email') ?></a></li>
                <li></li>
            </ul> -->
            <!-- </div> -->
            <div class="col-md-3">
                <h4 style="color: #fff;"><?= $heading7['headings_title'] ?></h4>
                <a href="https://goo.gl/maps/t58mVowvgsJMM8b26" target="_blank" style="color: #fff"><?= g('db.admin.central_office') ?></a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 sbhfirst text-center">
                <p><?= g('db.admin.copyright') ?> </p>
                <!-- <br> DESIGNED AND DEVELOPED BY <a href="https://designprosusa.com/" target="_blank">Design Pros USA -->
            </div>
        </div>
    </div>

</footer>

<?php
if ($this->userid < 1) {
    //$this->load->view('user/login_sigup_modal');
}
?>

<script async src="<?php echo g('js_root'); ?>jquery-ui.js"></script>
<!--<div id="search">
    <button type="button" class="close">×</button>
    <form method="GET" id="searchform" action="<?/*= g('base_url'); */ ?>shop">
        <input type="Search" required="" name="search" placeholder="SEARCH KEYWORD(s)">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>-->



<script type="text/javascript">
    function addtowishlist(productid) {
        var data = "product_id=" + productid;
        var site_url = "<?= g('base_url') ?>account/addwishlist";
        $.ajax({
            type: "POST",
            url: site_url,
            data: data,
            dataType: "json",
            success: function(msg) {
                Loader.hide();

                if (msg.status == true) {
                    AdminToastr.success(msg.message, 'Success');
                } else {
                    AdminToastr.error(msg.message, 'Error');
                }
            },
            beforeSend: function() {
                Loader.show();
            }
        });
    }


    $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "<?= g('base_url') ?>checkout/get_basket",
            data: "",
            dataType: "json",

            success: function(msg) {
                $(".badge").html(msg.total_items);
                //$("#item_count").html(msg.total);
            },
            beforeSend: function() {
                //$("#loading-sp").show();
            }
        });
        return false;
    });
</script>

<script type="text/javascript">
    $('.search-input').keypress(function(e) {
        if (e.which == 13) {
            $('form#search').submit();
            return false; //<---- Add this line
        }
    });
    $(document).ready(function() {
        $("#filterTableInp").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#filterAbleTable tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        $('#filterAbleTable thead th .fa-sort').click(function() {
            var table = $(this).parents('table').eq(0)
            var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
            this.asc = !this.asc
            if (!this.asc) {
                rows = rows.reverse()
            }
            for (var i = 0; i < rows.length; i++) {
                table.append(rows[i])
            }
        })

        function comparer(index) {
            return function(a, b) {
                var valA = getCellValue(a, index),
                    valB = getCellValue(b, index)
                return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
            }
        }

        function getCellValue(row, index) {
            return $(row).children('td').eq(index).text()
        }
    });
</script>