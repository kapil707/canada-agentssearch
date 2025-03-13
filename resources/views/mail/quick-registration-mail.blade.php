<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>
    <style>
        body, .label, .value {
            font-family: Arial, Verdana;
        }
        .label {
            font-weight: bold;
            margin-top: 5px;
            font-size: 1em;
            color: #333;
        }

        td.px-6 {
            border: 1px solid;
        }

        table {
            border-collapse: collapse;
        }

        .value {
            margin-bottom: 15px;
            font-size: 1.0em;
            padding-left: 5px;
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }
    </style>
</head>
<body>
<table align="center"
       style="background-color:#fff; font-family:Arial, Helvetica, sans-serif; font-size:12px; border:1px solid #006; color:#000;"
       width="650">
    <tbody>
    <tr>
        <td align="center" style="padding:10px;" valign="top">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                <tr>
                    <td align="center"><img src="https://just2canada.ca/images/logo.png"/></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <div></div>
        </td>
    </tr>
    <tr>
        <td style="padding:10px 20px" valign="top">
            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                <tbody>
                <tr>
                    <td style="background-color:#ececec;font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#000;padding:7px 0 6px 13px;text-transform:uppercase;border:1px solid #ececec;border-bottom:0px"
                        height="20">Detail:
                    </td>
                </tr>
                <tr>
                    <td style="padding:10px 10px;border:1px solid #ececec" bgcolor="#fff">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                            <tr>
                                <td width="80%" valign="top">
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td colspan="100%" style="text-align: center">
                                                Instant Registration Form
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left:10px" width="40%" height="20"><b>Name: </b></td>
                                            <td width="5%">:</td>
                                            <td width="65%">{{ $data->name}}</td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left:10px" width="40%" height="20"><b>Tel: </b></td>
                                            <td width="5%">:</td>
                                            <td width="65%">{{ $data->tel}}</td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left:10px" width="40%" height="20"><b>Email: </b></td>
                                            <td width="5%">:</td>
                                            <td width="65%">{{ $data->email}}</td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left:10px" width="40%" height="20"><b>Country: </b></td>
                                            <td width="5%">:</td>
                                            <td width="65%">{{ $data->country}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:100%"><h1>Thank you for contacting us.</h1><br><br> We have received
                                    your Form Submission our Staff will be contacting you within 24 hours.
                                    <br><br><strong>Have a great day ahead!</strong></td>
                            </tr>
                            </tbody>

                        </table>

                    </td>

                </tr>

                </tbody>

            </table>

        </td>

    </tr>
    <tr>

        <td>&nbsp;</td>

    </tr>
    <tr>

        <td>&nbsp;</td>

    </tr>
    <tr>
        <td align="center" bgcolor="#1c3e93" height="70"
            style="font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#ffffff;font-weight:normal; "
            valign="middle">
            <table border="0" cellpadding="0" cellspacing="0" width="95%">
                <tbody>
                <tr>
                    <td width="53%">Call Us: <a href="tel:9055860440" value="9055860440" target="_blank"
                                                style="color:#fff">
                            (905) 586 0440 </a><br/>
                        Email Id: <a href="mailto:info@just2canada.ca" style="color:#fff;"> info@just2canada.ca</a>
                        &nbsp;
                    </td>

                    <td align="right" width="47%"> Address: 2233 Argentia Road,
                        East Tower, Suite 302
                        Mississauga, ON L5N 2X7
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

