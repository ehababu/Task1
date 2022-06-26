<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Working with HTML Forms</title>
    <meta name="viewport" content="width=device-width">
    <style>
        *,
        *::after,
        *:before{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        html{
            font:normal 20px/1.5 sans-serif;
            direction: rtl;
        }
        h1{
            margin: 1rem 2rem;
        }
        form{
            margin: 2rem;
            width: 800px;
        }
        .form-box{
            padding: 1rem;
            clear: both;
            width: 100%;
            position: relative;
        }
        .form-box label{
            font-size: 1rem;
            float: left;
            width: 100px;
            margin-right: 20px;
        }
        .form-box input{
            font-size: 1rem;
            width: 300px;
            padding: 0.25rem 1rem;
        }
        .form-box select{
            font-size: 1rem;
            width: 300px;
            padding: 0.25rem 1rem;
        }
        .form-box option{
            font-size: 1rem;
            width: 300px;
            padding: 0.25rem 1rem;
        }
        .form-box input[type="checkbox"]{
            font-size: 1rem;
        }
        .form-box button{
            font-size: 1rem;
            border: none;
            padding: 0.25rem 2rem;
            margin-right: 1rem;
            color: white;
            background-color: cornflowerblue;
            cursor: pointer;
        }
        
        .error::after{
            background-color: hsl(10, 60%, 50%);
            color: papayawhip;
            font-size: 1rem;
            line-height: 1.8;
            width: 350px;
            padding-left: 1rem;
            position:absolute;
            right: 0;
            content: attr(data-errormsg);
        }
        table, th, td {
  border:5px solid rgb(8, 8, 8);
}
    </style>
</head>
<body>
        <h1>Welcome To Gaza</h1>
        
        <form action="{{route('main.store')}}" method="post" >
            @csrf
            <div class="form-box error" data-errormsg="">
                <label for="input-first">السائق</label>
                <select name = "driver_id" id="input-age" tabindex="4">
                    @foreach ($drivers as $driver)
                    <option value="{{ $driver->id }}">{{ $driver->name }}</option>

                    @endforeach
                </select>
            </div>
            <div class="form-box" data-errormsg="">
                <label for="input-password">الكمية</label>
                <input name = "Quantity" type="text" id="input-password" tabindex="2" />
               
                
            </div>
       
                <input name = "kind"type="radio" id="html" name="fav_language" value="لتر">
                <label for="html">لتر</label><br>
                <input name = "kind" type="radio" id="css" name="fav_language" value="شيكل">
                <label for="css">المبلغ</label><br>
               

          
            <div class="form-box" data-errormsg="">
                <label for="input-age">الصنف</label>
                <select name = "item" id="input-age" tabindex="4">
                    <option value="سولار">سولار</option>
                    <option value="بنزين">بنزين</option>
                   
                    
                </select>
            </div>
           
            <input type="hidden"  name = "states" value="false">
            <div class="form-box">
                <button id="button-send">Submit</button>
            </div>
    </form>
    <h1>الطلبات السابقة</h1>

<table style="width:150%">
    <thead>
        <tr>
            <th scope="col">رقم الطلب</th>
            <th scope="col">التاريخ</th>
            <th scope="col">الصنف</th>
            <th scope="col">الكمية</th>
            <th scope="col">السائق</th>
            <th scope="col">الحالة</th>
            <th scope="col">#</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <th scope="row">{{ $order->id }}</th>
                <td>{{ $order->created_at }}</td>
                <td>{{ $order->item }}</td>
                <td>{{ $order->Quantity}} {{$order->kind }}</td>
                <td>{{ $order->getdrive->name }}</td>
                <td>{{ $order->states }}</td>
                <td>
                    
                    @if ($order->states == 'True')
                    
                    @else
                    <a  onclick="myFunction({{$order->id}})" href="#"
                        role="button">Update</a>
                    @endif                    
                        
                    </td>
            </tr>
        @endforeach
    </tbody>

    </table>
    <script>
        function myFunction(id) {
           let isconfirmed = confirm("confirm Data");
           if(isconfirmed){
                window.location.href='/main/update/'+id;

           }else{
                alert("cancel")
           }
        }
        </script>
</body>
</html>



