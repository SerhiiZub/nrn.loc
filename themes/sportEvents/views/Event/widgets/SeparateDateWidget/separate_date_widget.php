<?php
/**
 * Created by PhpStorm.
 * User: Serdg
 * Date: 004 04.12.18
 * Time: 21:13
 */

?>
<div class="row" id="separate-date">
    <div class="form-group">
        <div class="col-sm-4">
            <select name="day" class="popover-help form-control input-group">
                <?php for($i=1;$i<=31;$i++):?>
                    <?php $day=$i;?>
                    <!--        --><?php //$day=date('d',strtotime("first day of -$i month"));?>
                    <option data-name='day' data-value='<?php echo $day;?>'><?php echo $day;?></option>
                <?php endfor;?>
            </select>
        </div>
        <div class="col-sm-4">
            <select name="month" class="popover-help form-control input-group">
                <?php for($i=0;$i<=11;$i++):?>
                    <?php $month=date('F',strtotime("first day of -$i month"));?>
                    <option data-name='month' data-value='<?php echo 12-$i;?>'><?php echo $month;?></option>
                <?php endfor;?>
            </select>
        </div>
        <div class="col-sm-4">
            <select name="year" class="popover-help form-control input-group">
                <?php for($i=0;$i<=100;$i++):?>
                    <?php $year=date('Y',strtotime("last day of -$i year"));?>
                    <option data-name='year' data-value='<?php echo $year?>'><?php echo $year?></option>
                <?php endfor;?>
            </select>
        </div>
    </div>
    <input type="hidden" name="<?php echo $name.'['.$attribute.']';?>" id="<?php echo $name.'_'.$attribute?>">
    <script>
        var scope = $('#separate-date');
        scope.on('change', 'select', function () {
            var day = '';
            var month = '';
            var year = '';
            $( "select option:selected" ).each(function() {
                var name = $(this).data("name");
                var value = $(this).data("value");
                if (name === 'day'){
                    day = value;
                }
                if (name === 'month'){
                    month = value;
                }
                if (name === 'year'){
                    year = value;
                }
                $( "#<?php echo $name.'_'.$attribute?>" ).val(year + '-' + month + '-' + day);
            });

        });
        scope.find('select').trigger("change");
    </script>
</div>

