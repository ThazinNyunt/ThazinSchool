

<div class="container-fluid bg-white pt-4">
    <h1 align="center"><?php echo $form_title; ?></h1>
    <div class="container bg-white mt-4">

      <form action="<?php echo $form_action; ?>" method="post">

        <?php foreach($fields as $field): ?>

        <div class="form-group row">
            <label for="<?php echo $field->name;?>" class="col-sm-2 col-form-label">
                <?php echo $field->label;?>: 
            </label>
            <div class="col-sm-10">
            <?php if($field->type == 'textarea'): ?>
                <textarea class='form-control' name="<?php echo $field->name; ?>" 
                placeholder="Enter <?php echo $field->label;?>"></textarea>
            <?php else: ?>
            <input type="text" class="form-control" name="<?php echo $field->name;?>" 
                placeholder="Enter <?php echo $field->label;?>">
            <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
                
        <div class="form-group row">
          <div class="col-sm-10">
            
            <button type="submit" name="btnsave" class="btn btn-primary">Save</button>
        </div>

      </form>
    </div>
</div>