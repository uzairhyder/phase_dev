

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <title>Invoice</title>

</head>

<style type="text/css">



    @media only screen and (min-device-width: 360px) and (max-device-width: 480px) { /* iPhone 6 and 6+ */

        .email-container {   max-width: 350px !important;    margin: 0 10px;

            overflow: hidden;}

    }



    /* iPad Text Smoother */



    div, p, a, li, td {

        -webkit-text-size-adjust: none;

    }



    .img-responsive{width: 100%;}

    .ReadMsgBody {

        width: 100%;

        background-color: #eee;

    }

    .ExternalClass {

        width: 100%;

        background-color: #ffffff;

    }

    body {

        width: 100%;

        background-color: #fff;

        margin: 0;

        padding: 0;

        -webkit-font-smoothing: antialiased;

    }

    .new_in p{padding: 0;

        margin: -10px 0 0;

        color: #fff;

        text-align: center;    font-family: Arial, sans-serif;}

    html {

        width: 100%;

    }

    .afrt{

        font-size: 14px;

        line-height: 41px;

        padding: 0;

        position: relative;

        text-align: left;

    }



    .afrt::after{

        border-top: 2px solid #ffffff;

        content: "";

        height: 1px;

        position: absolute;

        right: -270px;

        top: 10px;

        width: 84%;

    }





    .afrt::before{

        border-top: 2px solid #ffffff;

        content: "";

        height: 1px;

        position: absolute;

        left: -270px;

        top: 10px;

        width: 84%;

    }



    @media only screen and (min-device-width: 500px) and (max-device-width: 600px) {

        body {

            width: auto!important;

        }

        /* Box Wrap */



        .BoxWrap {

            width: 440px !important;

        }

        .RespoShadow {

            width: 440px !important;

            height: 60px !important;

        }

        .RespoImage1 {

            width: 440px !important;

            height: 440px !important;

        }

        .RespoImage2 {

            width: 440px !important;

            height: 220px !important;

        }

        .RespoListMedium {

            width: 340px !important;

        }



        /* Show/Hide  */

        .RespoHideMedium {

            display: none !important;

        }

        .RespoShowMedium {

            display: block !important;

        }

        .RespoCenterMedium {

            text-align: center !important;

        }

        .default-wid{max-width: 600px !important;}

    }



    @media only screen and (max-width: 479px) {

        body {

            width: auto!important;

        }

        .logo-space td {font-size:32px !important; padding: 5px 0px !important;}

        /* Box Wrap */

        .BoxWrap {

            width: 100% !important;

            max-width: 350px;

        }

        .no-space{margin-right: 20px !important;}

        .img-respons{width: 100%;}





        body {

            background-color: #ffffff;

            margin: 0px;

            padding: 0px;

            text-align: left;

            width: 100%;

        }

        .contentbg {

            background-color: #ffffff;

        }

        img {

            border: 0px;

            outline: none;

            text-decoration: none;

            display: block;

        }



        .afrt{

            font-size: 14px;

            line-height: 41px;

            padding: 0;

            position: relative;

            text-align: center;

        }



        .afrt::after{

            border-top: 2px solid #ffffff;

            content: "";

            height: 1px;

            position: absolute;

            right: -270px;

            top: 10px;

            width: 84%;

        }





        .afrt::before{

            border-top: 2px solid #ffffff;

            content: "";

            height: 1px;

            position: absolute;

            left: -270px;

            top: 10px;

            width: 84%;

        }





        a img {

            border: none;

        }

</style>

<!--<style>-->

<!--    table tr:first-child > td > center{-->

<!--        background: #e80d16;-->

<!--    }-->

<!--</style>-->

<body>

<div class="email-container" style="margin: auto;">

    <table align="center" cellpadding="0" cellspacing="0" class="contentbg default-wid" style="border: 2px solid; padding: 20px;">

        <tr>

            <td valign="top">

                <table cellspacing="0" cellpadding="0">



                    <!-- // ********************************************************************************************************* \\ -->

                    <tr>

                        <td align="center" valign="top" ><!-- // Begin Module: preheader\\ -->

                            <table class="BoxWrap logo-space" bgcolor="#fff" align="center" cellpadding="0" cellspacing="0">

                                <tbody>

                                <tr>

                                    <td width="600" height="20"></td>

                                </tr>

                                <!-- // Horizontal Spacer \\ -->



                                <!-- // Horizontal Spacer \\ -->

                                </tbody>

                            </table>



                            <!-- // End Module: preheader\\ --></td>

                    </tr>



                    <!-- // ********************************************************************************************************* \\ -->

                    <tr>

                        <td align="left" valign="top" ><!-- // Begin Module: header Logo\\ -->



                            <table class="BoxWrap logo-space"  align="left" cellpadding="0" cellspacing="0">

                                <tbody>

                                <tr>

                                    <td align="center" width="200"> <img src="<?=get_image($this->layout_data['logo']['logo_image_path'],$this->layout_data['logo']['logo_image'])?>" alt="" border="0" width="200" class="BoxWrap"  style="display: block;  width:200px;  margin-bottom: 40px; " mc:label="image" mc:edit="header_bg01"/></td>

                                </tr>



                                </tbody>

                            </table>



                            <!-- // End Module: header Logo\\ --></td>

                    </tr>





                    <!-- // ********************************************************************************************************* \\ -->

                    <tr>

                        <td align="center" valign="top" ><!-- // Begin Module: Confirmation Message\\ -->



                            <table cellpadding="0" cellspacing="0" align="left">

                                <tbody>

                                <tr>

                                <tr>

                                    <td width="300" style="width: 655px; font-size: 16px; line-height: 20px; text-align: left; font-weight: 600;color: #0275bf; margin-bottom:10px;display: block; margin-top: 10px; font-family: Georgia, Helvetica,  Arial, sans-serif;" > Hi <?=strtoupper($order_detail['order_firstname'])?>,  </td>

                                </tr>



                                <tr>

                                    <td width="300" style="width: 655px; font-size: 16px; line-height: 20px; text-align: left; font-weight: 400;color: #000; margin-bottom:10px;display: block; margin-top: 10px; font-family: Georgia, Helvetica,  Arial, sans-serif;" >This email is to let you know that we have received your Order Payment. Thank you for Purchasing with <b><?php echo g('site_name')?></b>. Below are your details:</td>

                                </tr>





                                </tr>



                                </tbody>

                            </table>



                            <!-- // End Module: header Confirmation\\ --></td>

                    </tr>

                    <!-- // ********************************************************************************************************* \\ -->

                    <tr bgcolor="#fff">

                        <td align="left" valign="top"><!-- // Begin Module: 1st ZigZag\\ -->



                            <table bgcolor="#fff" class="BoxWrap" width="100%" align="center" cellpadding="0" cellspacing="0" mc:repeatable="">

                                <tbody>

                                <tr>



                                    <td style="background-color: #eee;padding: 10px 0 10px 40px;">

                                        <table width="100%" class="no-space" border="0" cellpadding="0" cellspacing="0" align="left" style="padding-left:0; padding-right:10px; margin-right: 110px;">

                                            <tbody>



                                            <!-- // Horizontal Spacer \\ -->

                                            <tr>

                                                <td width="100%" style="font-family:Georgia, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: normal; color: #000; line-height: 34px; text-align: left;"> Your Order Date   </td>

                                            </tr>



                                            <!-- // Horizontal Spacer \\ -->

                                            <tr>

                                                <td width="100%"  style="font-family: Arial, sans-serif; font-size: 12px; font-weight: 800; color:#000; line-height: 18px; text-align: left;padding-bottom: 5px"> <?php echo date('l, F d, Y',strtotime($order_detail['order_createdon']))?> </td>

                                            </tr>



                                            <!--<tr>

                                                <td width="100%" height="40"></td>

                                            </tr>

                                            <tr>

                                                <td width="100%" height="40"></td>

                                            </tr>-->

                                            <!-- // Horizontal Spacer \\ -->

                                            </tbody>

                                        </table>

                                    </td>



                                    <td style="background-color: #eee;padding: 10px 0 10px 0px;">

                                        <table width="100%" class="no-space" border="0" cellpadding="0" cellspacing="0" align="left" style="padding-left:0; padding-right:10px; margin-right: 80px;">

                                            <tbody>



                                            <!-- // Horizontal Spacer \\ -->

                                            <tr>

                                                <td width="100%" style="font-family:Georgia, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: normal; color: #000; line-height: 34px; text-align: left;"> Your Payment ID   </td>

                                            </tr>



                                            <!-- // Horizontal Spacer \\ -->

                                            <tr>

                                                <td width="100%"  style="font-family: Arial, sans-serif;     font-size: 12px; font-weight: 800; color:#000; line-height: 18px; text-align: left;padding-bottom: 5px"> #<?php echo $order_detail['order_id']?>  </td>

                                            </tr>



                                            <!--<tr>

                                                <td width="100%" height="40"></td>

                                            </tr>-->

                                            <!-- // Horizontal Spacer \\ -->

                                            </tbody>

                                        </table>

                                    </td>

                                </tr>

                                </tbody>

                            </table>



                            <!-- // End Module: Delievery Date\\ --></td>

                    </tr>





                    <!-- // **************************Deleivery ends here**************************************************************** \\ -->





                    <!-- // ********************************************************************************************************* \\ -->

                    <tr bgcolor="#fff">

                        <td align="left" valign="top"><!-- // Begin Module: 1st ZigZag\\ -->



                            <table bgcolor="#fff" class="BoxWrap" width="100%" align="center" cellpadding="0" cellspacing="0" mc:repeatable="">

                                <tbody>





                                <tr>

                                    <td width="100%" style="    padding-left: 17px;

  font-size: 16px; line-height: 20px; text-align: left; font-weight: 600;color: #0275bf; margin-bottom:5px; margin-top: 37px; display: block;  font-family: Georgia, Helvetica,  Arial, sans-serif;" > Payment Detail  </td>

                                </tr>



                                </tbody>

                            </table>



                            <!-- // End Module: 1st ZigZag\\ --></td>

                    </tr>



                    <!-- // ********************************************************************************************************* \\ -->

                    <?php

                    if (isset($order_item) && array_filled($order_item)) {

                        $total = 0;

                        foreach ($order_item as $key => $value) {

                            $total += $value['product_price'];

                            $unserialize = unserialize($value['order_item_option']);

                            $color = $unserialize['product_color'];

                            $addons = $unserialize['addons'];

                            ?>

                            <tr>

                                <td valign="top"><!-- // Begin Module: 1st ZigZag\\ -->



                                    <table bgcolor="#fff" class="BoxWrap" width="100%" align="center" cellpadding="0" cellspacing="0" mc:repeatable="">

                                        <tbody>

                                        <tr>





                                            <!--<td  valign="top" class="img-respons" style="background: #fff !important; border: 1px solid #fff;">

                                                <div style="display: block; width: 200px; height: 200px; margin-bottom:10px" class="BoxWrap">

                                                    <h1 style="margin: 0 auto; padding-top: 77px;"><img src="<?php /*echo get_image($value['product_image_path'],$value['product_image']); */?>" width="100%"></h1>



                                                </div>

                                            </td>-->







                                            <td style="background-color: #fff;border-top: 2px solid #fff;padding: 13px;">

                                                <table width="100%" class="no-space" border="0" cellpadding="0" cellspacing="0" align="left" style="padding-left:0; padding-right:10px; margin-right: 0px;">

                                                    <tbody>

                                                    <tr>

                                                        <td width="100%" height="0"></td>

                                                    </tr>

                                                    <!-- // Horizontal Spacer \\ -->

                                                    <tr>

                                                        <td width="50%" mc:edit="ZigZag01_title" style="font-family:Georgia, Helvetica, Arial, sans-serif; font-size: 25px; font-weight: 700; color: #000; line-height: 34px; text-align: left;"> <?php echo $value['product_name']?>

                                                        </td>

                                                        <td width="50%" mc:edit="ZigZag01_title" style="font-family:Georgia, Helvetica, Arial, sans-serif; font-size: 25px; font-weight: 700; color: #000; line-height: 34px; text-align: left;">

                                                            <?php

                                                            //echo price($value['product_price']) . " (" . $value['order_item_qty'] . ")";
                                                            echo price($value['order_item_price']) . " (" . $value['order_item_qty'] . ")";
                                                            ?>



                                                        </td>

                                                    </tr>

                                                    <tr>

                                                        <td width="100%" height="10" class="RespoHideMedium"></td>

                                                    </tr>

                                                    <!-- // Horizontal Spacer \\ -->

                                                    <tr>

                                                        <!--<td width="100%" mc:edit="ZigZag01_text" class="RespoHideMedium" style="font-family: Arial, sans-serif; font-size: 16px; font-weight: normal; color:#000; line-height: 18px; text-align: left;padding-bottom: 5px"> <?php /*echo truncate($value['product_desc'],50)*/?>  </td>-->

                                                        <td width="100%" mc:edit="ZigZag01_text" class="RespoHideMedium" style="font-family: Arial, sans-serif; font-size: 16px; font-weight: normal; color:#000; line-height: 18px; text-align: left;padding-bottom: 5px">

                                                            <?php

                                                            if(array_filled($addons)){?>

                                                                <ul>

                                                                    <?foreach($addons as $key1=>$value2):?>

                                                                        <li><?php echo $value2['addons_name'] . " - " . price($value2['addons_price']);?></li>

                                                                    <?php endforeach;?>

                                                                </ul>

                                                            <?}

                                                            ?>

                                                        </td>

                                                    </tr>

                                                    <!-- <tr>

                                                      <td width="100%" height="20"></td>

                                                    </tr> -->

                                                    <!-- // Horizontal Spacer \\ -->

                                                    <tr>

                                                        <td style="font-family: Arial, sans-serif;font-size: 16px;font-weight: normal; color: #333; line-height: 18px; text-align: left;">



                                                            <!-- <a href="#" target="_blank"><img src="https://www.appocta.com/email_templates3/btn_readMore.png" alt="" border="0" style="display: block;" mc:label="image" mc:edit="btn_readMore"/></a> --></td>

                                                    </tr>



                                                    <!-- // Horizontal Spacer \\ -->

                                                    </tbody>

                                                </table></td>





                                            <!--<td style="background-color: #fff;border-top: 2px solid #fff;padding: 13px;">

                                                <table width="100%" class="no-space" border="0" cellpadding="0" cellspacing="0" align="left" style="padding-left:0; padding-right:10px; margin-right: 0px;">

                                                    <tbody>

                                                    <tr>

                                                        <td width="100%" height="0"></td>

                                                    </tr>

                                                    <tr>

                                                        <td width="100%" mc:edit="ZigZag01_title" style="font-family:Georgia, Helvetica, Arial, sans-serif; font-size: 25px; font-weight: 700; color: #000; line-height: 34px; text-align: left;">

                                                            <?php

                                            /*                                                            echo price($value['product_price']) . " - (" . $value['order_item_qty'] . ")";*/?>



                                                        </td>

                                                    </tr>

                                                    <tr>

                                                        <td width="100%" height="10" class="RespoHideMedium"></td>

                                                    </tr>

                                                    </tbody>

                                                </table>

                                            </td>-->



                                        </tr>

                                        </tbody>

                                    </table>



                                    <!-- // End Module: 1st ZigZag\\ --></td>

                            </tr>

                        <?php } } ?>





















                    <tr>

                        <td align="left" valign="top"><!-- // Begin Module: 1st ZigZag\\ -->



                            <table bgcolor="#fff" class="BoxWrap" width="100%" align="center" cellpadding="0" cellspacing="0" mc:repeatable="">

                                <tbody>







                                <tr>



                                    <td style="background-color: #fff;     border: 1px solid #ddd;padding: 14px 73px 21px; ">

                                        <table width="100%" class="no-space" border="0" cellpadding="0" cellspacing="0" align="left" style="padding-left:0; padding-right:10px;">

                                            <tbody>



                                            <!-- // Horizontal Spacer \\ -->

                                            <!--<tr>

                                                <td width="20%" style="font-family:Georgia, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: normal; color: #000; line-height: 34px; text-align: left;"> Subtotal:  </td>

                                                <td width="100%" style="font-family:Georgia, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: normal; color: #000; line-height: 34px; text-align: left;"><?php /*echo price($total)*/?>  </td>

                                            </tr>-->



                                            <!-- // Horizontal Spacer \\ -->



                                            <!-- // Horizontal Spacer \\ -->

                                            <!--<tr>

                                                <td width="80%" style="font-family:Georgia, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: normal; color: #000; line-height: 34px; text-align: left;"> Shiping and Handling:  </td>

                                                <td width="20%" style="font-family:Georgia, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: normal; color: #000; line-height: 34px; text-align: left;"> <?php /*echo price($this->shipping); */?>  </td>

                                            </tr>-->



                                            <!-- // Horizontal Spacer \\ -->



                                            <!--<tr>-->

                                            <!--  <td width="100%" style="font-family:Georgia, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: normal; color: #000; line-height: 34px; text-align: left;">  Free Shiping:   </td>-->

                                            <!--<td width="100%" style="font-family:Georgia, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: normal; color: #000; line-height: 34px; text-align: left;"> $234  </td>-->

                                            <!--</tr>-->





                                            <!-- // Horizontal Spacer \\ -->



                                            <!-- <tr>

                                              <td width="100%" style="font-family:Georgia, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: normal; color: #000; line-height: 34px; text-align: left;"> Tax:   </td>

                                            <td width="100%" style="font-family:Georgia, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: normal; color: #000; line-height: 34px; text-align: left;"> $0  </td>

                                            </tr> -->



                                            <!-- // Horizontal Spacer \\ -->



                                            <tr>

                                                <td width="100%" style="font-family:Georgia, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: normal; color: #000; line-height: 40px; text-align: left;"> Sub Total:   </td>

                                                <td width="100%" style="font-family:Georgia, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 800; color: #000; line-height: 34px; text-align: left;"> <?php echo price($order_detail['order_total'] + $this->shipping)?>  </td>

                                            </tr>

                                            <tr>

                                                <td width="100%" style="font-family:Georgia, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: normal; color: #000; line-height: 40px; text-align: left;"> Tax:   </td>

                                                <td width="100%" style="font-family:Georgia, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 800; color: #000; line-height: 34px; text-align: left;"> <?php echo price($order_detail['order_tax'])?>  </td>

                                            </tr>

                                            <tr>

                                                <td width="100%" style="font-family:Georgia, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: normal; color: #000; line-height: 40px; text-align: left;"> Shipping:   </td>

                                                <td width="100%" style="font-family:Georgia, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 800; color: #000; line-height: 34px; text-align: left;"> <?php echo price($order_detail['order_shipping'])?>  </td>

                                            </tr>

                                            <tr>

                                                <td width="100%" style="font-family:Georgia, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: normal; color: #000; line-height: 40px; text-align: left;"> Total:   </td>

                                                <td width="100%" style="font-family:Georgia, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 800; color: #000; line-height: 34px; text-align: left;"> <?php echo price($order_detail['order_amount'] + $this->shipping)?>  </td>

                                            </tr>



                                            <!-- // Horizontal Spacer \\ -->



                                            <!--<tr>-->

                                            <!--  <td width="100%" style="font-family:Georgia, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: normal; color: #000; line-height: 40px; text-align: left;">  Paid By Visa:   </td>-->

                                            <!--<td width="100%" style="font-family:Georgia, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; color: #000; line-height: 34px; text-align: left;"> $234  </td>-->

                                            <!--</tr>-->







                                            <!-- // Horizontal Spacer \\ -->

                                            </tbody>

                                        </table>

                                    </td>

                                </tr>

                                </tbody>

                            </table>



                            <!-- // End Module: 1st ZigZag\\ --></td>

                    </tr>





                    <!-- // ********************************************************************************************************* \\ -->





                    <tr>

                        <td align="left" valign="top"><!-- // Begin Module: 1st ZigZag\\ -->



                            <table  class="BoxWrap" width="100%" align="center" cellpadding="0" cellspacing="0" mc:repeatable="">

                                <tbody>

                                <tr>



                                <tr>

                                    <td width="655" style="width: 655px; font-size: 16px; line-height: 20px; text-align: left; font-weight: 400;color: #000; margin-bottom:10px;display: block; margin-top: 10px; font-family: Georgia, Helvetica,  Arial, sans-serif;" >

                                        If you have any questions regarding this order, you may email us at <a href="mailto:<?php echo g('db.admin.email_contact_us')?>"> <?php echo g('db.admin.email_contact_us')?></a>

                                    </td> </tr>



                                <tr>

                                    <td width="655" style="width: 655px; font-size: 16px; line-height: 20px; text-align: left; font-weight: 600;color: #000; margin-bottom:10px;display: block; margin-top: 10px; font-family: Georgia, Helvetica,  Arial, sans-serif;" >Thank you,  </td> </tr>



                                <tr>

                                    <td width="655" style="width: 655px; font-size: 16px; line-height: 20px; text-align: left; font-weight: 600;color: #0275bf; margin-bottom:10px;display: block; margin-top: 10px; font-family: Georgia, Helvetica,  Arial, sans-serif;" ><?php echo g('site_name')?>  </td> </tr>



                                </tr>

                                </tbody>

                            </table>



                            <!-- // End Module: header Confirmation\\ --></td>

                    </tr>







                </table>

            </td>

        </tr>

    </table>

    <!--Table End-->

</div>

</body>

</html>