<fieldset>
    <div class="form-group">
        <label for="username">Nazwa użytkownika *</label>
          <input type="text" name="username" value="<?php echo htmlspecialchars($edit ? $user['username'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Imię" class="form-control" required="required" id = "usermname" >
    </div>
    <div class="form-group">
        <label for="email">Email *</label>
            <input  type="email" name="email" value="<?php echo htmlspecialchars($edit ? $user['email'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Adres E-Mail" class="form-control" required="required" id="email">
    </div>

    <div class="form-group">
        <label for="password">Hasło *</label>
        <input  type="text" name="password" value="<?php echo htmlspecialchars($edit ? $user['password'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Hasło" class="form-control" required="required" id="password">
    </div>

    <div class="form-group">
        <label for="admin">Admin (1-tak, 0-nie) *</label>
        <input  type="text" name="admin" value="<?php echo htmlspecialchars($edit ? $user['admin'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Admin" class="form-control" required="required" id="admin">
    </div>

    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Zapisz <span class="glyphicon glyphicon-send"></span></button>
    </div>            
</fieldset>
