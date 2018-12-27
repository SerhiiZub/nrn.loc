<?php
/**
 * Created by PhpStorm.
 * User: Serdg
 * Date: 023 23.12.18
 * Time: 20:42
 *
 * @var array $params
 * @var EventOrganizers $organizer
 * @var EventOrders $order
 */
?>
<div class="row" style="text-align: center; color: grey; margin-top: 50px">
    <h3>Перенаправленя на сторінку оплати</h3>

    <?php $this->widget('application.modules.Event.widgets.LiqpayBtnWidget',[
        'cost' => $order->amount,
        'public_key' => $organizer->public_key,
        'private_key' => $organizer->private_key,
        'params' => $params,
    ]);
    ?>

    <script>
        $(document).ready(function(){
            // $('form').submit();
        });
    </script>
</div>
