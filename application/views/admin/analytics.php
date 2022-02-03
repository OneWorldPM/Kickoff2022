<div class="main-content">
    <div class="wrap-content container" id="container">

        <div class="row">
            <div class="col-sm-12 margin-top-5 margin-bottom-5">
                <span class="mainTitle" style="font-size: 30px">Analytics</span>
            </div>
        </div>

<!--        --><?php //print_r($analytics)?>
        <!-- start: FEATURED BOX LINKS -->
        <div class="container-fluid container-fullw bg-white">
            <div class="row">
                <table id="analyticsTable" class="table-bordered" style="width:100%">
                    <thead style="font-size: 15px;">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Page Visited</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody style="font-size: 15px;">
                        <?php
                        $count ='';
                        if(isset($analytics) && !empty($analytics)){
                            foreach ($analytics as $index=>$analytic) {
                                $count ++;
                                ?>
                                <tr>
                                    <td><?=($index+1)?></td>
                                    <td><?=$analytic->first_name." ".$analytic->last_name?></td>
                                    <td><?=$analytic->page_name?></td>
                                    <td><?=$analytic->activity_date_time?></td>
                                </tr>
                        <?php
                            }
                        }?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4"><strong class="text-success">TOTAL UNIQUE USER VISITS: <?=$count?></strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready( function () {
        $('#analyticsTable').DataTable();
    } );
</script>
