<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-lg-offset-2" >

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Bootstrap Form</h3>
                </div>
                <div class="panel-body">

                    <form action="" method="post">
                        <div class="form-group">
                            <label>Type</label>
                            <select class="form-control" id="type" name="type">
                                <option value="">Select type</option>
                                <option value="1">IN</option>
                                <option value="2">OP</option>
                                <option value="3">PO</option>
                                <option value="4">OC</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Level</label>
                            <select class="form-control" id="level" name="level">
                                <option value="">Select level</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" id="category" name="category">
                                <option value="">Select category</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Numerator</label>
                            <input type="text" class="form-control" id="numerator" name="numerator" placeholder="Numerator">
                        </div>

                        <div class="form-group">
                            <label>Denominator</label>
                            <input type="text" class="form-control" id="denominator" name="denominator" placeholder="Denominator">
                        </div>

                        <button type="submit" name="btn_submit"  class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>



            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Add Category</h3>
                </div>
                <div class="panel-body">

                    <form action="" method="post">
                        <div class="form-group">
                            <label>Category</label>
                            <input type="text" class="form-control" id="category" name="category" placeholder="Category">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="5" id="description" name="description" placeholder="Category description goes here"></textarea>
                        </div>

                        <button type="submit" name="btn_submit"  class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>



            
        </div>

 
    </div>
</div>
