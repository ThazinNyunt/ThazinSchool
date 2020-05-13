
<?php
//include('form_library.php');
//$field_names = ['coursename', 'description', 'image_url', 'note'];
?>

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
                placeholder="Enter <?php echo $field->label;?>" required><?php if($field->value!=null){echo $field->value;} ?></textarea>

            <?php elseif($field->type == 'select'): ?>
                <select class='form-control' name="<?php echo $field->name; ?>" 
                placeholder="Enter <?php echo $field->label;?>" required><?php if($field->value!=null){echo $field->value;} ?>
                  <?php foreach($field->options as $option): ?>
                    <option value="<?php echo $option->key ?>">
                      <?php echo $option->value; ?> 
                    </option>
                  <?php endforeach; ?>
                </select>    
            
            <?php else: ?>
            <input type="text" class="form-control" name="<?php echo $field->name;?>" 
                <?php if($field->value!=null): ?> 
                value="<?php echo $field->value;?>" 
                <?php endif;?>
                placeholder="Enter <?php echo $field->label;?>" required>
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