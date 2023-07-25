<?
$class = $this->router->fetch_class();
$method = $this->router->fetch_method();
?>
<div class="sidebar col-md-3 col-sm-3 myaccount-sidebar">
    <ul class="list-group margin-bottom-25 sidebar-menu">
        <li class="list-group-item clearfix <?=($method=='index' && $class=="account")?'active':''?>"><a href="<?=($method=='index'  && $class=="account")?'javascript:void(0)':g('base_url').'account'?>"><i
                    class="fa fa-angle-right"></i> Dashboard</a></li>

        <li class="list-group-item clearfix <?=($method=='info'  && $class=="account")?'active':''?>">
            <a href="<?=($method=='info'  && $class=="account")?'javascript:void(0)':g('base_url').'account/info'?>"><i class="fa fa-angle-right"></i> My Account
                Info</a></li>

        <?php
        // Buyer
        if($this->user_type=='1'){?>
            <li class="list-group-item clearfix <?=($method=='orderhistory'  && $class=="account")?'active':''?>">
            <a href="<?=($method=='orderhistory'  && $class=="account")?'javascript:void(0)':g('base_url').'account/orderhistory'?>"><i class="fa fa-angle-right"></i> Order History</a></li>
        <?php }
        // Seller
        else{?>
            <!-- <li class="list-group-item clearfix <?=($method=='product'  && $class=="account")?'active':''?>">
                <a href="<?=($method=='product'  && $class=="account")?'javascript:void(0)':g('base_url').'seller_dashboard/product'?>"><i class="fa fa-angle-right"></i> My Products</a></li> -->
        <?php }
        ?>
        <li class="list-group-item clearfix <?=($method=='change_password'  && $class=="account")?'active':''?>"><a href="<?=($method=='change_password' && $class=="account")?'javascript:void(0)':g('base_url').'account/change-password'?>"><i
                    class="fa fa-angle-right"></i> Change Password</a></li>
        <li class="list-group-item clearfix"><a href="<?= g('base_url') ?>user/logout"><i class="fa fa-angle-right"></i>
                Logout</a></li>
    </ul>
</div>