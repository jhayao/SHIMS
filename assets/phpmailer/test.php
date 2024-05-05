<?php

$OTP = rand(100000, 999999);
$test = <<<HTML
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Verify your login</title>
  </head>

  <body
    style="
      font-family: Helvetica, Arial, sans-serif;
      margin: 0px;
      padding: 0px;
      background-color: #ffffff;
    "
  >
    <table
      role="presentation"
      style="
        width: 100%;
        border-collapse: collapse;
        border: 0px;
        border-spacing: 0px;
        font-family: Arial, Helvetica, sans-serif;
        background-color: rgb(239, 239, 239);
      "
    >
      <tbody>
        <tr>
          <td
            align="center"
            style="padding: 1rem 2rem; vertical-align: top; width: 100%"
          >
            <table
              role="presentation"
              style="
                max-width: 600px;
                border-collapse: collapse;
                border: 0px;
                border-spacing: 0px;
                text-align: left;
              "
            >
              <tbody>
                <tr>
                  <td style="padding: 40px 0px 0px">
                    <div style="text-align: left">
                      <div style="padding-bottom: 20px">
                        <img
                          src="https://i.ibb.co/Qbnj4mz/logo.png"
                          alt="Company"
                          style="width: 56px"
                        />
                      </div>
                    </div>
                    <div
                      style="
                        padding: 20px;
                        background-color: rgb(255, 255, 255);
                      "
                    >
                      <div style="color: rgb(0, 0, 0); text-align: left">
                        <h1 style="margin: 1rem 0">Account notification</h1>
                        <p style="padding-bottom: 16px">
                          You have successfully created an account with nmscstshims. Please use this provided <strong>password</strong> to sign in.
                        </p>
                        <p style="padding-bottom: 10px">
                          <strong style="font-size: 130%">$OTP</strong>
                        </p>
                        <a href="https://nmscstshims.com/view/login.php" style="color: #fff; text-decoration: none; background-color: #007bff; padding: 10px 20px; border-radius: 5px; display: inline-block;">Login</a>
                        <p style="padding-bottom: 16px">
                          If you didn’t request this, you can ignore this email.
                        </p>
                        <p style="padding-bottom: 16px">
                          Thanks,<br />The nmscstshims team
                        </p>
                      </div>
                    </div>
                    <div
                      style="
                        padding-top: 20px;
                        color: rgb(153, 153, 153);
                        text-align: center;
                      "
                    >
                      <p style="padding-bottom: 16px">Made with ♥ by nmscstshims</p>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
  </body>
</html>
HTML;

echo $test;