<div class="container mb-5 mt-3">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-xl-9">

            <h1 class="text-black mb-4">Contact Us</h1>

            <div class="card" style="border-radius: 20px;">
                <div class="card-body">
                    <form action="../../index.php/contact/process" method="post">
                        <div class="row align-items-center pt-4 pb-3">
                            <div class="col-md-3 ps-5">
                                <h6 class="mb-0">Name</h6>
                            </div>
                            <div class="col-md-9 pe-5">
                                <label class="w-100">
                                    <input type="text" id="name" class="form-control form-control-lg" maxlength="25"
                                           placeholder="name" name="name" required/>
                                </label>
                            </div>
                        </div>

                        <hr class="mx-n3">

                        <div class="row align-items-center py-3">
                            <div class="col-md-3 ps-5">
                                <h6 class="mb-0">Email address</h6>
                            </div>
                            <div class="col-md-9 pe-5">
                                <label class="w-100">
                                    <input type="email" id="email" name="email" class="form-control form-control-lg"
                                           maxlength="40"
                                           placeholder="example@example.com" required/>
                                </label>
                            </div>
                        </div>

                        <hr class="mx-n3">

                        <div class="row align-items-center py-3">
                            <div class="col-md-3 ps-5">
                                <h6 class="mb-0">Query about</h6>
                            </div>
                            <div class="col-md-9 pe-5">
                                <label class="w-100">
                                    <textarea class="form-control" rows="3" name="query" id="addANote"
                                              placeholder="Message" required maxlength="550"></textarea>
                                </label>
                            </div>
                        </div>

                        <hr class="mx-n3">

                        <div class="px-5 py-4 d-flex justify-content-center">
                            <label>
                                <input type="submit" id="submit" class="btn btn-outline-success btn-lg"/>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

