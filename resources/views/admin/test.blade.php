<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
        </div>
        <table>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Trx Code
                </th>
            </tr>
            @foreach ($trx as $trx1)
            <tr>
                <td>
                    {{ $trx1->id }}
                </td>
                <td>
                    {{ $trx1->trx_code }}
                </td>
            </tr>
            @endforeach
        </table>
        <!-- Login Form -->
        <form action="{{ route('test.save')}}" method="post">
            @csrf
            <button type="submit" class="fadeIn fourth">Submit</button>
        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
        </div>

    </div>
</div>