<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("dash_board_header.php");
require_once("dash_board_subscribers_search.php");
?>

    <hr/>

    <div class="row">
        <div class="col-md-8 order-md-1">

            <h5 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">
              <span data-feather="user"></span> Profile
            </span>
            </h5>

            <?php echo form_open('/dashboard/subscriber/view?id=' . $pageData['id']); ?>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstName">First name</label>
                    <input type="text" class="form-control" id="firstName" placeholder="First name" readonly
                           value="<?php echo $pageData['profile']->user_first_name; ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lastName">Last name</label>
                    <input type="text" class="form-control" id="lastName" placeholder="Last name" readonly
                           value="<?php echo $pageData['profile']->user_last_name; ?>">
                </div>
            </div>

            <div class="mb-3">
                <label for="username">Email address</label>
                <div class="input-group">
                    <input type="email" class="form-control" id="username" placeholder="Email address" readonly
                           value="<?php echo $pageData['profile']->user_email; ?>">
                </div>
            </div>

            <div class="mb-3">
                <label for="address">Company name</label>
                <input type="text" class="form-control" id="address" placeholder="Company name" readonly
                       value="<?php echo $pageData['profile']->user_company; ?>">
            </div>

            <div class="mb-3">
                <label for="address">Status</label>
                <select id="inputState" class="form-control" name="status">
                    <option selected disabled="true">Select</option>
                    <option disabled="true" <?php if ($pageData['profile']->status == "NEW") {
                        echo "selected";
                    } ?>>New
                    </option>
                    <option <?php if ($pageData['profile']->status == "ACTIVE") {
                        echo "selected";
                    } ?> value="2">Active
                    </option>
                    <option <?php if ($pageData['profile']->status == "SUSPENDED") {
                        echo "selected";
                    } ?> value="3">Suspended
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <label for="address">Plan</label>
                <select id="inputState" class="form-control" name="plan">
                    <option selected disabled="true">Select</option>
                    <option <?php if ($pageData['profile']->plan == "NONE") {
                        echo "selected";
                    } ?> value="1">None
                    </option>
                    <option <?php if ($pageData['profile']->plan == "FREE") {
                        echo "selected";
                    } ?> value="2">Free
                    </option>
                </select>
            </div>

            <!-- <div class="mb-3">
              <label for="password">Password</label>
              <input type="text" class="form-control" id="password" placeholder="Enter your new password here">
            </div>

            <div class="mb-3">
              <label for="repassword">Re-enter password</label>
              <input type="text" class="form-control" id="repassword" placeholder="Re-enter your new password">
            </div> -->

            <!--
            //TODO this is the country selection,
            //disabled to enable later if needed.

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Country</label>
                <select class="custom-select d-block w-100" id="country" required>
                  <option value="">Choose...</option>
                  <option>United States</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <select class="custom-select d-block w-100" id="state" required>
                  <option value="">Choose...</option>
                  <option>California</option>
                </select>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" placeholder="" required>
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div> -->

            <!-- <hr class="mb-4"> -->
            <div class="row">
                <div class="col-md-6">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Update</button>
                </div>
            </div>
            </form>
        </div>

        <div class="col-md-4 order-md-2 mb-4">

            <h5 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">
              <span data-feather="file-text"></span> Summary
            </span>
            </h5>

            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Employees</h6>
                        <small class="text-muted">Number of employees</small>
                    </div>
                    <span class="text-muted">12</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Work places</h6>
                        <small class="text-muted">Number of work places</small>
                    </div>
                    <span class="text-muted">03</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Registered</h6>
                        <small class="text-muted">Date of registered</small>
                    </div>
                    <span class="text-muted"><?php echo $pageData['profile']->user_created; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Updated</h6>
                        <small class="text-muted">Date of last updated</small>
                    </div>
                    <span class="text-muted"><?php echo $pageData['profile']->user_last_updated; ?></span>
                </li>
            </ul>

            <!-- <form class="card p-2">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Promo code">
                <div class="input-group-append">
                  <button type="submit" class="btn btn-secondary">Redeem</button>
                </div>
              </div>
            </form> -->
        </div>
    </div>


<?php
require_once("dash_board_footer.php");