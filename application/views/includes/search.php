<div class="row m-0 p-0">
    <div class="col-12  p-0   my-3 ">
        <div class="row  h-100 m-0 text-center py-4 ">
            <div class="col-12 col-sm-8 mx-auto  text-primary  ">
                <h2 class="font-weight-bold text-uppercase ">Find Your Topic
                </h2>
                <small class="text-secondary">Conference Document Activity News Update
                </small><br>

                <form id="search" method="POST" class="my-4" action="<?php echo base_url('main/search') ?>">
                    <div class="input-group mb-3 ">
                        <input type="text" class="form-control py-4" id="search" name="search" placeholder="Find this website...">
                        <div class="btn-group" role="group">
                            <button class="btn btn-primary input-group-text" type="submit" id="search_btn" value="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>