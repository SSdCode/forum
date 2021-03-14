<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" role="dialog" aria-labelledby="signupmodalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupmodalLabel">Signup to code-discuss</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="partials/signuphandler.php" method="post">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname">
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6 my-2">
                            <label for="Birth Date">Birth Date:</label>
                            <input type="date" id="bdate" name="bdate">
                        </div>
                        <div class="form-group col-md-6 my-2">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="gender">Gender :</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male" name="gender"
                                    value="male">
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female" name="gender"
                                    value="female">
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>
                    </div>







                    <div class="form-group">
                        <label for="Address">Address</label>
                        <input type="text" class="form-control" id="address" name="add1" placeholder="Main Address">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Address line 2</label>
                        <input type="text" class="form-control" id="address2" name="add2"
                            placeholder="Apartment, studio, or floor">
                    </div>




                    <div class="form-group my-2">
                        <label for="useremail">Email address</label>
                        <input type="email" maxlength="35" class="form-control" id="useremail" name="email">

                    </div>
                    <div class="form-group my-2">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="pass">
                    </div>
                    <div class="form-group my-2">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control" id="cpassword" name="cpass"
                            aria-describedby="passhelp">
                        <small id="passhelp" class="form-text text-muted">Make sure you enter same password.</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Signup</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>