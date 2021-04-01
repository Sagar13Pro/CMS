<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .btn {
            display: inline-block;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            cursor: pointer;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: 1rem;
            border-radius: .25rem;
            transition: color .15s ease-in-out,
                background-color .15s ease-in-out,
                border-color .15s ease-in-out,
                box-shadow .15s ease-in-out;
        }

    </style>
</head>
<body>
    <h1>Hi {{$name}},</h1>
    <p>You recently requested to reset your password for your account. Use the button below to reset it. <strong>This password reset is only valid for the next 24 hours.</strong></p>
    <!-- Action -->
    <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <!-- Border based button https://litmus.com/blog/a-guide-to-bulletproof-buttons-in-email-design -->
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="center">
                            <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td>
                                        <a href="{{$action_url}}" class="btn btn-success" target="_blank" style="color: #fff;background-color: #198754;border-color: #198754;">Reset your password</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <p>Thanks,
        <br>The {{ $product_name }} Team</p>
    <!-- Sub copy -->
    <table class="body-sub">
        <tr>
            <td>
                <p class="sub">If you’re having trouble with the button above, copy and paste the URL below into your web browser.</p>
                <p class="sub">{{$action_url}}</p>
            </td>
        </tr>
    </table>
</body>
</html>
