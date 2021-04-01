<h1>Welcome, {{$name}}!</h1>
<p>Thanks for trying <strong>{{ $product_name }}</strong>. We’re thrilled to have you on board.</p>


<p>For reference, here's your login information:</p>
<table class="attributes" width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td class="attributes_content">
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td class="attributes_item"><strong>Login Page:</strong> {{$login_url}}</td>
                </tr>
                <tr>
                    <td class="attributes_item"><strong>Username:</strong> {{$username}}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<table class="body-sub">
    <tr>
        <td>
            <p class="sub">If you’re having trouble with the button above, copy and paste the URL below into your web browser.</p>
            <p class="sub">{{$action_url}}</p>
        </td>
    </tr>
</table>
