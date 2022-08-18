<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href={{asset("css/bootstrap.min.css")}}>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	<title>Demo</title>
</head>
<body style="margin: 0 20%;">
    
    <!-- formulaire d'enregistrement -->
    <div style="text-align: center"><h3>Register product</h3></div>

    <form action={{route('save')}} method="POST" style="margin: 1% 10%;">
        @csrf

        <input type="hidden" name="id" value={{$id}}>

        <div class="form-group">
            <label for="exampleFormControlInput3">Product name</label>
            <input type="text" class="form-control" id="inlineFormInputGroup" name="name" required>
        </div>

        <section style="align-items: center; display: flex; justify-content: space-between;">
            <div class="form-group" style="width: 48%;">
                <label for="exampleFormControlInput1">Price</label>
                <input type="number" class="form-control" id="inlineFormInputGroup" name="price" required>
            </div>
            
            <div class="form-group" style="width: 48%;">
                <label for="exampleFormControlInput1">Quantity</label>
                <input type="number" class="form-control" id="inlineFormInputGroup" name="quantity" required>
            </div>
        </section>

        <div class="form-group">
            <label for="exampleFormControlInput3">Description</label>
            <textarea name="description" class="form-control" id="inlineFormInputGroup" cols="30" rows="5"></textarea>
        </div>

        <br>

        <button type="submit" class="btn btn-primary" id="btn" style="width: 100%;">REGISTER</button>

    </form>


    
    <!-- liste des produits -->
    <div id="content" style="margin: 0 10%;">
        <div style="text-align: center"><h3>Products list</h3></div>

        @foreach ($products as $item)
            
        <div class="form-group" style="align-items: center; display: flex; justify-content: space-between; margin-top: 20px; background: rgb(230, 230, 230); padding: 10px 5px; border-radius: 5px;">
            <section style="width: 80%; height: 65px;">
                <b>
                    {{$item->NamePro}} | Price: {{$item->Price}}$ | Quantity: {{$item->Quantity}} 
                    <br> 
                    <p style="height: 22px; margin:0; overflow: hidden;">{{$item->Description}}</p>
                    {{$item->updated_at}}
                </b>
            </section>

            <section style="width: 8%; display: flex; align-items: center;">
                <form action={{route('update')}} method="post">@csrf 
                    <input type="hidden" name="id" value={{$item->id}}> 
                    <button type="submit" style="margin: 0; border: none; width: 22px; margin-left:5px;" >
                        <img src={{asset('images/edit.png')}} alt="" width="20px" height="20px">
                    </button>
                </form>

                <form action={{route('delete')}} method="post">@csrf 
                    <input type="hidden" name="id" value={{$item->id}}> 
                    <button type="submit" style="margin: 0; border: none; width: 22px; margin-left:5px;" >
                        <img src={{asset('images/trash.png')}} alt="" width="20px" height="20px">
                    </button>
                </form>
            </section>
        </div>

        @endforeach

    </div>


	<!-- link to javascript -->
	<script type={{asset("js/bootstrap.min.js")}}></script>
</body>
</html>