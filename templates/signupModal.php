<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="signupModalLabel">-- Signup --</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="templates/signup.php" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <?php
                            // $randum = randum();
                            // $randumcheck = time();
                            // $_SESSION['randumcheck'] = $randumcheck;
                            ?>
                            <input type="hidden" value="<?php echo $_SERVER['REQUEST_URI']; ?>" name="current_url" />
                            <!-- <input type="hidden" value="<?php //echo $randumcheck; ?>" name="randumcheck" /> -->
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputname" class="form-label">Name</label>
                            <input type="text" class="form-control" id="exampleInputname"
                                aria-describedby="nameHelp" placeholder="abc xyz" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="abc123@abc.abc" name="email" required>
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword2"
                                name="confirm_password" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputDOB" class="form-label">D.O.B.</label>
                            <input type="date" class="form-control" id="exampleInputDOB" name="dob" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPhone" class="form-label">Phone Number</label>
                            <input type="tel" name="phone_number" placeholder="888 888 8888"
                                pattern="[0-9]{3}[0-9]{3}[0-9]{4}" maxlength="12" title="Ten digits code" required
                                class="form-control" id="exampleInputPhone" list="defaultTels">
                            <datalist id="defaultTels">
                                <option value="111-1111-1111"></option>
                                <option value="122-2222-2222"></option>
                                <option value="333-3333-3333"></option>
                                <option value="344-4444-4444"></option>
                            </datalist>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputGender" class="form-label">Gender</label>
                            <div class="container d-flex justify-content-evenly" id="exampleInputGender">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="Male" value="Male" name="gender">
                                    <label class="form-check-label" for="Male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="Female" value="Female"
                                        name="gender">
                                    <label class="form-check-label" for="Female">Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="Other" value="Other" name="gender">
                                    <label class="form-check-label" for="Other">Other</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="styleBtn styleBtn-black" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="styleBtn styleBtn-pink">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>