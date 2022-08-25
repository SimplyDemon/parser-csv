<form action="/parser/" method="post" name="upload_excel" enctype="multipart/form-data">
    <div class="form-row">
        <div class="col">
            <input type="text" class="form-control" id="separator" name="separator" value="," maxlength="1" required>
            <label for="separator">Separator</label>
        </div>

        <div class="col">
            <input type="file" class="form-control-file" name="csv" id="csv" accept=".csv" required>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>

</form>
