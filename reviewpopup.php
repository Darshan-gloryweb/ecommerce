<!-- Write Review Popup -->



<div id="overlay1">

  <div><span style="background-color:#CFBDF0; display:block; height:50px; border-radius:4px;">

    <h1 style="color:#FFFFFF; text-align:center;padding-top: 10px;">Write Your Review</h1>

    <a onclick="close_modal1()"><img src="<?=$frontpath?>/images/close-icon.png" alt="Close" width="28" height="27" style="float:right; margin-top: -24px;margin-right:9px;"></a></span>

    <table align="center" id="inq_form">

      <tr id="TrRegister">

        <td><table id="inq_table" cellpadding="0" cellspacing="0">

            <form id="WriteReview" name="WriteReview">

              <tr>

                <td><b>First Name:</b></td>

                <td><input name="fname" id="fname" type="text" class="textbox"></td>

              </tr>

              <tr>

                <td><b>Last Name:</b></td>

                <td><input name="lname" id="lname" type="text" class="textbox"></td>

              </tr>

              <tr>

                <td><b>Email Id:</b></td>

                <td><input name="email" id="email" type="text" class="textbox"></td>

              </tr>

              <tr>

                <td><b>Rating:</b></td>

                <td><select name="rating" id="rating" class="textbox" style="width:200px;">

                    <option value="">--Select Rating--</option>

                    <option value="1">1</option>

                    <option value="2">2</option>

                    <option value="3">3</option>

                    <option value="4">4</option>

                    <option value="5">5</option>

                  </select></td>

              </tr>

              <tr>

                <td><b>Review:</b></td>

                <td><textarea name="comment" id="comment" cols="5" rows="5" class="textbox"></textarea></td>

              </tr>

              <tr>

                <td><input type="hidden" name="hidpid" id="hidpid" value="<?=$rows['ProductID']?>" />

                  <input type="hidden" name="url" id="url" value="http://<?=$_SERVER['HTTP_HOST'].'/'.$_SERVER['REQUEST_URI']?>" /></td>

                <td><input type="button" value="Submit" onclick="return validatereview(WriteReview)" style="background-color:#CFBDF0;color:#fff; font-weight:bold;"></td>

              </tr>

            </form>

          </table></td>

      </tr>

    </table>

  </div>

</div>

<!-- Write Review Popup -->