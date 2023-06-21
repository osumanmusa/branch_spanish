<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="">
    <title></title>
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,600" rel="stylesheet" type="text/css">

    
    
    <style>
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            font-family: 'Roboto', sans-serif !important;
            font-size: 14px;
            margin-bottom: 10px;
            line-height: 24px;
            color: #8094ae;
            font-weight: 400;
        }
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            margin: 0;
            padding: 0;
        }
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }
        table table table {
            table-layout: auto;
        }
        a {
            text-decoration: none;
        }
        img {
            -ms-interpolation-mode:bicubic;
        }
        .email-logo{
            width:190px;
        }
    </style>

</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f5f6fa;">
	<center style="width: 100%; background-color: #f5f6fa;">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#f5f6fa">
            <tr>
               <td style="padding: 40px 0;">
                   
                    <table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
                        <tbody>
                            <tr>
                                <td style="padding: 30px 30px 15px 30px;">
                                    <img src="{{asset('img/logo2.jpg')}}" class="email-logo"/>
                                 </td>
                            </tr>
                            <tr>
                                <td style="padding: 30px 30px 15px 30px;display:center">
                                    <h2 style="font-size: 18px; color: #020202; font-weight: 600; margin: 0;">{{$subject}}</h2>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0 30px 20px">
                                    <p style="margin-bottom: 10px;">Hello, {{$username}}</p>
                                    <p style="margin-bottom: 10px;">As our portal's administrator, an account has been made for you. </p>
                                    <p style="margin-bottom: 25px;">Now that you have these credentials, you can log in and use our platform.</p>
                                    <br>
                                    <p style="margin-bottom: 25px;">Email:  {{$email}}</p>
                                    <p style="margin-bottom: 25px;">Password: {{$password}}</p>
                                   
                                
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0 30px 20px">
                                    <p style="margin-bottom: 10px;"> Kind regards,</p>
                                    <p style="margin-bottom: 10px;">Administrator: Branch Out With Spanish</p>
                                    <p style="margin-bottom: 10px;">Email: admin@branchoutwithspanish.com</p>
                                    <p style="margin-bottom: 10px;">https://branchoutwithspanish.com</p>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
               </td>
            </tr>
        </table>
    </center>
</body>
</html>