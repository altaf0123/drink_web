<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Invoice</title>
<style>
body {
  color: #666;
  font: 14px/24px "Open Sans", "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", Sans-Serif;
}
/*table {*/
/*  border-collapse: separate;*/
/*  border-spacing: 0;*/
/*  width: 100%;*/
/*}*/
/*th,*/
/*td {*/
/*  padding: 6px 15px;*/
/*}*/
/*th {*/
/*  background: #42444e;*/
/*  color: #fff;*/
/*  text-align: left;*/
/*}*/
/*tr:first-child th:first-child {*/
/*  border-top-left-radius: 6px;*/
/*}*/
/*tr:first-child th:last-child {*/
/*  border-top-right-radius: 6px;*/
/*}*/
/*td {*/
/*  border-right: 1px solid #c6c9cc;*/
/*  border-bottom: 1px solid #c6c9cc;*/
/*}*/
/*td:first-child {*/
/*  border-left: 1px solid #c6c9cc;*/
/*}*/
/*tr:nth-child(even) td {*/
/*  background: #eaeaed;*/
/*}*/
/*tr:last-child td:first-child {*/
/*  border-bottom-left-radius: 6px;*/
/*}*/
/*tr:last-child td:last-child {*/
/*  border-bottom-right-radius: 6px;*/
/*}*/
</style>
</head>
<body class="bg-grey">
<div class="container">   
  <div class="invoice-container" ref="document" id="html">
     <table style="width:100%; height:auto;  text-align:center; " BORDER=0 CELLSPACING=0>
       <thead style="background:#fafafa; padding:8px;">
         <tr style="font-size: 20px;">
           <td colspan="4" style="padding:20px 20px;text-align: left;">DRINK WEB</td>
         </tr>
       </thead>
       <tbody style="background:#ffff;padding:20px;">
         <tr>
           <td colspan="4" style="padding:20px 0px 0px 20px;text-align:left;font-size: 16px; font-weight: bold;color:#000;">Hello, <?= $records[0]->user_name ?? "Not found"; ?></td>
         </tr>
         <tr>
           <td colspan="4" style="text-align:left;padding:10px 10px 10px 20px;font-size:14px;">Your order details</td>
         </tr>
       </tbody>
     </table>
     <table style="width:100%; height:auto; background-color:#fff;text-align:center; padding:10px; background:#fafafa">
       <tbody>
         <tr style="color:#6c757d; font-size: 20px;">
           <td style="border-right:1.5px dashed  #DCDCDC; width:25%;font-size:12px;font-weight:700;padding: 0px 0px 10px 0px;">Order Date</td>
           <td style="border-right: 1.5px dashed  #DCDCDC ;width:25%;font-size:12px;font-weight:700;padding: 0px 0px 10px 0px;">Order No.</td>
           <td style="border-right:1.5px dashed  #DCDCDC ;width:25%;font-size:12px;font-weight:700;padding: 0px 0px 10px 0px;">Payment</td>
           <td style="width:25%;font-size:12px;font-weight:700;padding: 0px 0px 10px 0px;">Shipping Address</td>
         </tr>
         <tr style="background-color:#fff; font-size:12px; color:#262626;">
           <td style="border-right:1.5px dashed  #DCDCDC ;width:25%; font-weight:bold;background: #fafafa;"><?= $records[0]->ord_date ?? "Not found"; ?></td>
           <td style="border-right:1.5px dashed  #DCDCDC ;width:25% ; font-weight:bold;background: #fafafa;">POST#<?= $records[0]->ord_id ?? "Not found"; ?></td>
           <td style="border-right:1.5px dashed  #DCDCDC ;width:25%; font-weight:bold;background: #fafafa;">CASH</td>
           <td style="width:25%; font-weight:bold;background: #fafafa;"><?= ucwords($records[0]->pay_status); ?></td>
         </tr>
       </tbody>
     </table>
     <table style="width:100%; height:auto; background-color:#fff; margin-top:0px;  padding:20px; font-size:12px; border: 1px solid #ebebeb; border-top:0px;">
       <thead>
         <tr style=" color: #6c757d;font-weight: bold; padding: 5px;">
           <td colspan="1" style="text-align: left;">PRODUCT</td>
           <!--<td style="text-align: center;">SIZE</td>-->
           <td style="text-align:center;">QUANTITY</td>
           <td style="text-align: right;padding: 10px;">PRICE</td>
         </tr>
       </thead>
       <tbody>
         <?php
         if(!empty($records)): $sum=0; foreach($records as $row): $sum += $row->prod_price ?? "Not found"; ?>
         <tr>
           <!--<td style="width:10%; ">-->
           <!--  <a href=""><img src="https://images.asos-media.com/products/asos-design-puff-sleeve-linen-mini-dress-with-pearl-buttons/13307266-1-black?$XXL$&wid=513&fit=constrain" style="width:100px;" /></a>-->
           <!--</td>-->
           <td style="width:20%;"><?= $row->prod_name ?? "Not found"; ?></td>
           <!--<td style="width:20%;padding: 10px; text-align:center;"> S</td>-->
           <td style="width:20%;padding: 10px;text-align: center;"><?= $row->quantity ?? "Not found"; ?></td>
           <td style="width:30%; ;font-weight: bold;font-size: 14px;">
             <table style="width:100%;">
               <tr><td style="text-align:right;font-size:13px;"><?= $row->prod_price ?? "Not found"; ?>$</td></tr>
             </table>
           </td>
         </tr>
         <?php endforeach; endif; ?>
       </tbody>
     </table>
     <table style="width:100%; height:auto; background-color:#fff;padding:20px; font-size:12px; border: 1px solid #ebebeb; border-top:0">
       <tbody>
         <tr style="padding:20px;color:#000;font-size:15px">
           <td style="font-weight: bold;padding:5px 0px">Total</td>
           <td style="text-align:right;padding:5px 0px;font-weight: bold;font-size:16px;"><?= $records[0]->ord_amount ?? "Not found"; ?>$</td>
         </tr>

         <tr>
           <td colspan="2" style="font-weight:bold;"><span style="color:#c61932;font-weight: bold;">THANK YOU</span> for shopping with us!</td>
         </tr>
         <tr>
           <td colspan="2" style="font-weight:bold;text-align:left;padding:5px 0px 0px 00px;font-size:14px;">Drink Web<span></span> Team</td>
         </tr>
       </tbody>
       <tfoot style="padding-top:20px;font-weight: bold;">
         <tr>
           <td style="padding-top:20px;">Need help? Contact us <span style="color:#c61932"> info@drinkweb.com </span></td>
         </tr>
       </tfoot>
     </table>
</div>
</div>
</body>
</html>