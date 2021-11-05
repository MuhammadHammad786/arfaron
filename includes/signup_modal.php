<div id="user">
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="signup" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="row">
                <div class="col-sm-5 model-left">
                    <p class="sMons">
                        Are you want to be a <br />Merchant.?
                    </p>
                    <a href="./merchant/signup.php">
                        <button class="borderBtn">
                            Signup as a Merchant
                        </button>
                    </a>
                </div>
                <div class="col-sm-7 pa0">
                    <div class="modal-header">
                        <h5 class="modal-title bold headline2" id="signup">Create Account</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="register_form" method="post">

                            <div class="alert alert-danger" id="error" role="alert">
                                
                            </div>
                            <div class="alert alert-success" id="success" role="alert">
                                
                            </div>

                            <input type="text" id="name" class="form-control" placeholder="Name" required />
                            <input type="email" id="email" class="form-control mt-3" placeholder="Email" required />
                            <input type="password" id="password" class="form-control mt-3" placeholder="Password" required />
                            <input type="password" id="c_password" class="form-control mt-3" placeholder="Confirm Password" required />
                            <button class="fr__btn mt-3" id="signup_submit_btn" type="submit">
                                Signup
                            </button>
                        </form>
                    </div>
                    <div class="modal-footer mt-3">
                        <div class="row wa">
                            <div class="col-sm-12">
                                <a data-toggle="modal" data-target="#login" data-dismiss="modal">
                                    Already have an account Signin.?
                                </a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>