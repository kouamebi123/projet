<?php
include("inc/top2.php");
?>
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">
                                        Password Recovery
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="small mb-3 text-muted">
                                        Enter your email address and we will send you a link to reset your password.
                                    </div>
                                    <form>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
                                            <label for="inputEmail">Email address</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="login.php">Return to login</a>
                                            <a class="btn btn-primary" href="login.html">Reset Password</a
                        >
                      </div>
                    </form>
                  </div>
                  <div class="card-footer text-center py-3">
                    <div class="small">
                      <a href="login.php">Déja inscrit? se connecter ici</a>
                                        </div>
                                </div>
                                <?php
include("inc/bottom2.php");
?>