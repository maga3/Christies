<section class="row m-3 m   -lg-5" style="background-color: #f4f5f7;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-6 mb-4">
                <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-12">
                            <div class="card-body p-4">
                                <h6>Information</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Email</h6>
                                        <p class="user text-muted"></p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Phone</h6>
                                        <p class="phone text-muted"></p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Tokens</h6>
                                        <p class="tokens text-muted"></p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6><a href="../../index.php/logout" id="logoutBtn" class="btn btn-warning">Logout</a>
                                        </h6>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-outline-info" data-bs-toggle="modal"
                                                data-bs-target="#editModal">
                                            Edit
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="editModal" data-bs-backdrop="static"
                                             data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel"
                                             aria-hidden="true">
                                            <form action="../../index.php/users/process" method="post">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="editModalLabel">
                                                                Edit</h1>
                                                            <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="container">
                                                                <div class="col">
                                                                    <div class="row d-flex justify-content-center align-items-center">
                                                                        <h4 class="h4">Email</h4>
                                                                        <label for="email">
                                                                            <input class="form-control" type="email"
                                                                                   name="email" id="email"
                                                                                   maxlength="40">
                                                                            <input hidden name="actualEmail"
                                                                                   id="actualEmail">
                                                                        </label>
                                                                    </div>
                                                                    <div class="row d-flex justify-content-center align-items-center">
                                                                        <h4 class="h4">Tel</h4>
                                                                        <label for="tel">
                                                                            <input class="form-control" type="tel"
                                                                                   name="tel" id="tel" maxlength="16">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close
                                                            </button>
                                                            <button type="submit" class="btn btn-info"
                                                                    id="modalChangesForm">Done
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                    <div class="col-6 mb-3">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                data-bs-target="#modalDelete">
                                            Delete
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modalDelete" data-bs-backdrop="static"
                                             data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDeleteLabel"
                                             aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="modalDeleteLabel">Modal
                                                            title</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete your account?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close
                                                        </button>
                                                        <button type="button" class="deleteBtn btn btn-danger"><a>Delete
                                                                account</a></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center mb-5">
            <h3 class="h3 display-6 d-flex justify-content-center align-items-center">Comments</h3>
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                    <div class="card-body p-4 comments">

                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center mb-5">
            <h3 class="h3 display-6 d-flex justify-content-center align-items-center">My objects</h3>
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                    <div class="card-body p-4 products">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="js/user.js"></script>
<script src="js/validations.js"></script>
