<div id="user">
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="row">
                        <div class="col-sm-5 model-left">
                            <p class="sMons">
                                Are you a Merchant.?
                            </p>
                            <a href="./merchant/login.php">
                                <button class="borderBtn">
                                    Signin as a Merchant
                                </button>
                            </a>
                        </div>
                        <div class="col-sm-7 pa0">
                            <div class="modal-header">
                                <h5 class="modal-title bold headline2" id="login">Login</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="login_form" method="post">
                                    <div class="alert alert-danger" id="error_log" role="alert">
                                    
                                    </div>
                                    <div class="alert alert-success" id="success_log" role="alert">
                                        
                                    </div>
                                    <input type="email" id="log_email" class="form-control mt-3" placeholder="Email" required />
                                    <input type="password" id="log_password" class="form-control mt-3" placeholder="Password" required />
                                    <button class="fr__btn mt-3" id="login_submit_btn" type="submit">
                                        login
                                    </button>
                                </form>
                            </div>
                            <div class="modal-footer mt-3">
                                <div class="row wa">
                                    <div class="col-sm-12">
                                        <a data-toggle="modal" data-target="#signup" data-dismiss="modal">
                                            Don't have an account Signup.?
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