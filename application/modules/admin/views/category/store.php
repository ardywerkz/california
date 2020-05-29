<div class="row">
    <div class="col-md-6">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Store List</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Store name</th>
                            <th>Date Added</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($store as $items) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $items->store_name ?></td>
                                <td><?= date("D, d M g:i:A", strtotime($items->created_at)) ?></td>

                            </tr>
                        <?php $i++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>