<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="<?php echo base_url().'index.php/Registration/verify_company_staff_account'; ?>" method="post">
      <input type="hidden" name="company_staff_id" value="<?php echo $user[0]->Id; ?>">
      <div class="">
        <label for="">Email</label>
      <input type="email" name="email" value="<?php echo $user[0]->Email; ?>" disabled>
      </div>
      <div class="">
        <label for="">Phone Number</label>
      <input type="text" name="phone_number" value="<?php echo $user[0]->PhoneNumber; ?>" >
      </div>
      <div class="">
        <label for="">First Name</label>
      <input type="text" name="first_name" value="<?php echo $user[0]->FirstName; ?>">
      </div>
      <div class="">
        <label for="">Last Name</label>
      <input type="text" name="last_name" value="<?php echo $user[0]->LastName; ?>">
      </div>
      <div class="">
        <label for="">Password</label>
      <input type="password" name="password" value="<?php echo $user[0]->Password; ?>">
      </div>
      <div class="">
        <label for="">Confirm Password</label>
      <input type="password" name="c_password" value="">
      </div>
      <div class="">
      <button type="submit" name="button">Submit</button>
      </div>
    </form>
  </body>
</html>
