<fieldset>
    <div class="form-group">
        <label for="image">Url obrazka *</label>
          <input type="text" name="image" value="<?php echo htmlspecialchars($edit ? $product['image'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Obrazek" class="form-control" required="required" id = "image" >
    </div>
    <div class="form-group">
        <label for="description">Opis *</label>
            <input  type="text" name="description" value="<?php echo htmlspecialchars($edit ? $product['description'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Opis" class="form-control" required="required" id="description">
    </div>

    <div class="form-group">
        <label for="price">Cena *</label>
        <input  type="text" name="price" value="<?php echo htmlspecialchars($edit ? $product['price'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Cena" class="form-control" required="required" id="price">
    </div>

    <div class="form-group">
        <label for="currency">Waluta *</label>
        <input  type="text" name="currency" value="<?php echo htmlspecialchars($edit ? $product['currency'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Waluta" class="form-control" required="required" id="currency">
    </div>

    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Zapisz <span class="glyphicon glyphicon-send"></span></button>
    </div>            
</fieldset>
