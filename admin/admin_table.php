
    <table class="table table-hover">
        <thead>
            <tr>
            <?php foreach($keys as $key):?>
            <th scope="col"><?php echo $key; ?></th>
            <?php endforeach;?>
            <th>Action</th>
            <th></th>
            
            </tr>
        </thead>
        <tbody>
            <?php foreach($rows as $row): ?>
            <tr>
                <?php foreach($keys as $key): ?>
                <td>
                    <?php echo $row[$key]; ?>
                </td>
                <?php endforeach; ?>
                <td><a href="<?php echo $link . $row[$key_for_id]; ?>" class="btn btn-primary">View Detail</a></td>
            </tr>
    <?php endforeach; ?>
        </tbody>
    </table>